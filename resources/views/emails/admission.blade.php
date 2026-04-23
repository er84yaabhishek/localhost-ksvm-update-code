<!-- resources/views/emails/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Contact</title>
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
            background-color: #4CAF50;
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
            color: #4CAF50;
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Admission Message</h2>
        </div>
        <div class="content">
            <div class="field">
                <label>Student Name:</label>
                <span>{{ $data['sname'] }}</span>
            </div>

            <div class="field">
                <label>Parent Name:</label>
                <span>{{ $data['pname'] }}</span>
            </div>

            <div class="field">
                <label>Email:</label>
                <span>{{ $data['email'] }}</span>
            </div>

            <div class="field">
                <label>Phone:</label>
                <span>{{ $data['phone'] }}</span>
            </div>

            <div class="field">
                <label>Class For Admission:</label>
                <span>{{ $data['class'] }}</span>
            </div>

             <div class="field">
                <label>Subject:</label>
                <span>{{ $data['subject'] }}</span>
            </div>

            <div class="field">
                <label>Message:</label>
                <span>{!! nl2br(e($data['message'])) !!}</span>
            </div>
        </div>
    </div>
</body>
</html>