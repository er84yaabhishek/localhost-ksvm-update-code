@extends('admin.layout.app')

@section('content')



    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Admission Contact Inquiry</h4>
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
                            <a href="#">Admission Contact Inquiry Management</a>
                        </li>
                        <li class="separator">
                            <i class="fa fa-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Admission Contact Inquiry</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card-title d-inline-block">Admission Contact Inquiry</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3" id="basic-datatables">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <input type="checkbox" class="bulk-check" data-val="all">
                                                        </th>
                                                        <th scope="col">Student Name</th>
                                                        <th scope="col">Parent Name</th>
                                                        <th scope="col">Class</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Subject</th>
                                                        <th scope="col">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($admission) > 0)
                                                        @foreach($admission as $news)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="bulk-check"
                                                                        data-val="{{ $news->id }}">
                                                                </td>
                                                                <td>{{ $news->student_name }}</td>
                                                                <td>{{ $news->parent_name }}</td>
                                                                <td>{{ $news->class }}</td>
                                                                <td>{{ $news->phone }}</td>
                                                                <td>{{ $news->email }}</td>
                                                                <td>{{ $news->subject }}</td>
                                                                <td>{{ $news->message }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="5" class="text-center">No admission contact found.</td>
                                                        </tr>
                                                    @endif
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
                    Copyright © 2025. All rights reserved by <a href="https://analysishms.com/" target="_blank">Analysish
                        Software</a>..
                </div>
            </div>
        </footer>
    </div>
@endsection