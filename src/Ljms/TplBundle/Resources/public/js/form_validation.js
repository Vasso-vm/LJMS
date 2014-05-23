
$(document).ready(function(){
    $("#add_user_form").validate({
        rules: {
            "user[first_name]": {
                required:true,
                maxlength:100,
                minlength:2
            },
            "user[last_name]":  {
                required:true,
                maxlength:100,
                minlength:2
            },
            "user[email][first]":{
                required:true,
                email:true,
                maxlength:100,
                minlength:2
            },
            "user[email][second]":{
                equalTo:"#user_email_first"
            },
            "user[password][first]":{
                required:true,
                maxlength:30,
                minlength:5
            },
            "user[password][second]":{
                equalTo:"#user_password_first"
            },
            "user[home_phone]":{
                required:true,
                maxlength:20,
                number:true
            },
            "user[cell_phone]":{
                maxlength:20,
                number:true
            },
            "user[alt_phone]":{
                maxlength:20,
                number:true
            },
            "user[address][address]":{
                required:true,
                maxlength:100
            },
            "user[address][city]":{
                required:true,
                maxlength:100
            },
            "user[address][state]":{
                required:true,
                maxlength:100
            },
            "user[address][zip]":{
                required:true,
                maxlength:20,
                number:true
            },
            "user[altContact][alt_first_name]":{
                maxlength:100
            },
            "user[altContact][alt_last_name]":{
                maxlength:100
            },
            "user[altContact][alt_email]":{
                maxlength:100,
                email:true
            },
            "user[altContact][alt_phone]":{
                maxlength:20,
                number:true
            },
            "player[address][address]":{
                required:true,
                maxlength:100
            },
            "player[address][city]":{
                required:true,
                maxlength:100
            },
            "player[address][state]":{
                required:true,
                maxlength:100
            },
            "player[address][zip]":{
                required:true,
                maxlength:20,
                number:true
            },
            "player[birth_date][day]":{
                required:true
            },
            "player[birth_date][month]":{
                required:true
            },
            "player[birth_date][year]":{
                required:true
            },
            "player[player_registration][shirt_type]":{
                required:true
            },
            "player[player_registration][short_type]":{
                required:true
            },
            "player[player_registration][shirt_size]":{
                required:true
            },
            "player[player_registration][short_size]":{
                required:true
            },
            "player[player_registration][jersey_name]":{
                required:true,
                maxlength:100
            },
            "player[player_registration][jersey_number]":{
                required:true,
                maxlength:3,
                number:true
            },
            "player[first_name]": {
                required:true,
                maxlength:100,
                minlength:2
            },
            "player[last_name]":  {
                required:true,
                maxlength:100,
                minlength:2
            },
            "team[name]":{
                required:true,
                maxlength:100,
                minlength:2
            },
            "team[is_active]":{
                required:true

            },
            "team[division]":{
                required:true

            },
            "team[traveling]":{
                required:true

            },
            "schedule[date][date][day]":{
                required:true
            },
            "schedule[date][date][month]":{
                required:true
            },
            "schedule[date][date][year]":{
                required:true
            },
            "schedule[date][time][hour]":{
                required:true
            },
            "schedule[date][time][minute]":{
                required:true
            },
            "schedule[home_team]":{
                required:true
            },
            "schedule[visiting_team]":{
                required:true
            },
            "schedule[location]":{
                required:true
            },
            "location[name]":{
                maxlength:100,
                required:true
            },
            "location[city]":{
                maxlength:100

            },
            "location[address]":{
                maxlength:100

            },
            "location[state]":{
                required:true
            },
            "location[zip]":{
                number:true,
                maxlength:20
            },
            "location[phone]":{
                number:true,
                maxlength:20
            },
            "location[url]":{
                maxlength:150
            },
            "location[is_active]":{
                required:true
            }
        },
        errorClass: 'help-block error'
    });
    $("#edit_user_form").validate({
        rules: {
            "user[first_name]": {
                required:true,
                maxlength:100,
                minlength:2
            },
            "player[first_name]": {
                required:true,
                maxlength:100,
                minlength:2
            },
            "user[last_name]":  {
                required:true,
                maxlength:100,
                minlength:2
            },
            "player[last_name]":  {
                required:true,
                maxlength:100,
                minlength:2
            },
            "user[email][first]":{
                required:true,
                email:true,
                maxlength:100,
                minlength:2
            },
            "user[email][second]":{
                equalTo:"#user_email_first"
            },
            "user[password][first]":{
                maxlength:30,
                minlength:5
            },
            "user[password][second]":{
                equalTo:"#user_password_first"
            },
            "user[home_phone]":{
                required:true,
                maxlength:20,
                number:true
            },
            "user[cell_phone]":{
                maxlength:20,
                number:true
            },
            "user[alt_phone]":{
                maxlength:20,
                number:true
            },
            "user[address][address]":{
                required:true,
                maxlength:100
            },
            "user[address][city]":{
                required:true,
                maxlength:100
            },
            "user[address][state]":{
                required:true,
                maxlength:100
            },
            "user[address][zip]":{
                required:true,
                maxlength:20,
                number:true
            },
            "player[address][address]":{
                required:true,
                maxlength:100
            },
            "player[address][city]":{
                required:true,
                maxlength:100
            },
            "player[address][state]":{
                required:true,
                maxlength:100
            },
            "player[address][zip]":{
                required:true,
                maxlength:20,
                number:true
            },
            "player[birth_date][day]":{
                required:true
            },
            "player[birth_date][month]":{
                required:true
            },
            "player[birth_date][year]":{
                required:true
            },
            "player[player_registration][shirt_type]":{
                required:true
            },
            "player[player_registration][short_type]":{
                required:true
            },
            "player[player_registration][shirt_size]":{
                required:true
            },
            "player[player_registration][short_size]":{
                required:true
            },
            "player[player_registration][jersey_name]":{
                required:true,
                maxlength:100
            },
            "player[player_registration][jersey_number]":{
                required:true,
                maxlength:3,
                number:true
            },
            "user[altContact][alt_first_name]":{
                maxlength:100
            },
            "user[altContact][alt_last_name]":{
                maxlength:100
            },
            "user[altContact][alt_email]":{
                maxlength:100,
                email:true
            },
            "user[altContact][alt_phone]":{
                maxlength:20,
                number:true
            }
        },
        errorClass: 'help-block error'
    });
    $("#profile_form").validate({
        rules: {
            "profile[first_name]": {
                required:true,
                maxlength:100,
                minlength:2
            },
            "profile[last_name]":{
                required:true,
                maxlength:100,
                minlength:2
            },
            "profile[home_phone]":{
                required:true,
                number:true,
                maxlength:20
            },
            "profile[alt_phone]":{
                number:true,
                maxlength:20
            },
            "profile[cell_phone]":{
                number:true,
                maxlength:20
            },
            "profile[email]":{
                required: true,
                email:true,
                maxlength:100
            },
            "profile[password][first]":{
                minlength:5,
                maxlength:30
            },
            "profile[password][second]":{
                equalTo:'#profile_password_first'
            }
        },
        errorClass: 'help-inline error'
    });
    $("#admin_login_form").validate({
        rules: {
            "_username": {
                required:true,
                maxlength:100,
                email:true
            },
            "_password": {
                required:true,
                maxlength:30,
                minlength:5
            }
        },
        errorClass: 'help-inline error'
    });
    $("#division").validate({
        rules: {
            "division[is_active]": {
                required:true

            },
            "division[name]":{
                required:true,
                maxlength:100,
                minlength:2
            },
            "division[min_age]":{
                required:true

            },
            "division[max_age]":{
                number:true

            }

        },
        errorClass: 'help-inline error'
    });
    $("#result_form").validate({
        rules: {
            "result[visiting_team_score]": {
               maxlength:3,
                number:true

            },
            "result[home_team_score]": {
                maxlength:3,
                number:true

            }

        },
        errorClass: 'help-block error'
    });
});




