<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2020/4/14
 * Time: 9:11
 */
//给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。
//输入: "abcabcbb"
//输出: 3
//解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。

class Solution1
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $temp = [];
        $out = 0;
        if ($s) {
            $arr = str_split($s);
            $len = count($arr);
            for ($i = 0; $i < $len; $i++) {
                if (in_array($arr[$i], $temp)) {
                    array_push($temp, $arr[$i]);
                    $temp = array_slice($temp, array_search($arr[$i], $temp) + 1);
                } else {
                    array_push($temp, $arr[$i]);
                }
                $out = count($temp) > $out ? count($temp) : $out;
            }
        }

        return $out;
    }

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring1($s)
    {
        $lens = strlen($s);//总的字符串有多长
        $tmp = '';       //用于存储子串  当前里面不会有重复的字符
        $len = 0;        //最长子串的长度
        for ($i = 0; $i < $lens; $i++) {
            $re = strpos($tmp, $s[$i]);//判断 是否有重复的
            if (false !== $re) {//有重复
                $tmp .= $s[$i];//先追加上去 例如pww
                $tmp = substr($tmp, $re + 1);//从重复位置开始 截取后 pww=>w
            } else {//无重复字符
                $tmp .= $s[$i];//追加到后面
            }
            //每一次过去后，比较当前的tmp 与上一次的 len 谁更大
            $len = strlen($tmp) > $len ? strlen($tmp) : $len;
        }
        return $len;//最后返回的长度 不一定是$tmp
    }


    /*
    [substr]    https://www.php.net/manual/zh/function.substr.php
        substr ( string $string , int $start [, int $length ] ) : string
        返回字符串 string 由 start 和 length 参数指定的子字符串。 如果 string 的长度小于 start，将返回 FALSE。

        $start>0 返回的字符串将从 string 的 start 位置开始
                例如：echo substr('abcdef', 1, 3);  // bcd 也就是[$start,$start+$length]范围的字符
        $start<0 返回的字符串将从 string 结尾处向前数第 start 个字符开始。
                例如：echo substr("abcdef", -3, 1); // d   字符串最后一个字符为-1


    [strpos]    https://www.php.net/manual/zh/function.strpos.php
         strpos ( string $haystack , mixed $needle [, int $offset = 0 ] ) : int
         strpos — 返回 needle 在 haystack 中首次出现的数字位置。
         如果是第一个值就找到，那么返回是0 (注意字符串位置是从0开始，而不是从1开始的。)
         如果没找到 needle，将返回 FALSE。

         所以如果想要判断 不存在，一定要用全值比对 ===
    */

}

$solution = new Solution1();
echo '<pre>';
print_r($solution->lengthOfLongestSubstring('adadcascsadw'));
print_r($solution->lengthOfLongestSubstring1('adadcascsadw'));
print_r($solution->lengthOfLongestSubstring('dkajfjweismaweio'));
print_r($solution->lengthOfLongestSubstring1('dkajfjweismaweio'));
print_r($solution->lengthOfLongestSubstring('kajdhadjnciawh'));
print_r($solution->lengthOfLongestSubstring1('kajdhadjnciawh'));
print_r($solution->lengthOfLongestSubstring(""));
print_r($solution->lengthOfLongestSubstring1(""));
