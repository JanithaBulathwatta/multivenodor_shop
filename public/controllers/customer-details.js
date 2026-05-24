$(document).ready(function(){

    $("#frmCustomerForm").validate({

        rules: {
            customer_name: {
                required: true,
                minlength: 3
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 12
            },
            address: {
                required: true
            },
            postal_code: {
                required: true,
                digits: true
            },
            country: {
                required: true
            }
        },
        messages: {
            customer_name: {
                required: "This field is required.",
                minlength: "At least three letters need"
            },
            mobile: {
                required: "This field is required.",
                digits: "only digits",
                minlength: "Only 10 digits"
            },
            address: {
                required: "This field is required."
            },
            postal_code: {
                required: "This field is required.",
            },
            country: {
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

    $('#btnSubmit').click(function(){

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

        if($("#frmCustomerForm").valid()){
            setCustomerDetails(data);
        }
    });

    function setCustomerDetails(data){
        $.ajax({
            type: "POST",
            url: "",
            data: data,
            dataType: "json",
            success: function (response) {
                
            },
            error:function(xhr){

            }
        });
    }

});
