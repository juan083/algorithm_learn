package main

import "fmt"

// 剑指 Offer 25. 合并两个排序的链表
// https://leetcode-cn.com/problems/he-bing-liang-ge-pai-xu-de-lian-biao-lcof/

func mergeTwoLists(l1 *ListNode, l2 *ListNode) *ListNode {
	if l1 == nil {
		return l2
	}
	if l2 == nil {
		return l1
	}

	currL1, currL2, ret := l1, l2, &ListNode{0, nil}
	head := ret
	for currL1 != nil && currL2 != nil {
		if currL1.Val <= currL2.Val {
			ret.Next = currL1
			currL1 = currL1.Next
		} else {
			ret.Next = currL2
			currL2 = currL2.Next
		}
		ret = ret.Next
	}
	if currL1 != nil {
		ret.Next = currL1
	}
	if currL2 != nil {
		ret.Next = currL2
	}

	return head.Next
}

func main() {
	l1 := &ListNode{1, &ListNode{2, &ListNode{4, nil}}}
	l2 := &ListNode{1, &ListNode{3, &ListNode{4, nil}}}
	//fmt.Println('1')
	r := mergeTwoLists(l1, l2)
	for r != nil {
		fmt.Println(r.Val)
		r = r.Next
	}

}
