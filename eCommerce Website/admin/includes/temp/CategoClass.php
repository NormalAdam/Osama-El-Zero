<?php
/**
* 
*/
include "includes/temp/DashBoaredClass.php";
class Catego extends DashBoard
{
	
	


	function DashBord($arr,$key,$index){
		return '<div class="catego-item">'.
		$this->setAntherElement('h3',$arr[$key][$index[1]],'class="CategoH3"').
		$this->setAntherElement('p',$this->setOptinCatego($arr[$key][$index[2]],$index[2]),'class="CategoDesc"').
		$this->setAntherElement('a','Edit','class="btn btn-xs btn-primary" href="?do=Edit&catid='.$arr[$key][$index[0]].'"').
		$this->setAntherElement('a','Delet','class="btn btn-xs btn-danger conf" href="?do=Delete&catid='.$arr[$key][$index[0]].'"').

		$this->setOptinCatego($arr[$key][$index[4]],$index[4]).
		$this->setOptinCatego($arr[$key][$index[5]],$index[5]).
		$this->setOptinCatego($arr[$key][$index[6]],$index[6]).
		$this->setAntherElement('hr','','')
		.'</div>';

	
			//mtnsash
	}



	function setOptinCatego($Option,$indes){

		switch ($indes) {

			case 'Description':
				return empty($Option) ? 'The Category Has No Description' : $Option;

			
			case 'Ordering':
				# code...


			case 'Visibility':
				return empty($Option) ? $this->setAntherElement('span','Hidden','class="CategoVis"') : '';



			case 'Allow_Coment':
				return empty($Option) ? $this->setAntherElement('span','Comment Disabled','class="CategoCom"') : '';




			case 'Allow_Ads':
				return empty($Option) ? $this->setAntherElement('span','ADS Disabled','class="CategoAds"') : '';



			default:
				# code...
				break;
		}
	}




}