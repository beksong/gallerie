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
      /*untuk mengatur table*/

      /*thead:before, thead:after,
      tbody:before, tbody:after,
      tfoot:before, tfoot:after {
        display: none;
      }*/
      thead {
            display: table-header-group;
        }
        tfoot {
            display: table-row-group;
        }
        tr {
            page-break-inside: avoid;
        }
      .page-break {
            page-break-after: always;
          }
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-xs-6" style="padding-right:20px">
            <center>
                <strong>
                    <p>
                        Galerie Furniture<br>
                        <span>Jl. RA. Kartini No. 12A, Palu</span><br>
                        <span>Hp. 0811-4554-488</span><br>
                        <span>Email : galerie_furniture@yahoo.com</span><br>
                    </p>
                </strong>
            </center>
            <hr>
        </div><!--Header sebelah Kiri -->
        <div class="col-xs-6" style="padding-left:20px">
            <center>
                <strong>
                    <p>
                        Galerie Furniture<br>
                        <span>Jl. RA. Kartini No. 12A, Palu</span><br>
                        <span>Hp. 0811-4554-488</span><br>
                        <span>Email : galerie_furniture@yahoo.com</span><br>
                    </p>
                </strong>
            </center>
            <hr>
        </div><!--Header sebelah Kiri -->
    </div><!-- end row -->
</div>
   @yield('content')
<div class="container">
  <div class="row">
    <!-- left footer -->
    <div class="col-xs-6" style="padding-right:20px">
      <center><hr></center>
      <center><img src="{{url('images/logo.png')}}" class="img img-responsive" style="width:100px;height:70px"><br></center>
      <center><strong>website : www.galerie.id</strong></center>
    </div>
    <!-- right footer -->
    <div class="col-xs-6" style="padding-left:20px">
      <center><hr></center>
      <center><img src="{{url('images/logo.png')}}" class="img img-responsive" style="width:100px;height:70px"><br></center>
      <center><strong>website : www.galerie.id</strong></center>
    </div>
  </div>
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
