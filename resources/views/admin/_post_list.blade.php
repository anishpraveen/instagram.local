<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">              
    <table class="table table-responsive table-hover" style="border: solid 2px #dddddd;" >
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('description')</th>
                <th>@sortablelink('userId')</th>
                <th>@sortablelink('publishedOn','Published')</th>
                <!--<th>@sortablelink('created_at')</th>-->
                <!--<th>@sortablelink('blocked','Block')</th>-->
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postList as $post)
            <tr id="post{{ $post->id }}">
                <td>{{ $post->id }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->userId }}</td>
                <td>{{ $post->publishedOn->diffForHumans() }}</td>
                <!--<td>{{ $post->created_at->diffForHumans() }}</td>    -->
                <!--<td id="blockPost{{ $post->id }}">
                    @if($post->blocked=='false')
                        <div id="{{ $post->id }}" class="btn transparent blockPost block " data-block="block" data-name="{{ $post->id }}">
                            <img id="img{{ $post->id }}" src="/icons/padlock-unlock.svg" height="20px" alt="">
                            <asd></asd>
                        </div>
                    @else
                        <div id="{{ $post->id }}" class="btn transparent blockPost blocked" data-block="blocked">
                            <img src="/icons/padlock.svg" height="20px" alt="">
                        </div>
                    @endif
                </td>           -->
                <td>
                    <div id="delete{{ $post->id }}" class="btn deletePost transparent" data-name="{{ $post->userId }}" data-id="{{ $post->id }}">
                        <img src="/icons/cancel-button.svg" height="20px" alt="">
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>        
</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$postList->total()}} posts
    </i>
</div>
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-4 col-xs-offset-2 col-sm-offset-2">
    {!! $postList->appends(\Request::except('page'))->render() !!}
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $('.loader').show();
        search = (btoa(search));
        var search = $('#search').val();
        // var processing=false;
        //  timeout = setTimeout(function(){
        //     if (!processing){
                $.ajax({
                    type: "GET",
                    url: url,
                    data: "",
                    success: function(data) {
                        var div = $('#divList');
                        div.html(data);
                        // div.fadeOut(500, function(){ 
                        //     div.remove();
                        // });
                        $('.loader').hide();
                    }
                })   
        //     }
        // }, 00); 
    });
    $('th a').on('click', function (event) {
        event.preventDefault();
        $('.loader').show();
        var url = $(this).attr('href');
        $.ajax({
            type: "GET",
            url: url,
            data: "",
            success: function(data) {
                var div = $('#divList');
                div.html(data);
                $('.loader').hide();
            }
        })
    });
</script>