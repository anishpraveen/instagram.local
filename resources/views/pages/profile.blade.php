@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-group">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                     <img src="{{ Auth::user()->profilePic }}" alt="" height="145" width="145"> 
                </div>
            </div>
        </div>
         <div class="col-md-9">
            <div class="panel panel-group">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }} 
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="panel panel-group">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }} 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-group">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }} 
                </div>
                <div class="panel-footer" style="background-color: white;">
                    Welcome {{ Auth::user()->name }} 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
