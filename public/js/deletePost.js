$(document).ready(function(){   
    $('body').on('click', '.deletePost', function(event){  
        var option = $(this).attr('data-href');
        var id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this post!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: "GET",
                    url: '/delete/'+id,
                    data: "",
                    success: function(id) {
                        var div = $('#Post'+id);
                        div.fadeOut(500, function(){ 
                            div.remove();
                        });
                        console.log(id);
                        swal("Deleted!", "Your post has been deleted.", "success");
                    }.bind(this, id)
                })                
            } else {
                swal("Cancelled", "Your post is safe :)", "error");
            }
        });
        console.log($(this).attr('data-id'));
    });
});       