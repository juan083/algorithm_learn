#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/invert-binary-tree/submissions/
226. 翻转二叉树

思路：
二叉树的前序遍历 或 后续遍历，
不能用中序遍历（会造成左节点被翻转2次（恢复原来状态），右节点未被翻转，无法实现二叉树的翻转）

通过观察，我们发现只要把二叉树上的每一个节点的左右子节点进行交换，最后的结果就是完全翻转之后的二叉树
'''


# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def invertTree(self, root: TreeNode) -> TreeNode:
        if root is None:
            return

        root.left, root.right = root.right, root.left
        self.invertTree(root.left)
        self.invertTree(root.right)

        return root
