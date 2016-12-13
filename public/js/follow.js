
/*
 * Follow or unfollow a user by clicking div #divFollow
 * #divFollow contains button and span
 * 
 * Depending on button id the ajax is run
 */
$(document).ready(function(){            
   $('body').on('click', '#divFollow', function(){                
        var id = this.id;
        var button = $( this ).find( "button" );
        var span = $( this ).find( "span" );
        var userId = span.attr("id");
        if(button.attr("id")=='btnFollowMe'){            
            $.ajax({
                type: "GET",
                url: '/follow/'+userId,
                data: "",
                success: function(response) {
                    //alert('following');
                    //console.log(response);
                    button.attr("id",'btnFollowing');
                    span.text('Following');
                    var fcount = $('body').find('#spanFollowerCount').text();
                    var res = fcount.split(" F");
                    $('body').find('#spanFollowerCount').text(parseInt(res[0])+1+' Followers');
                }
            })
        }

        else if(button.attr("id")=='btnFollowing'){
            $.ajax({
                type: "GET",
                url: '/follow/'+userId+'/unfollow',
                data: "",
                success: function(response) {
                    //alert('unfollowed');
                    //console.log(response);
                    button.attr("id",'btnFollowMe');
                    span.text('Follow Me');
                    var fcount = $('body').find('#spanFollowerCount').text();
                    var res = fcount.split(" F");
                    $('body').find('#spanFollowerCount').text(parseInt(res[0])-1+' Followers');
                }
            })
        }
    });
});


$(document).ready(function(){            
   $('body').on('click', 'div.followStatus', function(){                
        var id = this.id;
        var anchor = $( this ).find( "a" );
        var url = [ location.pathname].join('');
        if(anchor.attr("class")=='follow'){   
            $.ajax({
                type: "GET",
                url: '/follow/'+id,
                data: "",
                success: function(response) {
                    anchor.removeClass( "follow" );
                    anchor.addClass( "unfollow" );
                    $(anchor).html('<img src="/icons/followers.svg" class="pointer" alt="">');
                    
                    // console.log(url);
                    if(url == '/home')
                    {
                        var div = $('#rUser'+id);
                        div.fadeOut(500, function(){ 
                            div.remove();
                        });
                    }
                }
            })
        }

        else if(anchor.attr("class")=='unfollow'){
            $.ajax({
                type: "GET",
                url: '/follow/'+id+'/unfollow',
                data: "",
                success: function(response) {
                    anchor.removeClass( "unfollow" );
                    anchor.addClass( "follow" );
                    $(anchor).html('<img src="/icons/follow.svg" class="pointer" alt="">');
                    
                    var res = url.split("/");
                    // console.log(res[res.length-1]);
                    url = res[res.length-1];
                    if(url == 'following')
                    {
                        var div = $('#rUser'+id);
                        var hr = $('#rUserHR'+id);
                        div.fadeOut(500, function(){ 
                            div.remove();
                        });
                        hr.fadeOut(500, function(){ 
                            hr.remove();
                        });
                    }
                }
            })
        }
        
    });
});