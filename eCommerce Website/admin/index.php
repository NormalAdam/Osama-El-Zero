
<?php
	include "init.php";
	checkForActivSession('Username','dashboard.php');
	if( $_SERVER['REQUEST_METHOD'] == "POST" )		
		signinUser(executeMysqlLogin( $conn , $_POST["user"] , sha1( $_POST["pass"] ) ),1);
		
	

?>
		
	<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
		<h3 class="text-center">Admin Login</h3>
		<input class="form-control" type="text" name="user" placeholder="User Name" autocomplete="off">
		<input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="off">
		<input class="btn btn-primary btn-block" type="submit" value="login">
	</form>


<?php include $temp . "footer.php"; ?>