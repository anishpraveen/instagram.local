@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-group">
                <div class="panel-heading" id="recommendedPeopleHeading" style="color:#f02d88; text-align:left;">Search Results</div>
                <div class="panel-body">
                    @if(empty($userList)||!is_null($userList)) 
                        @foreach($userList as $user) 
                            <div class="left" style="float:left; padding-bottom:20px; ">
                                <div class="container">
                                    <div class="row" style="width:">
                                        <div class="col-md-1" style="padding-right:0px; width:70px;">
                                            <img src="{{ $user['profilePic'] }}" class="img-circle" alt="" height="50" width="50">                            
                                        </div>                                        
                                        <div class="col-md-3 " style="padding-left:5px; word-wrap: break-word;">
                                            <a href="/profile/{{ $user['id'] }}" class="userNameSearch">
                                            {{ $user['name'] }}&nbsp{{ $user['lastName'] }}</a>
                                            <br>
                                            <a class="userLocationSearch">
                                                {{ strtok($user['location'], ',') }}
                                            </a>
                                        </div>
                                        <div class="col-md-7">
                                            
                                        </div>
                                        <div class="col-md-1  " id="{{ $user['id'] }}"  >                                                       
                                            @if($user['follow'])  
                                                <a onclick="unfollow({{ $user['id'] }});" >                                       
                                                    <img src="/icons/followers.svg" title="Stop following" style="cursor:pointer;" alt="following">
                                                </a>
                                            @else
                                                <a  onclick="follow({{ $user['id'] }});" title="Follow me" style="cursor:pointer;">  
                                                    <img src="/icons/follow.svg" style="" alt="follow">
                                                </a>
                                            @endif                                                
                                        </div>
                                    </div>
                                </div>
                            </div>       
                            <br>
                             
                            <div class="clearfix">
                                
                            </div> 
                                      <hr style="margin:0; margin-bottom:20px;">    
                        @endforeach  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function follow($id){   
            $.ajax({
                type: "GET",
                url: '/follow/'+$id,
                data: "",
                success: function(response) {
                    $html = '<a onclick="unfollow('+$id+')" title="Stop following" ><img src="/icons/followers.svg" class="pointer" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;       
                }
            });
        }

        function unfollow($id){
            $.ajax({
                type: "GET",
                url: '/follow/'+$id+'/unfollow',
                data: "",
                success: function(response) {                    
                    $html = '<a  onclick="follow('+$id+');" title="Follow me"><img src="/icons/follow.svg" class="pointer" alt=""></a>'   
                    document.getElementById($id).innerHTML = $html;                    
                }
            })
        }
    </script>
@endsection