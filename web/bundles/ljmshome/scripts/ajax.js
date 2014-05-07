$(document).ready(function(){
    //get team for game schedule (game_schedule)
        $("#schedule_division").on("change", function() {
            $(".select_team").removeAttr("disabled");
            $(".select_team").empty();
            $(".select_team").append($('<option>',{value :""}).text("Select One"));
            var id=$("#schedule_division option:selected").val();
            var url=window.Url;
            jQuery.post(url,{id: id},"json").done(function(data){
                var result=JSON.parse(data);
                if (window.adminrole!=1 &&  window.managerrole==1){
                    var home_team=result['home_teams'];
                    delete result['home_teams'];
                    for (var key in result) {
                        for (var row in key){
                            $('#visitor_team').append($('<option>',{value : result[key]['id']})
                                .text(result[key]['name']));
                        }
                    }
                    for (var key in home_team) {
                        for (var row in key){
                            $("#home_team").append($('<option>',{value : result[key]['id']})
                                .text(result[key]['name'])
                            );
                        }
                    }
                }else{
                    for (var key in result) {
                        for (var row in key){
                            $(".select_team").append($('<option>',{value : result[key]['id']})
                                .text(result[key]['name'])
                            );
                        }
                    }
                }
            });
        });


//get division (player)
    $("#datepicker").on("change", function() {
        $("#divisions").removeAttr("disabled");
        $("#divisions").empty();
        $("#teams").empty();
        $("#divisions").append($('<option>',{value :""}).text("Select one"));
        var url=window.ajaxUrl;
        url=url+'/divisions/GetDivisions';
        var date=$("#datepicker").val();
        jQuery.post(
            url,
            {
                date: date
            },
            "json"
        ).done(function(data) {
                var result=JSON.parse(data);
                for (var key in result) {
                    for (var row in key){
                        $("#divisions").append($('<option>',{value : result[key]['id']})
                            .text(result[key]['name'])
                        );
                    }
                }
            });
    });

});
//upload division logo (division)
function uploadFile(files) {
    var url=window.ajaxUrl;
    url=url+'/divisions/AddLogo';
    var data = new FormData();
    for (var i = 0, file; file = files[i]; ++i) {
        data.append('logo', file);
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST',url);
    xhr.responseType = 'text';
    xhr.onload = function(e) {
        if (this.status == 200) {
            if (!/\s/.test(this.responseText)){
                parent.document.getElementById("imageId").innerHTML='<img src="/img/tmp_avatar/'+(this.responseText)+'">';
            }else{
                parent.document.getElementById("imageId").innerHTML='<p class="alert alert-error">'+(this.responseText)+'</p>';
            }

        }
    };
    xhr.send(data);
}
//get team list for division (player)
$(function() {
    $("#player_division").on("change", function() {
        $("#player_team").removeAttr("disabled");
        $("#player_team").empty();
        $("#player_team").append($('<option>',{value :""}).text("Select one"));
        var id=$("#player_division option:selected").val();
        var url=window.ajaxUrl;
        jQuery.post(url,{id: id}, "json")
            .done(function(data) {
                var result=JSON.parse(data);
                for (var key in result) {
                    for (var row in key){
                        $("#player_team").append($('<option>',{value : result[key]['id']})
                            .text(result[key]['name'])
                        );
                    }
                }
            });
    });
});
var gameDay=0;
function getSchedule(y,m){
    var url=window.Url;
    $.ajax({
        type:'post',
        url:url,
        data:{year: y,month: m},
        dataType:'json',
        async:false,
        success: function(data){
            var t=data;
            window.gameDay=data;
        }
    });
}
$(function() {
    $("#user_Role").on("change", function() {
        switch ($("#user_Role").val()){
            case '2':
                $("#user_Division").removeAttr("disabled");
                $("#user_Division").empty();
                $("#user_Team").empty();
                $("#user_Team").attr("disabled",true);
                $("#add_role").attr("disabled",true);
                GetDivisionList();
                break;
            case '1':
                $("#user_Division").empty();
                $("#user_Division").attr("disabled",true);
                $("#user_Team").empty();
                $("#user_Team").attr("disabled",true);
                $("#add_role").removeAttr("disabled");
                break;
            case '5':
                $("#user_Division").empty();
                $("#user_Division").attr("disabled",true);
                $("#user_Team").empty();
                $("#user_Team").attr("disabled",true);
                $("#add_role").removeAttr("disabled");
                break;
            case '':
                $("#user_Division").empty();
                $("#user_Division").attr("disabled",true);
                $("#user_Team").empty();
                $("#user_Team").attr("disabled",true);
                $("#add_role").attr("disabled",true);
                break;
            default :
                $("#user_Division").removeAttr("disabled");
                $("#user_Division").empty();
                $("#user_Team").empty();
                $("#user_Team").attr("disabled",true);
                $("#add_role").attr("disabled",true);
                GetDivisionList();
        }
    });
    $("#user_Division").on("change", function() {
        if ($("#user_Division").val()!=''){
            if ($("#user_Role").val()=='2'){
                $("#add_role").removeAttr("disabled");
            }else{
                $("#user_Team").removeAttr("disabled");
                $("#user_Team").empty();
                $("#user_Team").append($('<option>',{value :""}).text("Select one"));
                var id=$("#user_Division option:selected").val();
                var url=window.Url;
               jQuery.post(url,{id: id},"json").done(function(data){
                    var result=JSON.parse(data);
                    for (var key in result) {
                        $("#user_Team").append($('<option>',{value : result[key]['id']}).text(result[key]['name']));
                    }
                });
            }
        }else{
            $("#add_role").attr("disabled",true);
            $("#user_Team").empty();
            $("#user_Team").attr("disabled",true);
        }
    });
    $("#user_Team").on("change", function() {
        if ($("#user_Team").val()!=''){
            $("#add_role").removeAttr("disabled");
        }else{
            $("#add_role").attr("disabled",true);
        }
    });
    $("#add_role").click (function() {
        if ($('#roles tr').hasClass(''+$("#user_Role option:selected").val()+'_'+$("#user_Division option:selected").val()+'_'+$("#user_Team option:selected").val()+'')){
            alert ('This role already used');
        }else{
            $("#roles").append('' +
                '<tr class="'+$("#user_Role option:selected").val()+'_'+$("#user_Division option:selected").val()+'_'+$("#user_Team option:selected").val()+'">' +
                '<input type="hidden" name="current_role[]" value="'+$("#user_Role option:selected").val()+'|'+$("#user_Division option:selected").val()+'|'+$("#user_Team option:selected").val()+'">'+
                '<td>'+$("#user_Role option:selected").text()+'</td>' +
                '<td>'+$("#user_Division option:selected").text()+'</td>' +
                '<td>'+$("#user_Team option:selected").text()+'</td>' +
                '<td class="delete"><input type="button" onclick="deleteRole(this)" value="Delete Role" class="'+$("#user_Role option:selected").val()+'_'+$("#user_Division option:selected").val()+'_'+$("#user_Team option:selected").val()+'"></td>' +
                '</tr>'
            );
        }
    });
});
function deleteRole(data){
    var clas=$(data).attr("class");
    $('tr.'+clas+'').remove();
}
function GetDivisionList(){
    $("#user_Division").append($('<option>',{value :""}).text("Select one"));
    var url=window.ajaxUrl;
    jQuery.post(url,"json").done(function(data){
        var result=JSON.parse(data);
        for (var key in result) {
            $("#user_Division").append($('<option>',{value : result[key]['id']}).text(result[key]['name']));
        }
    });
}
