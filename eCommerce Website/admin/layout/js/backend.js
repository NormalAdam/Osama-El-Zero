$(function(){

	// Start page user login form
	$("[placeholder]").focus(function(){

		placeholderToggle($(this),"placeholder",1);
	}).blur(function(){
		placeholderToggle($(this),"placeholder",0);
	});

		$('input').each(function(){

			if ( $(this).attr('required') === 'required' )
				$(this).after('<span class="astric">*</span>');
		});



	$('.conf').click(function(){

			return confirm("are you sure delet this item ?");
	});

});

// call function

	function placeholderToggle(element,attr,status){
		status==1 ?
					element.attr("data-text",element.attr(attr)).attr(attr,"")
				  :
					element.attr(attr,element.attr("data-text")).removeAttr("data-text");
	}

