<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
</head>

<body>

    <h2>Checkout</h2>
    <p>Total Bayar: <b>Rp {{ number_format($total) }}</b></p>

    <form action="/pay" method="POST">
        @csrf
        <button type="submit">Bayar Sekarang</button>
    </form>

</body>

</html>
