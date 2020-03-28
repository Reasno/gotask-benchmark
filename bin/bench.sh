#!/bin/bash
CON="100"

wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/phpHi
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/phpFib
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/phpBlocking
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/phpInsert
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/goHi
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/goFib
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/goBlocking
wrk -t 10 -c $CON -d 15s http://127.0.0.1:9501/index/goInsert