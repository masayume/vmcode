/**
 * animation.js contains all code pertaining
 * to the modals.

 * @author Kredgons, do not use without permission.
*/

const allArtists = artists;

/**
 * Opens when user clicks on a card to see its information.
 * @param {integer} frogKey to find the frog with
 * @return {void}
*/
function artistCreditsModal(frogKey) {
  if (!frogKey || frogKey === undefined) return -1;
  openModal();
  buildCardModalBase(getFrog(frogKey));
}

// /**
//  * Opens when a new card is pulled.
//  * @param {Object} frog
//  * @return {void}
// */
// function newCardModal(frog) {
//   let header = document.querySelector('.new-card-header');
//   let text = document.querySelector('.under-image-text');
//
//   header.style.display = "block";
//   text.style.display = "block";
//   header.innerHTML = "NEW FROG ALERT!";
//   text.innerHTML = frog.name + " has been added to your collection."
//
//   openModal();
//   buildCardModalBase(frog);
// }

/**
 * A function for opening the modal.
 * Closing the modal code is also in this function.
 * @return {void}
*/
function openModal() {
  openModalAnimation();

  let modal = document.querySelector(".modal");
  let close = document.getElementsByClassName("close")[0];
  let image = document.querySelector('.frog-image');
  let artist = document.querySelector('.frog-artist');


  modal.style.display = "block";

  close.onclick = function() {
   closeModal();
  }

  window.onclick = function(e) {
   if (e.target == modal) {
     closeModal();
   }
  }
}

/**
 * Opens when user clicks "Support" in "Support our artistCreditsModal".
 * @return {void}
*/
function buildArtistModal() {
  let artistEl = document.querySelector('.list-artists');
  let modal = document.querySelector(".modal-content");
  modal.style.width="80%";

  let link = '';
  for (let artist in allArtists) {
    let link = document.createElement('div');
    link.innerHTML = "<a href='https://twitter.com/"+allArtists[artist]+"' target='_blank'>@" + allArtists[artist] + "</a>"
    artistEl.append(link);
  }
}

/**
 * Builds the base of displaying a card, which is the same
 * for finding a new card and checking a card's information.
 * @param {Object} frog
 * @return {void}
*/
function buildCardModalBase(frog) {
  let image = document.querySelector('.frog-image');
  let artist = document.querySelector('.frog-artist');
  if (frog !== -1) {
    image.innerHTML = "<img src='"+ frog.image +"' alt='Card for " + frog.name + ". Description states, "+ frog.description +"' tabindex='0' / >";
    artist.innerHTML = "<a href='https://twitter.com/"+frog.artist+"' target='_blank'>@" + frog.artist + "</a>";
  } else {
    image.innerHTML = "Card does not exist, whoops!<p>Try again, ribbit.</p>";
  }
}

function closeModal() {
  let modal = document.querySelector(".modal");
  let close = document.getElementsByClassName("close")[0];
  let image = document.querySelector('.frog-image');
  let artist = document.querySelector('.frog-artist');
  let artistEl = document.querySelector('.list-artists');

  modal.style.display = "none";
  document.querySelector('.modal-content').style.width = "";
  image.innerHTML = "";
  artist.innerHTML = "";
  artistEl.innerHTML = "";
}
