<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <title>Admin Login - KSVM - Education Center</title>
    {{--
    <link rel="icon" href="{{ public_asset('admin/assets/front/img/5f4b444b9e646.png') }}"> --}}
    <link rel="icon" type="image/png" href="{{ public_asset('front/img/ksvm.jpeg') }}">
    <!-- Fonts and icons -->
    <script src="{{ public_asset('admin/assets/admin/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        "use strict";
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: [
                    '{{ public_asset('
                                                                                                                                                                                                                                            admin / assets / admin / css / fonts.min.css ') }}'
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link href="{{ public_asset('admin/assets/front/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/fontawesome-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/jquery.dm-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/front/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/jquery.timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/mdtimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/login.css') }}">
</head>

<body>
    <div class="login-page">
        <div class="text-center mb-4">
            <img class="login-logo" src="{{ public_asset('front/img/ksvm.jpeg') }}" alt="">
        </div>

        <div class="form">
            <form class="login-form" method="POST" id="ajax-login-form" action="{{ route('login') }}">
                @csrf
                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile No" required />
                <x-input-error :messages="$errors->get('mobile')" class="mt-2" />

                <input name="password" id="password" placeholder="Password" type="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <button type="submit" id="login-button">Login</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        "use strict";

        $('#ajax-login-form').on('submit', function (e) {
            e.preventDefault();

            let $form = $(this);
            let formData = new FormData(this);
            let action = $form.attr('action');

            // Disable button during login
            $('#login-button').prop('disabled', true).text('Logging in...');

            fetch(action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    $('#login-button').prop('disabled', false).text('Login');

                    if (data.success) {
                        bootnotify('Login Successfully!', 'Login', 'success');
                        setTimeout(() => {
                            window.location.href = "{{ route('admin.dashboard') }}";
                        }, 1500);
                    } else {
                        if (data.errors) {
                            Object.values(data.errors).forEach(messages => {
                                messages.forEach(msg => bootnotify(msg, 'Login', 'danger'));
                            });
                        } else {
                            bootnotify(data.message || 'Invalid credentials. Please try again.', 'Login', 'danger');
                        }
                    }
                })
                .catch(error => {
                    $('#login-button').prop('disabled', false).text('Login');
                    console.error('Error:', error);
                    bootnotify('Something went wrong. Please try again.', 'Login', 'danger');
                });
        });
    </script>

    @include('admin.layout.footer')
</body>