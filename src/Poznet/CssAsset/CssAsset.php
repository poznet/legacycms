<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Poznet\CssAsset;
/**
 * Description of CssAsset
 *
 * @author michalg
 */
class CssAsset {
    private $maintpl='tpl/main.tpl';
    private $css=array();
    private $output='css/outpt/';
    
    public function __construct() {
        $plik=file_get_contents($this->maintpl);
        $this->findcss($plik);
    }
    
    public function findcss($txt){
        $pattern="/<link.+href=\"([^\"]+)[^>]+>/";
         preg_match_all ( $pattern , $txt ,  $this->css,PREG_SET_ORDER);
    }
    
    
}
