const images = [
    { src: "/demon/mersenne/mabius/mabius_O_RW_1_034.png", width: 512, height: 512 },
    { src: "/demon/mersenne/mabius/mabius_O_LW_1_034.png", width: 512, height: 512 },
    { src: "/demon/mersenne/mabius/mabius_O_BO_1_0271.png", width: 512, height: 512 }
  ];
  
  const overlay = document.getElementById("overlay");
  
  images.forEach(image => {
    const img = document.createElement("img");
    img.src = image.src;
    img.width = image.width;
    img.height = image.height;
    img.addEventListener("click", () => {
      overlay.innerHTML = ""; // clear previous content
      const controls = document.createElement("div");
      // create individual controls for image attributes
      const widthInput = document.createElement("input");
      widthInput.type = "range";
      widthInput.min = 100;
      widthInput.max = 1000;
      widthInput.value = image.width;
      widthInput.addEventListener("input", () => {
        img.width = widthInput.value;
      });
      const heightInput = document.createElement("input");
      heightInput.type = "range";
      heightInput.min = 100;
      heightInput.max = 1000;
      heightInput.value = image.height;
      heightInput.addEventListener("input", () => {
        img.height = heightInput.value;
      });
      controls.appendChild(widthInput);
      controls.appendChild(heightInput);
      // add image and controls to overlay
      overlay.appendChild(img);
      overlay.appendChild(controls);
      overlay.style.display = "flex"; // show overlay
    });
  });