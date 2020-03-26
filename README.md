## Benchmark Result

TaskWorker vs GoTask

TaskWorker按照Hyperf默认配置开启8进程。
GoTask只开启1进程。

100并发，10000次访问结果：

| | PHP TaskWorker 1进程 |PHP TaskWorker 8进程 | GoTask  |
|--|--|--|--|
| HelloWorld | 10795.08 ops | 24580.84 ops | 36001.66 ops  |
| Mongo单条数据插入 | 3796.85 ops | 12141.51 ops | 17372.63 ops  |

### Hello World
TaskWorker 1 进程

```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/phpHi
Document Length:        14 bytes

Concurrency Level:      100
Time taken for tests:   0.926 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1560000 bytes
HTML transferred:       140000 bytes
Requests per second:    10795.08 [#/sec] (mean)
Time per request:       9.263 [ms] (mean)
Time per request:       0.093 [ms] (mean, across all concurrent requests)
Transfer rate:          1644.56 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     2    9   2.8      9      19
Waiting:        2    9   2.8      9      19
Total:          2    9   2.9      9      19

Percentage of the requests served within a certain time (ms)
  50%      9
  66%     10
  75%     11
  80%     11
  90%     13
  95%     15
  98%     17
  99%     18
 100%     19 (longest request)
```
TaskWorker 8 进程
```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/phpHi
Document Length:        14 bytes

Concurrency Level:      100
Time taken for tests:   0.407 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1560000 bytes
HTML transferred:       140000 bytes
Requests per second:    24580.84 [#/sec] (mean)
Time per request:       4.068 [ms] (mean)
Time per request:       0.041 [ms] (mean, across all concurrent requests)
Transfer rate:          3744.74 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     0    4   5.0      3      86
Waiting:        0    4   5.0      3      86
Total:          0    4   5.0      3      86
```

GoTask

```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/goHi
Document Length:        14 bytes

Concurrency Level:      100
Time taken for tests:   0.278 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1560000 bytes
HTML transferred:       140000 bytes
Requests per second:    36001.66 [#/sec] (mean)
Time per request:       2.778 [ms] (mean)
Time per request:       0.028 [ms] (mean, across all concurrent requests)
Transfer rate:          5484.63 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     0    3   1.8      2      30
Waiting:        0    3   1.8      2      30
Total:          0    3   1.9      2      30

Percentage of the requests served within a certain time (ms)
  50%      2
  66%      3
  75%      3
  80%      3
  90%      4
  95%      6
  98%      7
  99%     11
 100%     30 (longest request)
```

### Mongo数据库插入

TaskWorker 1进程
```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/phpInsert
Document Length:        24 bytes

Concurrency Level:      100
Time taken for tests:   2.634 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1660000 bytes
HTML transferred:       240000 bytes
Requests per second:    3796.85 [#/sec] (mean)
Time per request:       26.338 [ms] (mean)
Time per request:       0.263 [ms] (mean, across all concurrent requests)
Transfer rate:          615.50 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.2      0       3
Processing:     2   26   4.4     25      47
Waiting:        2   26   4.4     25      47
Total:          2   26   4.3     25      47

Percentage of the requests served within a certain time (ms)
  50%     25
  66%     27
  75%     28
  80%     28
  90%     31
  95%     34
  98%     40
  99%     41
 100%     47 (longest request)
```

TaskWorker 8进程

```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/phpInsert
Document Length:        24 bytes

Concurrency Level:      100
Time taken for tests:   0.824 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1660000 bytes
HTML transferred:       240000 bytes
Requests per second:    12141.51 [#/sec] (mean)
Time per request:       8.236 [ms] (mean)
Time per request:       0.082 [ms] (mean, across all concurrent requests)
Transfer rate:          1968.25 [Kbytes/sec] received
```

GoTask

```
This is ApacheBench, Version 2.3 <$Revision: 1826891 $>
Copyright 1996 Adam Twiss, Zeus Technology Ltd, http://www.zeustech.net/
Licensed to The Apache Software Foundation, http://www.apache.org/

Benchmarking 127.0.0.1 (be patient)
Completed 1000 requests
Completed 2000 requests
Completed 3000 requests
Completed 4000 requests
Completed 5000 requests
Completed 6000 requests
Completed 7000 requests
Completed 8000 requests
Completed 9000 requests
Completed 10000 requests
Finished 10000 requests


Server Software:        Hyperf
Server Hostname:        127.0.0.1
Server Port:            9501

Document Path:          /index/goInsert
Document Length:        24 bytes

Concurrency Level:      100
Time taken for tests:   0.576 seconds
Complete requests:      10000
Failed requests:        0
Keep-Alive requests:    10000
Total transferred:      1660000 bytes
HTML transferred:       240000 bytes
Requests per second:    17372.63 [#/sec] (mean)
Time per request:       5.756 [ms] (mean)
Time per request:       0.058 [ms] (mean, across all concurrent requests)
Transfer rate:          2816.27 [Kbytes/sec] received
```
