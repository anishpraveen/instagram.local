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