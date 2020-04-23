(function ($) {
 "use strict";
 
	/*----------------------
		Dialogs
	 -----------------------*/

	//Basic
	$('#sa-basic').on('click', function(){
		swal("Here's a message!");
	});

	//A title with a text under
	$('#sa-title').on('click', function(){
		swal("Here's a message!", " Spensaduran pellentesque maximus eniman. Mauriseleifend ex semper, lobortis purus.")
	});

	//Success Message
	$('#sa-success').on('click', function(){
		swal("تم الحفظ بنجاح", " ", "success")
	});

	//Warning Message
	$('#sa-warning').on('click', function(){
		swal({   
			title: " هل تريد ان تلغي ؟",   
			text: " ",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonText: "نعم",
		}).then(function(){
			swal("تم الحذف", "", "success"); 
		});
	});
	
	//Parameter
	$('#sa-params').on('click', function(){
		swal({   
			title: "هل تريد الحذف ؟",   
			text: " ",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonText: "نعم",
			cancelButtonText: "لا",   
		}).then(function(isConfirm){
			if (isConfirm) {     
				swal("تم الحذف", " ", "success");   
			} else {     
				swal("الغاء", " ", "error");   
			} 
		});
	});


	//Custom Image
	$('#sa-image').on('click', function(){
		swal({   
			title: "Sweet!",   
			text: "Here's a custom image.",   
			imageUrl: "img/dialog/like.png" 
		});
	});

	//Auto Close Timer
	$('#sa-close').on('click', function(){
		 swal({   
			title: "Auto close alert!",   
			text: "I will close in 2 seconds.",   
			timer: 2000
		});
	});

 
})(jQuery); 