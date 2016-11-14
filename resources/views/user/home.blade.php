@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">        
         <!--    Posts    -->
         <div class="col-md-9 ">            
            <div class="row" id="divPosts">                 
                <!-- Previous Posts -->
               
                @if(!is_null($posts))
                    <div class="scroll">
                        @include('pages._posts')
                        {{$posts->setPath('home')->links()}}
                    </div>
                @else
                     <div class="col-md-6 ">
                            <div class="panel panel-group">
                                <div class="panel-heading postsUserName">                                         
                                    Follow some one 
                                </div>

                                <div class="panel-body postImage">                                
                                    
                                </div>
                                <div class="panel-footer" style="background-color: white; word-wrap: break-word;">   
                                   
                                </div>
                            </div>
                        </div>
                @endif
                
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <span class="close">×</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                </div>

                
            </div>            
        </div>

         <!-- Recommended List -->
        <div class="col-md-3 ">
            <div class="panel panel-group">
                <div class="panel-heading" id="recommendedPeopleHeading" style="color:#f02d88; text-align:left;">Recommended Peoples</div>

                <div class="panel-body">
                    @if(empty($userList)||!is_null($userList)) 
                        @foreach($userList as $user) 
                            <div class="left" style="float:left; padding-bottom:20px;">
                                <div class="container-fluid">
                                    <div class="row" style="width:200px;">
                                        <div class="col-md-4 col-xs-4" >
                                            <img src="{{ $user['profilePic'] }}" class="img-circle" alt="" height="50" width="50">                            
                                        </div>                                        
                                        <div class="col-md-5 col-xs-5" style="padding-left:5px; word-wrap: break-word;">
                                            {{ $user['name'] }}
                                            <br>
                                            {{ $user['location'] }}
                                        </div>
                                        <div class="col-md-1">                                                    
                                        </div>
                                        <div class="col-md-3  col-xs-3 " id="{{ $user['id'] }}"  style="float:right;">                                                       
                                            @if($user['follow'])  
                                                <a onclick="unfollow({{ $user['id'] }});" >                                       
                                                    <img src="/icons/followers.svg" style="float:right;" alt="following">
                                                </a>
                                            @else
                                                <a  onclick="follow({{ $user['id'] }});" >  
                                                    <img src="/icons/follow.svg" style="float:right;" alt="follow">
                                                </a>
                                            @endif                                                
                                        </div>
                                    </div>
                                </div>
                            </div>       
                            <br>
                            <div class="clearfix">
                            </div>                 
                        @endforeach  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
 <!-- The Map Modal -->
<div id="dialog" style="display: none">
    <div id="dvMap" style="height: 315px; width: 580px;">
    </div>
</div>
 
<script  src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDl4z35oKtxgRRzT9S-Bc4hk8YZ6gBna-U&sensor=false&extension=.js&output=embed"></script>
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$(function () {
    $(".btnShow").click(function () {
        var info = document.getElementById('lInfo');

        //alert($( this ).attr('latitude'));
        //alert($( this ).attr('longitude'));
       var mapMarker = new google.maps.LatLng($( this ).attr('latitude'), $( this ).attr('longitude'));
        $("#dialog").dialog({
          
            modal: true,
            
            width: 600,
            height:  380,
            
            open: function () {
                
                var mapOptions = {
                    center: mapMarker,
                    zoom: 17,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                }
                var map = new google.maps.Map($("#dvMap")[0], mapOptions);
                 var marker = new google.maps.Marker({
                        position: mapMarker,
                        icon: "/icons/mapPin.svg",
                        //animation: google.maps.Animation.BOUNCE
                    });
                    marker.setMap(map);
            }
        });
    });
});
</script>
<!-- /.modal -->
    <script src="/js/modal.js"></script>
   


 

    <script>
        function follow($id){        
            $.ajax({
                type: "GET",
                url: '/follow/'+$id,
                data: "",
                success: function(response) {
                    $html = '<a onclick="unfollow('+$id+')" ><img src="/icons/followers.svg" style="float:right;" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;                
                    $.ajax({
                        type: "GET",
                        url: '/posts',
                        data: "",
                        success: function(response) {                
                            //document.getElementById('divPosts').innerHTML = response;        
                            window.location.replace("");               
                        }
                    })
                }
            })
        }

        function unfollow($id){
            $.ajax({
                type: "GET",
                url: '/follow/'+$id+'/unfollow',
                data: "",
                success: function(response) {
                    
                    $html = '<a  onclick="follow('+$id+');" ><img src="/icons/follow.svg" style="float:right;" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;
                    $.ajax({
                        type: "GET",
                        url: '/posts',
                        data: "",
                        success: function(response) {
                            //document.getElementById('divPosts').innerHTML = response;
                            window.location.replace("");        
                        }
                    })
                }
            })
        }
    </script>

    <script src="/js/likePost.js"></script>

    @if(!is_null($posts) && !empty($posts) && isset($posts))       
        <script src="/js/scroll.js"></script>
    @endif
@endsection