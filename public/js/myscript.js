$(document).ready(function() {
    var t = $('#dataTableBuilder').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/',
        columns: [
            { data: 'full_name', name: 'full_name' },
            { data: 'phone', name: 'phone' },
            { data: 'adress', name: 'adress' },
            { data: 'city', name: 'city' },
            { data: 'country', name: 'country' },
            {
                data: 'action',
                name: 'actions',
                orderable: false,
                searchable: false,
                width: 200,
                class: "text-center",
                render: function(a, b, c, d) {
                    //console.log(c.order_id);
                    return '<button data=' + c.order_id + ' data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning targe btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</button>\
              <button data=' + c.order_id + '  type="button"  class="btn btn-xs btn-dark targe btn-detail"><i class="glyphicon glyphicon-search"></i> Details</button>\
              <button data=' + c.order_id + ' data-toggle="modal" data-target="#deleteModal" class="btn btn-xs btn-danger targe btn-delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>\
              '
                }

            }
        ]
    });
    $("#dataTableBuilder").on('click', '.btn-delete, .btn-edit', function() {
        //alert("Refresh");

        $("[name=order_id]").val($(this).attr('data'));
        //$('#deleteModal').modal('show');
        //t.draw();
        var jqxhr = $.getJSON("/api/order/" + $(this).attr('data'), function() {
            $('#Ecity').val(jqxhr.responseJSON.city)
            $('#Ecountry').val(jqxhr.responseJSON.country)
            $('#Efull_name').val(jqxhr.responseJSON.full_name)
            $('#Ephone').val(jqxhr.responseJSON.phone)
            $('#Eadress').val(jqxhr.responseJSON.adress)
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.btn-confirm-delete').click(function() {
        $.ajax({
            url: "/order",
            type: 'DELETE',
            data: { id: $('[name=order_id]').val() },
            beforeSend: function() {

            },
            error: function(jqXHR, textStatus, errorThrown) {

            },
            success: function(data) {
                t.draw();
                $('#deleteModal').modal('hide');
            }
        });
    });
    // insert
    $("body").on('click', ".btn-confirm-insert", function(e) {
        e.preventDefault();
        var form = document.getElementById('form-insert')
        var formData = new FormData(form);
        //formData.append('id',$( "#order_details .edit-order").attr("data"));
        //url = $(this).attr("action");
        $.ajax({
            url: '/order',
            data: formData,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                //$("#loading-save").show();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //$("#loading-save").hide();
            },
            success: function(data) {
                console.log(data);
                $("#addModal").modal('hide');
                t.draw();
            }
        });
    });

    // Edit
    $("body").on('click', ".btn-confirm-edit", function(e) {
        e.preventDefault();

        var form = document.getElementById('form-edit')
        var formData = new FormData(form);
        formData.append('id', $("#edited").val());
        //url = $(this).attr("action");
        $.ajax({
            url: '/order',
            data: formData,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                //$("#loading-save").show();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //$("#loading-save").hide();
            },
            success: function(data) {
                console.log(formData);
                $("#editModal").modal('hide');
                t.draw();
            }
        });
    });


    $("#dataTableBuilder").on('click', '.btn-detail', function() {

        var respo = $.getJSON("/api/order/details/" + $(this).attr('data'), function() {
            $("li").remove();
            dat = respo.responseJSON;
            for (i = 0; i < dat.length; i++) {

                $("#details").append("<li class='list-group-item'>" + dat[i].brand + ' ' + dat[i].name + ' ' + dat[i].price + " $ </li>");

            }
            $("#detailModal").modal()
        })
    });



    function initiateSelect2() {
        $('.myselect').select2();
    }
    initiateSelect2();
    // when modal is open
    $('.modal').on('shown.bs.modal', function() {
        initiateSelect2();
    })

})