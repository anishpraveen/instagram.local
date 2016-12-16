$(document).ready(function(){            
   $('body').on('click', 'div.blockStatus', function(){                
        var id = this.id; 
        var name = $(this).data("name");
        var img = $( this ).find( "img" );
        var url = [ location.pathname].join('');        
        if($(this).data("block")=='block'){   
            swal({
                title: "Are you sure?",
                text: "Mail will be send to the "+ $(this).data("name") +".",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, send it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
                },
                function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: '/user/block',
                        data: {id:id},
                        beforeSend: function (request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                        },
                        success: function(response) {
                            $('#'+id).data("block",'blocked');
                            $('#'+id).removeClass( "block" );
                            $('#'+id).addClass( "blocked" );
                            $('#'+id).html('<img src="/icons/padlock.svg" height="20px" alt="">');
                            console.log('blocked');
                            swal({title: "Blocked!", text: "Mail has been send.",timer: 1000, type: "success", showConfirmButton: false});
                        },
                        error: function(response) {
                            console.log('error in blocking user');
                        }
                    })               
                } else {
                    swal({title: "Cancelled", text: "",timer: 800, type:"error", showConfirmButton: false});
                }
            });
            
        }

        else if($(this).data("block")=='blocked'){
            $.ajax({
                 type: "POST",
                url: '/user/unblock',
                data: {id:id},
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                },
                success: function(response) {
                    $('#'+id).data("block",'block');                    
                    $('#'+id).removeClass( "blocked" );
                    $('#'+id).addClass( "block" );
                    $('#'+id).html('<img src="/icons/padlock-unlock.svg" height="20px" alt="">');                    
                    console.log('unblocked');
                    swal({title: "Account unlocked!", text: "Mail has been send.",timer: 1000, type: "success", showConfirmButton: false});                    
                }
            })
        }
        
    });

    $('body').on('click', 'div.deleteUser', function(){                
        var id = $(this).data("id"); console.log(id);
        var name = $(this).data("name");
        var img = $( this ).find( "img" );
        var url = [ location.pathname].join('');        
        
        swal({
            title: "Are you sure?",
            text: "Mail will be send to the "+ $(this).data("name") +".",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, send it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
            },
            function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: '/user/delete',
                    data: {id:id},
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response) {
                        // $('#'+id).data("block",'blocked');
                        $('#user'+id).remove();
                        // $('#'+id).addClass( "blocked" );
                        // $('#'+id).html('<img src="/icons/padlock.svg" height="20px" alt="">');
                        console.log('Deleted');
                        swal({title: "Deleted!", text: "Mail has been send.",timer: 1000, type: "success", showConfirmButton: false});
                    },
                    error: function(response) {
                        console.log('error in deleting user');
                    }
                })               
            } else {
                swal({title: "Cancelled", text: "",timer: 800, type:"error", showConfirmButton: false});
            }
        });
            
       
        
    });

});