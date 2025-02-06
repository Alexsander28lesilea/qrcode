<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px 30px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        .qrcode {
            margin: 20px 0;
        }

        p {
            color: #555555;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>QR Code</h1>
        <div class="qrcode">
            {!! $qrcode !!}
        </div>
        <p>Scan kode ini untuk mendapatkan informasi lebih lanjut.</p>
        <a href="/">Kembali</a>
    </div>
</body>
</html>
