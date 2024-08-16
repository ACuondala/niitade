
let plan=0;
let sponsor=0;
let expecific__public=0;
let sum=0;

$(".plan").on('change',function(){
    plan=parseFloat($(this).val()) || 0;
    //sponsor=$(".sponsor")=parseFloat($(this).val()) || 0;
    //expecific__public=$(".public")=parseFloat($(this).val()) || 0;
    sum=plan+sponsor+expecific__public;
    $('.soma').html(sum);
});

$(".sponsor").on('change',function(){
    //plan=parseFloat($(this).val()) || 0;
    sponsor=parseFloat($(this).val()) || 0;
    //expecific__public=$(".public")=parseFloat($(this).val()) || 0;
    sum=plan+sponsor+expecific__public;
    $('.soma').html(sum);
});


$(".public").on('change',function(){
    //plan=parseFloat($(this).val()) || 0;
    expecific__public=parseFloat($(this).val()) || 0;
    //expecific__public=$(".public")=parseFloat($(this).val()) || 0;
    sum=plan+sponsor+expecific__public;
    $('.soma').html(sum);
});





