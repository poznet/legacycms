 <?php
 /**
  * @author poznet
  *
  * Klasa  zarządzająca  Sliderem
  */
 
namespace Poznet\Slajdy;

use Poznet\Szablon;

 class Slajdy{

              private $path;
 	private $slajdy=array();
 	private $kat;
 	private $fistactive=true;


 	public function __construct($katalog){
                            $this->path=__DIR__ .'../../../../../../../';
 		$this->kat=$katalog;
		$kat=opendir($this->path.$katalog);

 		while($nazwa=@readdir($kat)){
			if(($nazwa!='..')&&($nazwa!='.')&&($nazwa!='')){

				if(!is_dir($this->path.$katalog.'/'.$nazwa))
			    array_push($this->slajdy,$nazwa);
			}
		}
	}
	public function getSlajd($file,$plik='slajd.tpl',$act=false){
		$tpl=new Szablon($plik);
		$tpl->dodaj('plik',$file);
		if($act)   //for jcarouser  
                            $tpl->dodaj('active',' active');
		return $tpl->pokaz();
	}
	public function show($plik='slajdy.tpl',$plik2='slajd.tpl'){
 		$tpl=new Szablon($plik);
 		$ile=count($this->slajdy);

 		$tresc='';
 		for($i=0;$i<$ile;$i++){
 			if(($i==0)&&($this->fistactive)){

			$tresc.=$this->getSlajd($this->kat.'/'.$this->slajdy[$i],$plik2,true);
 			}else{
 			$tresc.=$this->getSlajd($this->kat.'/'.$this->slajdy[$i],$plik2);
     		}

 		}
 		$tpl->dodaj('slajdy',$tresc);
 		if(count($this->slajdy>0))
 		return $tpl->pokaz();
 		return false;
	}

	public  function getCount(){
		return count($this->slajdy);

	}
        
              public  function setFirstactive($bool) {
                  $this->firstactive=$bool;                  
              }
              public  function getFirstactive() {
                  return $this->firstactive;                  
              }
        //-------------------------------------------------------------
        //                        LEGACY NAME 
              public function getSlajdy($plik='slajdy.tpl',$plik2='slajd.tpl'){
                  return $this->show($plik,$plik2);
              }
              
              
        
               
 }