<?php
/**
 * https://leetcode-cn.com/problems/combination-sum-ii/
 * 40. 组合总和 II
 *
 * 思路：
 * 深度搜索dfs、回溯算法
 *
 * labuladong的算法小抄
 * https://labuladong.gitbook.io/algo/suan-fa-si-wei-xi-lie/3.1-hui-su-suan-fa-dfs-suan-fa-xi-lie/hui-su-suan-fa-xiang-jie-xiu-ding-ban
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
    function combinationSum2($candidates, $target)
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

            //整道题的难点：在什么条件下，怎么去重
            // 要对同一树层使用过的元素进行跳过 (如果数组有相同元素，同一树枝可以使用重复的元素，但同层不能使用重复元素)
            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }

            // 回溯三部曲（先选择，再递归，后撤销选择）
            $this->_combileArr[] = $candidates[$i];
            $this->dfs($candidates, $target - $candidates[$i], $i + 1);
            array_pop($this->_combileArr);
        }
    }

}

$candidates = [10, 1, 2, 7, 6, 1, 5];
$target = 8;
$solution = new Solution();
$ret = $solution->combinationSum2($candidates, $target);

var_export($ret);