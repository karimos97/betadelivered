$(document).ready(function() {
    var t = $('#products_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/product/',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'brand', name: 'brand' },
            { data: 'Qte', name: 'Qte' },
            {
                data: 'action',
                name: 'actions',
                orderable: false,
                searchable: false,
                width: 200,
                class: "text-center",
                render: function(a, b, c, d) {
                    return '<button data=' + c.id + ' data-toggle="modal" data-target="#editModal" class="btn btn-xs btn-warning targe btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</button>\
              <button data=' + c.id + '  type="button"  class="btn btn-xs btn-dark targe btn-detail"><i class="glyphicon glyphicon-search"></i> Details</button>\
              <button data=' + c.id + ' data-toggle="modal" data-target="#deleteModal" class="btn btn-xs btn-danger targe btn-delete"><i class="glyphicon glyphicon-trash"></i> Delete</button>\
              '
                }

            }
        ]
    });
    $("#products_list").on('click', '.btn-delete, .btn-edit', function() {
        //alert("Refresh");

        $("[name=product_id]").val($(this).attr('data'));
        $('#product_id').val($(this).attr('data'));
        //$('#deleteModal').modal('show');
        var jqxhr = $.getJSON("/api/product/" + $(this).attr('data'), function() {
            $('#EName').val(jqxhr.responseJSON.name)
            $('#EPrice').val(jqxhr.responseJSON.price)
            $('#EBrand').val(jqxhr.responseJSON.brand)
            $('#EQte').val(jqxhr.responseJSON.Qte)
            $('#Edescription').val(jqxhr.responseJSON.description)
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.btn-confirm-delete').click(function() {
        $.ajax({
            url: "/product/delete",
            type: 'DELETE',
            data: { id: $('[name=product_id]').val() },
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
            url: '/product/insert',
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
        //formData.append('id', $("#edited").val());
        //url = $(this).attr("action");

        $.ajax({
            url: '/product/edit',
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

                $("#editModal").modal('hide');
                t.draw();
            }
        });
    });


    $("#products_list").on('click', '.btn-detail', function() {

        var respo = $.getJSON("/api/product/" + $(this).attr('data'), function() {
            $("li").remove();
            dat = respo.responseJSON;

            $("#details").append("<li class='list-group-item'>" + dat.description + "  </li>");


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