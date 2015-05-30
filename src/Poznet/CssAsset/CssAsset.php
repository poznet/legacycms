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
    private $output='css/outpt/all.css';
    
    public function __construct() {
        $plik=file_get_contents($this->maintpl);
        $css=$this->findcss($plik);
        $this->saveOutput($css);
    }
    
    public function findcss($txt){
        $pattern="/<link.+href=\"([^\"]+)[^>]+>/";
         preg_match_all ( $pattern , $txt ,  $this->css,PREG_SET_ORDER);
    }
    public function combine(){
        $txt='';
        $ile=count($this->css);
        for($i=0;$i<$ile;$i++){
            $txt.=file_get_contents($this->css[$i]);
        }
        return $txt;
    }
    
    public function saveOutput($txt){
        file_put_contents($this->output, $txt );
    }
    
    
}
