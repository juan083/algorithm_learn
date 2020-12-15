#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
https://leetcode-cn.com/problems/monotone-increasing-digits/
738. 单调递增的数字

思路：
<->暴力算法：超时
<二>贪心算法：从高位到低位，依次构造
最核心的思路：找出最大的前缀，然后后面剩余的位都补上9
例如：1221，找到最大前缀11xx，然后xx全部补上9，则是1199
'''

# 贪心算法
class Solution:
    def monotoneIncreasingDigits(self, N: int) -> int:
        nums = [int(v) for v in str(N)]
        numLen = len(nums)
        begin = 1
        bFlag = False  # 回退标识

        # 找出最大的数字前缀，例如1221，则最大前缀是11xx，begin=1
        while begin < numLen and begin > 0:
            if nums[begin] >= nums[begin - 1]:
                if bFlag:
                    break
                begin += 1
            else:
                begin -= 1
                nums[begin] -= 1
                bFlag = True

        # print(begin, nums)
        if begin == numLen:
            return N
        ret = ''.join([str(nums[i]) for i in range(0, begin + 1)]) + '9' * (numLen - begin - 1)
        #print(ret)
        return int(ret)

# 暴力算法，超时(当n=963856657，会超时)
class SolutionLoop:
    def monotoneIncreasingDigits(self, N: int) -> int:
        if N < 10:
            return N
        for i in range(N):
            num = N - i
            isFlag = self.isIncrease(num // 10, num % 10)
            if isFlag:
                return num

    def isIncrease(self, n: int, fnum: int) -> bool:
        if fnum <= 0:
            return False
        elif n < 10 and n <= fnum:
            return True
        elif n % 10 <= fnum:
            return self.isIncrease(n // 10, n % 10)
        else:
            return False


num = 1234
#num = 10
#num = 332  # 299
#num = 963856657  # 899999999
#num = 1221  # 1199
solution = Solution()
ret = solution.monotoneIncreasingDigits(num)
print(ret)
