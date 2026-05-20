$(document).ready(function(){
    getProductDetails();

    $('#tblProdutDetails').DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        lengthChange: false,
        autoWidth: false,
        scrollCollapse: true,
        columnDefs: [
            { targets: [0, 1, 2, 3, 4, 5], className: 'text-center align-middle' },
            { targets: [6, 7], className: 'text-center align-middle', visible:false}
        ],

    });

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
                alert(response.message);
                getProductDetails();
            },
            error:function(xhr){
                console.log(xhr.responseText)
            }
        });
    });

    function getProductDetails(){
        $.ajax({
            type:"GET",
            url:"/get-product-details",
            dataType:"json",
            success:function (response) {
                console.log(response);
                $('#frmAddProduct')[0].reset();
                if(response.status == 200){
                    let data = response.resultData;
                    let formatedData = [];
                    let table = $('#tblProdutDetails').DataTable();
                    table.clear();
                    let index = 1;

                    $.each(data,function(key,row){
                        formatedData.push([
                            index,
                            row['product_name'],
                            row['description'],
                            row['price'],
                            row['stock_quantity'],
                            `<button class="btn btn-danger btnDelete" data-id = ${row['id']}>delete</button>
                            <button class="btn btn-success btnEdit" data-id = ${row['id']}>Edit</button>`,
                            row['product_image'],
                            row['category_id']
                        ]);
                        index++
                    });
                    table.rows.add(formatedData).draw();
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    }

    $(document).on('click','.btnDelete',function(e){
        e.preventDefault;
        let productId = $(this).data('id');

        data = {
            prduct_id:productId
        }

        if(confirm('Are you sure')){
                $.ajax({
                type:"POST",
                url:"/set-product-delete",
                data:data,
                dataType:"json",
                success:function(response){
                    alert(response.message);
                    getProductDetails();
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });

    $(document).on('click','.btnEdit',function(e){
        e.preventDefault();
        let row = $('#tblProdutDetails').DataTable().row($(this).closest('tr')).data();
        let pName = row[1];
        let description = row[2];
        let price = row[3];
        let stock = row[4];
        let image = row[6];
        let categoryId = row[7];
        let productId = $(this).data('id');

        $('#txtProductUpdateName').val(pName);
        $('#cmbUpdateCategoryId').val(categoryId);
        $('#txtUpdatePrice').val(price);
        $('#txtUpdateStockQuantity').val(stock);
        $('#txtUpdateDescription').val(description);
        $('#hidden_old_image_path').val(image);
        $('#hdnProductId').val(productId);

        $('#hdnOldPname').val(pName);
        $('#hdnOldCategory').val(categoryId);
        $('#hdnOldPrice').val(price);
        $('#hdnOldStockQuantity').val(stock);
        $('#hdnOldDescription').val(description);



        let oldImageURL = "/storage/" + image;
        $('#update_image_preview').attr('src', oldImageURL).show();
        $('#divModalUpdate').modal('show');

    });

    $(document).on('click','#btnUpdateProduct',function(e){
        e.preventDefault();
        let updatedProductName = $('#txtProductUpdateName').val();
        let updatedCategory = $('#cmbUpdateCategoryId').val();
        let updatedPrice = $('#txtUpdatePrice').val();
        let updatedQuantoty = $('#txtUpdateStockQuantity').val();
        let updatedDiscription = $('#txtUpdateDescription').val();
        let updatedImage = $('#update_product_image')[0].files[0];
        let productId = $('#hdnProductId').val();

        let oldName = $('#hdnOldPname').val();
        let oldPrice = $('#hdnOldPrice').val();
        let oldCategory = $('#hdnOldCategory').val();
        let oldQuantity = $('#hdnOldStockQuantity').val();
        let oldDescription = $('#hdnOldDescription').val();
        let oldImagePath = $('#hidden_old_image_path').val();



        let formData = new FormData();
        formData.append('updatedProductName',updatedProductName);
        formData.append('updatedCategory',updatedCategory);
        formData.append('updatedPrice',updatedPrice);
        formData.append('updatedQuantoty',updatedQuantoty);
        formData.append('updatedDiscription',updatedDiscription);
        formData.append('updatedImage',updatedImage);
        formData.append('productId',productId);
        formData.append('oldName',oldName);
        formData.append('oldPrice',oldPrice);
        formData.append('oldCategory',oldCategory);
        formData.append('oldQuantity',oldQuantity);
        formData.append('oldDescription',oldDescription);
        formData.append('oldImagePath',oldImagePath);

        console.log('dataset: ',formData);
        $.ajax({
            type:"POST",
            url:"/set-product-update",
            data:formData,
            dataType:"json",
            contentType: false,
            processData: false,
            success:function(response){
                if(response.status == 200){
                    alert(response.message);
                    $('#frmAddProductUpdate')[0].reset();
                    $('#divModalUpdate').modal('hide');
                }else{
                    alert(response.message);
                }
                getProductDetails();
            },
            error:function(xhr){
                console.log(xhr.responseText)
            }
        });
    });

    $('#update_product_image').change(function() {
    let file = this.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#lblImgTitile').text('New Product Image');
            $('#update_image_preview').attr('src', e.target.result).show();
        }
        reader.readAsDataURL(file);
    }
});

});
