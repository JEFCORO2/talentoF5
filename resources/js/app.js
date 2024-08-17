import 'admin-lte/dist/js/adminlte.min.js';

import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu CV",
    acceptedFiles: ".pdf, .docx",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    //Agregar la imagen a droopzoone si la validacion falla pero tenemos una imagen
    init: function() {
        if(document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {}
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            //fuhnciones de dropzones 
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada,`../img/images/${imagenPublicada.name}`)

            //clase de dropzone
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("sending", function (file, xhr, formData) {
    console.log(formData);
})

dropzone.on("success", function (file, response) {
    console.log(response);
    document.querySelector('[name="imagen"]').value = response.imagen;
})

dropzone.on("error", function (file, message) {
    console.log(message);
})

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = "";
})
