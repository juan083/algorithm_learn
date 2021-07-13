package main

import (
	"fmt"
	"math"
)

// 704.二分查找
// https://leetcode-cn.com/problems/binary-search/submissions/

// 定义了参数类型，返回类型
func search(nums []int, target int) int {
	// 获取切片长度len()
	left, right, index := 0, len(nums)-1, -1
	// go没有while，用for来实现while无限循环
	for left <= right {
		// 注意go的严格类型，math.Ceil的参数是float64，所以必须强制转换
		middle := int(math.Ceil(float64(right-left)/2)) + left
		//fmt.Println(right, left, middle, nums[middle])
		if target == nums[middle] {
			index = middle
			break
		} else if target > nums[middle] {
			left = middle + 1
		} else {
			right = middle - 1
		}
	}
	return index
}

func twoSearch() {
	// 所有的初始化，记得带上冒号:，:=
	// 切片初始化
	nums := []int{-1, 0, 3, 5, 9, 12}
	target := 9
	fmt.Println(nums, target, nums[0])
	ret := search(nums, target)
	fmt.Println(ret)
}
