#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
144. 二叉树的前序遍历

思路
leetcode只能使用内部函数的方式，不能增加类的属性保存结果
前序遍历的方式，公式：
访问根节点，递归左节点，递归右节点
'''


# Definition for a binary tree node.
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right

class Solution:
    _ret = []

    def preorderTraversal(self, root: TreeNode) -> List[int]:
        def proorder(root):
            if root is None:
                return self._ret

            ret.append(root.val)
            proorder(root.left)
            proorder(root.right)

        ret = []
        proorder(root)
        return ret