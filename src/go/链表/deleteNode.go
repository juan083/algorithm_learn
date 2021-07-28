package main

import "fmt"

// 剑指 Offer 18. 删除链表的节点
// https://leetcode-cn.com/problems/shan-chu-lian-biao-de-jie-dian-lcof/

func deleteNode(head *ListNode, val int) *ListNode {
	if head == nil {
		return head
	}
	sentry := &ListNode{0, head}
	curr := sentry
	for curr != nil {
		if curr.Next != nil && curr.Next.Val == val {
			curr.Next = curr.Next.Next
		}
		curr = curr.Next
	}
	return sentry.Next
}

func main_2() {
	p := &ListNode{4, &ListNode{5, &ListNode{1, &ListNode{9, nil}}}}
	//fmt.Println('1')
	r := deleteNode(p, 4)
	fmt.Println(r.Val, r.Next.Val, r.Next.Next.Val)
}
