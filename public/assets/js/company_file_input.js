const companyInput = document.querySelector("#company__input");
const companyImage = document.querySelector(".company__image");


function previewFile(companyImage, inputFile) {


     //Company Logo
  const companyImageTxt="Logotipo";
  companyImage.innerHTML=companyImageTxt;

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
        img.classList.add("company__img");

        companyImage.innerHTML = "";
        companyImage.appendChild(img);
      });

      reader.readAsDataURL(file);
    } else {
        companyImage.innerHTML=companyImageTxt;
    }
  });

  //End company Logo
}


previewFile(companyImage, companyInput);

/**End company logo */

/**hide fields */
$(".file").hide("slow");
    //$(".otherFile").hide("slow");
    $("#naturezaNegocio").on('change', function() {
        var tipoNegocio = $(this).val();
        if (tipoNegocio == 1) {
            $(".file").show("slow");
            //$(".otherFile").show("slow");

        } else {
            $(".file").hide("slow");
            //$(".otherFile").hide("slow");
        }
});
/**End Hide Fields */

/** Documents */
var alvaraInput = document.getElementById('alvara_input');
var alvaraImage = document.getElementById('alvara_name');

var diarioInput = document.getElementById('diario_input');
var diarioImage = document.getElementById('diario_name');

var nifInput = document.getElementById('nif_input');
var nifImage = document.getElementById('nif_name');

var certidaoInput = document.getElementById('certidao_input');
var certidaoImage = document.getElementById('certidao_name');

//var outroInput = document.getElementById('outro_input');
//var outroImage = document.getElementById('outro_name');

 function file(alvaraImage, alvaraInput,diarioInput,diarioImage,nifInput,nifImage,certidaoInput,certidaoImage, outroInput, outroImage, fotoCapa, inputFile){
    const alvaraTxt = "Alvára";
    alvaraImage.innerHTML = alvaraTxt;

    const diarioTxt = "Diário da república";
    diarioImage.innerHTML = diarioTxt;

    const nifTxt = "NIF";
    nifImage.innerHTML = nifTxt;

    const certidaoTxt = "Certidão";
    certidaoImage.innerHTML = certidaoTxt;

    //const otherFilesTxt = "Outros";
    //outroImage.innerHTML= otherFilesTxt;

    /*const fotoCapaTxt = "Foto de capa";
    fotoCapa.innerHTML= fotoCapaTxt;

    const otherFileTxt = "Outras Imagens";
    otherFile.innerHTML= otherFileTxt;*/


    alvaraInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        alvaraImage.innerHTML = files.join('<br/>');
    }

    diarioInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        diarioImage.innerHTML = files.join('<br/>');
    }

    nifInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        nifImage.innerHTML = files.join('<br/>');
    }

    certidaoInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        certidaoImage.innerHTML = files.join('<br/>');
    }

    /*outroInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        outroImage.innerHTML = files.join('<br/>');
    }*/

 }
 file(alvaraImage,alvaraInput,diarioInput,diarioImage,nifInput,nifImage,certidaoInput,certidaoImage,)
 //file(alvaraImage,alvaraInput,diarioInput,diarioImage,nifInput,nifImage,certidaoInput,certidaoImage, outroInput, outroImage,)




/**End Documents */


$(".products").hide("slow");
$(".link").on('change', function() {
    var link = $(this).val();
    if (link == 2) {
        $(".products").show("slow");


    } else {
        $(".products").hide("slow");

    }
});

$(".choose").hide("slow");
$(".public").on('change', function() {
    var public = $(this).val();
    if (public == 1) {
        $(".choose").show("slow");


    } else {
        $(".choose").hide("slow");

    }
});
