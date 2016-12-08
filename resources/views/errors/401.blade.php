@extends('layouts.app')
@section('title')
    Page not Found
@endsection

@section('content')

<div class="container">
    
    <div class="jumbotron">
        <div class="container">
            <h1>You are not authorized to access this page</h1>
            <p>
                You will be redirected to {{config('constants.redirectURLName')}} in 
                <span id="timer">{{config('constants.redirectTime')}}</span> 
                seconds
            </p>
            <p>
                <a class="btn btn-info btn-lg" href="{{config('constants.redirectURL')}}">Return {{config('constants.redirectURLName')}}</a>
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
            window.location="{{config('constants.redirectURL')}}";
        }
    }, 1000 * 1 * 1); // millisec * sec * min
   
</script>
@endsection