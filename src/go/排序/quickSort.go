package main

import (
	"fmt"
)

func quickSort(a []int, start int, end int) {
	if start >= end {
		return
	}
	pivot, left, right := a[start], start, end
	for left < right {
		for left < right && a[right] >= pivot {
			right--
		}
		for left < right && a[left] <= pivot {
			left++
		}
		a[left], a[right] = a[right], a[left]
	}
	a[left], a[start] = pivot, a[left]
	quickSort(a, start, left)
	quickSort(a, left+1, end)
}

func main() {
	a := []int{5, 4, 8, 9, 3}
	//a := []int{12, 3, 111, 23, 65, 45}
	quickSort(a, 0, len(a)-1)
	fmt.Println(a)
}
