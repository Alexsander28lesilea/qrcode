<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QR Code Generator</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            /* General Body Styling */
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f4f7fb;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 80%;
                max-width: 900px;
                padding: 30px;
            }

            h1 {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
            }

            /* Form Styling */
            form {
                background-color: #fafafa;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-bottom: 30px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                font-weight: 600;
                color: #333;
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"], input[type="email"], input[type="number"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 14px;
            }

            input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus {
                border-color: #4caf50;
                outline: none;
            }

            button {
                background-color: #4caf50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
                font-size: 16px;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #45a049;
            }

            /* Table Styling */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 30px;
            }

            th, td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #f8f8f8;
                color: #333;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            .action-link {
                text-decoration: none;
                color: #4caf50;
                font-weight: 600;
            }

            .action-link:hover {
                text-decoration: underline;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <h1>Generate QR Code</h1>

            <div>
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input type="number" name="phone" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <button type="submit">Create</button>
                </form>
            </div>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><a href="{{ route('generate', $item->id) }}" class="action-link">Generate</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>
