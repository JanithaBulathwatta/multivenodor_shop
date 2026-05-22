
$(document).ready(function(){
    console.log('work');

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

});
