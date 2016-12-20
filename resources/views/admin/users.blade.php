@extends('layouts.admin')
@section('content')
<style >
   
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-7 form-group">
            <div class="input-group">
                <input class="form-control" id="search" 
                    placeholder="Filter User"
                    type="text">

                <div class="input-group-btn">
                    <button id="btnSearch" type="button" class="btn btn-default"><i
                                class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </div>  
        
        
        <div id="divUsersList">                
            <!--include('admin._user_list')            -->
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script src="/js/admin.js"></script>
<script>
getUserIni();
    $.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}
$("#search").enterKey(function () {
    var search = $('#search').val();
    getUser(search);
})
$(document).ready(function(){   
    $('body').on('click', '#btnSearch', function(event){
        var search = $('#search').val();  
        getUser(search);
    });
});
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
            var div = $('#divUsersList');
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
<script>
    
</script>
@endsection