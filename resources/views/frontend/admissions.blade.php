@extends('frontend.layout.app')
@section('content')


     <style>
        .bg-img {
            background: url(watermarkingd008.html?image=&amp;maxim_size=8000) 0 36% no-repeat;
            background-size: auto;
            -webkit-background-size: cover;
            background-size: cover;
        }
    </style>


    <section class="inner-intro bg-img light-color overlay-before parallax-background">
        <div class="container">
            <div class="row title">
                <h2><span>Admissions</span></h2>
            </div>
        </div>
    </section>


    <!-- Admissions Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Admissions</h6>
                <h1 class="mb-5">Join our prestigious institution and embark on a journey of academic excellence</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mb-4 text-center text-white py-2" style="background-color: #7c1f82;">
                        <h4 class="m-0">Admission News</h4>
                    </div>

                    <div class="news-container" style="height: 250px; overflow: hidden; position: relative;">
                        <div class="news-list">
                            @if(count($admissions) > 0)
                                @foreach($admissions as $news)
                                    <div class="news-item mb-2">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body py-2 px-3">
                                                <h6 class="card-title mb-0">
                                                    <a href="{{ route('home.admission.details', $news->slug) }}"
                                                        class="text-decoration-none text-dark">
                                                        {{ $news->title }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-muted mt-3">No admission news available.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <style>
                    /* Scroll animation */
                    @keyframes scrollUp {
                        0% {
                            transform: translateY(100%);
                        }

                        100% {
                            transform: translateY(-100%);
                        }
                    }

                    .news-list {
                        display: flex;
                        flex-direction: column;
                        animation: scrollUp linear infinite;
                        animation-duration: 20s;
                        /* adjust speed */
                    }

                    /* Pause scroll on hover */
                    .news-container:hover .news-list {
                        animation-play-state: paused;
                    }

                    .news-item {
                        flex-shrink: 0;
                    }
                </style>
                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="border rounded p-4">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="title">Admission Information &amp;
                                Rules</h6>
                            <h1 class="mb-5">K.S.V.M. Education Centre — Guidelines for admissions</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div>
                                    <section>
                                        <h2>For Class 6<sup>th</sup></h2>
                                        <p>Eligibility and process for admission to Class 6:</p>
                                        <ul>
                                            <li>Students who have passed Fifth standard from any recognized school are
                                                eligible to seek admission.</li>
                                            <li>Students desiring admission to Class 6 must register their names with the
                                                school.</li>
                                            <li>Registered applicants will be required to appear for a test/interview; upon
                                                evaluation, admission may be granted or refused.</li>
                                            <li>Required age for admission to Class 6 is between <strong>9 to 11
                                                    years</strong>.</li>
                                            <li>Incomplete applications will be rejected.</li>
                                        </ul>
                                    </section>
                                </div>
                                <div>
                                    <section>
                                        <h2>For Class 9<sup>th</sup> &amp; 11<sup>th</sup></h2>
                                        <p>Rules for admission to Class 9 and Class 11:</p>
                                        <ul>
                                            <li>Students who have passed Eighth (for Class 9) and Tenth (for Class 11)
                                                standard from a recognized institute are eligible to apply.</li>
                                            <li>Admission without an entrance test will not be possible — an entrance test
                                                is mandatory.</li>
                                            <li>Submission of the Transfer Certificate (T.C.) at the time of admission is
                                                compulsory.</li>
                                            <li>Prospectus and admission forms can be obtained from the school office.</li>
                                        </ul>
                                    </section>
                                </div>
                                <div>
                                    <section>
                                        <h2>Payment of Fees</h2>
                                        <p>Important fee-related rules and schedule:</p>
                                        <ul>
                                            <li>Fees must be paid in advance between the <strong>1st and 10th</strong> of
                                                each month.</li>
                                            <li>A fine of <strong>Rs. 10 per day</strong> will be charged after the due
                                                date.</li>
                                            <li>Fees can be paid at the school office between <strong>9:00 AM and 2:00
                                                    PM</strong>.</li>
                                            <li>If fees remain unpaid after the end of the month, the student's name will be
                                                struck off the rolls.</li>
                                            <li>After striking off, a re-admission fee of <strong>Rs. 100</strong> will be
                                                charged to restore the student's name.</li>
                                            <li>Parents must pay college fee till <strong>30 September</strong> for
                                                withdrawal of their ward in the middle of the session, and till
                                                <strong>March</strong> for withdrawal after January.
                                            </li>
                                            <li>Board examination fee is <strong>not</strong> included in the college fee.
                                            </li>
                                        </ul>
                                    </section>
                                </div>
                                <div>
                                    <section style="margin-top:14px">
                                        <div class="note">
                                            <strong>Note:</strong>
                                            <p>If you agree to the rules of K.S.V.M. Education Centre, only then
                                                proceed to seek admission.</p>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-lg-12 col-mb-12">
                                    <h5>Code of discipline for the students :- </h5>
                                    <p>Discipline plays an important role in making a civilized citizen in future.
                                        Discipline is the habit of acting in accordance with certain rules.</p>
                                    <ul>
                                        <li>Students are expected to attend the college in proper school uniform. </li>
                                        <li>There must be regularity in attendance of the students. A student must secure
                                            permission of the class teacher or principal in black and white in case of a
                                            leave.</li>
                                        <li>In case, the students are called for an extra class or any other school
                                            activity, they will have to be present.</li>
                                        <li>Misbehavior with the teachers, obscenity of words and deeds or any form of
                                            abusive conduct will be unforgivable and may lead to expulsion from school.</li>
                                        <li>The students are not allowed to bring cell phone or other electronic appliances
                                            in college.</li>
                                        <li>If the student causes any damage to school property and found, shall be liable
                                            to compensate for the same.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mt-4 mb-4 text-center" style="background-color: #7c1f82; ">
                        <h4 style="color:white">Admission Process</h4>
                    </div>
                    <div>
                        <h5><i class="fa fa-arrow-right text-primary me-2"></i> Submit Application</h5>
                        <p class="mb-4">Fill out the admission form online or visit our campus</p>
                        <p class="text-center"><i class="fa fa-arrow-down text-primary me-2"></i></p>
                    </div>
                    <div>
                        <h5><i class="fa fa-arrow-right text-primary me-2"></i>Document Verification</h5>
                        <p class="mb-4">Submit required documents for verification</p>
                        <p class="text-center"><i class="fa fa-arrow-down text-primary me-2"></i></p>
                    </div>
                    <div>
                        <h5><i class="fa fa-arrow-right text-primary me-2"></i>Interaction/Test</h5>
                        <p class="mb-4">Student interaction and assessment (if required)</p>
                        <p class="text-center"><i class="fa fa-arrow-down text-primary me-2"></i></p>
                    </div>
                    <div>
                        <h5><i class="fa fa-arrow-right text-primary me-2"></i>Admission Confirmation</h5>
                        <p class="mb-4">Fee payment and seat confirmation</p>
                    </div>
                    <div class="row">
                        <h4 class="mb-4"><i class="fa fa-book"></i> Required Documents<span style="color: red;">*</span>
                        </h4>
                        <div class="col-6">
                            <ul>
                                <li>Birth Certificate</li>
                                <li>Previous School Certificate</li>
                                <li>Transfer Certificate (if applicable)</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Passport Size Photos</li>
                                <li>Aadhar Card Copy</li>
                                <li>Character Certificate</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-primary w-100" href="{{ url('/contact') }}">Contact Us</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-outline-primary w-100" href="{{ url('/admission-form') }}">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="mt-4 mb-4 text-center" style="background-color: #7c1f82; ">
                        <h4 style="color:white">Quick Inquiry</h4>
                    </div>
                    <div>
                        <form id="admissionForm" method="POST">
                            @csrf

                            <input type="hidden" name="form_type" value="admission_from">
                            <input type="hidden" name="subject" value="Admission Inquiry">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="sname"
                                            placeholder="Student Name *" required>
                                        <label for="name">Student Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="pname" class="form-control" id="pname"
                                            placeholder="Parent Name *" required>
                                        <label for="email">Parent Name *</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" name="phone" class="form-control" id="number"
                                            placeholder="Phone Number *" required>
                                        <label for="number">Phone Number *</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        {{-- <input type="text" class="form-control" id="subject" placeholder="Subject">--}}
                                        <select class="form-control" id="class" name="classadmit" required>
                                            <option value="" disabled selected>Select Class For Admission</option>
                                            <option value="1st">1st</option>
                                            <option value="2nd">2nd</option>
                                            <option value="3rd">3rd</option>
                                            <option value="4th">4th</option>
                                            <option value="5th">5th</option>
                                            <option value="6th">6th</option>
                                            <option value="7th">7th</option>
                                            <option value="8th">8th</option>
                                            <option value="9th">9th</option>
                                            <option value="10th">10th</option>
                                            <option value="11th">11th</option>
                                            <option value="12th">12th</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here"
                                            id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" id="submitBtn" type="submit">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admissions End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#admissionForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                var form = this;
                var formData = new FormData(form); // Collect form data

                $.ajax({
                    url: "{{ route('home.admission.store') }}", // Use Laravel's route helper
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function () {
                        $('#submitBtn').prop('disabled', true).text('Send Message...');
                    }
                        success: function (response) {
                        // Clear form
                        form.reset();
                        $('#submitBtn').prop('disabled', false).text('Send Message');
                        // Show success message
                        if (response.success) {
                            bootnotify(response.success, 'Admission Form', 'success');
                        } else {
                            bootnotify('Form submitted successfully!', 'Admission Form', 'success');
                        }

                        // Reload page or redirect after 2 seconds
                        // setTimeout(function () {
                        //     location.reload();
                        // }, 2000);
                    },
                    error: function (xhr) {
                        // Handle validation errors
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            if (errors) {
                                $.each(errors, function (key, value) {
                                    bootnotify(value[0], 'Form Error', 'danger');
                                });
                            }
                        } else {
                            bootnotify('An error occurred. Please try again.', 'Error', 'danger');
                        }
                         $('#submitBtn').prop('disabled', false).text('Send Message');
                    }
                });
            });
        });
    </script>
@endsection