#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
105. 从前序与中序遍历序列构造二叉树

思路
对比前序、中序遍历
1.前序遍历的首个元素，则是root
2.在中序遍历中找到root，则root的左侧全是左节点，右侧全是右节点
3.再分别递归 左节点、右节点
'''


# Definition for a binary tree node.
class TreeNode:
    def __init__(self, x):
        self.val = x
        self.left = None
        self.right = None

class Solution:
    def buildTree(self, preorder: List[int], inorder: List[int]) -> TreeNode:
        if len(preorder) == 0 or len(inorder) == 0:
            return
        root = TreeNode(preorder[0])

        # 找出root的所有左、右节点
        inRootIndex = 0  # 中序遍历的根节点-下标
        for i in range(len(inorder)):
            if inorder[i] == preorder[0]:
                inRootIndex = i
                break

        leftPre = preorder[1:inRootIndex + 1]
        rightPre = preorder[1 + inRootIndex:]
        leftIn = inorder[0:inRootIndex]
        rightIn = inorder[inRootIndex + 1:]

        # print(inRootIndex, leftPre, rightPre, leftIn, rightIn)
        root.left = self.buildTree(leftPre, leftIn)
        root.right = self.buildTree(rightPre, rightIn)

        return root
