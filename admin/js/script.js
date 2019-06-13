$(document).ready(function (e) {
	var form;
	// 	$("#uploadimage").submit(function () {
	// 		e.preventDefault();
	// 		//		$("#message").empty(); 
	// 		//		$('#loading').show();
	// 		$.ajax({
	// 			url: "ajax_php_file.php",   	// Url to which the request is send
	// 			type: "POST",      				// Type of request to be send, called as method
	// 			data: new FormData(this), 		// Data sent to server, a set of key/value pairs representing form fields and values 
	// 			contentType: false,       		// The content type used when sending data to the server. Default is: "application/x-www-form-urlencoded"
	// 			cache: false,					// To unable request pages to be cached
	// 			processData: false,  			// To send DOMDocument or non processed data file it is set to false (i.e. data should not be in the form of string)
	// 			success: function (data)  		// A function to be called if request succeeds
	// 			{
	// 				//			$('#loading').hide();
	// 				//			$("#message").html(data);			
	// 			}
	// 		});
	// 	}));
	// });



	$('#fileToUpload').change(function (event) {
		form = new FormData();
		form.append('fileUpload', event.target.files[0]); // para apenas 1 arquivo
		//var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
	});

	$('#formUpload').submit(function () {
		$.ajax({
			url: 'Uploadds.php', // point to server-side PHP script 
			dataType: 'text',  // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			data: form,
			type: 'post',
			success: function (php_script_response) {
				console.log(php_script_response);

			},
			error: function (e) {
				console.log(e);
			}
		});
	});




	// $("#uploadimage").submit(function () {
	// 	console.log(this);
	// 	var form_data = new FormData(this);
	// 	alert(form_data);
	// 	$.ajax({
	// 		url: 'Uploadds.php', // point to server-side PHP script 
	// 		dataType: 'text',  // what to expect back from the PHP script, if anything
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		data: form_data,
	// 		type: 'POST',
	// 		success: function (data) {
	// 			alert
	// 				("deu certo"); // display response from the PHP script, if any
	// 		},
	// 		error: function (exr, sender) {
	// 			alert('Erro ao carregar pagina');
	// 		}

	// 	});
	// });

	// Function to preview image
	//	$(function() {
	//        $("#file").change(function() {
	//			$("#message").empty();         // To remove the previous error message
	//			var file = this.files[0];
	//			var imagefile = file.type;
	//			var match= ["image/jpeg","image/png","image/jpg"];	
	//			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
	//			{
	//			$('#previewing').attr('src','noimage.png');
	//			$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
	//			return false;
	//			}
	//            else
	//			{
	//                var reader = new FileReader();	
	//                reader.onload = imageIsLoaded;
	//                reader.readAsDataURL(this.files[0]);
	//            }		
	//        });
	//    });
	//	function imageIsLoaded(e) { 
	//		$("#file").css("color","green");
	//        $('#image_preview').css("display", "block");
	//        $('#previewing').attr('src', e.target.result);
	//		$('#previewing').attr('width', '250px');
	//		$('#previewing').attr('height', '230px');
	//	};
});

