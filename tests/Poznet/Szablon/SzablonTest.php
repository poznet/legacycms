<?php

namespace Poznet\Test\Szablon;


use Poznet\Szablon\Szablon;

class SzablonTest extends \PHPUnit_Framework_TestCase
{
   function testSzablon()
    {   
       $tpl=new Szablon('main.tpl',null,null,true);
       $tpl->add('name', 'Blee');
       $this->assertEquals('Hello World Blee',$tpl->show());
        
    }
}