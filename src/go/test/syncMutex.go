package main

import (
	"fmt"
	"sync"
	"time"
)

// 利用Sync.mutex 和 Sync.WaitGroup 来解决并发问题
// Sync.mutex 锁的机制控制并发
// Sync.WaitGroup .wait() 等待所有 .add(1) 的任务都 .done()，才会往下执行
var mut sync.Mutex
var ret string
var wg sync.WaitGroup

func sync1() {
	wg.Add(1)
	mut.Lock()
	ret = "sync 1"
	fmt.Println("ret1:", ret)
	time.Sleep(time.Second * 3)
	mut.Unlock()
	wg.Done()
}

func sync2() {
	wg.Add(1)
	mut.Lock()
	ret = "sync 2"
	fmt.Println("ret2:", ret)
	mut.Unlock()
	wg.Done()
}

func main() {
	// 利用Sync.Mutex 的 Lock 控制并发
	go sync1()
	time.Sleep(time.Microsecond * 100)
	fmt.Println("start sync 2")
	go sync2()
	wg.Wait()
	fmt.Println("main:", ret)
}
