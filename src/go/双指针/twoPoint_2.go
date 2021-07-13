package main

import "fmt"

// 189.旋转数组
// https://leetcode-cn.com/problems/rotate-array/

// 时间O(n)，空间O(n)
func rotate_1(nums []int, k int) {
	l := len(nums)
	k = k % l
	// 创建一个切片装结果，空间复杂度O(n)
	ret := make([]int, l, l)
	for i := 0; i < l; i++ {
		index := (i + k) % l
		ret[index] = nums[i]
	}
	fmt.Println(ret)
}

// 利用外部变量保存元素，时间O(n)，空间O(1)
func rotate_2(nums []int, k int) {
	l := len(nums)
	k = k % l
	index, item := 0, nums[0]
	// 理清思路，这里混沌了一会
	for i := 0; i < l; i++ {
		index = (index + k) % l
		nums[index], item = item, nums[index]
	}
	fmt.Println(nums)
}

// 翻转数组，时间O(2n)，空间无
func rotate_3(nums []int, k int) {
	l := len(nums)
	k = k % l

	// 第1次翻转，结果 [7, 6, 5, 4, 3, 2, 1]
	i, j := 0, l-1
	for i < j {
		nums[i], nums[j] = nums[j], nums[i]
		i++
		j--
	}
	//fmt.Println(nums)

	// 第2次翻转，结果 [5, 6, 7, 4, 3, 2, 1]
	i, j = 0, k-1
	for i < j {
		nums[i], nums[j] = nums[j], nums[i]
		i++
		j--
	}
	//fmt.Println(nums)

	// 第3次翻转，结果 [5, 6, 7, 1, 2, 3, 4]
	i, j = k, l-1
	for i < j {
		nums[i], nums[j] = nums[j], nums[i]
		i++
		j--
	}

	fmt.Println(nums)
}

func main() {
	// 注意：!!!
	// 所有参数都是值传递
	// slice、map、channel也是值传递，即结构被复制，都是指向同一块内存卡，所以有错觉是引用传递
	nums, k := []int{1, 2, 3, 4, 5, 6, 7}, 3
	rotate_1(nums, k)

	nums, k = []int{1, 2, 3, 4, 5, 6, 7}, 3
	rotate_2(nums, k)

	nums, k = []int{1, 2, 3, 4, 5, 6, 7}, 3
	rotate_3(nums, k)
}
