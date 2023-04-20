<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Dokter Telkomedika</h1>

    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/UpdateData/{{$data->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Spesialis / Umum</label>
                                <input type="text" name="spesialis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->spesialis }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No Telepon</label>
                                <input type="number" name="no_telepon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->no_telepon }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hari Praktik</label>
                                <input type="text" name="hari_praktik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->hari_praktik }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Awal Jam Praktik</label>
                                <input type="time" name="awal_jam_praktik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->awal_jam_praktik }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Akhir Jam Praktik</label>
                                <input type="time" name="akhir_jam_praktik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->akhir_jam_praktik }}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>