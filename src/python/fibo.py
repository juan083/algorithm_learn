#!/usr/bin/python3
# -*- coding:UTF-8 -*-

def fibo(n):
    a, b = 0, 1
    while n > 0:
        print(b, end=',')
        a, b = b, a + b
        n -= 1
    else:
        print("ok")

    for i in range(3):
        print(i, end=",")
        break
    else:
        print("ok")

fibo(10)

