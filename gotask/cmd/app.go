package main

import (
	"context"
	"fmt"
	"github.com/reasno/gotask/pkg/gotask"
	"go.mongodb.org/mongo-driver/bson"
	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
	"time"
)

// App sample
type App struct {
	client *mongo.Client
}

func NewApp(client *mongo.Client) *App {
	return &App{
		client,
	}
}

// Hi returns greeting message.
func (a *App) Hi(name interface{}, r *interface{}) error {
	*r = fmt.Sprintf("Hello, %s!", name)
	return nil
}

func (a *App) Insert(record []byte, r *interface{}) error {
	var doc bson.D
	err := bson.UnmarshalExtJSON(record, false, &doc)
	if err != nil {
		return err
	}
	collection := a.client.Database("testing").Collection("numbers")
	ctx, _ := context.WithTimeout(context.Background(), 5*time.Second)
	var docs [100]interface{}
	for i := 0; i < 100; i++ {
		docs[i] = doc
	}
	res, err := collection.InsertMany(ctx, docs[:])
	if err != nil {
		return err
	}
	*r = res.InsertedIDs
	return nil
}

func fib(n int) int {
	if n == 0 {
		return 0
	}
	if n == 1 {
		return 1
	}
	return fib(n-1) + fib(n-2)
}

func (a *App) Fib(n int, r *int) error {
	*r = fib(n)
	return nil
}

func (a *App) Blocking(_ interface{}, r *interface{}) error {
	time.Sleep(100 * time.Millisecond)
	return nil
}

func main() {
	ctx, _ := context.WithTimeout(context.Background(), 10*time.Second)
	client, err := mongo.Connect(ctx, options.Client().ApplyURI("mongodb://localhost:27017"))
	if err != nil {
		panic(err)
	}
	collection := client.Database("testing").Collection("numbers")
	_ = collection.Drop(ctx)
	gotask.Register(NewApp(client))
	gotask.Run()
}
