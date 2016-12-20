<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">              
    <table class="table table-responsive table-hover" style="border: solid 2px #dddddd;" >
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('email')</th>
                <th>Posts</th>
                <!--<th>@sortablelink('birthday')</th>-->
                <th>@sortablelink('roles')</th>
                <th>@sortablelink('block_counter','Reported')</th>
                <th>@sortablelink('blocked','Block')</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userList as $user)
            <tr id="user{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}&nbsp{{ $user->lastName }}</td>
                <td>{{ $user->email }}</td>
                <td>{{$user->posts()->count()}}</td>
                <td>{{ $user->roles }}</td>
                <!--<td>{{ $user->birthday }}</td>-->
                <td>{{ $user->block_counter }}</td>
                <td id="blockStatus{{ $user->id }}">
                    @if($user->blocked=='false')
                        <div id="{{ $user->id }}" class="btn transparent blockStatus block " data-block="block" data-name="{{ $user->name }}">
                            <img id="img{{ $user->id }}" src="/icons/padlock-unlock.svg" height="20px" alt="">
                            <asd></asd>
                        </div>
                    @else
                        <div id="{{ $user->id }}" class="btn transparent blockStatus blocked" data-block="blocked">
                            <img src="/icons/padlock.svg" height="20px" alt="">
                        </div>
                    @endif
                </td>
                <td>
                    <div id="delete{{ $user->id }}" class="btn deleteUser transparent" data-name="{{ $user->name }}" data-id="{{ $user->id }}">
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
        Total: {{$userList->total()}} users
    </i>
</div>
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-4 col-xs-offset-2 col-sm-offset-2">
    {!! $userList->appends(\Request::except('page'))->render() !!}
</div>
<script>
    $('.pagination a').on('click', function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $('.loader').show();
        var search = $('#search').val();
        // var processing=false;
        //  timeout = setTimeout(function(){
        //     if (!processing){
                $.ajax({
                    type: "GET",
                    url: url,
                    data: "",
                    success: function(data) {
                        var div = $('#divUsersList');
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
                var div = $('#divUsersList');
                div.html(data);
                $('.loader').hide();
            }
        })
    });
</script>