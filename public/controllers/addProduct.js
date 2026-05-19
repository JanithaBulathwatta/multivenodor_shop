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
                            `<button class="btn btn-danger btnDelete" data-id = ${row['id']}>delete</button>`
                        ])
                        index++
                    })
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

    })

});
