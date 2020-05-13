var clickedBtnID;
$(document).ready(function() {
    $("#myselect").select2({
        tags: true
    });
    $(document).on("click", ".targe", function() {
        var clickedBtnID = $(this).attr('id');
        var jqxhr = $.getJSON("http://delivred.test/api/order/" + clickedBtnID, function() {
            $('#Ecity').val(jqxhr.responseJSON.city)
            $('#Ecountry').val(jqxhr.responseJSON.country)
            $('#Efull_name').val(jqxhr.responseJSON.full_name)
            $('#Ephone').val(jqxhr.responseJSON.phone)
            $('#Eadress').val(jqxhr.responseJSON.adress)
        })

        $("form").attr("action", "/order/" + clickedBtnID);



    });


})