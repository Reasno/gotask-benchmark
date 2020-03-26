package main

import (
	"context"
	"encoding/json"
	"fmt"
	"go.mongodb.org/mongo-driver/bson"
	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
	"github.com/reasno/gotask/pkg/gotask"
	"time"
)

// App sample
type App struct{
	client *mongo.Client
}

func NewApp(client *mongo.Client) *App{
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
	err := bson.UnmarshalExtJSON(record,false, &doc)
	if err != nil {
		return err
	}
	collection := a.client.Database("testing").Collection("numbers")
	ctx, _ := context.WithTimeout(context.Background(), 5*time.Second)
	res, err := collection.InsertOne(ctx, doc)
	if err != nil {
		return err
	}
	*r = res.InsertedID
	return nil
}

func (a *App) Insert2(record interface{}, r *interface{}) error {
	b, err := json.Marshal(record)
	if err != nil {
		return err
	}
	var doc bson.D
	err = bson.UnmarshalExtJSON(b,false,  &doc)
	if err != nil {
		return err
	}
	collection := a.client.Database("testing").Collection("numbers")
	ctx, _ := context.WithTimeout(context.Background(), 5*time.Second)
	res, err := collection.InsertOne(ctx, doc)
	if err != nil {
		return err
	}
	*r = res.InsertedID
	return nil
}

func main() {
	ctx, _ := context.WithTimeout(context.Background(), 10*time.Second)
	client, err := mongo.Connect(ctx, options.Client().ApplyURI("mongodb://localhost:27017"))
	if err != nil {
		panic(err)
	}
	gotask.Register(NewApp(client))
	gotask.Run()
}

