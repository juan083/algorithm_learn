<?php
/**
 * @description  combine_sum2.php
 * @author:      juan083@163.com
 * @createtime:  2020-11-27 17:38
 */

class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */

    private $_ret = [];

    private $_list = [];

    function combinationSum2($candidates, $target) {
        sort($candidates);
        $this->dfs($candidates, $target, 0);
        return $this->_ret;
    }

    function dfs($candidates, $target, $start) {
        if ($target == 0) {
            $this->_ret[] = $this->_list;
            return;
        }

        $len = count($candidates);
        for($i = $start; $i < $len; $i++) {
            if ($candidates[$i] > $target){
                break;
            }

            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }
            $this->_list[] = $candidates[$i];
            $this->dfs($candidates, $target - $candidates[$i], $i + 1);
            array_pop($this->_list);
        }
    }
}

$candidates = [10, 1, 2, 7, 6, 1, 5];
$target = 8;
$solution = new Solution();
$ret = $solution->combinationSum2($candidates, $target);

var_export($ret);