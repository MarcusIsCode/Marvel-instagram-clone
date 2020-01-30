const updateAccount = document.querySelector(".updateAccount");
const confirmBox = document.querySelector(".confirm");
const close = document.querySelector(".closeBtn");

function showMyImage(fileInput) {
  var files = fileInput.files;
  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    var imageType = /image.*/;
    if (!file.type.match(imageType)) {
      continue;
    }
    var img = document.getElementById("thumbnil");
    img.file = file;
    var reader = new FileReader();
    reader.onload = (function(aImg) {
      return function(e) {
        aImg.src = e.target.result;
      };
    })(img);
    reader.readAsDataURL(file);
  }
}

if (updateAccount !== null) {
  updateAccount.addEventListener("click", () => {
    confirmBox.classList.remove("hide");
  });

  close.addEventListener("click", () => {
    confirmBox.classList.add("hide");
  });
}

//Added eventlistener to update feed everytime you press home-button.
const homeButton = document.querySelector("#home");

if (typeof homeButton != "undefined" && homeButton != null) {
  homeButton.addEventListener("click", () => {
    fetch("app/Get/getData.php");
  });
}
