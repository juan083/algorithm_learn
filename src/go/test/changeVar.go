package main

import "fmt"

// 可变参数
func sum(nums ...int) int {
	sum := 0
	for _, v := range nums {
		sum += v
	}
	return sum
}

func main_1() {
	// 两种方式调用可变参数的函数：直接写入多个参数、以切片写入并在最尾加上...
	sum1 := sum(1, 2, 3, 4, 5)
	fmt.Println(sum1)

	sum2 := sum([]int{1, 2, 3, 4, 5}...)
	fmt.Println(sum2)
}
