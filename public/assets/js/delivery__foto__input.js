const deliveryInput = document.querySelector("#delivery__input");
const deliveryImage = document.querySelector(".delivery__image");


function previewFile(deliveryImage, inputFile) {


     //delivery foto
  const deliveryImageTxt="Foto";
  deliveryImage.innerHTML=deliveryImageTxt;

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

        deliveryImage.innerHTML = "";
        deliveryImage.appendChild(img);
      });

      reader.readAsDataURL(file);
    } else {
        deliveryImage.innerHTML=deliveryImageTxt;
    }
  });

  //End company Logo
}

previewFile(deliveryImage, deliveryInput);

$(".kindVehicle").on('change', function() {
    var kind = $(this).val();
    console.log(kind);
    $.ajax({
        type: "get",
        url: "/getMarca",
        data: {
            'kind': kind
        },
        dataType: "json",
        success: function(response) {
            $('.marca').html("");
            $.each(response.marcas, function(key, value) {
                $('.marca').append('<option value=" ' + value.id +
                    ' ">' + value.marca + '</option>');
            });
        }
    });
});

$(".marca").on('change', function() {
    var marca = $(this).val();
    console.log(marca);
    $.ajax({
        type: "get",
        url: "/getModelo",
        data: {
            'marca': marca
        },
        dataType: "json",
        success: function(response) {
            $('.modelo').html("");
            $.each(response.modelos, function(key, value) {
                $('.modelo').append('<option value=" ' + value.id +
                    ' ">' + value.modelo + '</option>');
            });
        }
    });
});
