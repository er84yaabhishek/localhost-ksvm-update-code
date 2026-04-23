@extends('admin.layout.app')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Profile</h4>
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
                        <a href="#">Profile</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Update Profile</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">

                                    <form action="https://codecanyon8.kreativdev.com/superv/demo/admin/profile/update" method="post" role="form" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="kRURYBeZ05BtEEslM6Hsf0GH0yhZJzMgORtznnXt">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <div class="col-12 mb-2">
                                                    <label for="image"><strong>Profile Image</strong></label>
                                                </div>
                                                <div class="col-md-12 showImage mb-3">
                                                    <img src="https://codecanyon8.kreativdev.com/superv/demo/assets/admin/img/propics/5f5797dbc520b.png" alt="..." class="img-thumbnail">
                                                </div>
                                                <input type="file" name="profile_image" id="image" class="form-control image">
                                                <p id="errimage" class="mb-0 text-danger em"></p>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="username" value="admin" placeholder="Your Username" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="email" value="admin@gmail.com" placeholder="Your Email" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>First Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="first_name" value="Justin" placeholder="Your First Name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label>Last Name</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="last_name" value="Langer" placeholder="Your Last Name" type="last_name">
                                                </div>
                                            </div>
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