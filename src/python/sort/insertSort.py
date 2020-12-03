#!/usr/bin/python3
# -*- coding:UTF-8 -*-

'''
插入排序
在要排序的一组数中，假设前面的数已经是排好顺序的，
现在要把第 n 个数插到前面的有序数中，使得这 n 个数也是排好顺序的。
如此反复循环，直到全部排好顺序。
'''

def insertSort(l1):
    count = len(l1)
    if count <= 1:
        return l1

    for i in range(1, count):
        key = l1[i]
        j = i - 1
        while j >= 0 and key < l1[j]:
            l1[j+1] = l1[j]
            j -= 1
        l1[j + 1] = key

    return l1



l1 = [10, 23, 4, 19, 1, 3, 4]
sortList = insertSort(l1)
print(sortList)