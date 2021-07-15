package main

import "fmt"

// 运用panic、defer、recover，类似于try...catch...
func tryCatch() {
	defer func() {
		fmt.Println("defer")
		// recover() 错误恢复
		if err := recover(); err != nil {
			fmt.Println("catch: ", err)
		}
	}()
	fmt.Println("start")
	// 用于不可恢复的错误，退出之前会执行defer指定的内容
	panic("error_1")
}

func main_2() {
	tryCatch()
}
