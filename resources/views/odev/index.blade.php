<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Odevler')}}</div>
                    <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kitabın Adı</th>
                                    <th scope="col">Konu</th>
                                    <th scope="col">Sayfa Sayısı</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 @foreach ($odevs as $odev)
                                 <tr>
                                    <th scope="row">{{$odev->id}}</th>
                                    <th >{{$odev->ders}}</th>
                                    <th>{{$odev->konu}}</th>
                                    <td><a href="{{route('odev.edit', $odev->id)}}" class="btn btn-info">Düzenle</a></td>
                                  </tr> 
                                 @endforeach
                                  
                                </tbody>
                              </table>
                        
                    </div>
               
            </div>
        </div>
    </div>
</div>
