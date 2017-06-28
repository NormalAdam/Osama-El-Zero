<?php

     include "init.php";
	checkForStatusSession('Username','index.php');

	$do=isset($_GET['do']) ? $_GET['do'] :'Mange';

	if($do=='Mange'){ 

		$sort = isset($_GET['sort']) ? $_GET['sort'] : 'DESC';

	include $temp."CategoClass.php";
	$CategoBoared = new Catego();
	$CategoBoared->setContainer('catego-panl',$CategoBoared->setAntherElement('h1','Mange Categoris','class="text-center"'));

		$CategoBoared->setItemGr($CategoBoared->setAntherElement('div',
		$CategoBoared->setAntherElement('i','  Ordering  <a href="?sort=DESC">DESC</a> | <a href="?sort=ASC">ASC</a>' ,'class="fa fa-users"'),
		'class="panel-heading text-center"').
		$CategoBoared->setAntherElement('div',

		$CategoBoared->getOneColumn(getLatestRegister($conn,'*','','catego','Ordering','Name',$sort),array('ID','Name','Description','Ordering','Visibility','Allow_Coment','Allow_Ads'))

			,'class="panel-body"')
		,'panel panel-default','col-md-12');
	
	$CategoBoared->setEnd('<a href="?do=Add" class="btn btn-primary"><i class="fa fa-plus" ></i> click to go add</a>');

//echo "<a href='?do=Add' >add</a>";








	

	}elseif($do=='Add'){

		include $temp . "members.php";
		$CategoAdd=new mempers('Add Category','?do=Insert');
        $CategoAdd->getFormMembers('Name'         , 'text'     , 'name'      , 'Insert Name Category' , '', 'required'      );		
     	$CategoAdd->getFormMembers('Descraption'  , 'text'     , 'des'       , 'Insert Descraption'                         );
		$CategoAdd->getFormMembers('Ordering'     , 'text'     , 'order'     , 'Insert Order Category'                      );

		$CategoAdd->setGRD($CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="v-y">Yes<label/>','id="v-y" type="radio" name="vis" value="0" checked'),'').
		$CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="v-n">no<label/>','id="v-n" type="radio" name="vis" value="1"'),'')
		   ,'class="col-sm-10 col-md-6"',$CategoAdd->setAntherElement('label','visit','class="col-sm-2 control-label"'));

		$CategoAdd->setGRD($CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="c-y">Yes<label/>','id="c-y" type="radio" name="com" value="0" checked'),'').
		$CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="c-n">no<label/>','id="c-n" type="radio" name="com" value="1"'),'')
		   ,'class="col-sm-10 col-md-6"',$CategoAdd->setAntherElement('label','Allow Commenting','class="col-sm-2 control-label"'));

		$CategoAdd->setGRD($CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="a-y">Yes<label/>','id="a-y" type="radio" name="ads" value="0" checked'),'').
		$CategoAdd->setAntherElement('div',$CategoAdd->setAntherElement('input','<label for="a-n">no<label/>','id="a-n" type="radio" name="ads" value="1"'),'')
		   ,'class="col-sm-10 col-md-6"',$CategoAdd->setAntherElement('label','Allow Ads','class="col-sm-2 control-label"'));


		$CategoAdd->setGRD($CategoAdd->setAntherElement('input','',' type="submit" value="Add Category" class="btn btn-primary btn-lg" autocomplete="off" '));
		$CategoAdd->endUpContainerFormMembers();

	}elseif($do=='Insert'){




		echo '<div class="container">'; 	
	 	if( $_SERVER['REQUEST_METHOD'] == "POST" ){
	 		if( empty($_POST['name'])){
	 			echo '<h1 class="text-center">Inser Category Erorr</h1>';
	 			foreach ($_POST as $key => $value) 
	 				if(empty($value))
	 					echo '<div class="alert alert-danger">' .lang($key."-Erorr") . '</div>';	 			
	 		}
	 		else{
			 			if(checkStetm($conn,$_POST['name'],'Name','catego')){
					 		$query = "INSERT INTO catego( Name , Description , Ordering , Visibility , Allow_Coment , Allow_Ads) VALUES ('".$_POST['name']."' , '".$_POST['des']."' , '".$_POST['order']."' , '".$_POST['vis']."' , '".$_POST['com']."' , '".$_POST['ads']."')";  
					 		$RowUser = setOneRecorderInDataBase($conn,$query);
							if($RowUser)
								redi('back','class="alert alert-success"','Insert Category Seccessfuly','Good');
							else echo redi('back','class="alert alert-danger"','Insert Category Erorr','Erorr Insert  ');
						}else redi('back','class="alert alert-danger"','Insert Category Erorr','This name is ardey ');
	 		}
	 	}else redi();
	 	echo '</div>';









 }elseif ($do=='Delete'){


$catid = isset($_GET['catid'])&& is_numeric($_GET['catid']) ? $_GET['catid'] : false;

		if( $catid && !checkStetm($conn,$_GET['catid'],'ID','catego') ){

				$query = 'DELETE FROM catego WHERE ID ='.$_GET['catid'] ;
					 		$RowUser = setOneRecorderInDataBase($conn,$query);
							if($RowUser)
								redi('back','class="alert alert-success "','Delet Category Successfile','This Category is Deleted ');
							else  redi('back','class="alert alert-danger"','Delet Members Erorr','Erorr Insert  ');
		}



 }elseif($do=='Edit'){

		$catid = isset($_GET['catid'])&& is_numeric($_GET['catid']) ? $_GET['catid'] : false;

		if( $catid && !checkStetm($conn,$_GET['catid'],'ID','catego') ){
			
			$CategoOne=getOneRecorderInDataBase($conn,'SELECT * FROM catego WHERE ID='. $catid);

		include $temp . "members.php";
		$CategoEdit=new mempers('Update Category','?do=Update');
        $CategoEdit->getFormMembers('Name'         , 'text'     , 'name'      , 'Insert Name Category' , $CategoOne['Name'], 'required');		
     	$CategoEdit->getFormMembers('Descraption'  , 'text'     , 'des'       , 'Insert Descraption'   , $CategoOne['Description']     );
		$CategoEdit->getFormMembers('Ordering'     , 'text'     , 'order'     , 'Insert Order Category',  $CategoOne['Ordering']        );

		$CategoEdit->setGRD($CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="v-y">Yes<label/>','id="v-y" type="radio" name="vis" value="0"'.$CategoEdit->chackedCategory($CategoOne['Visibility'],0) ),'').
		$CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="v-n">no<label/>','id="v-n" type="radio" name="vis" value="1" '.$CategoEdit->chackedCategory($CategoOne['Visibility'],1)),'')
		   ,'class="col-sm-10 col-md-6"',$CategoEdit->setAntherElement('label','Visibility','class="col-sm-2 control-label"'));

		$CategoEdit->setGRD($CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="c-y">Yes<label/>','id="c-y" type="radio" name="com" value="0" '.$CategoEdit->chackedCategory($CategoOne['Allow_Coment'],0)),'').
		$CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="c-n">no<label/>','id="c-n" type="radio" name="com" value="1" '.$CategoEdit->chackedCategory($CategoOne['Allow_Coment'],1)),'')
		   ,'class="col-sm-10 col-md-6"',$CategoEdit->setAntherElement('label','Allow Commenting','class="col-sm-2 control-label"'));

		$CategoEdit->setGRD($CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="a-y">Yes<label/>','id="a-y" type="radio" name="ads" value="0" '.$CategoEdit->chackedCategory($CategoOne['Allow_Ads'],0)),'').
		$CategoEdit->setAntherElement('div',$CategoEdit->setAntherElement('input','<label for="a-n">no<label/>','id="a-n" type="radio" name="ads" value="1" '.$CategoEdit->chackedCategory($CategoOne['Allow_Ads'],1)),'')
		   ,'class="col-sm-10 col-md-6"',$CategoEdit->setAntherElement('label','Allow Ads','class="col-sm-2 control-label"'));


		$CategoEdit->setGRD($CategoEdit->setAntherElement('input','',' type="submit" value="Update Category" class="btn btn-primary btn-lg" autocomplete="off" '));
		$CategoEdit->endUpContainerFormMembers();

		$_SESSION['CatID']=$CategoOne['ID'];




		}else redi('back','class="alert alert-danger"','Edit Category Erorr','Erorr ');



	}elseif ($do=='Update') {

			if( $_SERVER['REQUEST_METHOD'] == "POST" && 
				isset($_POST['name'])                &&  
				!empty($_POST['name'])  ){


					//('".$_POST['name']."' , '".$_POST['des']."' , '".$_POST['order']."' , '".$_POST['vis']."' , '".$_POST['com']."' , '".$_POST['ads']."')";  
					 		$query = "UPDATE  catego SET Name='".$_POST['name']."' , Description='".$_POST['des']."' , Ordering='".$_POST['order']."' , Visibility='".$_POST['vis']."' , Allow_Coment='".$_POST['com']."' , Allow_Ads='".$_POST['ads']."' WHERE ID=".$_SESSION['CatID']." " ;
					 		$RowUser = setOneRecorderInDataBase($conn,$query);
							if($RowUser)
								redi('back','class="alert alert-success "','Insert Category Successfile','This Category is Inserted ');
							else  redi('back','class="alert alert-danger"','Insert Members Erorr','Erorr Insert  ');
						
							$_SESSION['CatID']="";


			}//POst

	}
 

?>

	<?php include $temp . "footer.php"; ?>