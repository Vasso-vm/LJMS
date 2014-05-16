$(document).ready(function(){
    $(function(){
        $("#datepicker").datepicker({
            minDate: "-18Y",
            maxDate: "-5Y" ,
            changeMonth: true,
            changeYear: true
        });
    });
    $(function(){
        $("#dategame").datepicker({
            minDate: "-1Y",
            maxDate: "+1Y" ,
            changeMonth: true
        });
    });
    $(".first").click(function(){
        $("#panelemail").slideToggle("slow");
        if ($("input[name='h_email']").val()=='email'){
            $("input[name='h_email']").val('');
        }
        else{
            $("input[name='h_email']").val('email');
        }
        $(this).toggleClass("active");
    });
    $("#add_assign_players").ready(function(){
        $("#add_assign_players").click(function(){
            var $collection=$('#hidden');
            $("#assign_not_assign_players option:selected").each(function(){
                $(this).appendTo("#assign_players");
            });
        });
    });
    $("#remove_assign_players").ready(function(){
        $("#remove_assign_players").click(function(){
            $("#assign_players option:selected").each(function(){
                $(this).appendTo("#assign_not_assign_players");
            });
        });
    });
    $("#assign_Save").ready(function(){
        $("#assign_Save").click(function(){
            $("#assign_players option").each(function(){
                $(this).attr({selected: "selected"});
            });
            $("#assign_not_assign_players option").each(function(){
                $(this).attr({selected: "selected"});
            });
        });
    });
    $(".btn-slide").click(function(){
        $("#panelpassword").slideToggle("slow");
        if ($("input[name='h_password']").val()=='password'){
            $("input[name='h_password']").val('');
        }
        else{
            $("input[name='h_password']").val('password');
        }
        $(this).toggleClass("active");
    });
    if ($("#player_shares_guardian_address").prop("checked")){
        $("#player_address_address").attr('disabled', true);
        $("#player_address_city").attr('disabled', true);
        $("#player_address_state").attr('disabled', true);
        $("#player_address_zip").attr('disabled', true);
    }

    $("#datepicker").inputmask("99/99/9999",{ "placeholder": "_" });
    $("#dategame").inputmask("99/99/9999",{ "placeholder": "_" });
    $("#time").timepicker({
        showPeriodLabels: false,
        rows: 3,
        hours: {
            starts: 1,                // First displayed hour
            ends: 12                  // Last displayed hour
        }
    });
    $("#player_shares_guardian_address").on("change", function() {
        if($(this).is(":checked")) {
            $("#player_address_address").attr('disabled', true);
            $("#player_address_city").attr('disabled', true);
            $("#player_address_state").attr('disabled', true);
            $("#player_address_zip").attr('disabled', true);
        }
        else {
            $('#player_address_address').attr('disabled',false);
            $("#player_address_city").attr('disabled', false);
            $("#player_address_state").attr('disabled', false);
            $("#player_address_zip").attr('disabled', false);
        }
    });
    // multi select in table
    $("#selall").on("change", function() {
        if($(this).is(":checked")) {
            $(".checkbox").each(function() {
                $(this).prop('checked', true);
            });
        }
        else {
            $(".checkbox").each(function() {
                $(this).prop('checked', false);
            });
        }
    });
    $('#date').pickmeup({
        flat	: true
    });

});
var month1=4;
