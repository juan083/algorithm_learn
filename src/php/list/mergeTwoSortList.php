<?php
/**
 * https://leetcode-cn.com/problems/merge-two-sorted-lists/
 * 21. 合并两个有序链表
 * 
 * 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 
 * 示例：
 * 输入：1->2->4, 1->3->4
 * 输出：1->1->2->3->4->4
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

    function mergeTwoLists($l1, $l2) {
        $l = new ListNode();
        $cur = $l;
        while ($l1 && $l2) {
            if ($l2->val < $l1->val) {
                $cur->next = $l2;
                $l2 = $l2->next;
            }else {
                $cur->next = $l1;
                $l1 = $l1->next;
            }
            $cur = $cur->next;
        }

        if ($l1) {
            $cur->next = $l1;
        }
        if ($l2) {
            $cur->next = $l2;
        }

        return $l->next;
    }

    // 递归算法
    function mergeTwoLists_2($l1, $l2) {
        if (!$l1) {
            return $l1;
        }
        if (!$l2) {
            return $l2;
        }

        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists_2($l1->next, $l2);
            return $l1;
        }else {
            $l2->next = $this->mergeTwoLists_2($l1, $l2->next);
            return $l2;
        }
    }
}

$l1 = new ListNode(1, new ListNode(2, new ListNode(4)));
$l2 = new ListNode(1, new ListNode(3, new ListNode(4)));
$solution = new Solution();
$l = $solution->mergeTwoLists($l1, $l2);
//$l = $solution->mergeTwoLists_2($l1, $l2);

do {
    echo $l->val;
}while($l = $l->next);
