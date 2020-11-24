<?php
/**
 * 插入排序
 * 在要排序的一组数中，假设前面的数已经是排好顺序的，
 * 现在要把第 n 个数插到前面的有序数中，使得这 n 个数也是排好顺序的。
 * 如此反复循环，直到全部排好顺序。
 */

function insertSort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    for($i = 1; $i < $len; $i++) {
        $index = 0;  // index 插入有序数组的位置
        for($j = 0; $j < $i; $j++) {
            if ($arr[$i] < $arr[$j]) {
                break 1;
            }
            $index++;
        }

        // 数组向后移动一个位置
        $item = $arr[$i];
        $k = $i;
        while ($k > $index) {
            $arr[$k] = $arr[$k - 1];
            $k--;
        }
        $arr[$index] = $item;
    }
    return $arr;
}

$arr = [10, 23, 4, 19, 1, 3, 4];
var_dump(insertSort($arr));