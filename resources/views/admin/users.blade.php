@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">        
            <table class="table table-responsive table-hover" style="border: solid 2px #dddddd;" >
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'Id')</th>
                        <th>@sortablelink('name')</th>
                        <th>@sortablelink('lastName')</th>
                        <th>@sortablelink('email')</th>
                        <th>@sortablelink('birthday')</th>
                        <th>Block</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $user)
                    <tr>
                        <td>{{ $user->id }}</td>&nbsp
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->birthday }}</td>
                        <td>
                            <button type="button" class="btn btn-default">Block!</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-default">Delete!</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>        
        </div>


        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-offset-4 col-xs-offset-2 col-sm-offset-2">
            {!! $userList->appends(\Request::except('page'))->render() !!}

        </div>
    </div>
</div>



@endsection