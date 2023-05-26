<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Stripe Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Laravel Stripe Payment
                    </div>
                    <div class="card-body">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <form method="POST" id="payment-form" action="{{ route('addmoney.paymentstripe') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="card_no" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="card_no" name="card_no" placeholder="Card Number">
                            </div>
                            <div class="mb-3">
                                <label for="ccExpiryMonth" class="form-label">Expiration Month</label>
                                <input type="text" class="form-control" id="ccExpiryMonth" name="ccExpiryMonth" placeholder="MM">
                            </div>
                            <div class="mb-3">
                                <label for="ccExpiryYear" class="form-label">Expiration Year</label>
                                <input type="text" class="form-control" id="ccExpiryYear" name="ccExpiryYear" placeholder="YYYY">
                            </div>
                            <div class="mb-3">
                                <label for="cvvNumber" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvvNumber" name="cvvNumber" placeholder="CVV">
                            </div>
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env("STRIPE_KEY") }}');
    var elements = stripe.elements();

    var card = elements.create('card');
    card.mount('#card-element');

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.confirmCardPayment("{{ $clientSecret }}", {
            payment_method: {
                card: card,
            }
        }).then(function(result) {
            if (result.error) {
                // Gérer les erreurs de paiement
            } else {
                // Paiement réussi
                window.location.href = "{{ route('payment.confirmation', $showId) }}";
            }
        });
    });
</script>

