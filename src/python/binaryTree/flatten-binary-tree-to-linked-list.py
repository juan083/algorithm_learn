#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/flatten-binary-tree-to-linked-list/
114. 二叉树展开为链表

思路
通过前序遍历，将左节点移动到右节点

'''

# Definition for a binary tree node.
class TreeNode:
    def __init__(self, val=0, left=None, right=None):
        self.val = val
        self.left = left
        self.right = right

class Solution:
    def flatten(self, root: TreeNode) -> None:
        """
        Do not return anything, modify root in-place instead.
        """
        if root is None:
            return

        root.left, root.right, item = None, root.left, root.right
        p = root
        while p.right:
            p = p.right
        p.right = item

        self.flatten(root.left)
        self.flatten(root.right)