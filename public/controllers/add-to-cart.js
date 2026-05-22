$(document).ready(function(){

    $(document).on('click','.btnAddToCart',function(){
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

            },
            error:function(xhr){

            }
        });
    })

});
