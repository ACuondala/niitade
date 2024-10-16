const feedInput = document.querySelector("#feedss__input");
const feedImage = document.querySelector(".feedss__image");


function previewFile(feedImage, inputFile) {


     //Company Logo
  const feedImageTxt="Conteúdo";
  feedImage.innerHTML=feedImageTxt;

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

        feedImage.innerHTML = "";
        feedImage.appendChild(img);
      });

      reader.readAsDataURL(file);
    } else {
        feedImage.innerHTML=feedImageTxt;
    }
  });

  //End company Logo
}


previewFile(feedImage, feedInput);

/**End company logo */








