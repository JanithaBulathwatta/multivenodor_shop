$(document).ready(function(){

    $('#btnAddProduct').click(function(e){
        e.preventDefault();
        let productName = $('#txtProductName').val();
        let productCategory = $('#cmbCategoryId').val();
        let price = $('#textPrice').val();
        let stockQuantity = $('#txtStockQuantity').val();
        let imageFile = $('#product_image')[0].files[0];
        let description = $('textarea[name="description"]').val();

        let formData = new FormData();
        formData.append('product_name', productName);
        formData.append('category_id', productCategory);
        formData.append('price', price);
        formData.append('stock_quantity', stockQuantity);
        formData.append('description', description);
        formData.append('product_image', imageFile);

        $.ajax({
            type:"POST",
            url:"/set-product-creat",
            data:formData,
            dataType:"json",
            contentType: false,
            processData: false,
            success:function(response){
                console.log('success')
            },
            error:function(xhr){
                console.log(xhr.responseText)
            }
        });
    });

});
