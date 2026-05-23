$(document).ready(function(){

    getCartDetails();
    getCount();

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
                    getCount();
                }else{
                    alert(response.message);
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    });

    $(document).on('click','.btnLoadCart',function(e){
        e.preventDefault();
    })

    function getCount(){
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
    }

    function getCartDetails(){

        $.ajax({
            type:"GET",
            url:"/get-cart-details",
            dataType:"json",
            success:function(response){
                if(response.status == 200){
                    let results = response.dataSet
                    $('#cart-items-container').empty();
                    results.forEach(function(item){

                        let imageSource = `/storage/${item.product_image}`;

                        let itemHtml = `<div class="cart-item p-3 d-flex align-items-center border-bottom bg-white" style="transition: all 0.2s ease;">

                                            <div class="flex-shrink-0">
                                                <img src="${imageSource}" alt="${item.product_name}" class="img-fluid rounded border shadow-sm" style="width: 90px; height: 90px; object-fit: cover;">
                                            </div>

                                            <div class="flex-grow-1 ms-4">
                                                <h5 class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">${item.product_name}</h5>
                                                <p class="text-muted small mb-2 text-truncate" style="max-width: 350px;">${item.description || 'No description available'}</p>

                                                <div class="d-flex align-items-center gap-3">
                                                    <span class="badge bg-light text-dark border px-2 py-1" style="font-size: 0.85rem;">
                                                        Qty: <strong class="text-primary">${item.quantity}</strong>
                                                    </span>
                                                    <span class="fw-bold text-success" style="font-size: 1.1rem;">
                                                        Rs. ${(item.price * item.quantity).toLocaleString()}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0 ms-3 d-flex flex-column gap-2 text-end" style="min-width: 140px;">
                                                <button class="btn btn-success btn-sm w-100 py-2 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-1"
                                                >
                                                    Buy Now
                                                </button>
                                                <button class="btn btn-outline-danger btn-sm w-100 py-2 d-flex align-items-center justify-content-center gap-1 btnRemove"
                                                data-id=${item.id} data-productid=${item.product_id} data-userid=${item.user_id}>
                                                    Remove
                                                </button>
                                            </div>

                                        </div>`;

                        $('#cart-items-container').append(itemHtml);

                    });
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    }

    $(document).on('click','.btnRemove',function(){
        let cartId = $(this).data('id');
        let productId = $(this).data('productid');
        let userId = $(this).data('userid');

        console.log('pid',productId);

        let data = {
            "cartId":cartId,
            "productId":productId,
            "userId":userId
        }

        if(confirm('Are you sure?')){
            $.ajax({
                type:"POST",
                url:"/set-car-item-remove",
                data:data,
                dataType:"json",
                success:function(response){
                    alert(response.message);
                    getCartDetails();
                    getCount();
                },
                error:function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    });

});
