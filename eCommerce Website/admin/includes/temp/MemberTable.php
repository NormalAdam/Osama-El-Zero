<?php
	
	class MemberTable{

		function __construct(){

		}


		function setTable($TableProper){
			echo '
				<div class="container">
				<div class="table-responsive">
					<table '.$TableProper.'>
			';
		}


		function setRowTable($ObjectDataBase){

				echo "<tr>";
				foreach ($ObjectDataBase as $key => $value) {
						echo '<td>'.$value.'</td>';
				}

				echo "</tr>";
		}


		function setRowFromDB($arr,$Ele=1){
				while ($res = mysqli_fetch_assoc($arr)) {
						if($Ele == 1){
							$btn=$this->addBtn('?do=Edit&userid='.$res["UserID"].'','success','Edit').
							$this->addBtn('?do=Delet&userid='.$res["UserID"].'','danger conf','Delete');

							$res['new']= $res['RegStatus']==1 ? $btn : $btn.=$this->addBtn('?do=Active&userid='.$res["UserID"].'','primary','Active');
							unset($res['RegStatus']);
							
						}else
						$res['new']=$Ele;
					$this->setRowTable($res);
				}
		
		}



		function setEndYable($Ele){
			echo '
					</table>
				</div>
				'.$Ele.'
			</div>
			';
		}


		function addBtn($Href,$Class,$label){
			return '<a href="'.$Href.'" class="btn btn-'.$Class.'">'.$label.'</a> ';
		}


		function setH1($Label){
			echo '<h1 class="text-center">'.$Label.'</h1>';
		}

	}