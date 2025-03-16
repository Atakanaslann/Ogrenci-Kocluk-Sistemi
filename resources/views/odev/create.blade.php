<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ödev</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{('Ödev')}}</div>
                        <div class="card-body">
                            <h1>Ödev</h1>
                            <form action="{{route('odev.store')}}" method="POST" >
                                @csrf                            
                                <div class="form-group">
                                    <label for="">Ders Adı</label>
                                    <input type="text" name="ders" class="form-control" placeholder="ders">
                                </div>
                                <div class="form-group">
                                    <label for="">Ders Konusu</label>
                                    <input type="text" name="konu" class="form-control" placeholder="Konu">
                                </div>
                                
                                <button type="submit" class="btn btn-success mt-1">Ekle</button>
                            </form>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
  

