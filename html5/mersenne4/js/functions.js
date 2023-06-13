function reloadImage(id) {
    var img = document.getElementById(id);
    img.src = img.src + '?' + new Date().getTime(); // add timestamp to force reload
  }
  
  function changeSize(id, scale) {
    var img = document.getElementById(id);
    img.style.transform = 'scale(' + scale + ')';
  }
  
  function changeColor(id, filter) {
    var img = document.getElementById(id);
    img.style.filter = filter;
  }

  function toggleDiv(id, tid) {
    var div = document.getElementById(id);
    if (div.style.display === 'none') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
    var toggle = document.getElementById(tid);
    if (toggle.classList.contains("fa-toggle-on")) {
        toggle.classList.remove("fa-toggle-on");
        toggle.classList.add("fa-toggle-off");
    } else {
        toggle.classList.remove("fa-toggle-off");
        toggle.classList.add("fa-toggle-on");
    }
  }

  function swapZIndexes(id1, id2) {
    var div1 = document.getElementById(id1);
    var div2 = document.getElementById(id2);
    var tempZIndex = div1.style.zIndex;
    div1.style.zIndex = div2.style.zIndex;
    div2.style.zIndex = tempZIndex;
  }

  function moveUp(id) {
    var div = document.getElementById(id);
    var currentPosition = parseInt(div.style.top) || 0;
    var newPosition = currentPosition - 2;
    div.style.top = newPosition + "px";
  }

  function moveDown(id) {
    var div = document.getElementById(id);
    var currentPosition = parseInt(div.style.top) || 0;
    var newPosition = currentPosition + 2;
    div.style.top = newPosition + "px";
  }

  function moveLeft(id) {
    var div = document.getElementById(id);
    var currentPosition = parseInt(div.style.left) || 0;
    var newPosition = currentPosition - 2;
    div.style.left = newPosition + "px";
  }

  function moveRight(id) {
    var div = document.getElementById(id);
    var currentPosition = parseInt(div.style.left) || 0;
    var newPosition = currentPosition + 2;
    div.style.left = newPosition + "px";
  }

  function decreaseOpacity(id) {
    var div = document.getElementById(id);
    var currentOpacity = parseFloat(div.style.opacity) || 1.0;
    var newOpacity = currentOpacity - 0.1;
    div.style.opacity = newOpacity;
  }

  function increaseOpacity(id) {
    var div = document.getElementById(id);
    var currentOpacity = parseFloat(div.style.opacity) || 1.0;
    var newOpacity = currentOpacity + 0.1;
    div.style.opacity = newOpacity;
  }

  function showMessage(message) {
    var textarea = document.getElementById("messages");
    textarea.value = "";
    textarea.value = message;
  }

  function selectStringOnClick(id) {
    var element = document.getElementById(id);

    element.addEventListener('click', function() {
      var startIndex = element.value.lastIndexOf(' ') + 1;
      var endIndex = element.value.indexOf(' ', startIndex);

      if (endIndex === -1) {
        endIndex = element.value.length;
      }

      element.setSelectionRange(startIndex, endIndex);
    });

  }
