<?php
/**
 * https://leetcode-cn.com/problems/combination-sum-iv/
 * 377. 组合总和 Ⅳ
 *
 * 给定一个由正整数组成且不存在重复数字的数组，找出和为给定目标正整数的组合的个数。
 */

class Solution
{

    private $_ret = [];

    private $_list = [];

    private $_count = 0;

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function combinationSum4($nums, $target)
    {
        sort($nums);
        $this->dfs($nums, $target);
        //return count($this->_ret);
        return $this->_count;
    }

    function dfs($nums, $target)
    {
        if ($target == 0) {
            //$this->_ret[] = $this->_list;
            $this->_count++;
            return;
        }

        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($target - $nums[$i] < 0) {
                break;
            }
            $this->_list[] = $nums[$i];
            $this->dfs($nums, $target - $nums[$i]);
            array_pop($this->_list);
        }
    }
}


$solution = new Solution();
//$ret1 = $solution->combinationSum3(3, 7);
//$ret1 = $solution->combinationSum4([1, 2, 3], 4);
$ret1 = $solution->combinationSum4([4, 2, 1], 10);
var_export($ret1);