<?php
/**
 * 选择排序
 * 在要排序的一组数中，选出最小的一个数与第一个位置的数交换。
 * 然后在剩下的数当中再找最小的与第二个位置的数交换，如此循环到倒数第二个数和最后一个数比较为止。
 */

function selectSort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    for ($i = 0; $i < $len - 1; $i++) {
        $minIndex = $i;
        for($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        $item = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $item;
    }

    return $arr;
}

$arr = [10, 4, 19, 1, 4, 0, 11, 19];
var_dump(selectSort($arr));