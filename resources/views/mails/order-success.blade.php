<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8fafc; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e2e8f0;">
        <h2 style="color: #1e293b;">Thank You for Your Order! 🎉</h2>
        <p>Hi,</p>
        <p>We have successfully received your order. We will make sure you receive your order quickly.</p>

        <div style="background-color: #f1f5f9; padding: 15px; border-radius: 6px; margin: 20px 0;">
            <p style="margin: 0;"><strong>Total Amount:</strong> Rs. {{ number_format($order->total_amount, 2) }}</p>
            <p style="margin: 5px 0 0 0;"><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
        </div>

        <p style="font-size: 12px; color: #64748b;">This is an automatic email from the system.</p>
    </div>

</body>
</html>
