<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatables.bootstrap.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,800' rel='stylesheet'
          type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet'
          type='text/css'>
          <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


</head>
<body class="bg-light">



    <main role="main" class="container">

        <di class="row">
            <div class="col-sm-8"><h2><b>Delivred Orders</b></h2></div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-info add-new"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Order</button>
            </div>
        </di>

            <table class="table" id="dataTableBuilder">
                <thead>
                    <tr>
                        <th title="Full Name">Full Name</th>
                        <th title="Phone">Phone</th>
                        <th title="Adress">Adress</th>
                        <th title="City">City</th>
                        <th title="Country">Country</th>
                        <th title="Actions">Actions</th>
                     </tr>
                 </thead>
                </table>





      </main>



</body>


@include('orders.insert')
@include('orders.edit')
@include('orders.delete')
@include('orders.details')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatables.bootstrap.js') }}"></script>
<script src="{{ asset('js/handlebars.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{ asset('js/myscript.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://delivred.test/',
            columns: [
                {data: 'full_name',name:'full_name'},
                {data: 'phone',name:'phone'},
                {data: 'adress',name:'adress'},
                {data: 'city',name:'city'},
                {data: 'country',name:'country'},
                {data: 'action', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
</html>
