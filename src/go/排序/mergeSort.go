package main

func mergeSort(arr []int) []int {
	if len(arr) < 2 {
		return arr
	}
	mid := len(arr) / 2
	left := mergeSort(arr[:mid])
	right := mergeSort(arr[mid:])
	result := merge(left, right)
	return result
}

//归并操作，left，right均为有序数组
func merge(left, right []int) []int {
	var result []int
	leftIndex, leftLen, rightIndex, rightLen := 0, len(left), 0, len(right)
	for leftIndex < leftLen && rightIndex < rightLen {
		if left[leftIndex] <= right[rightIndex] {
			result = append(result, left[leftIndex])
			leftIndex++
		} else {
			result = append(result, right[rightIndex])
			rightIndex++
		}
	}
	// 剩余左数组，合并到最后
	if leftIndex < leftLen {
		result = append(result, left[leftIndex:]...)
	}
	// 剩余右数组，合并到最后
	if rightIndex < rightLen {
		result = append(result, right[rightIndex:]...)
	}
	return result
}

//func main() {
//	arr := []int{1, 9, 4, 3, 9}
//	//arr := []int{9, 5, 7, 4, 6, 3, 2, 8, 1}
//	result := mergeSort(arr)
//	fmt.Println(result)
//}
