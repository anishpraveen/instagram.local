 @foreach($posts as $post) 
    <div class="col-md-6 col-sm-6 col-xs-12" id="Post{{ $post['id'] }}">
        <div class="panel panel-group posts-group" style="" >
            <div class="panel-heading">        
                <div class="hidden laravelInfo1" id="lInfo">
                    {{ $user=App\User::where('id', '=', $post['userId'])->select('name','profilePic')->get() }}
                    {{$dd=Carbon\Carbon::parse($post['publishedOn'])}} 
                    <button type="" class="lat" ></button>
                </div>    
                <div class="row ">
                    <div class="col-md-8 col-sm-8">
                        <img src="{{ $user[0]['profilePic'] }}" alt=""  class="img-circle" height="45" width="45">                  
                         <a @if(!str_contains(Request::fullUrl(), 'profile'))href="/profile/{{ $post['userId'] }}" style="cursor:pointer;" @endif class="postsUserName " >{{ $user[0]['name'] }}</a>
                    </div>
                    <div class="text-right divPostDetails" id="kkkk" style="">
                        <span id="spanPostTime" style="-moz-padding-top: 10px;padding-right:5px; ">
                            {{  $dd->format('d, M Y') }}&nbsp&nbsp 
                            <img src="/icons/clock5.svg"  alt="">
                        </span>
                        <br>
                        <span style="padding-right:4px; color: #9a9a9a;">
                            {{ strtok($post['locationName'],',') }}&nbsp&nbsp 
                            <a class="btnShow" id="4" style="cursor: pointer; padding-right:5px;" latitude="{{ $post['latitude'] }} " longitude="{{ $post['longitude'] }} ">
                                <img src="/icons/pin5.svg" alt="">
                            </a>
                        </span>                       
                    </div>
                </div>   
            </div>

            <div class="panel-body postImage">                                
                <img  src="/{{ $post['imageName'] }}"  id="{{ $post['id'] }}" onclick="modalPopup(this.id);"   
                        class=" img-responsive myImg " alt="/{{$post['imageName']}}" >
                @if($post['userId'] == Auth::user()->id)
                    <a data-href="/delete/{{ $post['id'] }}" id="deletePost{{ $post['id'] }}" data-id="{{ $post['id'] }}" 
                            style="padding-right:30px;" class="deletePost">
                        <img src="/icons/delete.svg" alt="Delete" height='25px' title="Delete Post">
                    </a>
                    <a href="/edit/{{ $post['id'] }}"><img src="/icons/edit.svg" alt="Edit" title="Edit Post"></a>
                @endif
            </div>
            <div class="panel-footer postFooter container-fluid" style="background-color: white; ">   
                <span class="col-md-10" style="background-color: white;  ">
                    {{ $post['description'] }}
                    </span>
                    <span id="divLikeStatus{{ $post['id'] }}" class="divLikeStatus col-md-1"  style="float:right; padding-right:1vw;">
                        @if($post['like'])  
                            <a id="{{ $post['id'] }}" class="liked">                                       
                                <img src="/icons/liked.svg" alt="liked">
                            </a>
                        @else
                            <a id="{{ $post['id'] }}" class="like">  
                                <img src="/icons/like-heart.svg" alt="like">
                            </a>
                        @endif 
                        
                    </span>
                
                
                
            </div>
        </div>
    </div>    
@endforeach