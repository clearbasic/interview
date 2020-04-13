<?php

/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2020/4/13
 * Time: 16:03
 */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution2
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers( $l1,  $l2)
    {
        $sum = 0;
        $step = 0;    //代表进位
        $dummyHead = new ListNode(0);
        $cur = $dummyHead;
        while ($l1 != null && $l2 != null) {
            $sum = $l1->val + $l2->val + $step;
            if ($sum >= 10) {
                $cur->next = new ListNode($sum % 10);
                $step = 1;
            } else {
                $cur->next = new ListNode($sum);
                $step = 0;
            }
            $cur = $cur->next;
            $l1 = $l1->next;
            $l2 = $l2->next;
        }

        while ($l1 != null) {
            $sum = $l1->val + $step;
            if ($sum >= 10) {
                $cur->next = new ListNode($sum % 10);
                $step = 1;
            } else {
                $l1->val = $sum;
                $cur->next = $l1;
                $step = 0;
                break;  //已经没有进位，提前结束循环
            }
            $cur = $cur->next;
            $l1 = $l1->next;
        }

        while ($l2 != null) {
            $sum = $l2->val + $step;
            if ($sum >= 10) {
                $cur->next = new ListNode($sum % 10);
                $step = 1;
            } else {
                $l2->val = $sum;
                $cur->next = $l2;
                $step = 0;
                break;  //已经没有进位，提前结束循环
            }
            $cur = $cur->next;
            $l2 = $l2->next;
        }

        if ($step == 1) {
            $cur->next = new ListNode(1);     //表明还有进位
        }
        return $dummyHead->next;
    }
}

$solution = new Solution2();
echo '<pre>';
print_r($solution->addTwoNumbers(123, 312313));

