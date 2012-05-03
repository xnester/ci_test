/* Global JavaScript File for working with jQuery library */

// execute when the HTML file's (document object model: DOM) has loaded
$(document).ready(function() {

  /* USERNAME VALIDATION */
  // use element id=username 
  // bind our function to the element's onblur event
  $('#form_add').find('#domain').blur(function() {

    // get the value from the username field                              
    var domain = $('#domain').val();
    
    if($('#domain').val() == ''){
    	$('#bad_domain').replaceWith('');
    }else{
    // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
    // post the username field's value
    $.post('/ci_test/ajax/domain_taken',
      { 'domain':domain },
    
      // when the Web server responds to the request
      function(result) {
        // clear any message that may have already been written
        $('#bad_domain').replaceWith('');
        
        // if the result is TRUE write a message to the page
        if (result) {
        	$('#bwhois').after('<p id="bad_domain" style="color:red; margin:0;">' +
            '(Domain Exists.)</p>');
        }/*else{
        	$('#bwhois').after('<div id="bad_domain" style="color:green;">' +
            '<p>(The Domain Doesn\'t Exists!.)</p></div>');
        }*/
      }
    
    );
    }
  });  
  
  // Whois
  $('#form_add').find('#bwhois').click(function(){ 
	  
	  var domain = $('#domain').val();
	  var nserver='';
	  if(domain != ''){
		  // first show the loading animation
		  $('#domain').addClass('loading');
		  $.post('/ci_test/ajax/whois',
			{ 'domain':domain},			
			// when the Web server responds to the request
		      function(result) {       
		        // if the result is TRUE write a message to the page
		        if (result) {
		        	
		        	$('#domain').removeClass('loading');
		        	
		        	// parse whois data
					var data = jQuery.parseJSON(result);
					
			        $('#created').val(data.regrinfo.domain.created);
			        $('#changed').val(data.regrinfo.domain.changed);
			        $('#expires').val(data.regrinfo.domain.expires);
			        $('#registrar').val(data.regyinfo.registrar);
			        
			        $.each(data.regrinfo.domain.nserver, function(index, value) { 
			        	//alert(index + ': ' + value); 
			        	//$('#nserver').val(index);	
			        	nserver+=index+',';
			        	//$('#nserver').replaceWith('');
			        	//$('#nserver').append('<input type="text" name="nserver[]" value="'+index+'" />');
			        });
			        $('#nserver').val(nserver);
		        }else{
		        	$('#domain').removeClass('loading');
		        	alert('Please check your input again!');
		        }
		      }
		  );
	  }else{
		  alert('please insert domain name'); 
	  }

  });  

});