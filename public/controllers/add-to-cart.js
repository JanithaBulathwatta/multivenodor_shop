$(document).ready(function(){

    $(document).on('click','.btnAddToCart',function(){
        let productId = $('#hdnProductId').val();
        let quantity = $('#txtQuantity').val();
        let user_id = USER;

        console.log('id: ',productId);
        console.log('quantity: ',quantity);
        console.log('user_id: ',user_id);
    })

});
