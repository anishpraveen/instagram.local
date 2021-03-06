$(document).ready(function(){            
   $('body').on('click', 'span.divLikeStatus', function(){                
        var id = this.id;
        var anchor = $( this ).find( "a" );
        if(anchor.attr("class")=='like'){
            var id = anchor.attr("id");
            $.ajax({
                type: "GET",
                url: '/like/'+id,
                data: "",
                success: function(id) {
                    anchor.removeClass( "like" );
                    anchor.addClass( "liked" );
                    $("#divLikeStatus"+id+">a").html('<img src="/icons/liked.svg" alt="liked">');
                }.bind(this, id)
            })
        }

        else if(anchor.attr("class")=='liked'){
            var id = anchor.attr("id");
            var title = $(document).attr('title');
            $.ajax({
                type: "GET",
                url: '/like/'+id+'/unlike',
                data: "",
                success: function(id) {
                    anchor.removeClass( "liked" );
                    anchor.addClass( "like" );
                    $("#divLikeStatus"+id+">a").html('<img src="/icons/like-heart.svg" alt="like">');
                   var url = [ location.pathname].join('');
                    console.log(url);
                    if(url == '/favourites')
                    //     console.log('false');
                    // if(title.indexOf('Favorites'))
                    {
                        var div = $('#Post'+id);
                        div.fadeOut(500, function(){ 
                            div.remove();
                        });
                    }
                }.bind(this, id)
            })
        }
    });
});