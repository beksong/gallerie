<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Penjualan</title>
    <style type="text/css">
      <?php include(public_path().'../vendor/adminlte/bootstrap/css/bootstrap.min.css');?>
      /*bagian ini penting untuk menghilangkan kolom sing g bner di table pada saat cetak report*/
        thead:before, thead:after,
        tbody:before, tbody:after,
        tfoot:before, tfoot:after {
          display: none;
        }
        /*prevent overlapping table header on next rows*/
        thead { display: table-header-group }
        tfoot { display: table-row-group }
        tr { page-break-inside: avoid }
      /*.page-break {
    page-break-after: always;
}*/
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <img src="{{ url('/images/logo.png') }}" class="img img-responsive">
            </div>
            <div class="col-xs-9">
                <h3>Galerie</h3>
                <span>Jl. RA. Kartini No. 12A, Palu</span><br>
                <span>Sulawesi Tengah - 94112</span><br>
                <span>Telp. (0451) - </span><br>
                <span>Hp. 0811-4554-488</span><br>
                <span>Email : galerie_furniture@yahoo.com</span><br>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
         @yield('content')
    </div>

    <script src="{{ url('/vendor/adminlte/bootstrap/js/jquery-3.1.1.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('/js/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script src="{{ url('/vendor/adminlte/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ url('/js/terbilang.js') }}"></script>
    <script src="{{ url('/js/pdf.js') }}"></script>    
</body>
</html>
