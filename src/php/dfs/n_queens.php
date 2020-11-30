<?php
/**
 * https://leetcode-cn.com/problems/n-queens/
 * 51. N 皇后
 *
 * n 皇后问题研究的是如何将 n 个皇后放置在 n×n 的棋盘上，并且使皇后彼此之间不能相互攻击。
 *
 * 思路：（极客时间，覃超课程-总结）
 * 规律：x横坐标，y纵坐标
 * 纵向列：不允许等于y相同
 * 撇的方向：y + x = n1 （一个常数）
 * 捺的方向：y - x = n2 （一个常数）
 * if (isset($this->_col[$col]) || isset($this->_pie[$col + $row]) || isset($this->_na[$col - $row])) {
 *      continue;
 * }
 */

class Solution {

    /**
     * @param Integer $n
     * @return String[][]
     */

    private $_col = [];

    private $_pie = [];

    private $_na = [];

    private $_curState = [];

    private $_ret = [];

    function solveNQueens($n) {
        if ($n < 1) {
            return [];
        }
        $this->dfs($n, 0, $this->_curState);
        return $this->_ret;
    }

    function dfs($n, $row, $curState) {
        if ($row >= $n) {
            $this->_ret[] = $this->dump($curState, $n);
            return;
        }

        for($col = 0; $col < $n; $col++) {
            if (isset($this->_col[$col]) ||
                isset($this->_pie[$col + $row]) ||
            isset($this->_na[$col - $row])) {
                continue;
            }

            $this->_col[$col] = 1;
            $this->_pie[$col + $row] = 1;
            $this->_na[$col - $row] = 1;
            $curState[$col] = 1;

            $this->dfs($n, $row + 1, $curState);

            unset($curState[$col]);
            unset($this->_col[$col]);
            unset($this->_pie[$col + $row]);
            unset($this->_na[$col - $row]);
        }
    }

    function dump($curState, $n) {
        $ret = [];
        foreach ($curState as $col => $val) {
            $ret[] = str_repeat('.', $col) . 'Q' . str_repeat('.', ($n - $col - 1));
        }
        return $ret;
    }
}

$solution = new Solution();
$ret = $solution->solveNQueens(4);
var_dump($ret);