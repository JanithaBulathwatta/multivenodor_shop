$(document).ready(function(){

    getOrderDetails();

    function getOrderDetails(){
        $('#divModalProductView').modal('hide');

        let savedProductId = sessionStorage.getItem('transferProductId');

        data = {
            productId:savedProductId
        }

        $.ajax({
            type: "GET",
            url: "/get-ordered-item-details",
            data: data,
            dataType: "json",
            success: function (response) {
                let userResult = response.cusResult;
                let productResult = response.productResult;

                userResult.forEach(function(item){
                    $('#txtCusName').val(item.cus_name);
                    $('#txtCusMobile').val(item.mobile);
                    $('#txtCusAddress').val(item.address);
                });

                productResult.forEach(function(item){
                    $('#unit-price').val(item.price);
                    $('#unit-price').text('Rs. '+item.price+'.00');
                    $('#txtProductDescription').text(item.description);
                    $('#txtProductName').text(item.product_name);
                    let image_source = `/storage/${item.product_image}`;
                    $('#imgProdcutImage').attr('src',image_source);
                });

                let subtotal = parseInt($('#unit-price').val());
                $('#subtotal').text('Rs. '+subtotal+'.00');
                let fullToatal = subtotal + 350;
                $('#txtTotalPrice').text('Rs. '+ fullToatal+ '.00');
                $('#txtTotalPrice').val(fullToatal);

            }
        });
    }

    $(document).on('change','#quantity',function(e){
        e.preventDefault();
        let qval = $('#quantity').val();
        let curentVal = parseInt($('#unit-price').val());
        let total = curentVal*qval;
        $('#subtotal').text('Rs. '+total+'.00');
        let fullToatal = total +350;
        $('#txtTotalPrice').text('Rs. '+ fullToatal+ '.00');
        $('#txtTotalPrice').val(fullToatal);
    });

    $('#btnConfirmOrder').click(function(e){
        e.preventDefault();
        let totalAmpount = $('#txtTotalPrice').val();
        let shippingAddress = $('#txtCusAddress').val();
        let shippingFee = $('#shipping').data('fee');

        data = {
            "totalAmpount":totalAmpount,
            "shippingAddress":shippingAddress,
            "shippingFee":shippingFee
        }

        $.ajax({
            type: "POST",
            url: "url",
            data: data,
            dataType: "json",
            success: function (response) {

            }
        });
    })
});

