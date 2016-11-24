function previewFile(input) {
        
        var preview = document.querySelector('img.imgCircle'); //selects the query named img
        var file = document.querySelector('input[type=file]').files[0]; 
        var reader = new FileReader();
        reader.onloadend = function () {
            preview.src = reader.result;
            
        }

        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
           
        } else {
            preview.src = "/icons/Avatar.svg";
            
        }
    }

//previewFile();  //calls the function named previewFile()

