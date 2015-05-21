<?php
/**
  * @author poznet
  *
  * Klasa  zarządzająca templatami
  */

class Szablon {


    private $szablon;
    private $data = array();
    private $plik_szablonu;

    public function szablon($nazwa,$lang=false,$admin=false) {
         
        if (!$lang) {
            $this->szablon = 'tpl/' . $nazwa;
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
    
    public function __toString(){
    	return $this->pokaz();
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
        $this->show();
    }




    

}