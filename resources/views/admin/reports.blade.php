@extends('layouts.admin')

@section('content')
    @include('admin._search_result')
@endsection

@section('scripts')

<script>
getReportIni();
   
$("#search").enterKey(function () {
    var search = $('#search').val();
    getUser(search);
})
$(document).ready(function(){   
    $('body').on('click', '#btnSearch', function(event){
        var search = $('#search').val();  
        getReport(search);
    });    
});


function getReport(search){
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
        url: '/admin/report/'+search,
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

function getReportIni(){
   // $('.loader').show();
     var search = '%20';
     getReport(search)
}

</script>

@endsection