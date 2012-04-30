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
        	$('#domain').after('<div id="bad_domain" style="color:red;">' +
            '<p>(That Username is already taken. Please choose another.)</p></div>');
        }else{
        	$('#domain').after('<div id="bad_domain" style="color:green;">' +
            '<p>(The Domain Doesn\'t Exists!.)</p></div>');
        }
      }
    
    );
    }
  });  
  
  // Whois
  $('#form_add').find('#bwhois').click(function(){ 
	  
	  var domain = $('#domain').val();
	  
	  if(domain != ''){
		  // first show the loading animation
		  $('#domain').addClass('loading');
		  $.post('/ci_test/ajax/whois',
			{ 'domain':domain},
			// when the Web server responds to the request
		      function(result) {
		        // clear any message that may have already been written
		        $('#created').val('');

		        // if the result is TRUE write a message to the page
		        if (result) {
		        	$('#created').val('Whois Successful');
		        	$('#domain').removeClass('loading');
		        }else{
		        	$('#created').val('Whois False!');
		        	$('#domain').removeClass('loading');
		        }
		      }
		  );
	  }else{
		  alert('please insert domain name'); 
	  }

  });  

});