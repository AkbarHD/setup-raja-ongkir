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
            {{-- karena get method makanya muncul di url data yang kita inputkan --}}
            <form action="{{ url('/') }}" method="GET">
                @csrf
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
                                    <select name="province_form" id="province_form" class="form-control">
                                        <option value="">PILIH PROVINSI</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="origin" id="origin" class="form-control">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group mb-2">
                                    <h6>Kirim ke</h6>
                                    <select name="province_to" id="province_to" class="form-control">
                                        <option value="">PILIH PROVINSI</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}">{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="destination" id="destination" class="form-control">
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6>Berat paket</h6>
                                    <input type="text" name="weight" id="berat" class="form-control">
                                    <small>Dalam gram contoh = 1700 / 1,7kg</small>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Pilih Kurir</h6>
                                    <select name="courier" id="" class="form-select">
                                        <option value="" selected disabled>Pilih Kurir</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-block w-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>

            @if ($cekongkir)
                <div class="row mt-4">
                    <div class="col">
                        <table class="table table-striped table-bordered table-hovered" width="100%">
                            <thead>
                                <tr>
                                    <td>Service</td>
                                    <td>Deskripsi</td>
                                    <td>Harga</td>
                                    <td>Estimasi</td>
                                    <td>Note</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cekongkir as $result)
                                    <tr>
                                        <td>{{ $result['service'] }}</td>
                                        <td>{{ $result['description'] }}</td>
                                        <td>{{ $result['cost'][0]['value'] }}</td>
                                        <td>{{ $result['cost'][0]['etd'] }}</td>
                                        <td>{{ $result['cost'][0]['note'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            @endif

        </div>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="province_form"]').on('change', function() {
                var cityId = $(this).val();
                // console.log(cityId);
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="origin"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="origin"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="origin"]').empty();
                }
            });

            $('select[name="province_to"]').on('change', function() {
                var cityId = $(this).val();
                // console.log(cityId);
                if (cityId) {
                    $.ajax({
                        url: 'getCity/ajax/' + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="destination"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="destination"]').append(
                                    '<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="destination"]').empty();
                }
            });

        });
    </script>
</body>

</html>
