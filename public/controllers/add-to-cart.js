$(document).ready(function(){

    $(document).on('click','.btnAddToCart',function(e){
        e.preventDefault();
        let productId = $('#hdnProductId').val();
        let quantity = $('#txtQuantity').val();
        let user_id = USER;

        let data = {
            'productId':productId,
            'quantity':quantity,
            'user_id':user_id
        }

        $.ajax({
            type:"POST",
            url:"/set-add-to-cart",
            data:data,
            dataType:"json",
            success:function(response){
                if(response.status == 200){
                    alert(response.message)
                    $('#divModalProductView').modal('hide');
                    $('#txtQuantity').val(1);
                        $.ajax({
                            type:"GET",
                            url:"/get-cart-count",
                            dataType:"json",
                            success:function (response){
                                if(response.status == 200){
                                    let cartCount = response.cart_count;
                                    console.log('count: ',cartCount);
                                    $('#lblCartCount').text(cartCount);
                                }
                            },
                            error:function(xhr){
                                console.log(xhr.responseText);
                            }
                        });
                }else{
                    alert(response.message);
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

});
