package main

import "fmt"

// 剑指 Offer 24. 反转链表
// https://leetcode-cn.com/problems/fan-zhuan-lian-biao-lcof/

// Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

func reverseList(head *ListNode) *ListNode {
	if head == nil || head.Next == nil {
		return head
	}

	var prev *ListNode
	curr := head
	for curr != nil {
		next := curr.Next
		curr.Next = prev
		prev = curr
		curr = next
	}
	return prev
}

func main_1() {
	p := &ListNode{1, &ListNode{2, &ListNode{3, nil}}}
	//fmt.Println('1')
	r := reverseList(p)
	fmt.Println(r.Val, r.Next.Val, r.Next.Next.Val)
}
