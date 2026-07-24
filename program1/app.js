let images = ["./bat.jpg", "./bat1.jpg", "./bat3.jpg"];

let index = 0;

let slideshowImage = document.getElementById("slideshow_image");

function changeImage() {
  index++;

  if (index >= images.length) {
    index = 0;
  }

  slideshowImage.src = images[index];
}

setInterval(changeImage, 3000);


