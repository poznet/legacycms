<?php

namespace Poznet\Test\Szablon;

use Poznet\Config\Config;

//  Checks  returned value from cfg fle

class ConfigTest extends \PHPUnit_Framework_TestCase{
    //put your code here
    
     function testConfigNotValue(){
         $config=new Config(true);
         $val=$config->get('NVALUE');
         $this->assertEquals('NIE',$val);         
     }
     function testConfigYesValue(){
         $config=new Config(true);
         $val=$config->get('YVALUE');
         $this->assertEquals('TAK',$val);         
     }
      function testConfigNot(){
         $config=new Config(true);
         $val=$config->check('NVALUE');
         $this->assertEquals(false,$val);         
     }
     function testConfigYes(){
         $config=new Config(true);
         $val=$config->check('YVALUE');
         $this->assertEquals(true,$val);         
     }
}
