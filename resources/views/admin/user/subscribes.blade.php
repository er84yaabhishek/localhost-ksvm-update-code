@extends('admin.layout.app')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Subscribe</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Subscribe</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Subscribe</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Subscribe</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Emails</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subscriber as $val)
                                                        <tr>
                                                            <td> {{ $val->email }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
                    Copyright © 2025. All rights reserved by <a href="https://orlank.com/" target="_blank">Orlank
                        Technology</a>..
                </div>
            </div>
        </footer>
    </div>
@endsection
