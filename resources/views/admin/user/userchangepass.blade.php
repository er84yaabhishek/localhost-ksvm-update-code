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
                        <a href="#">Registered Users</a>
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
                        <form action="https://codecanyon8.kreativdev.com/superv/demo/admin/register/user/updatePassword" method="post" role="form">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-title">Update Password</div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ url('/admin/users') }}" class="btn btn-sm btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <input type="hidden" name="_token" value="Wz92jJOJQTzQCF8EsrgiKmgMnpmVGwMKpfZNgVsY"> <input type="hidden" name="user_id" value="1">
                                        <div class="form-body">


                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">New Password</label>
                                                        <input type="password" class="form-control" placeholder="New Password" name="npass" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="">Confirm Password</label>
                                                        <input type="password" class="form-control" placeholder="Confirm Password" name="cfpass" value="">
                                                    </div>
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
                Copyright © 2025. All rights reserved by <a href="https://orlank.com/" target="_blank">Orlank Technology</a>..
            </div>
        </div>
    </footer>
</div>



@endsection