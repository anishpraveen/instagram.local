@extends('layouts.app')
@section('title')
    Page not Found
@endsection

@section('content')

<div class="container">
    
    <div class="jumbotron">
        <div class="container">
            @if(!empty($message))
                <h1>{{$message}}</h1>
            @else
                <h1>Page not Found</h1>
            @endif
            <p>
                You will be redirected to {{config('constants.redirectURLName')}} in 
                <span id="timer">{{config('constants.redirectTime')}}</span> 
                seconds
            </p>
            <p>
            <!--href="config('constants.redirectURL')"-->
                <a class="btn btn-info btn-lg" href="{{ URL::previous() }}">Return {{config('constants.redirectURLName')}}</a>
            </p>
        </div>
    </div>
    
</div>
@endsection
@section('footer')
<script type="text/javascript">   

    var count = {{config('constants.redirectTime')}};
    count--;
    setInterval(function() {
        document.getElementById('timer').innerText = count--; 
        if(count == 0){
            window.location="{{ URL::previous() }}";
        }
    }, 1000 * 1 * 1); // millisec * sec * min
   
</script>
@endsection