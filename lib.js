// JavaScript Document

$(document).on('pagebeforeshow', '#login', function(){ 	 
        $(document).on('click', '#submit', function() { 
		// catch the form's submit event
        if($('#username').val().length > 0 && $('#password').val().length > 0){
            // Send data to server through ajax call
            // action is functionality we want to call and outputJSON is our data
                $.ajax({
					url: 'auth.php',
                    data: 	{
								action : 'login', 
								formData : $('#form-login').serialize()
							}, // Convert a form to a JSON string representation
                    type: 'POST',
					async: true,                   
					cache: false,
                    beforeSend: function() {
                        // This callback function will trigger before data is sent
                        $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
                    },
                    complete: function() {
                        // This callback function will trigger on data sent/received complete
                      	$.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
                    },
                    success: function (result) {
                    	resultObject.formSubmitionResult = result;
						$.mobile.changePage("#homepage",{
        					allowSamePageTransition: true,
        					transition: 'none',
        					reloadPage: true
    					});
                    },
                    error: function (request,error) {
                        // This callback function will trigger on unsuccessful action                
                        alert('Network error has occurred please try again!');
                    }
                });                   
        } else {
            alert('Please fill all nececery fields');
        }           
            return false; // cancel original event to prevent form submitting
        });    
});

$(document).on('pagebeforeshow', '#menu', function(){     
    $('#menu [data-role="content"]').append('This is a result of form submition: ' + resultObject.formSubmitionResult);  
});

var resultObject = {
    formSubmitionResult : null  
}