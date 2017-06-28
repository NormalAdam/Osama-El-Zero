<?php
include "init.php";
checkForStatusSession('Username','index.php');
	include $temp."DashBoaredClass.php";
	$DashBoared = new DashBoard();
	$DashBoared->setContainer('homedash text-center',$DashBoared->setAntherElement('h1','DashBoard'));
	$DashBoared->setItemGr('Total Member'.$DashBoared->setAntherElement('a',
		getOneRecorderInDataBase($conn,"SELECT COUNT(UserID) FROM users")['COUNT(UserID)'],"class='anther' href='members.php?do=Mange'"),"stat total");
	$DashBoared->setItemGr('Pending Member'.$DashBoared->setAntherElement('a',
		getOneRecorderInDataBase($conn,"SELECT COUNT(UserID) FROM users WHERE RegStatus=0")['COUNT(UserID)'],"class='anther' href='members.php?do=Mange&pand=panding'"),"stat pending");
	$DashBoared->setItemGr('Total Items'.$DashBoared->setAntherElement('span','800'),"stat item");
	$DashBoared->setItemGr('Total Comentes'.$DashBoared->setAntherElement('span','800'),"stat comme");
	$DashBoared->setEnd();
	//-----------------------------
	$DashBoared->setContainer('dash-panl');
	$DashBoared->setItemGr($DashBoared->setAntherElement('div',
		$DashBoared->setAntherElement('i','  latest register users','class="fa fa-users"'),
		'class="panel-heading"').
		$DashBoared->setAntherElement('div',$DashBoared->setAntherElement('ul',$DashBoared->getOneColumn(getLatestRegister($conn,'UserID,Username,RegStatus'),array('UserID','Username','RegStatus')),'class="list-unstyled mylist"'),'class="panel-body"')
		,'panel panel-default','col-md-6');

	$DashBoared->setItemGr($DashBoared->setAntherElement('div',
		$DashBoared->setAntherElement('i','  latest register users','class="fa fa-users"'),
		'class="panel-heading"').
		$DashBoared->setAntherElement('div','Test','class="panel-body"')
		,'panel panel-default','col-md-6');
	
	$DashBoared->setEnd();

	//$ee=getOneRecorderInDataBase($conn,"SELECT COUNT(UserID) FROM users");
	//getOneColumn(getLatestRegister($conn,'Username'),'Username')
?>



<?php include $temp . "footer.php"; ?>