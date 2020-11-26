<?php
/**
 * https://leetcode-cn.com/problems/combinations/submissions/
 * 77. 组合
 *
 * 深度优先算法DFS、回溯法
 */

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */

    private $_ret = [];

    private $_list = [];

    function combine($n, $k) {
        $this->dfs($n, 1, $k);
        return $this->_ret;
    }

    // 从1-$n 取出 $k 个数，
    function dfs($n, $start, $k) {
        if ($k == 0) {
            $this->_ret[] = $this->_list;
            return;
        }

        for ($i = $start; $i <= $n; $i++) {
            $this->_list[] = $i;
            $this->dfs($n, $i + 1, $k - 1);
            array_pop($this->_list);
        }
    }
}

$solution = new Solution();
$ret = $solution->combine(4, 2);
var_export($ret);