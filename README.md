## Run Benchmark

要求MongoDB在本地默认端口启动。

```bash
cd gotask
go build -o ../bin/app cmd/app.go
cd ..
composer install
./vendor/bin/init-proxy.sh && php bin/hyperf.php start
```

在另一个终端执行

```bin
./bin/bench.sh
```


## Benchmark Result

TaskWorker vs GoTask

TaskWorker分别开启1进程和8进程。
GoTask只开启1进程。

机器配置：iMac (Late 2015) 3.2 GHz Quad-Core Intel Core i5

100并发压测结果：

| | PHP TaskWorker 1进程 |PHP TaskWorker 8进程 | GoTask  |
|--|--|--|--|
| HelloWorld | 4931.55 ops | 12504.86 ops | 23472.74 ops  |
| 斐波那契(20) | 未完成 | 12.78 ops | 17634.01 ops  |
| 100毫秒PHP阻塞模拟 | 未完成 | 44.19 ops | 941.14 ops  |
| Mongo 插入100条数据 | 未完成 | 1336.07 ops | 2171.84 ops  |

### 全部结果

```
Running 15s test @ http://127.0.0.1:9501/index/phpHi
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency    10.55ms    2.47ms  33.07ms   80.21%
    Req/Sec     0.94k   229.26     4.05k    92.68%
  74471 requests in 15.10s, 11.08MB read
  Socket errors: connect 0, read 0, write 0, timeout 100
Requests/sec:   4931.55
Transfer/sec:    751.29KB
Running 15s test @ http://127.0.0.1:9501/index/phpFib
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     1.05s   550.68ms   1.77s    66.67%
    Req/Sec     2.56      4.82    28.00     93.65%
  117 requests in 15.10s, 19.53KB read
  Socket errors: connect 0, read 0, write 0, timeout 111
  Non-2xx or 3xx responses: 82
Requests/sec:      7.75
Transfer/sec:      1.29KB
Running 15s test @ http://127.0.0.1:9501/index/phpBlocking
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     0.00us    0.00us   0.00us     nan%
    Req/Sec     0.00      0.00     0.00    100.00%
  100 requests in 15.08s, 17.77KB read
  Socket errors: connect 0, read 0, write 0, timeout 100
  Non-2xx or 3xx responses: 100
Requests/sec:      6.63
Transfer/sec:      1.18KB
Running 15s test @ http://127.0.0.1:9501/index/phpInsert
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     0.00us    0.00us   0.00us     nan%
    Req/Sec     0.00      0.00     0.00    100.00%
  100 requests in 15.07s, 17.77KB read
  Socket errors: connect 0, read 0, write 0, timeout 100
  Non-2xx or 3xx responses: 100
Requests/sec:      6.63
Transfer/sec:      1.18KB
Running 15s test @ http://127.0.0.1:9501/index/phpHi
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     8.99ms    7.07ms  78.44ms   90.51%
    Req/Sec     1.26k   159.18     1.74k    77.13%
  188174 requests in 15.05s, 28.00MB read
Requests/sec:  12504.86
Transfer/sec:      1.86MB
Running 15s test @ http://127.0.0.1:9501/index/phpFib
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     1.22s   497.23ms   1.84s    33.33%
    Req/Sec     3.59      6.48    40.00     95.00%
  193 requests in 15.10s, 27.33KB read
  Socket errors: connect 0, read 0, write 0, timeout 169
Requests/sec:     12.78
Transfer/sec:      1.81KB
Running 15s test @ http://127.0.0.1:9501/index/phpBlocking
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     1.26s   208.30ms   1.67s    64.37%
    Req/Sec    10.23      7.38    40.00     68.24%
  667 requests in 15.09s, 93.15KB read
  Socket errors: connect 0, read 0, write 0, timeout 100
Requests/sec:     44.19
Transfer/sec:      6.17KB
Running 15s test @ http://127.0.0.1:9501/index/phpInsert
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency   123.31ms  195.37ms   1.64s    93.06%
    Req/Sec   145.14     60.51   717.00     72.45%
  20174 requests in 15.10s, 72.17MB read
Requests/sec:   1336.07
Transfer/sec:      4.78MB
Running 15s test @ http://127.0.0.1:9501/index/goHi
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     4.68ms    4.57ms 101.15ms   96.55%
    Req/Sec     2.36k   309.62     3.48k    74.73%
  352894 requests in 15.03s, 52.50MB read
Requests/sec:  23472.74
Transfer/sec:      3.49MB
Running 15s test @ http://127.0.0.1:9501/index/goFib
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     7.04ms    8.81ms 140.23ms   94.26%
    Req/Sec     1.77k   290.24     3.07k    71.47%
  265123 requests in 15.03s, 36.66MB read
Requests/sec:  17634.01
Transfer/sec:      2.44MB
Running 15s test @ http://127.0.0.1:9501/index/goBlocking
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency   105.75ms    1.87ms 110.06ms   65.21%
    Req/Sec    95.77     10.92   125.00     95.81%
  14203 requests in 15.09s, 1.91MB read
Requests/sec:    941.14
Transfer/sec:    129.59KB
Running 15s test @ http://127.0.0.1:9501/index/goInsert
  10 threads and 100 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency    72.47ms   83.80ms 544.22ms   84.14%
    Req/Sec   226.04     90.91   620.00     68.72%
  32800 requests in 15.10s, 89.18MB read
Requests/sec:   2171.84
Transfer/sec:      5.91MB


```
