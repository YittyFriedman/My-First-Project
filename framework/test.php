<?php
/**
 * Created by PhpStorm.
 * User: yittyF
 * Date: 8/11/2017
 * Time: 2:06 PM
 */
use PHPUnit\Framework\TestCase;


class IndexTest extends TestCase
{
    public function testHello()
    {
        $_GET['name'] = 'Yitty';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello Yitty', $content);

    }

}