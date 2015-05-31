<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Poznet\CssAsset;

use MatthiasMullie\Minify;
/**
 * Description of CssAsset
 *
 * @author michalg
 */
class CssAsset {
    private $path;
    private $maintpl='tpl/main.tpl';
    private $css=array();
    private $output='css/output/all.css';
    private $minoutput='css/output/all.min.css';
    
    public function __construct() {
        $this->path=__DIR__ .'../../../../../../../';
        $plik=file_get_contents($this->maintpl);
        $this->findcss($plik);
        $css=$this->combine();
        $this->saveOutput($css);
        $minifier = new Minify\CSS($this->path.$this->output);
        $minifier->minify($this->path.$this->minoutput);
        
    }
    
    public function findcss($txt){
        $pattern="/<link.+href=\"([^\"]+)[^>]+>/";
         preg_match_all ( $pattern , $txt ,  $this->css,PREG_SET_ORDER);
    }
    public function combine(){
        $txt='';
        $ile=count($this->css);
        for($i=0;$i<$ile;$i++){
           $txt.=file_get_contents($this->path.$this->css[$i][1]);
        }
        return $txt;
    }
    
    public function saveOutput($txt){
        file_put_contents($this->path.$this->output, $txt );
    }
    
    
}
