@extends('layouts.admin')

@section('content')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<div id="summernote">Hello Summernote</div>

<div id="divsendMail" class="pointer" style=" align-items: center;">    
    <span class="">
        <button type="button" class="btn btn-primary" style="outline: none;">Send</button>
    </span>    
</div>
@endsection

@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true   
        });  
        $('#divsendMail').on('click',function(){
            var markupStr = $('#summernote').summernote('code');
            console.log(markupStr);
            // alert(markupStr);
        });
    });
</script>
@endsection