$(document).ready(function(){

    $("#frmCustomerForm").validate({

        rules: {
            txtCustomerName: {
                required: true,
                minlength: 3
            },
            txtMobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            txtAddress: {
                required: true
            },
            txtPostalCode: {
                required: true,
                digits: true
            },
            txtCountry: {
                required: true
            }
        },
        messages: {
            txtCustomerName: {
                required: "This field is required.",
                minlength: "At least three letters need"
            },
            txtMobile: {
                required: "This field is required.",
                digits: "only digits",
                minlength: "10 digits should include"
            },
            txtAddress: {
                required: "This field is required."
            },
            txtPostalCode: {
                required: "This field is required.",
            },
            txtCountry: {
                required: "This field is required."
            }
        },

        errorElement: "span",
        errorClass: "text-danger small d-block mt-1",

        highlight: function(element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#btnSubmit').click(function(e){
        e.preventDefault();

        let name = $('#txtCustomerName').val();
        let address = $('#txtAddress').val();
        let mobile = $('#txtMobile').val();
        let country = $('#txtCountry').val();
        let postalCode = $('#txtPostalCode').val();

        data = {
            "name":name,
            "address":address,
            "mobile":mobile,
            "country":country,
            "postalCode":postalCode
        }

        console.log('data',data);

        if($("#frmCustomerForm").valid()){
            setCustomerDetails(data);
        }
    });

    function setCustomerDetails(data){
        $.ajax({
            type: "POST",
            url: "/set-customer-details",
            data: data,
            dataType: "json",
            success:function(response){
                if(response.status == 200){
                    Swal.fire({
                    title: 'Success!',
                    text: response.message,
                    icon: 'success',
                    confirmButtonText: 'ok'
                });
                $('#frmCustomerForm')[0].reset();
                }else{
                    Swal.fire({
                    title: 'Warning!',
                    text: response.message,
                    icon: 'warning',
                    confirmButtonText: 'ok'
                });
                $('#frmCustomerForm')[0].reset();
                }
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }
        });
    }

});
