#!/bin/bash
CON="100"
NUM="10000"

#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/phpHi
#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/phpFib
#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/phpBlocking
ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/phpInsert

#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/goHi
#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/goFib
#ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/goBlocking
ab -k -c $CON -n $NUM http://127.0.0.1:9501/index/goInsert