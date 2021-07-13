package main

import (
	"fmt"
	"math"
)

// 977.有序数组的平方
// https://leetcode-cn.com/problems/squares-of-a-sorted-array/

func sortedSquares(nums []int) []int {
	l := len(nums)
	left, right := 0, l-1
	// 使用make初始化切片，设定长度和容量
	ret := make([]int, l, l)
	for left <= right {
		leftItem := int(math.Pow(float64(nums[left]), float64(2)))
		rightItem := int(math.Pow(float64(nums[right]), float64(2)))
		if rightItem >= leftItem {
			ret[l-1] = rightItem
			right--
		} else {
			ret[l-1] = leftItem
			left++
		}
		l--
	}
	return ret
}

func main_1() {
	nums := []int{-4, -1, 0, 3, 10}
	ret := sortedSquares(nums)
	fmt.Println(ret)
}
