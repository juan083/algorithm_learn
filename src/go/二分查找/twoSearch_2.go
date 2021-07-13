package main

import (
	"fmt"
	"math"
	"sort"
)

// 278. 第一个错误的版本
// https://leetcode-cn.com/problems/first-bad-version/submissions/

// 官方给的答案，利用sort.Search()进行二分查找
// func Search(n int, f func(int) bool) int
// Search函数采用二分法搜索找到[0, n)区间内最小的满足f(i)==true的值i。
func firstBadVersion_office(n int) int {
	return sort.Search(n, func(version int) bool { return isBadVersion(version) })
}

func firstBadVersion(n int) int {
	middle, left, right, bagV := 0, 1, n, -1
	for left <= right {
		// 注意：做除法时，必须强制转换为float64，否则得出的结果将是舍去小数部分的整数，如7/2=3，如果加float64，则是3.5
		middle = int(math.Ceil(float64(right-left)/2)) + left
		//fmt.Println(right, left, middle)
		if isBadVersion(middle) {
			// 第一个是错误，则说明一开始就错了
			if middle == 1 {
				bagV = 1
				break
			}
			// 当前是错误的，左1是正确的，则说明从当前开始出错
			if !isBadVersion(middle - 1) {
				bagV = middle
				break
			} else {
				right = middle - 1
			}
		} else {
			// 当前是正确的，右1是错误的，则说明从右1开始出错
			if isBadVersion(middle + 1) {
				bagV = middle + 1
				break
			} else {
				left = middle + 1
			}
		}
	}
	return bagV
}

func firstBadVersion_better(n int) int {
	middle, left, right := 0, 1, n
	for left < right {
		// 注意：做除法时，必须强制转换为float64，否则得出的结果将是舍去小数部分的整数，如7/2=3，如果加float64，则是3.5
		middle = int(math.Floor(float64(right-left)/2)) + left
		//fmt.Println("office", right, left, middle)
		if isBadVersion(middle) {
			right = middle
		} else {
			left = middle + 1
		}
	}
	return left
}

var bag, count = 40, 0

func isBadVersion(version int) bool {
	count++
	if version >= bag {
		return true
	} else {
		return false
	}
}

func main_2() {
	// 官方的算法会更快，和go的sort.Search一样的查询次数
	n := 1000

	ret := firstBadVersion(n)
	fmt.Println(ret, count) // 40，14

	ret_2 := firstBadVersion_better(n)
	fmt.Println("office", ret_2, count) // 40, 10

	ret_3 := firstBadVersion_office(n)
	fmt.Println("go", ret_3, count) // 40, 10
}
