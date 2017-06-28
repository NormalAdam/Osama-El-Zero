<?php


class mempers{


	function __construct($TitelContaint,$ActionPage){
		$this->setUpContainerFormMembers($TitelContaint,$ActionPage);
	}

	function setUpContainerFormMembers($TitelContaint,$ActionPage){
		echo '
			<h1 class="text-center">'.$TitelContaint.'</h1>
	           <div class="container">
   	            	<form class="form-horizontal" action="'.$ActionPage.'" method="POST">
		';
	}

	function getFormMembers($NameLabel,$typeInput,$InputName,$placeholder,$val='',$required=''){
		echo '
			<div class="form-group form-group-lg">
				<label class="col-sm-2 control-label">'.$NameLabel.'</label>
				<div class="col-sm-10 col-md-6">
					<input type="'.$typeInput.'" name="'.$InputName.'" class="form-control" value="'.$val.'" autocomplete="off "'.$required.' placeholder="'.$placeholder.'">
				</div>
			</div>
		';
		
	}

	function setGRD($Ele,$Class='class="col-sm-offset-2 col-sm-10"',$Seb=''){

			echo '
				<div class="form-group form-group-lg">
				'.$Seb.'
				<div '.$Class.'>
					'.$Ele.'
				</div>
			</div>
		';
	}


	function setAntherElement($ele,$val,$class="class='anther'"){

			return '<'.$ele.'  '.$class.'>'.$val.' </'.$ele.'>';

	}


	function chackedCategory($Item,$radio){
		return $Item == $radio ? 'checked': '';
	}

	function endUpContainerFormMembers(){
		echo '
				</form>
			</div>
	
		';
	}
}



/*

<input type="'.$typeInput.'" value="'.$NameLabel.'" class="btn btn-primary btn-lg" autocomplete="off">

*/