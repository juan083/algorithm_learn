#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/populating-next-right-pointers-in-each-node/
116. 填充每个节点的下一个右侧节点指针

思路：
<-> 也是使用前序遍历
在遍历到root根节点时，增加处理的逻辑
需要增加辅助函数，完成递归
效率较低，后面学到【广度优先搜索算法】，再来增加
'''


# Definition for a Node.
class Node:
    def __init__(self, val: int = 0, left: 'Node' = None, right: 'Node' = None, next: 'Node' = None):
        self.val = val
        self.left = left
        self.right = right
        self.next = next


class Solution:
    def connect(self, root: 'Node') -> 'Node':
        if root is None:
            return root
        # 前序遍历
        self.connectLeftRight(root.left, root.right)
        return root

    def connectLeftRight(self, leftNode: 'Node', rightNode: 'Node') -> 'Node':
        if leftNode is None or rightNode is Node:
            return
        leftNode.next = rightNode

        # 连接相同父节点的两个子节点
        self.connectLeftRight(leftNode.left, leftNode.right)
        self.connectLeftRight(rightNode.left, rightNode.right)

        # 连接跨越父节点的两个子节点
        self.connectLeftRight(leftNode.right, rightNode.left)


