<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <button type="button" class="btn btn-info add-new"  data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add Order</button>
                <button type="button" class="btn btn-info btn-refresh"><i class="fa fa-plus"></i> Refresh</button>
            </div>
        </div>

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



<script src="{{ secure_asset('js/jquery.min.js') }}"></script>
<script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ secure_asset('js/datatables.bootstrap.js') }}"></script>
<script src="{{ secure_asset('js/handlebars.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{ secure_asset('js/myscript.js') }}"></script>

@include('orders.insert')
@include('orders.edit')
@include('orders.delete')
@include('orders.details')

<script>
    $(document).ready(function(){
        var t = $('#dataTableBuilder').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/',
            columns: [
                {data: 'full_name',name:'full_name'},
                {data: 'phone',name:'phone'},
                {data: 'adress',name:'adress'},
                {data: 'city',name:'city'},
                {data: 'country',name:'country'},
                {data: 'action', name: 'actions', orderable: false, searchable: false, 
                width:200 , 
                class:"text-center",
                render: function(a, b, c, d) {
                    //console.log(c.order_id);
                    return '<button id='+c.order_id+' data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning targe"><i class="glyphicon glyphicon-edit"></i> Edit</button>\
                  <button id='+c.order_id+' data-toggle="modal" data-target="#detailModal" class="btn btn-xs btn-dark targe"><i class="glyphicon glyphicon-search"></i> Details</button>\
                  <button data='+c.order_id+' class="btn btn-xs btn-danger targe btn-delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>\
                  '
                }

                }
            ]
        });
        $(".btn-refresh").click(function(){
            //alert("Refresh");
            /* $.ajax({
                url: "/order/update/status",
                type: 'POST',
                data: {},
                beforeSend: function(){
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    
                },
                success:function (data){
                    
                   
                }
            }); */
            t.draw();
        });

        $("#dataTableBuilder").on('click','.btn-delete',function(){
            //alert("Refresh");
           
            $("[name=order_id]").val($(this).attr('data'));
            $('#deleteModal').modal('show');
            //t.draw();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.btn-confirm-delete').click(function (){
            $.ajax({
                url: "/order",
                type: 'DELETE',
                data: {id:$('[name=order_id]').val()},
                beforeSend: function(){
                    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    
                },
                success:function (data){
                    t.draw();
                    $('#deleteModal').modal('hide');
                }
            });
        });

        $("#order_details").on('submit',".form-order",function (e){
                e.preventDefault();
                
                var formData = new FormData(this);
                formData.append('id',$( "#order_details .edit-order").attr("data"));
                url = $(this).attr("action");
                $.ajax({
                    url: url,
                    data: formData,
                    type: 'POST',
                    cache:false,
                    contentType: false,
                    processData: false,
                    beforeSend: function(){
                        $("#loading-save").show();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#loading-save").hide();
                    },
                    success:function (data){
                        console.log(data);
                        $("#order_details").modal('hide');
                        t.draw();
                    }
                });
            });
        


    });
</script>
<script>
    $(document).ready(function() {
        function initiateSelect2() {
            $('.myselect').select2();
          }
          initiateSelect2();
          // when modal is open
          $('.modal').on('shown.bs.modal', function () {
            initiateSelect2();
          })

    }
        )


    
</script>
</html>
