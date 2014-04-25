/*function test(){
    var height = parent.document.getElementById("imageId").offsetHeight;
    height=height+130;
    parent.document.getElementById("button").style.marginTop =height+'px';
}
$("$").click(function(){
    $temp();
});
$(function temp(){
    var btnUpload=$('#upload');
    var status=$('#status');
    new AjaxUpload(btnUpload, {
        action: "<?php echo site_url('admin/divisions/Addlogo');?>",
        name: 'uploadfile',
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
// extension is not allowed
                status.text('Поддерживаемые форматы JPG, PNG или GIF');
                return false;
            }
            status.text('Загрузка...');
        },
        onComplete: function(file, response){
//On completion clear the status
            status.text('');
//Add uploaded file to list
            if(response==="success"){
                $('<li></li>').appendTo('#files').html('<img src="./uploads/'+file+'" alt="" /><br />'+file).addClass('success');
            } else{
                $('<li></li>').appendTo('#files').text(file).addClass('error');
            }
        }
    });
});*/


