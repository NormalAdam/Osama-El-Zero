<?php
	
	function lang ( $phrase ){
		static $lang = array(
				//home page
				"HOME_ADMIN"			=> "Home",
				"CATEGORIES"    	 	=> "Categorise",
				"ITEMS"				 	=> "Items",
				"MEMBERS" 	    	 	=> "Members",
				"STATISTICS"    	 	=> "Statistics",
				"EDIET-PROFILE" 	 	=> "Edit Profile",
				"SETTING"  	    	 	=> "Setting",			
				"LOGS"  	    	 	=> "Logs",
				//setting

				//page name title

				"index.php"				=> "Login",
				"dashboard.php" 		=> "Dashboard",
				"members.php"   		=> "Members",
				"Category.php"  		=>"Category",

				//erorr 
				"username-Erorr" 		 => "Username Cant Be Empty",
				"password-Erorr" 	   	 => "Password Cant Be Empty",
				"email-Erorr"            => "Email Cant Be Empty",
				"full-Erorr"             => "Full Name Cant Be Empty",
				"name-Erorr"             => "Name Cant be empty",
				"username-Erorr-Leangth" => "Username Cant Be Than buc small or big username",
				"password-Erorr-Leangth" => "Password Cant Be Than buc small or big password"
			);
		return $lang[$phrase];
	}