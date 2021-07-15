package main

import (
	"fmt"
	"math"
	"unicode"
)

// 557. 反转字符串中的单词 III
// https://leetcode-cn.com/problems/reverse-words-in-a-string-iii/

func reverseWords(s string) string {
	left, right := 0, -1
	// golang中string底层是通过byte数组实现的,默认编码utf-8
	// rune 等同于int32,常用来处理unicode或utf-8字符,等同于转换成unicode编码的字符
	stringRune := []rune(s)
	for i := 0; i < len(stringRune); i++ {
		// 判断是否是空格
		if unicode.IsSpace(stringRune[i]) {
			//fmt.Println(i, left, right)
			for p := left; p <= int(math.Floor(float64(right-left-1)))+left; p++ {
				stringRune[p], stringRune[right] = stringRune[right], stringRune[p]
				right--
			}
			//fmt.Println(string(stringRune))
			left = i + 1
			right = i
		} else if i == len(stringRune)-1 {
			right = i
			for p := left; p <= int(math.Floor(float64(right-left-1)))+left; p++ {
				stringRune[p], stringRune[right] = stringRune[right], stringRune[p]
				right--
			}
		} else {
			right++
			//fmt.Println("right:", right, "string:", string(stringRune[i]))
		}
	}
	// 将unicode字符转换为utf8的字符串
	return string(stringRune)
}

func main() {
	str := "Let's take LeetCode contest"
	ret := reverseWords(str)
	fmt.Println(ret)
}
