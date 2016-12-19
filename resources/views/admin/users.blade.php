@extends('layouts.admin')
@section('content')
<style >
    body {
    margin: 0;
    }
    .loader {
    position: absolute;
    top: 50%;
    left: 40%;
    margin-left: 10%;
    transform: translate3d(-50%, -50%, 0);
    display: none;
    }
    .dot {
    width: 24px;
    height: 24px;
    background: #3ac;
    border-radius: 100%;
    display: inline-block;
    animation: slide 1s infinite;
    }
    .dot:nth-child(1) {
    animation-delay: 0.1s;
    background: #32aacc;
    }
    .dot:nth-child(2) {
    animation-delay: 0.2s;
    background: #64aacc;
    }
    .dot:nth-child(3) {
    animation-delay: 0.3s;
    background: #96aacc;
    }
    .dot:nth-child(4) {
    animation-delay: 0.4s;
    background: #c8aacc;
    }
    .dot:nth-child(5) {
    animation-delay: 0.5s;
    background: #faaacc;
    }
    @-moz-keyframes slide {
    0% {
        transform: scale(1);
    }
    50% {
        opacity: 0.3;
        transform: scale(2);
    }
    100% {
        transform: scale(1);
    }
    }
    @-webkit-keyframes slide {
    0% {
        transform: scale(1);
    }
    50% {
        opacity: 0.3;
        transform: scale(2);
    }
    100% {
        transform: scale(1);
    }
    }
    @-o-keyframes slide {
    0% {
        transform: scale(1);
    }
    50% {
        opacity: 0.3;
        transform: scale(2);
    }
    100% {
        transform: scale(1);
    }
    }
    @keyframes slide {
    0% {
        transform: scale(1);
    }
    50% {
        opacity: 0.3;
        transform: scale(2);
    }
    100% {
        transform: scale(1);
    }
    }
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
        
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
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
    //  }console.log(search);
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
     var search = '%20';getUser(search)
}

</script>
<script>
    
</script>
@endsection