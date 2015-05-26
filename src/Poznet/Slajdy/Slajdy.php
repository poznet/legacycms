 <?php
 /**
  * @author poznet
  *
  * Klasa  zarządzająca  Sliderem
  */
 
namespace Poznet\Slajdy;

use Poznet\Szablon;

 class Slajdy{

 	private $slajdy=array();
 	private $kat;
 	public $fistactive=true;


 	public function __construct($katalog){
 		$this->kat=$katalog;
		$kat=opendir($_SESSION['apppath'].$katalog);

 		while($n=@readdir($kat)){
			if(($n!='..')&&($n!='.')&&($n!='')){

				if(!is_dir($_SESSION['apppath'].$katalog.'/'.$n))
			    array_push($this->slajdy,$n);
			}
		}
	}
	public function getSlajd($file,$plik='slajd.tpl',$act=false){
		$tpl=new Szablon($plik);
		$tpl->dodaj('plik',$file);
		if($act)
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
        
              public function getSlajdy($plik='slajdy.tpl',$plik2='slajd.tpl'){
                  return $this->show($plik,$plik2);
              }
        
               
 }