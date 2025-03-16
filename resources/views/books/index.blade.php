<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
  body {
    background: linear-gradient(135deg, #6a1b9a, #8e44ad);
    font-family: 'Roboto', sans-serif;
    color: #fff;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
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

  .table {
    color: #333;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
  }

  .table th {
    background: #8e44ad;
    color: #fff;
    text-align: center;
    font-size: 0.9rem;
  }

  .table td {
    text-align: center;
    vertical-align: middle;
  }

  .btn-info {
    background: #6a1b9a;
    border: none;
    transition: background 0.3s ease;
    color: white;
  }

  .btn-info:hover {
    background: #8e44ad;
  }

  .btn-info:focus {
    box-shadow: 0 0 5px rgba(142, 68, 173, 0.5);
  }

  .btn-secondary {
    background: #ddd;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-size: 1rem;
    color: #333;
    transition: background 0.3s ease, color 0.3s ease;
    margin-bottom: 15px;
  }

  .btn-secondary:hover {
    background: #bbb;
    color: #fff;
  }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Ödevler') }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kitabın Adı</th>
                                <th scope="col">Konu</th>
                                <th scope="col">Sayfa Sayısı</th>
                                <th scope="col">İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{ $book->id }}</th>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->konu }}</td>
                                <td>{{ $book->sayfasayi }}</td>
                                <td>
                                  @if (!$book->completed)
                                      <form action="{{ route('books.complete', $book->id) }}" method="POST" style="display: inline;">
                                          @csrf
                                          @method('PATCH')
                                          <button type="submit" class="btn btn-info">Bitirdim</button>
                                      </form>
                                  @else
                                      <span class="badge bg-success">Tamamlandı</span>
                                  @endif
                              </td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
