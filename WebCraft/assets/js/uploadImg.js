
    document.addEventListener('DOMContentLoaded', function () {
        var uploadButton = document.querySelector('.uploadButton');
        var uploadImage = document.querySelector('.uploadImage');

        uploadButton.addEventListener('change', function (event) {
           
            if (event.target.files.length > 0) {
                var selectedImage = event.target.files[0];
                var imageURL = URL.createObjectURL(selectedImage);

                uploadImage.src = imageURL;
            } else {
                uploadImage.src = '../assets/img/img_placeholder.jpg';
            }
        });
    });