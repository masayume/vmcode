/**
 * animation.js contains all code pertaining
 * to animations.

 * @author Kredgons, do not use without permission.
*/

/**
 * Causes the frog machine to bounce when clicked.
 * @param {element} el The frog machine.
 * @return {void}
*/
function onclickBounceAnimation(el) {
  el.classList.remove("bounce");
  el.offsetWidth = el.offsetWidth;
  el.classList.add("bounce");
}

/**
 *
 * @return {void}
*/
function cardAnimation(el) {
  el.classList.remove("slide-card");
  el.offsetWidth = el.offsetWidth;
  el.classList.add("slide-card");
}

function openModalAnimation() {
  el = document.querySelector(".modal-content");
  el.classList.remove("open-modal");
  el.offsetWidth = el.offsetWidth;
  el.classList.add("open-modal");
}

/**
 * Removes the "Click Me"
 * @return {void}
*/
function clickMeCloseAnimation() {
  console.log("called");
  el = document.querySelector(".click-me");
  el.classList.remove("fadeout");
  el.offsetWidth = el.offsetWidth;
  el.classList.add("fadeout");
}
