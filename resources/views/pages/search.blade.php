@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-group">
                <div class="panel-heading" id="recommendedPeopleHeading" style="color:#f02d88; text-align:left;">{{$pageHeading}}</div>
                <div class="panel-body">
                    @if(count($userList)) 
                        <div class="scroll">
                            @foreach($userList as $user) 
                                <div class="left" id="rUser{{ ($user['id']) }}" style="float:left; padding-bottom:20px; ">
                                    <div class="container">
                                        <div class="row" style="width:">
                                            <div class="col-md-1" style="padding-right:0px; width:70px;">
                                                <img src="{{ $user['profilePic'] }}" class="img-circle" alt="" height="50" width="50">                            
                                            </div>                                        
                                            <div class="col-md-3 " style="padding-left:5px; word-wrap: break-word;">
                                                <a href="/profile/{{ ($user['id']) }}" class="userNameSearch">
                                                {{ $user['name'] }}&nbsp{{ $user['lastName'] }}</a>
                                                <br>
                                                <a class="userLocationSearch">
                                                    {{ strtok($user['location'], ',') }}
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                
                                            </div>
                                            <div class="col-md-1 followStatus" id="{{ $user['id'] }}"  >                                                       
                                                @if($user['follow'])  
                                                    <!--<a onclick="unfollow({{ $user['id'] }});" >                                       -->
                                                    <a id="{{ $user['id'] }}" class="unfollow">
                                                        <img src="/icons/followers.svg" title="Stop following {{ $user['name'] }}" style="cursor:pointer;" alt="following">
                                                    </a>
                                                @else
                                                    <!--<a  onclick="follow({{ $user['id'] }});" >  -->
                                                    <a id="{{ $user['id'] }}" class="follow">
                                                        <img src="/icons/follow.svg" style="" title="Follow {{ $user['name'] }}" style="cursor:pointer;" alt="follow">
                                                    </a>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>       
                                <br>
                                
                                <div class="clearfix">
                                    
                                </div> 
                                        <hr id="rUserHR{{ ($user['id']) }}" style="margin:0; margin-bottom:20px;">    
                            @endforeach  
                            {{$userList->setPath('')->links()}}
                        </div>
                    @else
                        No user(s) found.<br> Please refine your search criteria. 
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
    <script src="/js/scroll.js"></script>
    <script src="/js/follow.js"></script>
@endsection