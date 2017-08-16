<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/16/2017
 * Time: 4:08 PM
 */

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class LeapYearController
{
  public function indexAction(Request $request, $year)
  {
      $leapyear = new LeapYear();
      if ($leapyear->isLeapYear($year)){
          return new Response('Yep, this is a leap year!');
      }
      return new Response('Nope, this is not a leap year.');
  }


}