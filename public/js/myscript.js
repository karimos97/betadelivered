var clickedBtnID;
$(document).ready(function() {
    $(".myselect").select2({
        tags: true
    });
    $(document).on("click", ".targe", function() {
        var clickedBtnID = $(this).attr('id');
        console.log(clickedBtnID)
        var jqxhr = $.getJSON("/api/order/" + clickedBtnID.trim(), function() {
            $('#Ecity').val(jqxhr.responseJSON.city)
            $('#Ecountry').val(jqxhr.responseJSON.country)
            $('#Efull_name').val(jqxhr.responseJSON.full_name)
            $('#Ephone').val(jqxhr.responseJSON.phone)
            $('#Eadress').val(jqxhr.responseJSON.adress)
        });
        var respo = $.getJSON("/api/order/details/" + clickedBtnID.trim(), function() {
            $("li").remove();
            dat = respo.responseJSON;
            for (i = 0; i < dat.length; i++) {

                $("#details").append("<li class='list-group-item'>" + dat[i].brand + ' ' + dat[i].name + ' ' + dat[i].price + " $ </li>");

            }
        })

        $("form").attr("action", "/order/" + clickedBtnID);



    });


})