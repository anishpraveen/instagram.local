<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">              
    <table class="table table-responsive table-hover" style="border: solid 2px #dddddd;" >
        <thead>
            <tr>
                <th>@sortablelink('id', 'SL')</th>
                <!--<th>@sortablelink('reporter_id')</th>-->
                <th>@sortablelink('reporter_id','Reporter')</th>
                <!--<th>@sortablelink('user_id')</th>-->
                <th>@sortablelink('user_id','User')</th>
                <th>@sortablelink('comment')</th>
                <th>@sortablelink('updated_at','Reporting time')</th>
            </tr>
        </thead>
        <div class="hidden">
            {{$sl=1}}
        </div>
        <tbody>
            @foreach ($reportList as $report)
            <tr id="report{{ $report->id }}">
                <td>{{ $sl++ }}</td>
                <!--<td>{{ $report->reporter_id }}</td>-->
                <td>{{ ($report->reporter_name[0]['name']) }}</td>
                <!--<td>{{ $report->user_id }}</td>-->
                <td>{{ ($report->user_name[0]['name']) }}</td>
                <td>{{ $report->comment }}</td>
                <td>{{ $report->updated_at->diffForHumans() }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>        
</div>
<div class="row">
    <i class="col-sm-12">
        Total: {{$reportList->total()}} reports
    </i>
</div>
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-4 col-xs-offset-2 col-sm-offset-2">
    {!! $reportList->appends(\Request::except('page'))->render() !!}
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