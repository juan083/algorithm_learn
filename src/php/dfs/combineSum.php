<?php
/**
 * https://leetcode-cn.com/problems/combination-sum/
 * 39. 组合总和
 *
 * 思路：
 * 深度搜索dfs、回溯算法
 *
 * labuladong的算法小抄
 * https://labuladong.gitbook.io/algo/suan-fa-si-wei-xi-lie/3.1-hui-su-suan-fa-dfs-suan-fa-xi-lie/hui-su-suan-fa-xiang-jie-xiu-ding-ban
 */

class Solution {

    private $_result = [];

    private $_combileArr = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
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
        for($i = $start; $i < $len; $i++) {
            if ($candidates[$i] > $target) {
                break;
            }

            $this->_combileArr[] = $candidates[$i];
            $this->dfs($candidates, $target - $candidates[$i], $i);
            array_pop($this->_combileArr);
        }
    }
}

$candidates = [1, 2, 3, 6, 7];
$target = 2;
$solution = new Solution();
$ret = $solution->combinationSum($candidates, $target);

var_export($ret);