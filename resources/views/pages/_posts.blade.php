 @foreach($posts as $post) 
                    <div class="col-md-6 ">
                        <div class="panel panel-group">
                            <div class="panel-heading">        
                                <div class="hidden">
                                    {{ $user=App\User::where('id', '=', $post['userId'])->select('name','profilePic')->get() }}
                                    {{$dd=Carbon\Carbon::parse($post['publishedOn'])}} 
                                </div>    
                                <div class="row ">
                                    <div class="col-md-8 postsUserName">
                                        <img src="{{ $user[0]['profilePic'] }}" alt=""  class="img-circle" height="45" width="45">                                
                                        {{ $user[0]['name'] }} 
                                    </div>
                                    <div class="text-right" style="">
                                        {{  $dd->format('d, M Y') }}
                                        <img src="/icons/clock5.svg" alt="">
                                        <br>
                                        Kakkanad
                                        <a href="#" style="padding-right:5px;">
                                            <img src="/icons/pin5.svg" alt="">
                                        </a>
                                    </div>
                                </div>   
                            </div>

                            <div class="panel-body postImage">                                
                                <img  src="{{ $post['imageName'] }}"  id="{{ $post['id'] }}" onclick="modalPopup(this.id);"   alt="" 
                                class=" img-responsive myImg "  >
                                 
                            </div>
                            <div class="panel-footer postFooter" style="background-color: white; word-wrap: break-word;">   
                                {{ $post['description'] }}
                                <div style="float:right;">
                                    <a href="#" >
                                        <img src="/icons/liked.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                @endforeach