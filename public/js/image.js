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

function editProfilePic(input){
    previewFile(input);
    //$('#imgAddAvatar').addClass("hidden");
    // $("#dialog").dialog({          
    //         modal: true,            
    //         width: 600,
    //         height:  380,            
    //         open: function () {
    //             $('#avatar').cropper({
    //                 aspectRatio: 16 / 9,
    //                 modal: true,
    //                 crop: function(e) {
    //                     // Output the result data for cropping image.
    //                     console.log(e.x);
    //                     console.log(e.y);
    //                     // console.log(e.width);
    //                     // console.log(e.height);
    //                     // console.log(e.rotate);
    //                     // console.log(e.scaleX);
    //                     // console.log(e.scaleY);
                        
    //                 }
    //             });
    //          }
    //     });
    
}