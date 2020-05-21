<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    <title>Orders</title>
    <link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('/css/demo.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('/css/datatables.bootstrap.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
          type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>
          <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body class="bg-light">



    <main role="main" class="container">

        <div class="row">
            <div class="col-sm-8"><h2><b>Delivred Orders</b></h2></div>
            <div class="col-sm-4 text-right">
                <a href="{{ url('/order') }}" class="btn btn-warning"><i class="fa fa-plus"></i> Add Order</a>
                <a href="{{ url('/product') }}" class="btn btn-danger"><i class="fa fa-plus"></i> Add Products</a>
            </div>
        </div>

        @yield('content')


      </main>



</body>



<script src="{{ secure_asset('js/jquery.min.js') }}"></script>
<script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('js/datatables.bootstrap.js') }}"></script>
<script src="{{ secure_asset('js/handlebars.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

@yield('script')


<script>




</script>
</html>
