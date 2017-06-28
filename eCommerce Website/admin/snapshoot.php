<?php 


			if( $_SERVER['REQUEST_METHOD'] == "POST" && 
				isset($_POST['name']      )          &&  !empty($_POST['name'] )   &&
				isset($_POST['des']       )          &&  !empty($_POST['des']  )   &&
				isset($_POST['order']     )          &&  !empty($_POST['order'])   &&
				is_numeric($_POST['order']) ){

				print_r($_POST);

			}
