#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/maximum-binary-tree/
654. 最大二叉树

思路
二叉树，就是递归的思想
想好root节点要做什么，再考虑用到什么遍历方式（前中后序的遍历）

总结：不要去思考递归的过程，很容易绕进去，理解大概意思就好
'''


# Definition for a binary tree node.
class TreeNode:
    def __init__(self, x):
        self.val = x
        self.left = None
        self.right = None

class Solution:
    def constructMaximumBinaryTree(self, nums: List[int]) -> TreeNode:
        if len(nums) <= 0:
            return

        maxIndex = 0
        for i in range(1, len(nums)):
            if nums[i] > nums[maxIndex]:
                maxIndex = i

        root = TreeNode(nums[maxIndex])
        if maxIndex > 0:
            root.left = self.constructMaximumBinaryTree(nums[0:maxIndex])
        if maxIndex + 1 < len(nums):
            root.right = self.constructMaximumBinaryTree(nums[maxIndex + 1:])

        return root
