<?php
/**
 * https://leetcode-cn.com/problems/combination-sum-iii/
 * 216. 组合总和 III
 *
 * 找出所有相加之和为 n 的 k 个数的组合。
 * 组合中只允许含有 1 - 9 的正整数，并且每种组合中不存在重复的数字。
 */

class Solution {

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */

    private $_ret = [];

    private $_list = [];

    function combinationSum3($k, $n) {
        $this->dfs($k, $n);
        return $this->_ret;
    }

    function dfs($k, $n, $start = 1) {
        if ($k <= 0 || $n <= 0) {
            if ($k == 0 && $n == 0) {
                $this->_ret[] = $this->_list;
            }
            return;
        }

        // 记住回溯的公式
        // 去重的话，需加收 $start 记录遍历到的地方，不重复遍历
        for($i = $start; $i <= 9; $i++) {
            $this->_list[] = $i;
            $this->dfs($k - 1, $n - $i, $i + 1);
            array_pop($this->_list);
        }
    }
}


$solution = new Solution();
//$ret1 = $solution->combinationSum3(3, 7);
$ret1 = $solution->combinationSum3(3, 9);
var_export($ret1);