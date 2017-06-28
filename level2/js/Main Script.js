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

	var myHeader=
	       $(".header").height($(window).height());
			$(window).resize(function(){
		       myHeader.height($(window).height());
		   
		$(".bx-viewport").each(function(){

						$(this).css("paddingTop", ( $(window).height() - $(".bx-viewport li").height() ) /2 );
						console.log(( $(window).height() - $(".bx-viewport li").height() ) /2 );
					});


			});

	        $(".links li").click(function(){

	        	$(this).siblings().removeClass("active");
	        	$(this).addClass("active");
	        	
	        });

	             
					
				  $('.bxslider').bxSlider({

									pager: false			  	 
				  });

				//BXSlider list center
				console.log(( $(window).height() - $(".bx-viewport li").height() ) /2 );

		$(".header .bx-wrapper .bx-viewport").css("height","100%");
				$(".header .bx-viewport").each(function(){
					$(this).css("paddingTop", ( $(window).height() - $(".bx-viewport li").height() ) /2 );
				});

				//- start Service

				$(".links li a").click(function(){

						$('html, body').animate({

							scrollTop:$('#'+ $(this).data('value')).offset().top

						},1000);

					});
				

				//- end Service


				//- creat slider

				(function nero(){
					$(".tell-me .slider .active").each(function(){

						if(!$(this).is(':last-child')){

							$(this).delay(3000).fadeOut(1000,function(){

								$(this).removeClass("active").next().addClass("active").fadeIn();
								nero();
							});
							console.log("asd");
						}
						else{
							$(this).delay(3000).fadeOut(1000,function(){

								$(this).removeClass("active");
								$(".tell-me .slider div").eq(0).addClass("active").fadeIn();
								nero();
							});
						}

					});

					}());
				


				//- end slider


                  var mixer = mixitup($('#contit'));
                    mixer.filter('.Mobile');
					mixer.filter('.All');

				$(".projects ul li").click(function(){

					$(this).addClass("selected").siblings().removeClass("selected");
					
					console.log("asdas");
				});


				$("html").niceScroll();

	});