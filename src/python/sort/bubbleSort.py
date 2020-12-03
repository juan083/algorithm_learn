#!/usr/bin/python
# -*- coding:UTF-8 -*-

'''
冒泡排序
在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。
即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换。
'''

def bubbleSort(l1):
    count = len(l1)
    if count <= 1:
        return l1

    for i in range(count - 1):
        for j in range(0, count - i - 1):
            if l1[j] > l1[j + 1]:
                l1[j], l1[j + 1] = l1[j + 1], l1[j]
    return l1


l1 = [10, 4, 19, 1, 4, 0, 2]
sortList = bubbleSort(l1)
print(sortList)