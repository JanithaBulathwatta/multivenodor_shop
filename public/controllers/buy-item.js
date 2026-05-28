$(document).ready(function(){
    $('#quantity').val(1);
    getOrderDetails();

    function getOrderDetails(){
        $('#divModalProductView').modal('hide');

        let savedProductId = sessionStorage.getItem('transferProductId');
        $('#hdnProductId').val(savedProductId);
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
        let productId = $('#hdnProductId').val();
        let quantity = $('#quantity').val();
        let unitPrice = $('#unit-price').val();
        let cusMobile = $('#txtCusMobile').val();
        let cusName = $('#txtCusName').val();
        data = {
            "totalAmpount":totalAmpount,
            "shippingAddress":shippingAddress,
            "shippingFee":shippingFee,
            "productId":productId,
            "quantity":quantity,
            "unitPrice":unitPrice,
            "cusMobile":cusMobile,
            "cusName":cusName
        }

        $.ajax({
            type: "POST",
            url: "/set-order-details",
            data: data,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    console.log('res',response)
                    Swal.fire({
                        title: '<strong>Order Placed!</strong>',
                        icon: 'success',
                        html:
                            'Your order is succesfull. <br>' +
                            '</b><br><br>' +
                            '<small class="text-muted">We will send a message you shortly to confirm the order..</small>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: true,
                        confirmButtonText: 'Continue Shopping 🛒',
                        confirmButtonColor: '#1e293b',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        background: '#ffffff',
                        customClass: {
                            popup: 'rounded-4',
                            confirmButton: 'px-4 py-2 fw-bold'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/get-show-products';
                        }
                    });
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    })
});

