@extends('frontend.layout.app')
@section('content')

@include('frontend.partials.page_banner', ['title' => 'Contact Us', 'breadcrumb' => 'Contact'])

<section class="py-5" style="background:#f8f4f8;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle mt-3">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>

        <div class="row g-4">

            {{-- Contact Info Cards --}}
            <div class="col-lg-4">
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <div class="contact-info-card">
                            <div class="ci-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="ci-content">
                                <h6>Our Address</h6>
                                <p>Sector E-Krishna Vihar, Panki Road, Kalyanpur, Kanpur-208017</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contact-info-card">
                            <div class="ci-icon"><i class="fas fa-phone-alt"></i></div>
                            <div class="ci-content">
                                <h6>Phone Number</h6>
                                <p>
                                    <a href="tel:+917084183114">+91-7084183114</a><br>
                                    <a href="tel:05123531047">0512-3531047</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contact-info-card">
                            <div class="ci-icon"><i class="fas fa-envelope"></i></div>
                            <div class="ci-content">
                                <h6>Email Address</h6>
                                <p><a href="mailto:ksvmeducationcenter@gmail.com">ksvmeducationcenter@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="https://wa.me/917084183114?text=Hello%2C%20I%20have%20a%20query%20about%20KSVM"
                           target="_blank" class="whatsapp-contact-btn">
                            <i class="fab fa-whatsapp"></i>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            {{-- Map --}}
            <div class="col-lg-4">
                <div class="map-wrap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3570.95774941126!2d80.24852862!3d26.4893052!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c37240be0a20b%3A0xf5c417c179ce7833!2sKSVM%20Education%20Centre!5e0!3m2!1sen!2sin!4v1766995897203!5m2!1sen!2sin"
                        width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="col-lg-4">
                <div class="contact-form-card">
                    <h5 class="mb-4"><i class="fas fa-paper-plane me-2" style="color:#7a1a58;"></i>Send a Message</h5>
                    <form id="contactUsForm" method="POST" action="{{ route('home.contact.store') }}">
                        @csrf
                        <input type="hidden" name="form_type" value="contact_from">
                        <div class="mb-3">
                            <label class="form-label fw-500">Your Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control ksvm-input" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-500">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control ksvm-input" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-500">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control ksvm-input" placeholder="Enter phone number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-500">Subject <span class="text-danger">*</span></label>
                            <select name="subject" class="form-control ksvm-input" required>
                                <option value="" disabled selected>Select Subject</option>
                                <option value="Admission Inquiry">Admission Inquiry</option>
                                <option value="Academic Information">Academic Information</option>
                                <option value="Fee Structure">Fee Structure</option>
                                <option value="Facilities Information">Facilities Information</option>
                                <option value="Transport Services">Transport Services</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-500">Message <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control ksvm-input" rows="4" placeholder="Write your message..." required></textarea>
                        </div>
                        <button type="submit" class="btn-ksvm-primary w-100" id="submitBtn">
                            <i class="fas fa-paper-plane me-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
.contact-info-card {
    display: flex; gap: 16px; align-items: flex-start;
    background: #fff; padding: 18px; border-radius: 12px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.06);
    transition: transform 0.3s, box-shadow 0.3s;
}
.contact-info-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(122,26,88,0.12); }
.ci-icon {
    width: 46px; height: 46px; border-radius: 10px; flex-shrink: 0;
    background: linear-gradient(135deg, #7a1a58, #5a1240);
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 18px;
}
.ci-content h6 { font-weight: 600; color: #1a1a2e; margin-bottom: 4px; font-size: 14px; }
.ci-content p { margin: 0; font-size: 13px; color: #666; line-height: 1.6; }
.ci-content a { color: #7a1a58; text-decoration: none; }
.ci-content a:hover { text-decoration: underline; }

.whatsapp-contact-btn {
    display: flex; align-items: center; justify-content: center; gap: 10px;
    background: #25D366; color: #fff; padding: 14px;
    border-radius: 12px; text-decoration: none; font-weight: 600; font-size: 15px;
    transition: all 0.3s; box-shadow: 0 4px 15px rgba(37,211,102,0.3);
}
.whatsapp-contact-btn i { font-size: 22px; }
.whatsapp-contact-btn:hover { background: #1da851; color: #fff; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(37,211,102,0.4); }

.map-wrap { border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); height: 100%; min-height: 380px; }
.map-wrap iframe { height: 100%; min-height: 380px; }

.contact-form-card { background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); }
.ksvm-input {
    border: 2px solid #e8e0e8; border-radius: 8px; padding: 10px 14px;
    font-size: 14px; transition: border-color 0.3s, box-shadow 0.3s;
}
.ksvm-input:focus { border-color: #7a1a58; box-shadow: 0 0 0 3px rgba(122,26,88,0.1); outline: none; }
.btn-ksvm-primary {
    background: linear-gradient(135deg, #7a1a58, #5a1240);
    color: #fff; border: none; padding: 13px 24px;
    border-radius: 8px; font-weight: 600; font-size: 15px;
    cursor: pointer; transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(122,26,88,0.3);
}
.btn-ksvm-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(122,26,88,0.4); }
.btn-ksvm-primary:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
</style>

@push('scripts')
<script>
$(document).ready(function() {
    $('#contactUsForm').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#submitBtn');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Sending...');
        $.ajax({
            url: "{{ route('home.contact.store') }}",
            type: 'POST',
            data: new FormData(this),
            contentType: false, processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                this.reset && this.reset();
                $('#contactUsForm')[0].reset();
                btn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i> Send Message');
                bootnotify(res.success || 'Message sent successfully!', 'Contact Form', 'success');
            },
            error: function(xhr) {
                btn.prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i> Send Message');
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(k, v) { bootnotify(v[0], 'Error', 'danger'); });
                } else {
                    bootnotify('An error occurred. Please try again.', 'Error', 'danger');
                }
            }
        });
    });
});
@endpush
@endsection
