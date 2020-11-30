<?php
/**
 * https://leetcode-cn.com/problems/longest-substring-without-repeating-characters/
 * 3. 无重复字符的最长子串
 *
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
 *
 * 思路：
 * 使用滑动窗口的算法
 * 利用map判断是否有重复字符
 * 重点：滑动窗口移动的大小，这个步骤是关键，容易出错的地方
 */

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        if ($len <= 1) {
            return $len;
        }

        $map = [];
        $maxLen = 0;
        for($i = 0; $i < $len; $i++) {
            // 无重复字符串
            if (!isset($map[$s[$i]])) {
                $map[$s[$i]] = $i;
                continue;
            }
            // 有重复的字符串
            $curLen = count($map);
            $maxLen = $curLen > $maxLen ? $curLen : $maxLen;
            $map = array_slice($map, $curLen - ($i - $map[$s[$i]] - 1));
            $map[$s[$i]] = $i;
        }

        $maxLen = count($map) > $maxLen ? count($map) : $maxLen;
        return $maxLen;
    }
}


//$s = 'abcabcbb';  // 3
$s = 'bbtablud';  // 6
//$s = 'pwwkew';
//$s = 'au';
//$s = 'dvdf';
$solution = new Solution();
$ret = $solution->lengthOfLongestSubstring($s);
var_dump($ret);