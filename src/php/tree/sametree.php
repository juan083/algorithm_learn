<?php
/**
 * https://leetcode-cn.com/problems/same-tree/submissions/
 * 100. 相同的树
 *
 * 简单
 *
 * 给定两个二叉树，编写一个函数来检验它们是否相同。
 * 如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。
 */

class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        if (!$p && !$q) {
            return true;
        }elseif (!$p || !$q) {
            return false;
        }elseif ($p->val != $q->val) {
            return false;
        }else {
            return $this->isSameTree($p->left, $q->left) && $this->isSameTree($p->right, $q->right);
        }
    }
}

$l1 = new TreeNode(1, new TreeNode(2, new TreeNode(3)));
$l2 = new TreeNode(1, new TreeNode(2, new TreeNode(3)));
$solution = new Solution();
$ret = $solution->isSameTree($l1, $l2);
var_dump($ret);