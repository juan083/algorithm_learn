<?php
/**
 * https://leetcode-cn.com/problems/add-two-numbers/
 *
 * 2. 两数相加
 * 给出两个 非空 的链表用来表示两个非负的整数。
 * 其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 *
 * 示例：
 * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 0 -> 8
 * 原因：342 + 465 = 807
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

    function addTwoNumbers($l1, $l2) {
        $retNode = new ListNode();
        $cur = $retNode;
        $f = 0;
        while ($l1 || $l2) {
            $val1 = $val2 = 0;
            if ($l1) {
                $val1 = $l1->val;
                $l1 = $l1->next;
            }
            if ($l2) {
                $val2 = $l2->val;
                $l2 = $l2->next;
            }

            $ret = $val1 + $val2 + $f;
            if ($ret >= 10) {
                $f = 1;
                $val = $ret - 10;
            }else {
                $f = 0;
                $val = $ret;
            }
            $cur->next = new ListNode($val);
            $cur = $cur->next;
        }

        // 不要漏掉最后一位的进位！！！
        if ($f) {
            $cur->next = new listNode($f);
        }
        return $retNode->next;
    }
}

$l1 = new ListNode(2, new ListNode(4, new ListNode(5)));
$l2 = new ListNode(3, new ListNode(6, new ListNode(4, new ListNode(1))));
$solution = new Solution();
$l = $solution->addTwoNumbers($l1, $l2);

do {
    echo $l->val;
}while($l = $l->next);