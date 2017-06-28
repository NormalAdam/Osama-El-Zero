<?php
// call imporatant function

	function executeMysqlLogin($conn,$username,$hashedPass){
		if ($conn){
				$query = "SELECT UserID , Username , Password , GroupID FROM users";
				$result = mysqli_query($conn,$query);
				while($res = mysqli_fetch_assoc($result)) {

					if( $res['Username'] == $username && $res["Password"] == $hashedPass )
						return $res ;  
				}
				return false;
		}else echo "filed connection";
	}

	function checkForActivSession($wordExe , $goLocation ){
		// basename($_SERVER['PHP_SELF'])
		if(isset($_SESSION[$wordExe])){
			header("location:".$goLocation);
			exit();
		}
	}


	function checkForStatusSession($wordExe , $goLocation ){
		if( !( isset($_SESSION[$wordExe]) ) ){
			header("location:".$goLocation);
			exit();
		}else return $_SESSION[$wordExe];	
	}

	function signinUser($result,$vall){
		 if($result['GroupID']==$vall){
		 	registryUserInSession('Username',$result['Username']);
		 	registryUserInSession('UserID',$result['UserID']);
		 	checkForActivSession('Username','dashboard.php');
		 }
		 else
		 	echo "rong User";
	}



	function registryUserInSession($index,$result){
		$_SESSION[$index] = $result;
	}


	function sessionDestroy($goLocation){
		session_start();
		session_unset();
		session_destroy();
		checkForStatusSession(null,$goLocation);
	}


	function getOneRecorderInDataBase($conn,$query){

		if ($conn)				
			return mysqli_fetch_assoc( mysqli_query($conn,$query) );
					
		else echo "filed connection";
	}

		function setOneRecorderInDataBase($conn,$query){

		if ($conn)				
			return mysqli_query($conn,$query);
					
		else echo "filed connection";
	}

	function checkStetm($conn,$OP,$column='Username',$Table='users'){

			$ssa=getOneRecorderInDataBase($conn,'SELECT '.$column.' FROM '.$Table.' WHERE '.$column.'="'.$OP.'"');
			if(isset($ssa))
				return false;

			return true;
	}	


	function redi($Url=null,$Class='class="alert alert-danger"',$Title='YOU.......',$Mes='You Cant Browez This page direct ',$Sec=4){
		$newUrl=$Url;
		if(isset($Url)){
			switch ($Url) {
				case 'back':
					$newUrl = isset($_SERVER['HTTP_REFERER']) && empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']== '' ? 'index.php' : $_SERVER['HTTP_REFERER'] ;
					break;
			}

		}else $Url='index.php';

		echo '<div class="container"> 
		 <h1 class="text-center">'.$Title.'</h1> 
		 <div '.$Class.'>
			'.$Mes.'
		 </div> 
		 </div>';
		 header("refresh:$Sec;url=$newUrl");

	}
	

	function getLatestRegister($conn,$Column='*',$Lemt='LIMIT 5',$Table='users',$Order='UserID',$ArrIndex='Username',$typeOrder='DESC'){

			$res=setOneRecorderInDataBase($conn,"SELECT $Column FROM $Table ORDER BY $Order $typeOrder $Lemt ");
			$array;
			while ($resa = mysqli_fetch_assoc($res)) {
				$array[$resa[$ArrIndex]]=$resa;
			}
			return $array;
	}


	//$out.= $arr[$key][$index[2]] = 1 ? $li.'</li>' : $li . '<a href="members.php?do=Action&userid='.$arr[$key][$index[0]].'" class="btn btn-danger pull-right">Active</a></li>';