<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}">
    </script>
</head>
<body>

<h2>Pembayaran</h2>
<p>Order ID: {{ $order->id }}</p>

<button id="pay-button">Bayar dengan Midtrans</button>

<script>
document.getElementById('pay-button').onclick = function () {
    snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
            alert('Pembayaran sukses!');
            console.log(result);
        },
        onPending: function(result){
            alert('Menunggu pembayaran');
        },
        onError: function(result){
            alert('Pembayaran gagal');
        }
    });
};
</script>

</body>
</html>
