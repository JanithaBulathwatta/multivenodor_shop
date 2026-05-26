$(document).ready(function(){

    $('#btnBuy').click(function(e){
        e.preventDefault();
        let targetUrl = $(this).attr('href');
        $('#divModalProductView').modal('hide');
        let producuID = $('#hdnProductId').val();

        data = {
            productId:producuID
        }

        $.ajax({
            type: "GET",
            url: "/get-ordered-item-details",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response.result);
                let userResult = response.result;
                window.location.href = targetUrl;
                console.log('result',userResult);
            }
        });
    })
});

