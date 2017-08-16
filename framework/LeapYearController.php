<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/16/2017
 * Time: 3:22 PM
 */

class LeapYearController
{
    public function indexAction($year)
    {
        if(is_leap_year($year)){
            return new Response( 'Yep, this is a leap year!');
        }
        return new  Response ('Nope, this is not a leap year.');
    }
}