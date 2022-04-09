<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Language" content="es" />
  <meta name="description" content="Administrador de plataformas">
  <meta name="keywords" content="administrador,Harvii Mexico">
  <meta name="author" content="HarviiEstudiosMexico">
  <meta name="distribution" content="global" />
  <link rel="icon" href="/favicon.png " type="image/png">
  <!-- <title>Admin</title> -->
  <link href="/mdb/css/bootstrap.min.css" rel="stylesheet">
  <link href="/mdb/css/mdb.min.css" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

  <!--Responsive Extension Datatables CSS-->
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <!-- <link href="/css/stacktable.css" rel="stylesheet" /> -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet" /> -->

 
</head>

<body>
  <div id="app">
  </div>
  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

  <script type="text/javascript">
    window.onload = function() {
      var contenedor = document.getElementById('contenedor_carga');
      contenedor.style.visibility = 'hidden';
      contenedor.style.opacity = '0';
    }
  </script>
  <script>
    window.Laravel = <?php echo json_encode([
                        'csrfToken' => csrf_token(),
                      ]); ?>
  </script>
  <script type="text/javascript" src="/mdb/js/jquery.min.js"></script>


  <script type="text/javascript" src="/mdb/js/popper.min.js"></script>

  <script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/cleopatra.js"></script>
  <script src="{{asset('js/app.js')}}"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="/mdb/js/mdb.min.js"></script>
  <script type="text/javascript" src="/mdb/js/pro/dropdown/dropdown.js"></script>
  <script type="text/javascript" src="/mdb/js/pro/dropdown/dropdown-searchable.js"></script>
  <script type="module|text/javascript" src="/mdb/js/pro/material-select/material-select.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- MDB -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script> -->
</body>

</html>