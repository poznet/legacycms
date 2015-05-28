<?php
/**
  * @author poznet
  *
  * Klasa  zarządzająca konfiguracją
  */
 
namespace Poznet\Config;

class Config{
	private $configpath;
	private $config=array();
	
	public function __construct($test=false){
                            if($test){
                                //inicjalizacja zmiennej sesyjnej dla  phpunit
                                if ( !isset( $_SESSION ) ) $_SESSION = array(  );
                            }
            
		$this->unregisterConfig();
                            if($test){
                                $this->configpath='tests/files/config/';    
                            }else{
                                $this->configpath=$_SESSION['apppath'].'cfg/config/';    
                            }
		
		$this->loadConfig();
		//$this->registerConfig();
	}

	//laduje  konfiguracje  z plikow
	public function loadConfig(){
		$kat=opendir($this->configpath);
		while($nazwa=  readdir($kat)){
    		if(substr($nazwa,-3)=='cfg'){
     		$plik=file($this->configpath.$nazwa);    
     		$ile=count($plik);
     
     		for($i=0;$i<$ile;$i++){
     		 	$tab=explode("=",$plik[$i]);
     		 	if($tab[0]!='')
      			$this->config[trim($tab[0])]=  strtoupper(trim($tab[1]));

      		    }
        	}
    	}
		closedir($kat);
	}


	//rejestruje konfiguracje  w sesji 
	public function registerConfig(){
		foreach ($this->config as $k => $v) {

			$_SESSION['config'][$k]=trim($v);
			 
		}
	}
	public function unregisterConfig(){
		 
			unset($_SESSION['config']);
		 
	}
	public function add($k,$v){
		$this->config[$k]=$v;
		$this->registerConfig();
	}
	public function remove($k){
		unset($this->config[$k]);
		$this->registerConfig();
	}
	public  function dump(){
		var_dump($_SESSION['config']);
	}
	public function check($k){
		if(strtoupper($this->config[$k])=='TAK')
			return true;
		return false;
	}
	public function get($x){
		return $this->config[$x];
	}

	public function install(){
		$klasy=array();
		$kat=opendir($_SESSION['apppath'].'clases');
		while($n=readdir($kat)){
			if(substr($n,-3)=='php')
					if($n!='config.php')
				array_push($klasy,substr($n,0,-4));
		}
		closedir($kat);

		$ile=count($klasy);
		for($i=0;$i<$ile;$i++){
			echo '<b>'.$klasy[$i].'</b>';
			 $r = new $klasy[$i]();
			 if( method_exists($r,'install'))
			$r->install();
		echo '<br>'	;
		}

		return true;
	}
 

}