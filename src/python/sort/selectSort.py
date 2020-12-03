#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
选择排序
在要排序的一组数中，选出最小的一个数与第一个位置的数交换。
然后在剩下的数当中再找最小的与第二个位置的数交换，如此循环到倒数第二个数和最后一个数比较为止。
'''

def selectSort(l1):
    count = len(l1)
    if count <= 1:
        return l1

    for i in range(count):
        minIndex = i
        for j in range(i + 1, count):
            if l1[minIndex] > l1[j]:
                minIndex = j
        l1[i], l1[minIndex] = l1[minIndex], l1[i]
    return l1

l1 = [10, 4, 19, 1, 4, 0, 90]
sortList = selectSort(l1)
print(sortList)