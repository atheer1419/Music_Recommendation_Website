

var placeHolderArray = ["Enter The Song Title","Enter The Artist Name","Enter The Album Name","Enter Song Link (Youtube, Apple Music ...etc)",""];
var h;

function init(){
    h = document.getElementById("hint");
    regListener(document.getElementById("songName"), 0);
    regListener(document.getElementById("artistName"), 1);
    regListener(document.getElementById("albumName"), 2);
    regListener(document.getElementById("songLink"), 3);


}

function regListener(object ,messageNumber){

    object.addEventListener('focus', function(){h.innerHTML = placeHolderArray[messageNumber]; }, false);
    object.addEventListener('blur', function(){h.innerHTML = placeHolderArray[4]; }, false);


}

window.addEventListener('load', init, false);
// ##########################################################################################





function backgroundColor_focus(x) {
    x.style.background = "white";
    x.style.color = "black";

  

  }

  function backgroundColor_blur(x) {
    x.style.background = "transparent";
    x.style.color = "white";

  }

  function dropDownLists(x) {
    x.style.background = "white";
    x.style.color = "black";
  }



function confirm_reset() {
    return confirm("Are you sure you want to reset all text?");
}

function confirm_submit() {
    return    confirm("Are you sure you want to recommend this song?");

}

function hoverTextbox(x) {
    x.style.background = "white";
    x.style.color = "black";


  }
  
  function unHoverTextbox(x) {
    x.style.background = "transparent";
    x.style.color = "white";


  }