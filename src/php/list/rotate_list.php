<?php
/**
 * @description  rotate_list.php
 * @author:      juan083@163.com
 * @createtime:  2020-12-01 17:40
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
        if (!$head->next) {
            return $head;
        }

        $len = 1;
        $next = $head;
        while ($next = $next->next) {
            $len++;
        }
        var_dump($len);
        $k = $k % $len;
        $i = 1;
        $next = $head;
        $newHead = $head;
        while($i <= $len) {
            if ($i == ($len - $k)) {
                $newHead = $next->next;
                $next->next = null;mmvmvm, m m m n n nvvv
            }
            $next = $next->next;
            $i++;
        }

        return $newHead;
    }
}

$solution = new Solution();
$head = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
$k = 2;
$l = $solution->rotateRight($head, $k);
do {
    echo $l->val;
}while($l = $l->next);