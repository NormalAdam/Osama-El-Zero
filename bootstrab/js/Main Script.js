$(function(){

 var myHeader = $(".mySlider .carousel-inner").height();
$(".mySlider .item .carousel-caption").css("paddingTop", ( ( myHeader - $(".mySlider .carousel-caption h2").height() ) /2 )-70 );
$(window).resize(function(){
	myHeader = $(".mySlider .carousel-inner").height();
	$(".mySlider .item .carousel-caption").each(function(){

						$(this).css("paddingTop", ( ( myHeader - $(".mySlider .carousel-caption h2").height() ) /2 )-70 );
						console.log(( myHeader - $(".mySlider .carousel-caption h2").height() ) /2 );
					});


			});

				$('.carousel').carousel("pause");


				$("header h2 ,header h4").addClass("text-danger");



			var tool = $("#my-color i");
			tool.on("click",function(){

				$($(this).prev()).fadeToggle();

			});

			$("#my-color .option ul li").on("click",function(e){
				var myHeader = $("header h2");
				setColor(myHeader,tool,$(this).index());
			});


			var scrollTOOP = $(".to-top i");
			$(window).scroll(function(){
				 $(this).scrollTop()>=700 ? scrollTOOP.show() : scrollTOOP.hide();
			});

			scrollTOOP.on("click",function(){
				var ani = $("html,body");
				ani.animate({scrollTop:$(window).scrollTop()-500},1000,function(){ ani.animate({scrollTop:0},500); });
			});


/*
		
			$(".loading div").css("display","none");
				$("body").css("overflow","auto");
				$(".loading").remove();
				console.log($("link[href='css/styleload.css']").remove());

			
				
			*/


});


window.onload = function(){
		
				$("link[src='js/index.js']").remove();
				$(".loading").remove();
				$("link[href='css/styleload.css']").remove();
				$("body").css("overflow","auto");

		
	}


function setColor(myHeader,tool,index){

				switch(index){

					case 0: 
						console.log("1");
						myHeader.removeClass("text-success text-primary").addClass("text-danger");
						tool.prop("class","fa fa-gear fa-3x btn-danger").prev().css("border-color","#d9534f").children().eq(0).children().eq(0).css("color","#d9534f");
						break;
					case 1: 
						console.log("2");
						myHeader.removeClass("text-primary text-danger").addClass("text-success");
						tool.prop("class","fa fa-gear fa-3x btn-success").prev().css("border-color","#3c763d").children().eq(0).children().eq(0).css("color","#3c763d");
						break;
					case 2:
						console.log("3");
						myHeader.removeClass("text-success text-danger").addClass("text-primary");
						tool.prop("class","fa fa-gear fa-3x btn-primary").prev().css("border-color","#337ab7").children().eq(0).children().eq(0).css("color","#337ab7");

					
				}
				console.log(tool.prev().children().eq(0).children().eq(0));
}