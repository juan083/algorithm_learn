#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
快速排序
选择一个基准元素，通常选择第一个元素或者最后一个元素。
通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。
此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分。
'''

def quickSort(l1):
    count = len(l1)
    if count <= 1:
        return l1

    first = l1[0]
    left = []
    right = []
    for i in range(1, count):
        if l1[i] <= first:
            left.append(l1[i])
        else:
            right.append(l1[i])

    return quickSort(left) + [first] + quickSort(right)

l1 = [10, 4, 19, 1, 4, 0]
sortList = quickSort(l1)
print(sortList)