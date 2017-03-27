$(document).ready(function() {
    Form_Validation($("#username"), "*	The username field must contain only alphabetical or numeric characters.",Username_Validate);
    Form_Validation($("#password"), "*	The password field should be at least 8 characters long.",Password_Validate);
    Form_Validation($("#email"), "*	The email field should be a valid email address (pqr@abc.xyz).",Email_Validate);
});

function Username_Validate(input1){
    var RegExp2p1 =  /^[a-zA-Z0-9]+$/;
    return RegExp2p1.test(input1);
}

function Password_Validate(input2){
    return (input2.length >= 8);
}

function Email_Validate(input3){
	var RegExp2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3})+$/;
    return RegExp2.test(input3);
}

var Form_Validation = function(Id, message, func) {
    
	var span = $("<span></span>");
    span.insertAfter($(Id)).hide();
	//Focus function
    $(Id).focus(function(){
        span.removeClass().addClass("info").text(message).show();
    });
    //Blur Function
    $(Id).blur(function(){
        if(!$(Id).val()){
            span.hide();
        } 
		else {
            var correct = func($(Id).val());
            if(correct == true){
                span.removeClass().addClass("ok").text("OK").show();
            } 
			else {            
                span.removeClass().addClass("error").text("Error").show();
            }
        }
    });
};