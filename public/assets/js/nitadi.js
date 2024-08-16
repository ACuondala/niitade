const btnOpenMenu = document.querySelector(".open__menu");
const closeMenu = document.querySelector(".btn__close");
const menuMobile = document.querySelector(".menu-mobile");

[btnOpenMenu, closeMenu].forEach((btn, index) => {
  btn.addEventListener("click", e => {
    index === 0
      ? menuMobile.classList.add("active")
      : menuMobile.classList.remove("active");
  });
});





// DROPDOWN
const btnDropDown = document.querySelector('#btnDropdown')
const dropDown = document.querySelector('#dropdwn-mobile')

// [(btnOpenMenu, closeMenu)].forEach((btn, index) => {
//   btn.addEventListener('click', (e) => {
//     index === 0
//       ? menuMobile.classList.add('active')
//       : menuMobile.classList.remove('active')
//   })
// })

btnDropDown.addEventListener('click', (e) => {
  dropDown.classList.toggle('active')
})
