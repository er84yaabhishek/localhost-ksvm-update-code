@extends('admin.layout.app')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Student Registration</h4>
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
                        <a href="#">Registration Management</a>
                    </li>
                    <li class="separator">
                        <i class="fa fa-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">All Registrations</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-title d-inline-block">Student Registrations</div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <span class="badge badge-primary">Total: {{ count($registrations) }}</span>
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
                                                    <th scope="col">#</th>
                                                    <th scope="col">Applicant Name</th>
                                                    <th scope="col">Class</th>
                                                    <th scope="col">Father Name</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">DOB</th>
                                                    <th scope="col">Branch</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($registrations) > 0)
                                                    @foreach($registrations as $index => $registration)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $registration->applicant_name }}</td>
                                                            <td>{{ $registration->class }}</td>
                                                            <td>{{ $registration->father_name }}</td>
                                                            <td>{{ $registration->mobile }}</td>
                                                            <td>{{ $registration->email }}</td>
                                                            <td>{{ $registration->dob->format('d-m-Y') }}</td>
                                                            <td>{{ $registration->branch }}</td>
                                                            <td>
                                                                <button type="button" 
                                                                    class="btn btn-sm btn-info" 
                                                                    data-toggle="modal" 
                                                                    data-target="#viewModal{{ $registration->id }}">
                                                                    <i class="fa fa-eye"></i> View
                                                                </button>
                                                                <form action="{{ route('admin.registration.delete') }}" 
                                                                    method="POST" 
                                                                    style="display:inline-block;"
                                                                    onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $registration->id }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                                        <i class="fa fa-trash"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                        <!-- View Modal -->
                                                        <div class="modal fade" id="viewModal{{ $registration->id }}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Registration Details - {{ $registration->applicant_name }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <p><strong>Branch/School:</strong> {{ $registration->branch }}</p>
                                                                                <p><strong>Class:</strong> {{ $registration->class }}</p>
                                                                                <p><strong>Date of Birth:</strong> {{ $registration->dob->format('d-m-Y') }}</p>
                                                                                <p><strong>Applicant Name:</strong> {{ $registration->applicant_name }}</p>
                                                                                <p><strong>Father's Name:</strong> {{ $registration->father_name }}</p>
                                                                                <p><strong>Mother's Name:</strong> {{ $registration->mother_name }}</p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <p><strong>Mobile:</strong> {{ $registration->mobile }}</p>
                                                                                <p><strong>Phone (Home):</strong> {{ $registration->phone ?? 'N/A' }}</p>
                                                                                <p><strong>Email:</strong> {{ $registration->email }}</p>
                                                                                <p><strong>Last School:</strong> {{ $registration->last_school ?? 'N/A' }}</p>
                                                                                <p><strong>Last Class:</strong> {{ $registration->last_class ?? 'N/A' }}</p>
                                                                                <p><strong>Registered On:</strong> {{ $registration->created_at->format('d-m-Y H:i A') }}</p>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <p><strong>Address:</strong><br>{{ $registration->address }}</p>
                                                                            </div>
                                                                            @if($registration->report_card)
                                                                            <div class="col-md-6">
                                                                                <p><strong>Report Card:</strong><br>
                                                                                    <a href="{{ public_asset('storage/' . $registration->report_card) }}" 
                                                                                       target="_blank" 
                                                                                       class="btn btn-sm btn-primary" download>
                                                                                        <i class="fa fa-download"></i> Download
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                            @endif
                                                                            @if($registration->applicant_photo)
                                                                            <div class="col-md-6">
                                                                                <p><strong>Applicant Photo:</strong><br>
                                                                                    <img src="{{ public_asset('storage/' . $registration->applicant_photo) }}" 
                                                                                         alt="Applicant Photo" 
                                                                                         class="img-thumbnail" 
                                                                                         style="max-width: 200px;">
                                                                                </p>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="9" class="text-center">No registrations found.</td>
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
                    Software</a>.
            </div>
        </div>
    </footer>
</div>

@endsection
