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
        reader.onload = (function (aImg) {
            return function (e) {
                aImg.src = e.target.result;
            };
        })(img);
        reader.readAsDataURL(file);
    }
}

/* const navigate =document.querySelectorAll('.navigate');
const nav = Array.apply(null, navigate);
const profile = document.querySelector('.profile'); */
/* console.log(profile);

const openWindow = (event) => {
    let click = event.target;
    if(click === nav[0]){
       profile.classList.remove('hide');
    }
}
for (let i = 0; i < nav.length; i++) {
    
    nav[i].addEventListener('click',openWindow);
    
} */

