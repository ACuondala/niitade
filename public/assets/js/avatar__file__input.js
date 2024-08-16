/*
const inputFilePublicitarFeed = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");

// Empresa
const inputFileLogoEmpresa = document.querySelector("#add__logo");
const LogoPreview = document.querySelector(".logo__preview");

// AVATAR PARA ALTERAR FOTO DO PERFIL

function previewFilePhoto(pictureImage, inputFile) {
  const pictureImageTxt = "Foto";
  pictureImage.innerHTML = pictureImageTxt;

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
        img.classList.add("picture__img");

        pictureImage.innerHTML = "";
        pictureImage.appendChild(img);
      });

      reader.readAsDataURL(file);
    } else {
      pictureImage.innerHTML = pictureImageTxt;
    }
  });
}

previewFilePhoto(pictureImage, inputFilePublicitarFeed);
previewFilePhoto(LogoPreview, inputFileLogoEmpresa);*/
