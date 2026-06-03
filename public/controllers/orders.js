$(document).ready(function(){
    getOrderDetails();

    function getOrderDetails() {
    $.ajax({
        type: "GET",
        url: "/get-order-details", // උඹේ Route URL එක
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {

                let orders = response.result;
                let htmlContent = ''; // HTML ටික එකතු කරලා තියාගන්න හිස් variable එකක්

                // 1. ඕඩර්ස් මුකුත්ම නැත්නම් පණිවිඩයක් පෙන්වනවා
                if(orders.length === 0) {
                    $('#orders-list-container').html('<div class="text-center py-5 text-muted">No orders found!</div>');
                    return;
                }

                // 2. Orders ලිස්ට් එක ලූප් එකක් ඇතුළේ කරකවනවා
                orders.forEach(function(order) {

                    // Order Status එක අනුව Badge එකේ කලර් එක තීරණය කිරීම
                    let statusStyle = '';
                    let status = order.order_status.toLowerCase();
                    if(status === 'pending') { statusStyle = 'background-color: #fef3c7; color: #d97706;'; }
                    else if(status === 'shipped') { statusStyle = 'background-color: #e0f2fe; color: #0369a1;'; }
                    else if(status === 'delivered') { statusStyle = 'background-color: #dcfce7; color: #15803d;'; }
                    else { statusStyle = 'background-color: #fee2e2; color: #b91c1c;'; }

                    // මුදල් ගණන් වලට දශම තිත දාගන්න ලේසිම ක්‍රමය (JS NumberFormat)
                    let formattedPrice = parseFloat(order.price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    let formattedShipping = parseFloat(order.shipping_fee).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    let formattedTotal = (parseFloat(order.price) + parseFloat(order.shipping_fee)).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                    // HTML කාඩ් එක ස්ට්‍රින්ග් එකක් විදිහට එකතු කරගන්නවා
                    htmlContent += `
                    <div class="order-card p-3 p-md-4 rounded-4 shadow-sm mb-3" style="border: 1px solid #f1f5f9; background: #ffffff; transition: all 0.25s ease;">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

                            <div class="d-flex align-items-center gap-3 w-100">
                                <div class="order-img-wrap border" style="width: 90px; height: 90px; background: #f8fafc; border-radius: 12px; overflow: hidden; flex-shrink: 0;">
                                    <img src="/storage/${order.product_image}" alt="${order.product_name}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <div class="flex-grow-1 text-truncate">
                                    <span class="text-uppercase text-muted fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Ordered Item</span>
                                    <h6 class="fw-bold mb-1 text-truncate" style="color: #0f172a; font-size: 1.05rem;">${order.product_name}</h6>
                                    <div class="d-flex flex-wrap gap-2 align-items-center mt-1" style="font-size: 0.85rem; color: #64748b;">
                                        <span>Price: <strong class="text-dark">Rs. ${formattedPrice}</strong></span>
                                        <span class="text-muted">•</span>
                                        <span>Shipping: <strong class="text-dark">Rs. ${formattedShipping}</strong></span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row flex-md-column justify-content-between justify-content-md-center align-items-end w-100 w-md-auto gap-2 border-top border-md-top-0 pt-3 pt-md-0">
                                <span class="badge px-3 py-2 rounded-3 fw-semibold text-uppercase" style="font-size: 11px; letter-spacing: 0.5px; ${statusStyle}">
                                    ${order.order_status}
                                </span>

                                <div class="text-end mt-md-2">
                                    <span class="text-muted d-block" style="font-size: 11px;">Total Amount</span>
                                    <span class="fw-bold fs-5" style="color: #ef4444;">Rs. ${formattedTotal}</span>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3 pt-3 border-top" style="font-size: 0.85rem; color: #64748b;">
                            <div class="row g-2">
                                <div class="col-sm-7">
                                    <div class="d-flex align-items-start gap-1">
                                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="mt-0.5 flex-shrink-0 text-muted">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.244a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-truncate"><strong>Delivery to:</strong> ${order.shipping_address}</span>
                                    </div>
                                </div>
                                <div class="col-sm-5 text-sm-end">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-muted">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <span><strong>Payment:</strong> ${order.payment_method}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });

                // 3. අන්තිමට ලූප් එකෙන් හැදුනු සම්පූර්ණ HTML එක එක පාරින්ම div එකට ඔබනවා
                $('#orders-list-container').html(htmlContent);

            } else {
                $('#orders-list-container').html('<div class="text-center py-5 text-danger">Failed to load orders!</div>');
            }
        },
        error: function (xhr) {
            console.log("Error loading orders!");
            $('#orders-list-container').html('<div class="text-center py-5 text-danger">Something went wrong!</div>');
        }
    });
}

});
