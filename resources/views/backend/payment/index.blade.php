<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <form action="{{ route('payment.process') }}" method="post">
            @csrf
            @method('POST')
            <button type="submit">Bayar oi</button>
        </form>
    </div>
</body>
</html>
