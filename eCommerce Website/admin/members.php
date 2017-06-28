<?php

	include "init.php";
	checkForStatusSession('Username','index.php');

	$do=isset($_GET['do']) ? $_GET['do'] :'Mange';

	if($do=='Mange'){ 
		include $temp . "MemberTable.php";
		$panding = isset($_GET['pand'])=='panding' ? 'AND RegStatus=0' : '';
		$MembTable=new MemberTable();
		$MembTable->setH1("Members Edit");	
		$MembTable->setTable('class="main-table text-center table table-bordered"');
		$MembTable->setRowTable(array('#ID','User Name','Email','Full Name','Date Time','Control'));
		$MembTable->setRowFromDB( setOneRecorderInDataBase($conn,'SELECT UserID , Username  , Email, RegStatus , FullName , Date FROM users WHERE GroupID !=1 '.$panding));
		$MembTable->setEndYable('<a href="?do=Add" class="btn btn-primary"><i class="fa fa-plus" ></i> click to go add</a>');
		
		


		//print_r(getOneRecorderInDataBase();

		

	}elseif($do=='Add'){

		include $temp . "members.php";
		$mempers=new mempers('Add Members','?do=Insert');
        $mempers->getFormMembers('Username'  , 'text'     , 'username'  , 'Insert User Name' , '','required'  );		
     	$mempers->getFormMembers('Password'  , 'password' , 'password'  , 'Insert Password'   				  );
		$mempers->getFormMembers('Email'     , 'email'    , 'email'     , 'Insert Email'     , '', 'required' );
		$mempers->getFormMembers('Full Name' , 'text'     , 'full'      , 'Insert Full Name' , '', 'required' );
		$mempers->setGRD($mempers->setAntherElement('input','',' type="submit" value="Add Member" class="btn btn-primary btn-lg" autocomplete="off" '));
		$mempers->endUpContainerFormMembers();





	}elseif($do=='Insert'){

		
		//-------------------------UPDATE DATA BASE MEMBERS-------------------------------//
			 	echo '<div class="container">'; 	
	 	if( $_SERVER['REQUEST_METHOD'] == "POST" ){
	 		if( empty($_POST['username'])     ||
	 		    empty($_POST['password'])	  ||
	 		    empty($_POST['email'])        || 
	 		    empty($_POST['full'])         ||
	 		    strlen($_POST['username'])<4  ||
	 		    strlen($_POST['username'])>20 ||
	 		    strlen($_POST['password'])< 4 || 
	 		    strlen($_POST['password'])>20){
	 			echo '<h1 class="text-center">Ubdate Members Erorr</h1>';
	 			foreach ($_POST as $key => $value) {
	 				if( empty($value) )
	 					echo '<div class="alert alert-danger">' .lang($key."-Erorr") . '</div>';
	 				if($key=='username'||$key=='password')
	 					if(strlen($value)<4 || strlen($value) >20)
	 						echo '<div class="alert alert-danger">' . lang($key."-Erorr-Leangth") .'</div>';
	 			}
	 		}
	 		else{
			 			if(checkStetm($conn,$_POST['username'])){
					 		$query = "INSERT INTO users(Username,Password,Email,FullName,RegStatus,Date)VALUES('".$_POST['username']."','".sha1($_POST['password'])."','".$_POST['email']."','".$_POST['full']."',1,now())";  
					 		$RowUser = setOneRecorderInDataBase($conn,$query);
							if($RowUser)
								redi('back','class="alert alert-success "','Insert Members Successfile','This name is Inserted ');
							else  redi('back','class="alert alert-danger"','Insert Members Erorr','Erorr Insert  ');
						}else redi('back','class="alert alert-danger"','Insert Members Erorr','This name is ardey ');
	 		}
	 	}else redi();
	 	echo '</div>';




	}elseif ($do=='Active'){


		$userid = isset($_GET['userid'])&& is_numeric($_GET['userid'])&& isset($_SESSION['UserID']) ? $_GET['userid'] : false;
				if($userid && !checkStetm($conn,$_GET['userid'],'UserID') ){
							
					$stetm=setOneRecorderInDataBase($conn,'UPDATE users SET RegStatus=1 WHERE UserID='.$userid);
					if(is_numeric($stetm)>0);
						redi('back','class="alert alert-success"','Active Succsessfuly',$stetm .' Recorder Succsessfuly Active ');

				}else redi('index.php');


	}elseif ($do=='Delet'){

			$userid = isset($_GET['userid'])&& is_numeric($_GET['userid'])&& isset($_SESSION['UserID']) ? $_GET['userid'] : false;
				if($userid && !checkStetm($conn,$_GET['userid'],'UserID') ){
							
					$stetm=setOneRecorderInDataBase($conn,'DELETE FROM users WHERE UserID='.$userid);
					if(is_numeric($stetm)>0);
						redi('back','class="alert alert-success"','Delete Succsessfuly',$stetm .' Recorder Succsessfuly');

				}else redi('index.php');



	}elseif($do=='Edit'){

		$userid = isset($_GET['userid'])&& is_numeric($_GET['userid'])&& isset($_SESSION['UserID']) ? $_GET['userid'] : false;
		if($userid && !checkStetm($conn,$_GET['userid'],'UserID')){
			$query = 'SELECT * FROM users WHERE UserID='.$userid;
			$RowUser = getOneRecorderInDataBase($conn,$query);
			registryUserInSession('Password',$RowUser['Password']);
			include $temp . "members.php";
			$mempers=new mempers('Edit Members','?do=Update');
			$mempers->getFormMembers('Username'  , 'text'     , 'username' , 'Edit User Name' , $RowUser['Username']  ,'required' );
			$mempers->getFormMembers('Password'  , 'password' , 'password' , 'Edit Password'  , '##$$@@%%$$'          ,'required' );
			$mempers->getFormMembers('Email'     , 'email'    , 'email'    , 'Edit Email'     , $RowUser['Email']     ,'required' );
			$mempers->getFormMembers('Full Name' , 'text'     , 'full'     , 'Edit Full Name' , $RowUser['FullName']  ,'required' );
			$mempers->setGRD($mempers->setAntherElement('input','',' type="submit" value="Add Member" class="btn btn-primary btn-lg" autocomplete="off" '));
			$mempers->endUpContainerFormMembers();
			$_SESSION['UpUserID']=$userid;
		}else  redi('index.php');

	}




    elseif ($do=='Update') {	

	 	echo '<div class="container">'; 	
	 	if( $_SERVER['REQUEST_METHOD'] == "POST" ){
	 		if( empty($_POST['username'])     ||
	 		    empty($_POST['password'])	  ||
	 		    empty($_POST['email'])        || 
	 		    empty($_POST['full'])         ||
	 		    strlen($_POST['username'])<4  ||
	 		    strlen($_POST['username'])>20 ||
	 		    strlen($_POST['password'])< 4 || 
	 		    strlen($_POST['password'])>20){
	 			echo '<h1 class="text-center">Ubdate Members Erorr</h1>';
	 			foreach ($_POST as $key => $value) {
	 				if( empty($value) )
	 					echo '<div class="alert alert-danger">' .lang($key."-Erorr") . '</div>';
	 				if($key=='username'||$key=='password')
	 					if(strlen($value)<4 || strlen($value) >20)
	 						echo '<div class="alert alert-danger">' . lang($key."-Erorr-Leangth") .'</div>';
	 			}
	 		}
	 		else{
			 		$newPassword = $_POST['password'] == '##$$@@%%$$' ? $_SESSION['Password'] : sha1($_POST['password']);
			 		$query = "UPDATE users set Username='".$_POST['username']."',Password='".$newPassword."',FullName='".$_POST['full']."',Email='".$_POST['email']."' WHERE UserID=".$_SESSION['UpUserID'];
					$RowUser = setOneRecorderInDataBase($conn,$query);
					if($RowUser){
						redi('back','class="alert alert-success"','Ubdate Members Seccessfuly',$RowUser.' Recorder sucsessfly');
						$_SESSION['UpUserID']='';
					}else redi('back','class="alert alert-danger"','Erorr Members Seccessfuly','0 Recorder sucsessfly');
	 		}
	 	}else redi('index.php');
	 	echo '</div>';
	 }


?>



<?php include $temp . "footer.php"; ?>