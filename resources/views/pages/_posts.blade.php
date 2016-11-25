 @foreach($posts as $post) 
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-group" style="border-width:0;" >
            <div class="panel-heading">        
                <div class="hidden laravelInfo1" id="lInfo">
                    {{ $user=App\User::where('id', '=', $post['userId'])->select('name','profilePic')->get() }}
                    {{$dd=Carbon\Carbon::parse($post['publishedOn'])}} 
                    <button type="" class="lat" ></button>
                </div>    
                <div class="row ">
                    <div class="col-md-8 col-sm-8">
                        <img src="{{ $user[0]['profilePic'] }}" alt=""  class="img-circle" height="45" width="45">                                
                         <a href="/profile/{{ $post['userId'] }}" class="postsUserName " >{{ $user[0]['name'] }}</a>
                    </div>
                    <div class="text-right divPostDetails" id="kkkk" style="">
                        <span id="spanPostTime" style="-moz-padding-top: 10px;padding-right:5px; ">
                            {{  $dd->format('d, M Y') }}&nbsp&nbsp
                            <img src="/icons/clock5.svg"  alt="">
                        </span>
                        <br>
                        <span style="padding-right:4px; color: #9a9a9a;">
                            {{ $post['locationName'] }}&nbsp&nbsp 
                            <a class="btnShow" id="4" style="cursor: pointer; padding-right:5px;" latitude="{{ $post['latitude'] }} " longitude="{{ $post['longitude'] }} ">
                                <img src="/icons/pin5.svg" alt="">
                            </a>
                        </span>
                        <!--
                        <a href="#myMapModal" class="launch-map" data-toggle="modal"  style="padding-right:5px;">
                            <img src="/icons/pin5.svg" alt="">
                        </a>-->
                    </div>
                </div>   
            </div>

            <div class="panel-body postImage">                                
                <img  src="/{{ $post['imageName'] }}"  id="{{ $post['id'] }}" onclick="modalPopup(this.id);"   alt="" 
                class=" img-responsive myImg "  >
                    
            </div>
            <div class="panel-footer postFooter" style="background-color: white; word-wrap: break-word;">   
                {{ $post['description'] }}
                <div id="divLikeStatus{{ $post['id'] }}" class="divLikeStatus"  style="float:right;">
                    @if($post['like'])  
                        <a id="{{ $post['id'] }}" class="liked">                                       
                            <img src="/icons/liked.svg" alt="liked">
                        </a>
                    @else
                        <a id="{{ $post['id'] }}" class="like">  
                            <img src="/icons/like-heart.svg" alt="like">
                        </a>
                    @endif 
                    
                </div>
            </div>
        </div>
    </div>    
@endforeach