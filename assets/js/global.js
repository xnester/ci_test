/* Global JavaScript File for working with jQuery library */

// execute when the HTML file's (document object model: DOM) has loaded
$(document).ready(function() {

  /* USERNAME VALIDATION */
  // use element id=username 
  // bind our function to the element's onblur event
  $('#form_add').find('#name').blur(function() {

    // get the value from the username field                              
    var domain = $('#name').val();
    
    if($('#name').val() == ''){
    	$('#bad_domain').replaceWith('');
    }else{
    // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
    // post the username field's value
    $.post('/ci_test/ajax/domain_taken',
      { 'name':domain },
    
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
  //Clear Form data when input change
  $('#form_add').find('#name').change(function() {
	  $('#created').val('');
	  $('#changed').val('');
	  $('#expires').val('');
	  $('#registrar').val('');
	  $('#nserver').val('');
	  $('#divResult').val('');
  });
  //relCopy for add more ip to host
  $(function(){
	  var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().remove(); return false">remove</a>';

	  $('a.add').relCopy({limit: 5, append: removeLink});
  });
  //Add ip
  $('.add_ip').click(function(){
	  var element = $(this);
	  var host_id = element.attr("id");
	  var ip = $('#ips').val();
	  var vlan = $('#vlan').val();
	  var desc = $('#desc').val();
	  var dataString = 'ip='+ ip + '&host_id=' + host_id + '&int=' + vlan + '&desc=' + desc;
	  if(ip =='' || vlan =='')
	  {
		  alert("Please Enter Some Text");
	  }
	  else
	  {	  
		  $("#ip >tbody >tr.no_ip").hide();
		  $('#ip >tbody:last').append('<tr class="flash"><td colspan="4">loading.....</td></tr>');	  
		  $.ajax({
			  type: "POST",
			  url: "/ci_test/host/insert_ip",
			  data: dataString,
			  cache: false,
			  success: function(html){
				  $("#ip >tbody:last").append(html);
				  $("#ip >tbody >tr.flash").hide();
				  $('#ips').val('');
				  $('#vlan').val('');
				  $('#desc').val('');
			  }
		  });
	  
		  
	  }
	  //return false;
  });

  //Whois
  $('#bwhois').click(function(){ 
	  
	  var domain = $('#name').val();
	  var nserver='';
	  if(domain != ''){
		  // first show the loading animation
		  $('#name').addClass('loading');

		  $.post('/ci_test/ajax/whois',
			{ 'name':domain},			
			// when the Web server responds to the request
		      function(result) {       
		        // if the result is TRUE write a message to the page
		        if (result) {
		        	
		        	$('#name').removeClass('loading');
		        	
		        	// parse whois data
					var data = jQuery.parseJSON(result);
					
			        $('#created').val(data.regrinfo.domain.created);
			        $('#changed').val(data.regrinfo.domain.changed);
			        $('#expires').val(data.regrinfo.domain.expires);
			        $('#registrar').val(data.regyinfo.registrar);
			        
			        $.each(data.regrinfo.domain.nserver, function(index, value) { 
			        	//alert(index + ': ' + value); 
			        	//$('#nserver').val(index);	
			        	nserver+=index+'\n';
			        	//$('#nserver').replaceWith('');
			        	//$('#nserver').append('<input type="text" name="nserver[]" value="'+index+'" />');
			        });
			        $('#nserver').val(nserver);
			        
			        //raw whois
			        
			        var items = [];
			        	  $.each(data.rawdata, function(key, val) {
			        		  items.push(val+'\n');
			        	  });
/*
			        	  $('<ul/>', {
			        	    'class': 'my-new-list',
			        	    html: items.join('')
			        	  }).appendTo('body');
	*/
			        $('#divResult').val(items.join(''));
			        
			        
		        }else{
		        	alert('Please check your input again!');
		        	$('#domain').removeClass('loading');
		        }
		      }
		  );
	  }else{
		  alert('please insert domain name'); 
	  }

  });  

});