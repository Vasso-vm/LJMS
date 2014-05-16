$(document).ready(function(){
    $("#contact_form").validate({
        rules: {
            name: {
                required:true,
                maxlength:70
            },
            email: {
                required: true,
                email:true,
                maxlength:70
            },
            subject:{
                required:true,
                maxlength:100
            },
            message:{
                required:true,
                maxlength:900
            }
        },
        errorClass: 'help-inline error'
    });
    $("#admin_login_form").validate({
        rules:{
            email:{
                required:true,
                email:true,
                maxlength:70
            },
            password:{
                required:true,
                minlength:5,
                maxlength:30
            }
        },
        errorClass: 'help-inline error'
    });
    $("#profile_form").validate({
        rules: {
            firstname: {
                required:true,
                maxlength:50
            },
            lastname:{
                required:true,
                maxlength:50
            },
            homephone:{
                required:true,
                number:true,
                maxlength:15
            },
            cellphone:{
                number:true,
                maxlength:15
            },
            altphone:{
                number:true,
                maxlength:15
            },
            email: {
                required: true,
                email:true,
                maxlength:70
            },
            confirmemail:{
                equalTo:'#email'
            },
            password:{
                required:true,
                minlength:5,
                maxlength:30
            },
            confirmpassword:{
                equalTo:'#password'
            }

        },
        errorClass: 'help-inline error'
    });
    $("#add_user_form").validate({
        rules: {
            first_name: {
                required:true,
                maxlength:100
            },
            address:{
                required:true,
                maxlength:70
            },
            city:{
                required:true,
                maxlength:70
            },
            zip:{
                required:true,
                maxlength:30
            },
            last_name:{
                required:true,
                maxlength:100
            },
            home_phone:{
                required:true,
                number:true,
                maxlength:15
            },
            cell_phone:{
                number:true,
                maxlength:15
            },
            alt_phone:{
                number:true,
                maxlength:15
            },
            email: {
                required: true,
                email:true,
                maxlength:70
            },
            confirm_email:{
                equalTo:'#email'
            },
            password:{
                required:true,
                minlength:5,
                maxlength:30
            },
            confirm_password:{
                equalTo:'#password'
            },
            alt_email:{
                email:true,
                maxlength:70
            },
            alt_alt_phone:{
                number:true,
                maxlength:15
            },
            jersey_name:{
                required:true,
                maxlength:70
            },
            jersey_number:{
                required:true,
                maxlength:10,
                number:true
            },
            short_type:{
                required:true,
                maxlength:70
            },
            shirt_type:{
                required:true,
                maxlength:70
            },
            short_size:{
                required:true,
                maxlength:70
            },
            shirt_size:{
                required:true,
                maxlength:70
            },
            states:{
                required:true,
                maxlength:70
            },
            birth:{
                required:true
            },
            team_name: {
                required:true,
                maxlength:70
            },
            division: {
                required:true,
                maxlength:70
            },
            status:{
                required:true,
                maxlength:70
            },
            time:{
                required:true,
                maxlength:10
            },
            home_team:{
                required:true,
                maxlength:70
            },
            visitor_team:{
                required:true,
                maxlength:70
            },
            datepicker:{
                required:true,
                maxlength:70
            },
            name:{
                required:true,
                maxlength:150
            },
            location:{
                required:true,
                maxlength:150
            },
            loccity:{
                maxlength:150
            },
            locaddress:{
                maxlength:150
            },
            loczip:{
                maxlength:150
            }
        },
        errorClass: 'help-block error'
    });
    $("#edit_user_form").validate({
        rules: {
            firstname: {
                required:true,
                maxlength:100
            },
            address:{
                required:true,
                maxlength:70
            },
            city:{
                required:true,
                maxlength:70
            },
            zip:{
                required:true,
                maxlength:30
            },
            lastname:{
                required:true,
                maxlength:100
            },
            homephone:{
                required:true,
                number:true,
                maxlength:15
            },
            cellphone:{
                number:true,
                maxlength:15
            },
            altphone:{
                number:true,
                maxlength:15
            },
            email: {
                required: true,
                email:true,
                maxlength:70
            },
            confirmemail:{
                equalTo:'#email'
            },
            password:{
                minlength:5,
                maxlength:30
            },
            confirmpassword:{
                equalTo:'#password'
            },
            altemail:{
                email:true,
                maxlength:70
            },
            altaltphone:{
                number:true,
                maxlength:15
            },
            namejersey:{
                required:true,
                maxlength:70
            },
            number:{
                required:true,
                maxlength:10,
                number:true
            },
            location:{
                required:true,
                maxlength:150
            },
            birth:{
                required:true
            }

        },
        errorClass: 'help-block error'
    });
    $("#division").validate({
        rules: {
            status: {
                required:true,
                maxlength:1
            },
            name:{
                required:true,
                maxlength:150
            },
            min_age:{
                required:true,
                maxlength:2,
                number:true
            },
            max_age:{
                required:true,
                maxlength:2,
                number:true
            },
            description:{
                maxlength:500
            },
            rules:{
                maxlength:500
            }
        }
    });
    $("#result_form").validate({
        rules: {
            homeTeam: {
                required:true,
                maxlength:3,
                number:true
            },
            visitorTeam: {
                required:true,
                maxlength:3,
                number:true
            }
        }
    });
});









