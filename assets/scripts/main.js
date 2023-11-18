console.log( 'read JS' );

//ハンバーガーメニュー
window.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".js-hamburger").addEventListener("click", () => {
    document.querySelector("body").classList.toggle("is-open");
    document.querySelector(".p-nav").classList.toggle("is-open");
    document.querySelector(".p-nav__body").classList.toggle("is-open");
    document.querySelector(".p-nav__button").classList.toggle("is-open");
    document.querySelector(".c-button-square").classList.toggle("is-open");
    document.querySelector('.header-logo').classList.toggle('is-open');
  });
});

