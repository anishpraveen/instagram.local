@extends('layouts.admin')

@section('content')
    @include('admin._search_result')
@endsection

@section('scripts')

<script>
getPostIni();
   
$("#search").enterKey(function () {
    var search = $('#search').val();
    getPost(search);
})
$(document).ready(function(){   
    $('body').on('click', '#btnSearch', function(event){
        var search = $('#search').val();  
        getPost(search);
    });
});
function getPost(search){
    
    if(search.length===0){
        //  var search = '%20';
    }
    $('.loader').show();
    search = (btoa(search));
     $.ajax({
        type: "GET",
        url: '/admin/post/'+search,
        data: "",
        success: function(data) {
            var div = $('#divList');
            div.html(data);
            $('.loader').hide();
        }
    })          
}

function getPostIni(){
   // $('.loader').show();
     var search = ' ';
     getPost(search)
}

</script>

@endsection