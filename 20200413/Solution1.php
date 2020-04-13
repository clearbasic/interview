<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2020/4/13
 * Time: 14:14
 */

//给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
//你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
//给定 nums = [2, 7, 11, 15], target = 9
//因为 nums[0] + nums[1] = 2 + 7 = 9
//所以返回 [0, 1]


class Solution1
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
//        $len = count($nums);
//        for ($i = 0; $i < $len; $i++) {
//            for ($j = 1; $j < $len; $j++) {
//                if (($nums[$i] + $nums[$j]) == $target && $i != $j) {
//                    return [$i, $j];
//                }
//            }
//        }
//        return [];

        $scanned = [];//建立一个搜寻表

        for ($i = 0; $i < count($nums); $i++) {
            $diff = $target - $nums[$i];//当前数字与目标值的差

            if (array_key_exists($diff, $scanned)) {//搜寻表中找到与差相同的值，则返回其index
                return [$scanned[$diff], $i];
            }

            $scanned[$nums[$i]] = $i;//把扫描过的数字其index和值存入搜寻表中
        }
        return $scanned;
    }
}


$solution = new Solution1();
echo '<pre>';
print_r($solution->twoSum([1, 2, 3, 4, 5], 6));
