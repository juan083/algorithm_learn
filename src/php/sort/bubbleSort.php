<?php
/**
 * 冒泡排序
 * 在要排序的一组数中，对当前还未排好的序列，从前往后对相邻的两个数依次进行比较和调整，让较大的数往下沉，较小的往上冒。
 * 即，每当两相邻的数比较后发现它们的排序与排序要求相反时，就将它们互换。
 */

function bubbleSort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    for($i = 0; $i < $len - 1; $i++) {
        for($j = $i + 1; $j < $len; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $item = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $item;
            }
        }
    }

    return $arr;
}

$arr = [10, 4, 19, 1, 4, 0];
var_dump(bubbleSort($arr));