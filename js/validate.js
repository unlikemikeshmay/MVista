$(function(){
  

    $('#contactForm').validate({
        rules:{
            FROM:{
                required: true,
                minlength:3
            },
            SUBJECT:{
                required: true,
                minlength: 2
            },
            SENDEREMAIL:{
                required: true,
                email: true
            },
            MESSAGE:{
                required: true,
                minlength: 8
            }
        },
        messages:{
            FROM:{
                required: "<span style='color:red'>Please enter your name</span>",
                minlength: "<span style='color:red'>Name field too short</span>"
            },
            SUBJECT:{
                required: "<span style='color:red'>Please enter a subject line.</span>",
                minlength: "<span style='color:red'>That subject is a little short isn't it?</span>"
            },
            SENDEREMAIL:{
                required: "<span style='color:red'>Please enter a valid email.</span>",
                email: "<span style='color:red'>Please make sure your email is correct</span>"
            },
            MESSAGE:{
                required: "<span style='color:red'>Please enter your message.</span>",
                minlength: "<span style='color:red'>That is a very short message.</span>"
            }
        }
    })
    $('#registerForm').validate({
        rules:{
            FNAME:{
                required: true,
                minlength:3
            },
            LNAME:{
                required: true,
                minlength:3
            },
            EMAIL:{
                required:true,
                email: true
            },
            PASSWORD:{
                required: true,
                minlength:6
            
            },
            ConfPASSWORD:{
                required: true,
                minlength:6,
                equalTo: "#inputPassword"
            }
        },
        messages:{
             FNAME:{
                required: "<span style='color:red'>Please enter your first name.</span>",
                minlength: "<span style='color:red'>First name field too short.</span>"
            },
            LNAME:{
                required: "<span style='color:red'>Please enter your last name.</span>",
                minlength: "<span style='color:red'>Last name field too short.</span>"
            },
            EMAIL:{
                required: "<span style='color:red'>Please enter a valid email.</span>",
                email: "<span style='color:red'>Please make sure your email is correct.</span>"
            },
            PASSWORD:{
                required: "<span style='color:red'>Please enter a password.</span>",
                minlength: "<span style='color:red'>Your password must be at least 6 characters long.</span>"
            },
            ConfPASSWORD:{
                required: "<span style='color:red'>Please re-enter your password.</span>",
                minlength: "<span style='color:red'>Your password must be at least 6 characters long.</span>",
                equalTo: "<span style='color:red'>Please enter the same password as above.</span>"
            }
        }
    })
    $('#loginForm').validate({
        rules:{
            EMAIL:{
                required:true,
                email:true
            },
            PASSWORD:{
                required:true,
                minlength:6
            }
        },
        messages:{
            EMAIL:{
                required:"<span style='color:red'>Please enter your email address.</span>",
                email:"<span style='color:red'>Please enter a valid email address.</span>"
            },
            PASSWORD:{
                required:"<span style='color:red'>Please enter your password.</span>",
                minlength:"<span style='color:red'>Passwords are a minimum of 6 characters.</span>"
            }
        }
    })
    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param) 
     });    
     
     $('#ImageChangeForm').validate({
             rules: {
                 file: {
                     required: true, 
                     extension: "png|jpeg|jpg",
                     filesize: 1048576,   
                 }
             },
             messages: 
                { 
                 file: "File must be JPEG or PNG, less than 1MB" 
                },
             highlight: function(element) {
                 $(element).closest('.form-group').addClass('has-error');
             },
             unhighlight: function(element) {
                 $(element).closest('.form-group').removeClass('has-error');
             },
             errorElement: 'div',
             errorClass: 'help-block',
             errorPlacement: function(error, element) {
                 if(element.parent('.input-group').length) {
                     error.insertAfter(element.parent());
                 } else {
                     error.insertAfter(element);
                 }
             }
         });
})
/* 	name="FNAME">
	name="LNAME">
	name="EMAIL">
	name="PASSWORD">
	name="ConfPASSWORD"> */