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
                <h2><span>Contact</span></h2>
            </div>
        </div>
    </section>



    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="title">Contact Us</h6>
                <h1 class="mb-5">Contact For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>Get In Touch</h5>
                    <p class="mb-4">Committed to providing quality education and nurturing young minds to become future
                        leaders. Our holistic approach combines academic excellence with character development.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Office</h5>
                            <p class="mb-0">Sector E-Krishna
                                Vihar, Panki Road, Kalyanpur, Kanpur-208017</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Mobile</h5>
                            <p class="mb-0">+91-7084183114<br>0512-3531047 </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">Email</h5>
                            <p class="mb-0">ksvmeducationcenter.in<br> ksvmeducationcenter@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3570.95774941126!2d80.24852862!3d26.4893052!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c37240be0a20b%3A0xf5c417c179ce7833!2sKSVM%20Education%20Centre!5e0!3m2!1sen!2sin!4v1766995897203!5m2!1sen!2sin"
                        width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form id="contactUsForm" method="POST">
                        @csrf
                        <input type="hidden" name="form_type" value="contact_from">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
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
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Your Number">
                                    <label for="phone">Your Number</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select class="form-control" id="subject" name="subject">
                                        <option value="" disabled selected>Select Subject</option>
                                        <option value="Admission Inquiry">Admission Inquiry</option>
                                        <option value="Academic Information">Academic Information</option>
                                        <option value="Fee Structure">Fee Structure</option>
                                        <option value="Facilities Information">Facilities Information</option>
                                        <option value="Transport Services">Transport Services</option>
                                        <option value="Other">Other</option>
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
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#contactUsForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                var form = this;
                var formData = new FormData(form); // Collect form data
                $('#submitBtn').prop('disabled', true).text('Sending...');
                $.ajax({
                    url: "{{ route('home.contact.store') }}", // Use Laravel's route helper
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        // Clear form
                        form.reset();
                        $('#submitBtn').prop('disabled', false).text('Send Message');
                        // Show success message
                        if (response.success) {
                            bootnotify(response.success, 'Contact Form', 'success');
                        } else {
                            bootnotify('Form submitted successfully!', 'Contact Form', 'success');
                        }

                        // Reload page or redirect after 2 seconds
                        // setTimeout(function() {
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