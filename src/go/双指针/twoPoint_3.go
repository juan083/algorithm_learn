package main

import "fmt"

// 283. 移动零
// https://leetcode-cn.com/problems/move-zeroes/

func moveZeroes(nums []int) {
	l := len(nums)
	// 左指针找到0的位置，右指针找到非0的位置，左右指针交互数据
	// 注意go的多层循环跳出的方法，break xxxx名称，否则只能跳出最近一层的循环
	for i := 0; i < l-1; i++ {
		if nums[i] != 0 {
			continue
		}
		for j := i + 1; j < l; j++ {
			if nums[j] != 0 {
				nums[i], nums[j] = nums[j], nums[i]
				break
			}
		}
		fmt.Println(i, nums)
	}
	fmt.Println(nums)
}

func main() {
	nums := []int{0, 1, 0, 3, 12}
	moveZeroes(nums)
}
