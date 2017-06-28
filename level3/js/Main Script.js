	/*
	var myheader=document.getElementById('hed'),
	links=document.getElementsByClassName("active");
	myheader.setAttribute("style","height:"+window.innerHeight+"px");
	window.onresize=function(){
		myheader.setAttribute("style","height:"+window.innerHeight+"px");
	};


	console.log(document.getElementsByClassName("active").nextElementSiblins); 
	*/

	$(function(){

				$("html").niceScroll();

			  var myHeader = $(".header");
			  myHeader.height($(window).height());
			$(window).resize(function(){
		       myHeader.height($(window).height());
		   
			});

			// arrow

			$(".header .arrow i").click(function(){

					$("html, body").animate({

						scrollTop:$(".features").offset().top
					},1000);
			});


			$(".main-bu .mb").click(function(){

					console.log("this me click")
				$(".our-work .cl-image .rowh").fadeIn(1000);

			});


				function chickTestim(){

					if($(".testim .clint:first").hasClass("active")){
						$(".testim .fa-chevron-left").fadeOut();
						//console.log("true");
					}
					else{
						$(".testim .fa-chevron-left").fadeIn();
						//console.log("false");
					}
					if($(".testim .clint:last").hasClass("active")){
						$(".testim .fa-chevron-right").fadeOut();
						//console.log("true");
					}
					else{
						$(".testim .fa-chevron-right").fadeIn();
						//console.log("false");
					}					
				}
					chickTestim();

				$(".testim i").click(function(){
						
						if($(this).hasClass("fa-chevron-right")){
							$(".testim .active").fadeOut(100,function(){
								$(this).removeClass("active").next(".clint").addClass("active").fadeIn();
								chickTestim();
								console.log("$(this)");
							});
						}
						else{
							$(".testim .active").fadeOut(100,function(){
								$(this).removeClass("active").prev(".clint").addClass("active").fadeIn();
								chickTestim();
								console.log("nero2");
							});
						}

				});

				$(".tem-img .person").mouseover(function(){
					console.log("hover");
					if($(this).hasClass("a1")){
					  $(".out-tem .pro .a1").css("background-color", "#f7600e");
					   $(".out-tem .pro .a1").css("color", "#f7600e");
					}
					if($(this).hasClass("a2")){
					  $(".out-tem .pro .a2").css("background-color", "#f7600e");
					   $(".out-tem .pro .a2").css("color", "#f7600e");
					}
					if($(this).hasClass("a3")){
					  $(".out-tem .pro .a3").css("background-color", "#f7600e");
					   $(".out-tem .pro .a3").css("color", "#f7600e");
					}
					if($(this).hasClass("a4")){
					  $(".out-tem .pro .a4").css("background-color", "#f7600e");
					   $(".out-tem .pro .a4").css("color", "#f7600e");
					}
				});
				$(".tem-img .person").mouseleave(function(){
					console.log("leav");
					if($(this).hasClass("a1")){
					  $(".out-tem .pro .a1").css("background-color", "#c4c6c9");
					  $(".out-tem .pro .a1").css("color", "#c4c6c9");
					}
					 if($(this).hasClass("a2")){
					  $(".out-tem .pro .a2").css("background-color", "#c4c6c9");
					  $(".out-tem .pro .a2").css("color", "#c4c6c9");
					}
					if($(this).hasClass("a3")){
					  $(".out-tem .pro .a3").css("background-color", "#c4c6c9");
					  $(".out-tem .pro .a3").css("color", "#c4c6c9");
					}
					if($(this).hasClass("a4")){
					  $(".out-tem .pro .a4").css("background-color", "#c4c6c9");
					  $(".out-tem .pro .a4").css("color", "#c4c6c9");
					}

				});

	});


	

