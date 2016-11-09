@extends('layouts.app')

@section('content')

<div class="scroll">
    <ul>  <!-- php sleep(2); -->
    @foreach($posts as $post)
      @include('pages._posts') 
    @endforeach
    </ul>
    {{$posts->setPath('like')->links()}}
</div>
@endsection



@section('footer')

<script src="http://code.bmchosting.net/js/common.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="/js/scroll.js"></script>

<script>
 //$('ul.pagination:visible:first').hide();
$('.scroll').jscroll({
            
            debug: true,
            autoTrigger: true,
            loadingHtml: '<h1>Loading...</h1>',
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scroll',
            callback: function() {
                //again hide the paginator from view
                $('ul.pagination:visible:first').hide();
            }
});
</script>
    @endsection