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
const btnDropDown = document.querySelector('#btnDropdown');
const dropDown = document.querySelector('#dropdwn-mobile');

// [(btnOpenMenu, closeMenu)].forEach((btn, index) => {
//   btn.addEventListener('click', (e) => {
//     index === 0
//       ? menuMobile.classList.add('active')
//       : menuMobile.classList.remove('active')
//   })
// })

btnDropDown.addEventListener('click', (e) => {
  dropDown.classList.toggle('active')
});


// DROPDOWN perfil
/*
const btnDropDownp = document.querySelector('.mobile__dropdown__nitadi')
const dropDownp = document.querySelector('.dropdown-content__nitadi')

btnDropDownp.addEventListener('click', (e) => {
  dropDownp.classList.toggle('active')
})*/



const readMoreLinks = document.querySelectorAll('.read-more-link');

readMoreLinks.forEach(function (link) {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const content = this.previousElementSibling;

        if (content.classList.contains('expanded')) {
            content.classList.remove('expanded');
            content.style.height = '4.5em';
            this.textContent = 'Ver mais';
        } else {
            content.classList.add('expanded');
            content.style.height = 'auto';
            this.textContent = 'Ver menos';
        }
    });
});


