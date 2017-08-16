<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/16/2017
 * Time: 4:14 PM
 */

namespace Calendar\Model;



class LeapYear
{
    public function isLeapYear($year = null)
    {
        if(null=== $year){
            $year = date('Y');
        }
        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }
}
