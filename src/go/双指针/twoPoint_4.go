package main

import (
	"fmt"
	"math"
)

// 167. 两数之和 II - 输入有序数组
// https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted/

func twoSum_1(numbers []int, target int) []int {
	l := len(numbers)
	for i := 0; i < l-1; i++ {
		for j := i + 1; j < l; j++ {
			if numbers[i]+numbers[j] == target {
				return []int{i + 1, j + 1}
			}
		}
	}
	return []int{}
}

func twoSum(numbers []int, target int) []int {
	l := len(numbers)
	for i := 0; i < l-1; i++ {
		j := int(math.Ceil(float64(l-1-i)/2)) + i
		flag, sum := 1, numbers[i]+numbers[j]
		if sum == target {
			return []int{i + 1, j + 1}
		} else if sum > target {
			flag = -1
		}
		for j < l && j > i {
			sum := numbers[i] + numbers[j]
			if sum == target {
				return []int{i + 1, j + 1}
			}
			j += flag
		}
	}
	return []int{}
}

func main_4() {
	//numbers, target := []int{2, 7, 11, 15}, 9
	//numbers, target := []int{3, 24, 50, 79, 88, 150, 345}, 200
	numbers, target := []int{-1, 0}, -1
	ret := twoSum(numbers, target)
	fmt.Println(ret)
}
