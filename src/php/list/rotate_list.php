<?php
/**
 * https://leetcode-cn.com/problems/rotate-list/
 * 61. 旋转链表
 *
 * 给定一个链表，旋转链表，将链表每个节点向右移动 k 个位置，其中 k 是非负数。
 * 示例 1:
 * 输入: 1->2->3->4->5->NULL, k = 2
 * 输出: 4->5->1->2->3->NULL
 *
 * 思路：
 * 先计算链表总长度len，再%k，判断选择的中断位置（k大于len，相当于多走了一圈）
 * 在中断位置，将后部分移到前面，再拼接上原来的前部分
 */


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if ($k <= 0 || !$head->next) {
            return $head;
        }

        $len = 1;
        $next = $head;
        while ($next = $next->next) {
            $len++;
        }
        $k = $k % $len;
        if ($k == 0) {
            return $head;
        }
        $i = 1;
        $next = $head;
        $newHead = $head;
        while($i <= $len) {
            if ($i == ($len - $k)) {
                $newHead = $next->next;
                $last = $next;
            }
            if ($i == $len) {
                $last->next = null;
                $next->next = $head;
                break;
            }
            $next = $next->next;
            $i++;
        }
        return $newHead;
    }
}

$solution = new Solution();
$head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
$k = 0;
$l = $solution->rotateRight($head, $k);
do {
    echo $l->val;
}while($l = $l->next);