@extends('layout.master_layout')
@section('style')
@parent
<link href="{{asset('css/profile.css')}}" rel="stylesheet" media="all">
@endsection
@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{asset('images/author/noavatar.jpg')}}" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <!-- <div class="profile-usertitle-name">
                        Nguyen Duy Tuan
                    </div> -->
                    <div class="profile-usertitle-job">
                        Vip-1
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Overview </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            Account Settings </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                            <i class="glyphicon glyphicon-ok"></i>
                            Tasks </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="glyphicon glyphicon-flag"></i>
                            Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <h2 class="text-center">Personal info</h2>
                <br>
            <form role="form" method="POST" action="{{ route('update_profile', ['user_id' => $user->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="{{$user->email}}" type="text" disabled>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Name:</label>
                    <div class="col-lg-8">
                        <input name="name" id="fullname" class="form-control" value="{{$user->name}}" type="text" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone:</label>
                    <div class="col-lg-8">
                        <input name="phone" id="phone" class="form-control" value="{{$user->phone}}" type="text" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address:</label>
                    <div class="col-lg-8">
                        <input name="address" id="address" class="form-control" value="{{$user->address}}" type="text" disabled>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group text-center hidden" id="save-cancel-profile">
                    <button type="submit" class="btn btn-primary" id="save-profile"><i class="glyphicon glyphicon-floppy-saved"></i> Save</button>
                    <button type="button" class="btn btn-danger" id="reload-profile"><i class="glyphicon glyphicon-refresh"></i>  Cancel</button>
                </div>
            </form>
                <div class="form-group text-center">
                    <button class="btn btn-success edit-profile"><i class="glyphicon glyphicon-pencil"></i> Change</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection
@section('script')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".edit-profile").click(function(event) {
                $(".edit-profile").addClass('hidden');
                $("#fullname").removeAttr('disabled');
                $("#phone").removeAttr('disabled');
                $("#address").removeAttr('disabled');
                $("#save-cancel-profile").removeClass('hidden');
            });
            $("#reload-profile").submit(function(e){
                e.preventDefault();
            });
            $("#reload-profile").click(function(event) {
                $("#fullname").attr("disabled", true);
                $("#phone").attr("disabled", true);
                $("#address").attr("disabled", true);
                $("#save-cancel-profile").addClass('hidden');
                $(".edit-profile").removeClass('hidden');
            })
        });
    </script>
@endsection