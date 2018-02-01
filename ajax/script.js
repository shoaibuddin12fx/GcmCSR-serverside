// JavaScript Document

function Userlist(){
	// get a user list from database
	var flag = 0;
	
	
	var request = $.ajax({
	  url: "functions/getusers.php",
	  method: "POST",
	  data: {flag: flag},
	  dataType: "JSON"
	});
	 
	request.done(function( json ) {
	  
	  $('select#userlist').find('option').remove();
	  
	  $.each(json,function(index, value){
		  console.log(index, value);
		  
		  	$('select#userlist').append('<option value="'+value['gcm_regid']+'">'+value['email']+'</option>');
		  
		  })
	  var v = $('select#userlist').find(':selected').val();	  
	  $('.step2 .text-muted').html('GCM KEY: ' +v);
	  $('#gcm_key').val(v);
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
	
	
	
	
	
	
};



$(function() {
	
	// call userlist function
	Userlist();	
	
	
	// on change of list value
	$('select#userlist').on('change',function(){
		var v = $(this).find(':selected').val();  
		$('.step2 .text-muted').html('GCM KEY: ' +v);
		$('#gcm_key').val(v);	
		})
	

	
	
	
    // Get the Register form.
    var form = $('#ajax-register');
	$(form).submit(function(event) {
		// Stop the browser from submitting the form.
		event.preventDefault();
		var formData = $('#ajax-register').serialize();
		console.log(formData);
		
		var request = $.ajax({
		  url: "functions/register.php",
		  method: "POST",
		  data: {formdata: formData},
		  dataType: "html"
		});
		 
		request.done(function( flag ) {
		  console.log(flag);
		  $('.step1 .alert').html(flag);
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
	
	
	
	
	// Get the Call form.
    var form3 = $('#call-register');
	$(form3).submit(function(event) {
		// Stop the browser from submitting the form.
		event.preventDefault();
		var formData = $('#call-register').serialize();
		console.log(formData);
		
		var request = $.ajax({
		  url: "functions/gcm.php",
		  method: "POST",
		  data: {formdata: formData},
		  dataType: "html"
		});
		 
		request.done(function( flag ) {
		  console.log(flag);
		  $('.step3 .alert').html(flag);
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
	
	
	
		
	
});



