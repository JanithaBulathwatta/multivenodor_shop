$(document).ready(function(){
    getOrderDetails();
    
    function getOrderDetails(){
        $.ajax({
            type: "GET",
            url: "/get-order-details",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    }

});
