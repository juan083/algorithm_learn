<?php
/**
 * 面试题（腾讯-动漫）
 * 给定一个无重复数组a和一个数字S，通过加、减号，使得数组中的若干个数字之和等于S，求满足此条件的所有组合
 *
 * 例如：
 * 给定的数组：[1, 3, 4, 10, 2]
 * 给定的数字：8
 * 结果：
 * [10, -2], [1, 3, 4], [-1, 3, -4, 10], [1, -3, 10]
 */

class Solution
{

    private $_result = [];

    private $_combileArr = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum3($candidates, $target)
    {
        sort($candidates);
        $this->dfs($candidates, $target, 0);
        return $this->_result;
    }

    function dfs($candidates, $target, $start) {
        if ($target == 0) {
            $this->_result[] = $this->_combileArr;
            return;
        }

        $len = count($candidates);
        for ($i = $start; $i < $len; $i++) {
            if ($candidates[$i] > $target) {
                break;
            }

            // 整道题的难点：在什么条件下，怎么去重
            // 要对同一树层使用过的元素进行跳过 (如果数组有相同元素，同一树枝可以使用重复的元素，但同层不能使用重复元素)
            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }

            // 回溯三部曲（先选择，再递归，后撤销选择）
            // 正数
            $this->_combileArr[] = $candidates[$i];
            $this->dfs($candidates, $target - $candidates[$i], $i + 1);
            array_pop($this->_combileArr);

            // 负数
            $this->_combileArr[] = -$candidates[$i];
            $this->dfs($candidates, $target + $candidates[$i], $i + 1);
            array_pop($this->_combileArr);
        }
    }

}

//$candidates = [2, 3, 5, 10];
$candidates = [1, 3, 4, 10, 2];
$target = 8;
$solution = new Solution();
$ret = $solution->combinationSum3($candidates, $target);

var_export($ret);