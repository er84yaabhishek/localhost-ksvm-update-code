@extends('admin.layout.app')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Admission Inquiries</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}"><i class="flaticon-home"></i></a>
                    </li>
                    <li class="separator"><i class="flaticon-right-arrow"></i></li>
                    <li class="nav-item">Admission Inquiries</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title mb-0">
                                    <i class="fas fa-user-graduate text-primary"></i>
                                    Admission Inquiry List
                                </h4>
                                <p class="card-category mb-0">
                                    Total: <strong>{{ count($admission) }}</strong> inquiries
                                </p>
                            </div>
                            <div>
                                <span class="badge badge-primary badge-pill" style="font-size:14px; padding:8px 16px;">
                                    {{ count($admission) }} Records
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(count($admission) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="admissionTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Parent Name</th>
                                            <th>Class</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admission as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <strong>{{ $item->student_name }}</strong>
                                            </td>
                                            <td>{{ $item->parent_name }}</td>
                                            <td>
                                                <span class="badge badge-info">{{ $item->class }}</span>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                            </td>
                                            <td>{{ Str::limit($item->message, 50) }}</td>
                                            <td>
                                                <small>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</small>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info view-btn"
                                                    data-id="{{ $item->id }}"
                                                    data-student="{{ $item->student_name }}"
                                                    data-parent="{{ $item->parent_name }}"
                                                    data-class="{{ $item->class }}"
                                                    data-phone="{{ $item->phone }}"
                                                    data-email="{{ $item->email }}"
                                                    data-message="{{ $item->message }}"
                                                    data-date="{{ $item->created_at ? $item->created_at->format('d M Y, h:i A') : '-' }}"
                                                    data-toggle="modal" data-target="#viewModal"
                                                    title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->phone) }}?text=Hello%20{{ urlencode($item->parent_name) }}%2C%20regarding%20admission%20inquiry%20for%20{{ urlencode($item->student_name) }}"
                                                   target="_blank" class="btn btn-sm btn-success" title="WhatsApp">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="text-center py-5">
                                <i class="fas fa-inbox fa-4x text-muted mb-3 d-block"></i>
                                <h5 class="text-muted">Abhi tak koi admission inquiry nahi aayi.</h5>
                                <p class="text-muted">Jab koi website par admission form fill karega, yahan dikhega.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- View Detail Modal --}}
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg,#7a1a58,#5a1240);">
                <h5 class="modal-title text-white">
                    <i class="fas fa-user-graduate me-2"></i> Admission Inquiry Details
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="font-weight-bold text-muted" width="40%">Student Name</td>
                                <td id="v-student" class="font-weight-bold"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Parent Name</td>
                                <td id="v-parent"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Class</td>
                                <td><span id="v-class" class="badge badge-info" style="font-size:13px;"></span></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Date</td>
                                <td id="v-date" class="text-muted"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="font-weight-bold text-muted" width="40%">Phone</td>
                                <td><a id="v-phone" href="#"></a></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold text-muted">Email</td>
                                <td><a id="v-email" href="#"></a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <label class="font-weight-bold text-muted">Message / Query</label>
                        <div id="v-message" class="p-3 bg-light rounded" style="font-size:14px; line-height:1.7;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a id="v-whatsapp" href="#" target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a id="v-call" href="#" class="btn btn-primary">
                    <i class="fas fa-phone"></i> Call
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Init DataTable
    if ($('#admissionTable').length) {
        $('#admissionTable').DataTable({
            order: [[7, 'desc']],
            pageLength: 25,
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ records",
                info: "Showing _START_ to _END_ of _TOTAL_ inquiries",
                emptyTable: "No inquiries found"
            }
        });
    }

    // View modal
    $(document).on('click', '.view-btn', function() {
        var btn = $(this);
        var student = btn.data('student');
        var phone   = btn.data('phone');
        var email   = btn.data('email');

        $('#v-student').text(student);
        $('#v-parent').text(btn.data('parent'));
        $('#v-class').text(btn.data('class'));
        $('#v-date').text(btn.data('date'));
        $('#v-phone').text(phone).attr('href', 'tel:' + phone);
        $('#v-email').text(email).attr('href', 'mailto:' + email);
        $('#v-message').text(btn.data('message') || 'No message provided.');

        var waNum = phone.replace(/[^0-9]/g, '');
        $('#v-whatsapp').attr('href', 'https://wa.me/' + waNum + '?text=Hello%20' + encodeURIComponent(btn.data('parent')) + '%2C%20regarding%20admission%20inquiry%20for%20' + encodeURIComponent(student));
        $('#v-call').attr('href', 'tel:' + phone);
    });
});
</script>
@endpush
