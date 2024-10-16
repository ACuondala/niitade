
let plan=0;
let sponsor=0;
let expecific__public=0;
let sum=0;

$(".plan").on('change',function(){
    //plan=parseFloat($(this).val()) || 0;
    var planSelected=$(this).find('option:selected');
    plan=parseFloat(planSelected.data('plan')) || 0;
    console.log(plan);

    sum=plan+sponsor+expecific__public;
    $('.soma').val(sum);
});


$(".sponsor").on('change',function(){
    //plan=parseFloat($(this).val()) || 0;
    var sponsorSelected=$(this).find('option:selected');
    sponsor=parseFloat(sponsorSelected.data('sponsor')) || 0;
    //expecific__public=$(".public")=parseFloat($(this).val()) || 0;
    console.log(sponsor);
    sum=plan+sponsor+expecific__public;
    $('.soma').val(sum);
});


$(".public").on('change',function(){
    //plan=parseFloat($(this).val()) || 0;
    var publicSelected=$(this).find('option:selected');
    expecific__public=parseFloat(publicSelected.data('public')) || 0;
    //expecific__public=$(".public")=parseFloat($(this).val()) || 0;
    console.log(expecific__public);
    sum=plan+sponsor+expecific__public;
    $('.soma').val(sum);
});


const feedssInput = document.querySelector("#feedss__input");
const feedssImage = document.querySelector(".feedss__image");

function previewFile(feedssImage, inputFile) {


    //feedss Logo
 const feedssImageTxt="Conteúdo";
 feedssImage.innerHTML=feedssImageTxt;

 inputFile.addEventListener("change", e => {
   const inputTarget = e.target;
   const file = inputTarget.files[0];

   console.log(file);
   if (file) {
     const reader = new FileReader();

     reader.addEventListener("load", function (e) {
       const readerTarget = e.target;
       const img = document.createElement("img");

       img.src = readerTarget.result;
       img.classList.add("feedss__img");

       feedssImage.innerHTML = "";
       feedssImage.appendChild(img);
     });

     reader.readAsDataURL(file);
   } else {
       feedssImage.innerHTML=feedssImageTxt;
   }
 });

 //End feedss Logo

}
previewFile(feedssImage, feedssInput);






