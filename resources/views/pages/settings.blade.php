@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Side bar -->
        <div class="col-md-3 text-center">
            <div class="panel panel-group" style="border:0;">
                <div class="panel-heading  selectedSideBar text-left sideBar">
                    <img src="/icons/settings_select.svg" style="padding-right:10px;" alt="">General Settings
                </div>
                <div class="panel-heading  sideBar text-left">
                    <a href="/favourites">
                        <img src="/icons/heart_select.svg" style="padding-right:10px;" alt=""> 
                        <span >Favorites</span>
                    </a>
                </div>
                <div class="panel-heading sideBar text-left">
                    <img src="/icons/logout.svg" style="padding-right:10px;" alt="">Logout
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
