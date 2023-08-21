var files = document.querySelector("input[type=file]").files;
var preview = document.querySelector("#image-preview");

function previewImages() {
    preview.innerHTML = "";

    function readAndPreview(file) {
        for (i of files.files) {
            console.log(i);
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");

            figCap.innerText = i.name;
            figure.appendChild(figCap);

            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            };
            preview.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }

    if (files) {
        [].forEach.call(files, readAndPreview);
    }
}
