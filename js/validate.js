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
})