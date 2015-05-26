<?php
/**
  * @author poznet
  *
  * Klasa  zarządzająca templatami
  */
 
namespace Poznet\Szablon;

class Szablon {

   
    private $szablon;
    private $data = array();
    private $plik_szablonu;

    public function __construct($nazwa,$lang=false,$admin=false,$test=false) {
         
        if (!$lang) {
            if($test){
                //na potrzeby phpunit
                 $this->szablon = 'tests/files/tpl/' . $nazwa;                
            }else{
                 $this->szablon = 'tpl/' . $nazwa;
            }
        } else {
            
            if (!file_exists('tpl_lang/' . $lang . '_' . $nazwa)) {
                if(!file_exists('tpl/'.$nazwa)) echo 'NOT FOUND '.$nazwa;
                $this->szablon = 'tpl/' . $nazwa;
            } else {
                $this->szablon = 'tpl_lang/' . $lang . '_' . $nazwa;
            }
        }
        if($admin){
            if(!file_exists('panel/tpl/'.$nazwa)) echo 'NOT FOUND '.$nazwa;
                $this->szablon = 'panel/tpl/' . $nazwa;
        }
         
    }

    public function getSzblonName() {
       return $this->szablon;
    }

    
    public function __toString(){
    	return $this->show();
    }
    public function add($name,$value){
       $this->data[$name]=$value;
    }
    
    public function show() {
        if (file_exists($this->szablon)) {
            $this->plik_szablonu = file($this->szablon);
            $this->plik_szablonu = implode('', $this->plik_szablonu);
        }
        return preg_replace("/{([^}]+)}/e", "\$this->data['\\1']", $this->plik_szablonu);
    }
    
    //-----------------------------------------------------------------
    // LEGACY NAMES
    public function dodaj($nazwa, $wartosc) {
        $this->add($nazwa,$wartosc);
    }

    public function pokaz() {
       return $this->show();
    }

   

     


    

}