#!/usr/bin/python
# -*- coding:UTF-8 -*-

class Test:
    __a = "abc"

    def getA(self):
        return self.__a

obj = Test()
print(obj.__a)
#print(obj.getA())