<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Kitap Ekle</title>
    <style>
        body {
            background: linear-gradient(135deg, #6a1b9a, #8e44ad);
            font-family: 'Roboto', sans-serif;
            color: #fff;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: #8e44ad;
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 15px;
            border-bottom: 3px solid #6a1b9a;
        }

        label {
            font-weight: bold;
            color: #6a1b9a;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: none;
            transition: border 0.3s ease;
        }

        .form-control:focus {
            border-color: #8e44ad;
            box-shadow: 0 0 5px rgba(142, 68, 173, 0.5);
        }

        .btn-success {
            background: #6a1b9a;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn-success:hover {
            background: #8e44ad;
        }

        .btn-secondary {
            background: #ddd;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #333;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .btn-secondary:hover {
            background: #bbb;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ 'Kitap Ekle' }}</div>
                    <div class="card-body">
                        <h2 class="text-center mb-4">Yeni Kitap Ekle</h2>
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Kitap Adı</label>
                                <input type="text" name="name" class="form-control" placeholder="Kitap Adı Giriniz" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="konu">Konu</label>
                                <input type="text" name="konu" class="form-control" placeholder="Konu Giriniz" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sayfasayi">Sayfa Sayısı</label>
                                <input type="number" name="sayfasayi" class="form-control" placeholder="Sayfa Sayısını Giriniz" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
