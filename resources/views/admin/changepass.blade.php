@extends('admin.layout.app')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Password</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Profile Settings</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Password</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="https://codecanyon8.kreativdev.com/superv/demo/admin/profile/updatePassword" method="post" role="form">
                            <div class="card-header">
                                <div class="card-title">Update Password</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <input type="hidden" name="_token" value="kRURYBeZ05BtEEslM6Hsf0GH0yhZJzMgORtznnXt">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Current Password</label>
                                                <div class="">
                                                    <input class="form-control" name="old_password" placeholder="Your Current Password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <div class="">
                                                    <input class="form-control" name="password" placeholder="New Password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>New Password Again</label>
                                                <div class="">
                                                    <input class="form-control" name="password_confirmation" placeholder="New Password Again" type="password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="d-block mx-auto">
                Copyright © 2023. All rights reserved by <a href="https://orlank.com/" target="_blank">Orlank Technology</a>..
            </div>
        </div>
    </footer>
</div>

@endsection