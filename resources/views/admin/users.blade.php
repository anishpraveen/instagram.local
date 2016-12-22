@extends('layouts.admin')

@section('content')
    @include('admin._search_result')
@endsection

@section('scripts')

<script>
getUserIni();
   
$("#search").enterKey(function () {
    var search = $('#search').val();
    getUser(search);
})
$(document).ready(function(){   
    $('body').on('click', '#btnSearch', function(event){
        var search = $('#search').val();  
        getUser(search);
    });
    $('body').on('click', '.editRole', function(event){
        var id = $(this).data('id');
        var action = $(this).attr('data-action');
        var td = $(this).parent('.changeRole').get( 0 );
        var save = $(td).find('.editRole');
        // console.log($(this).parent('.changeRole').get( 0 ));
        switch (action) {
            case 'edit':
                $(this).attr('src','/icons/check-symbol.svg');
                $(this).attr('height','20px');
                span = $(td).find('span');
                $(td).append('<img src="/icons/multiply.svg" data-id="cancel'+id+'" height="15px" class="cancel" id="cancel'+id+'" />');
                $(this).attr('data-action','save');
                $(this).attr('title','Save');
                
                span.remove();
                var data = {
                    'admin': 'Admin',
                    'user': 'User'
                }
                var s = $('<select id="change'+id+'" />');
                for(var val in data) {
                    $('<option />', {value: val, text: data[val]}).appendTo(s);
                }
                s.prependTo(td);
                break;
            case 'save':          
                var selected = $(td).find('select');
                var option = $(selected).find(":selected").val();
                if(option=='admin'){   
                    swal({
                        title: "Make "+ $(this).data("name") +" admin?",
                        text: $(this).data("name") +" will recieve admin privilege.",
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
                            toggleRole(save,option); 
                        } else {
                            changeSave(save);
                            swal({title: "Cancelled", text: "",timer: 800, type:"error", showConfirmButton: false});
                        }
                    });
                }
                else{
                    toggleRole(this,option); 
                }
                break;
            default:
                break;
        }
    });
    $('body').on('click', '.cancel', function(event){
         var td = $(this).parent('.changeRole').get( 0 );
         var save = $(td).find('.editRole');
         changeSave(save);
    });
});

function toggleRole(ele,option){
    id = $(ele).attr('data-id');
    if(option == 'admin'){
        title = 'New admin';
    }
    else{
        title = 'Revoked';
    }
    $.ajax({
        type: "POST",
        url: '/admin/toggleRole',
        data: {id:id,option:option},
        beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(response) {
            $(ele).attr('data-roles',option);
            changeSave(ele);
            swal({title: title, text: response,timer: 2000, type: "success", showConfirmButton: false});
        },
        error: function(response) {
            changeSave(ele);
            swal({title: "Error", text: "Error changing role",timer: 1000, type: "error", showConfirmButton: false});
        }
    })  
}

function changeSave(ele){
    var td = $(ele).parent('.changeRole').get( 0 );
    id = $(ele).attr('data-id');
    var selected = $(td).find('select');
    var option = $(ele).attr('data-roles');
    // console.log(option);
    selected.remove();
    $(td).append('<span>'+option+'</span>');
    $(ele).attr('src','/icons/edit.svg');
    $(ele).attr('height','15px');
    $(ele).attr('data-action','edit');
    $(ele).attr('title','Edit');
    
    var cancelImg = $(td).find('#cancel'+id);
    cancelImg.remove();
}
function getUser(search){
    //  if(search.length){
    //      search = '%20';
    //  }
    // console.log(search.length);
    if(search.length===0){
         var search = '%20';
    }
    $('.loader').show();
     $.ajax({
        type: "GET",
        url: '/admin/user/'+search,
        data: "",
        success: function(data) {
            var div = $('#divList');
            div.html(data);
            // div.fadeOut(500, function(){ 
            //     div.remove();
            // });
            $('.loader').hide();
        }
    })          
}

function getUserIni(){
   // $('.loader').show();
     var search = '%20';
     getUser(search)
}

</script>

@endsection