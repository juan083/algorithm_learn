#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
3. 无重复字符的最长子串

给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

思路：
使用滑动窗口的算法
利用i in string 判断是否有重复字符
重点：滑动窗口移动的大小，这个步骤是关键，容易出错的地方
'''


class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        strlen = len(s)
        if strlen <= 1:
            return strlen

        max = 0
        sub = ''
        for i in s:
            if i in sub:
                max = max if max > len(sub) else len(sub)
                sub = sub[sub.index(i) + 1:]
                #print(sub)
            sub += i
            print(sub)

        max = max if max > len(sub) else len(sub)
        # print(max)
        return max


s = 'abcabcbb'  # 3
s = 'bbtablud'  # 6
s = 'pwwkew'  # 3
s = 'au'  # 2
s = 'dvdf'  # 3

solution = Solution()
ret = solution.lengthOfLongestSubstring(s)
print(ret)
