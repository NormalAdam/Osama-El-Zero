<?php

	/**
	* 
	*/
	class DashBoard {
		
		
		function setContainer($class='',$valu=""){
			echo '

					<div class="container '. $class.'">
					'.$valu.'
					<div class="row">
			';
		}


		function setItemGr($value="",$css="stat",$class="col-md-3" ){
			echo '

					<div class="'.$class.'">
						<div class="'.$css.'" >
									'.$value.'
						</div>
					</div>

			';
		}


		function setAntherElement($ele,$val,$class="class='anther'"){

			return '<'.$ele.'  '.$class.'>'.$val.' </'.$ele.'>';

		}




		function getOneColumn($arr,$index){
			global $out;
			foreach ($arr as $key => $value) {

		  		
				$out.= $this->DashBord($arr,$key,$index);
			}
			return $out;
		}



		function DashBord($arr,$key,$index){
			$ou= '<li>'.$arr[$key][$index[1]].'<a href="members.php?do=Edit&userid='.$arr[$key][$index[0]].'" class="btn btn-success pull-right">Edit</a>';
			return $arr[$key][$index[2]] == 1 ? $ou.='</li>' : $ou.='<a href="members.php?do=Active&userid='.$arr[$key][$index[0]].'" class="btn btn-danger pull-right">Active</a></li>';
		}


		function setEnd($Ele=''){
			echo '
					</div>
					'.$Ele.'
				</div>

			';
		}

	}