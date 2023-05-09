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

  function toggleDiv(id) {
    var div = document.getElementById(id);
    if (div.style.display === 'none') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
  }

  function swapZIndexes(id1, id2) {
    var div1 = document.getElementById(id1);
    var div2 = document.getElementById(id2);
    var tempZIndex = div1.style.zIndex;
    div1.style.zIndex = div2.style.zIndex;
    div2.style.zIndex = tempZIndex;
  }
