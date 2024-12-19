<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 me-md-auto font-weight-normal">Laravel</h5>
        <nav class="my-2 my-md-0 me-md-3">
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <h6>Nama anda</h6>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-2">
                                <h6>Kirim dari</h6>
                                <select name="" id="" class="form-control">
                                    <option value="">PILIH PROVINSI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-group mb-2">
                                <h6>Kirim ke</h6>
                                <select name="" id="" class="form-control">
                                    <option value="">PILIH PROVINSI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6>Berat paket</h6>
                                <input type="text" name="berat" id="berat" class="form-control">
                                <small>Dalam gram contoh = 1700 / 1,7kg</small>
                            </div>
                            <div class="col-sm-6">
                                <h6>Pilih Kurir</h6>
                                <select name="" id="" class="form-select">
                                    <option value="" selected disabled>Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
