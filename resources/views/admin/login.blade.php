<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — KSVM Education Centre</title>
    <link rel="icon" type="image/png" href="{{ public_asset('front/img/ksvm.jpeg') }}">

    <!-- Admin CSS -->
    <link href="{{ public_asset('admin/assets/front/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ public_asset('admin/assets/admin/css/login.css') }}">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Lato', sans-serif;
            padding: 20px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px 36px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
        }

        .login-logo-wrap {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-logo-wrap img {
            height: 80px;
            width: auto;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .login-logo-wrap h4 {
            margin-top: 12px;
            font-size: 18px;
            font-weight: 700;
            color: #1a1a2e;
        }

        .login-logo-wrap p {
            font-size: 13px;
            color: #888;
            margin: 4px 0 0;
        }

        .login-card h5 {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .login-card .subtitle {
            font-size: 13px;
            color: #888;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        .form-group .input-wrap {
            position: relative;
        }

        .form-group .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 14px;
            color: #333;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
            background: #fafafa;
        }

        .form-group input:focus {
            border-color: #7a1a58;
            box-shadow: 0 0 0 3px rgba(122, 26, 88, 0.1);
            background: #fff;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #aaa;
            font-size: 15px;
            transition: color 0.3s;
        }

        .toggle-password:hover { color: #7a1a58; }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #7a1a58, #5a1240);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(122, 26, 88, 0.35);
            margin-top: 8px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(122, 26, 88, 0.45);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .alert-box {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
            display: none;
        }

        .alert-danger { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        .alert-success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: rgba(255,255,255,0.6);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link a:hover { color: #FFD700; }

        /* Error messages from Laravel */
        .field-error {
            font-size: 12px;
            color: #dc2626;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">

        <!-- Logo -->
        <div class="login-logo-wrap" style="text-align:center; margin-bottom:20px;">
            <img src="{{ public_asset('front/img/ksvm.jpeg') }}" alt="KSVM Logo">
            <h4 style="color:#fff; margin-top:12px; font-size:18px; font-weight:700;">K.S.V.M. Education Centre</h4>
            <p style="color:rgba(255,255,255,0.6); font-size:13px;">Admin Panel</p>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            <h5>Welcome Back!</h5>
            <p class="subtitle">Sign in to access the admin panel</p>

            <!-- Alert Box -->
            <div class="alert-box alert-danger" id="alertBox"></div>

            <!-- Laravel Validation Errors -->
            @if($errors->any())
            <div class="alert-box alert-danger" style="display:block;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

            <!-- Session Status -->
            @if(session('status'))
            <div class="alert-box alert-success" style="display:block;">
                {{ session('status') }}
            </div>
            @endif

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Mobile -->
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <div class="input-wrap">
                        <i class="fas fa-mobile-alt"></i>
                        <input type="text" name="mobile" id="mobile"
                               placeholder="Enter 10-digit mobile number"
                               value="{{ old('mobile') }}"
                               maxlength="10"
                               required>
                    </div>
                    @error('mobile')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password"
                               placeholder="Enter your password"
                               required autocomplete="current-password">
                        <span class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login" id="loginBtn">
                    <i class="fas fa-sign-in-alt me-2"></i> Sign In
                </button>
            </form>
        </div>

        <!-- Back to website -->
        <div class="back-link">
            <a href="{{ route('home.index') }}">
                <i class="fas fa-arrow-left me-1"></i> Back to Website
            </a>
        </div>

    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function togglePassword() {
            var input = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'fas fa-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'fas fa-eye';
            }
        }

        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            var btn = $('#loginBtn');
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Signing in...');
            $('#alertBox').hide().text('');

            var formData = new FormData(this);

            fetch('{{ route("login") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                btn.prop('disabled', false).html('<i class="fas fa-sign-in-alt me-2"></i> Sign In');

                if (data.success) {
                    btn.html('<i class="fas fa-check me-2"></i> Login Successful!').css('background', 'linear-gradient(135deg, #16a34a, #15803d)');
                    setTimeout(function() {
                        window.location.href = '{{ route("admin.dashboard") }}';
                    }, 800);
                } else {
                    var msg = data.message || 'Invalid credentials. Please try again.';
                    if (data.errors) {
                        var msgs = [];
                        Object.values(data.errors).forEach(function(arr) {
                            arr.forEach(function(m) { msgs.push(m); });
                        });
                        msg = msgs.join('<br>');
                    }
                    $('#alertBox').html('<i class="fas fa-exclamation-circle me-2"></i>' + msg).show();
                }
            })
            .catch(function(err) {
                btn.prop('disabled', false).html('<i class="fas fa-sign-in-alt me-2"></i> Sign In');
                $('#alertBox').html('<i class="fas fa-exclamation-circle me-2"></i> Something went wrong. Please try again.').show();
                console.error(err);
            });
        });

        // Only allow numbers in mobile field
        document.getElementById('mobile').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>
