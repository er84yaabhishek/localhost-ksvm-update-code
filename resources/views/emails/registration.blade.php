<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            background-color: #06BBCC;
            color: white;
            padding: 20px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
            background-color: white;
        }
        .field {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .field label {
            font-weight: bold;
            color: #06BBCC;
            display: block;
            margin-bottom: 5px;
        }
        .field-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Student Registration</h2>
        </div>
        <div class="content">
            <div class="field">
                <label>Branch / School:</label>
                <span>{{ $data['branch'] }}</span>
            </div>

            <div class="field-group">
                <div class="field">
                    <label>Class:</label>
                    <span>{{ $data['class'] }}</span>
                </div>

                <div class="field">
                    <label>Date of Birth:</label>
                    <span>{{ $data['dob'] }}</span>
                </div>
            </div>

            <div class="field">
                <label>Applicant's Full Name:</label>
                <span>{{ $data['applicant_name'] }}</span>
            </div>

            <div class="field-group">
                <div class="field">
                    <label>Father's Name:</label>
                    <span>{{ $data['father_name'] }}</span>
                </div>

                <div class="field">
                    <label>Mother's Name:</label>
                    <span>{{ $data['mother_name'] }}</span>
                </div>
            </div>

            <div class="field-group">
                <div class="field">
                    <label>Mobile Number:</label>
                    <span>{{ $data['mobile'] }}</span>
                </div>

                <div class="field">
                    <label>Phone (Home):</label>
                    <span>{{ $data['phone'] ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="field">
                <label>Email:</label>
                <span>{{ $data['email'] }}</span>
            </div>

            <div class="field">
                <label>Permanent Address:</label>
                <span>{!! nl2br(e($data['address'])) !!}</span>
            </div>

            @if(isset($data['last_school']) && $data['last_school'])
            <div class="field-group">
                <div class="field">
                    <label>Last School Attended:</label>
                    <span>{{ $data['last_school'] }}</span>
                </div>

                <div class="field">
                    <label>Last Class Attended:</label>
                    <span>{{ $data['last_class'] ?? 'N/A' }}</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
