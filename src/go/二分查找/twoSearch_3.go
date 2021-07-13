package main

import (
	"fmt"
	"math"
)

// 35. 搜索插入位置
// https://leetcode-cn.com/problems/search-insert-position/submissions/

func searchInsert(nums []int, target int) int {
	count := len(nums)
	left, right, middle := 0, count-1, -1
	for left <= right {
		middle = int(math.Floor(float64(right-left)/2)) + left
		if target == nums[middle] {
			// 这里直接返回更好，当都找不到target相等的元素，则可以返回left知道位置
			return middle
			//break
		} else if target > nums[middle] {
			left = middle + 1
		} else {
			right = middle - 1
		}
	}
	return left
	//// 切片里没有数据的，需找出插入的地方
	//if right < 0 {
	//	middle = 0
	//}else if left > count {
	//	middle = count
	//}else if left > right {
	//	middle = left
	//}
	//return middle
}

func main_3() {
	nums := []int{1, 3, 5, 6}
	ret1 := searchInsert(nums, 0)
	ret2 := searchInsert(nums, 1)
	ret3 := searchInsert(nums, 2)
	ret4 := searchInsert(nums, 7)

	fmt.Println(ret1, ret2, ret3, ret4)
}
