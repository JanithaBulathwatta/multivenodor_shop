
$(document).ready(function(){

    $(document).on('click','.btnView',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        let desc = $(this).data('desc');
        let img = $(this).data('image');

        $('#hdnProductId').val(id);
        $('#modalProdName').text(name);
        $('#modalProdPrice').text('Rs. ' + price);
        $('#modalProdDesc').text(desc);
        $('#modalProdImage').attr('src', img);
        $('#divModalProductView').modal('show');

        sessionStorage.setItem('transferProductId', id);

    });

    $(document).on('click', '#btnPlus', function(){
        let currentQty = parseInt($('#txtQuantity').val());
        if (!isNaN(currentQty)) {
            $('#txtQuantity').val(currentQty + 1);
        }
    });

    $(document).on('click', '#btnMinus', function(){
        let currentQty = parseInt($('#txtQuantity').val());
        if (!isNaN(currentQty) && currentQty > 1) {
            $('#txtQuantity').val(currentQty - 1);
        }
    });

    $('#btnToggleSearch').on('click', function() {
        $('#searchPanel').toggleClass('d-none');
    });

    $('#btnSearch').click(function(e){
        e.preventDefault();
        let serachKey = $('#txtSearch').val();

        let data = {
            "serachKey":serachKey
        }

        $.ajax({
            type: "GET",
            url: "/get-show-products",
            data: data,
            dataType: "json",
            success: function (response) {
                $('#product-list-container').html(response.html);
                $('#txtSearch').val('');
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

});
