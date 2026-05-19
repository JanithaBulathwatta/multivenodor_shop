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
                            <button class="btn btn-success btnEdit">Edit</button>`,
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
        let categoryId = row[7]

        $('#txtProductUpdateName').val(pName);
        $('#cmbUpdateCategoryId').val(categoryId);
        $('#textUpdatePrice').val(price);
        $('#txtUpdateStockQuantity').val(stock);
        $('#txtUpdateDescription').val(description);
        $('#hidden_old_image_path').val(image);

        let oldImageURL = "/storage/" + image;
        $('#update_image_preview').attr('src', oldImageURL).show();
        $('#divModalUpdate').modal('show');

    });

    $(document).on('click','#btnUpdateProduct',function(e){
        e.preventDefault();
        
    });

});
