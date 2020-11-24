<?php
/**
 * 快速排序
 * 选择一个基准元素，通常选择第一个元素或者最后一个元素。
 * 通过一趟扫描，将待排序列分成两部分，一部分比基准元素小，一部分大于等于基准元素。
 * 此时基准元素在其排好序后的正确位置，然后再用同样的方法递归地排序划分的两部分。
 */

function quickSort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    $first = $arr[0];
    $leftArr = [];
    $rightArr = [];
    for($i = 1; $i < $len; $i++) {
        if ($arr[$i] < $first) {
            $leftArr[] = $arr[$i];
        }else {
            $rightArr[] = $arr[$i];
        }
    }

    return array_merge(quickSort($leftArr), [$first], quickSort($rightArr));
}

$arr = [10, 4, 19, 1, 4, 0];
var_dump(quickSort($arr));