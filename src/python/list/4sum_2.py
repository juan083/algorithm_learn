#!/usr/bin/python3
# -*- coding:UTF-8 -*-

from typing import List

'''
https://leetcode-cn.com/problems/4sum-ii/
454. 四数相加 II

给定四个包含整数的数组列表 A , B , C , D ,计算有多少个元组 (i, j, k, l) ，使得 A[i] + B[j] + C[k] + D[l] = 0。

思路：
1. 先计算A、B数组的组合后之和arr1，再计算C、D数组之和的负数，这个负数是否在arr1，在的话则增加计数
2. 使用到了dict，用作结果的映射
3. 需增加from typing import List，防止语法错误，无法识别A: List[int] 这种写法
'''
class Solution:
    def fourSumCount(self, A: List[int], B: List[int], C: List[int], D: List[int]) -> int:
        count = 0
        dic = {}
        for a in A:
            for b in B:
                r = a + b
                dic[r] = dic.get(r, 0) + 1

        for c in C:
            for d in D:
                r = c + d
                if -r in dic:
                    count += dic[-r]
        return count

solution = Solution()
A = [1, 2]
B = [-2, -1]
C = [-1, 2]
D = [0, 2]
ret = solution.fourSumCount(A, B, C, D)
print(ret)
