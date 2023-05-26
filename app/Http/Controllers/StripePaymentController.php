<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Stripe;
use Exception;


class StripePaymentController extends Controller
{
    public function paymentStripe(Request $request)
    {
        $showId = $request->input('show_id');
        $amount = $request->input('amount');

        // Effectuer les étapes nécessaires pour effectuer le paiement avec Stripe
        // Utiliser les données reçues dans $showId et $amount pour effectuer le paiement

        // Exemple de code pour effectuer le paiement avec Stripe
        Stripe::setApiKey('sk_test_51N9UABDU5RYMMy89HJq4LhFD5zBVPvtlS2tGd2glpYMxY1h8rmoYw8qE0dQCB3zkztxujuWdFyPltoPSJy3hPY2B00wdHSGiyc');

        try {
            Charge::create([
                'amount' => $amount * 100, // Le montant doit être en centimes
                'currency' => 'eur',
                'source' => $request->input('stripeToken'),
                'description' => 'Paiement pour le spectacle',
            ]);

            // Paiement réussi, rediriger vers la page de confirmation
            return redirect()->route('payment.confirmation', $showId);
        } catch (\Exception $e) {
            // Erreur lors du paiement, afficher un message d'erreur ou rediriger vers une page d'échec
            return back()->with('error', 'Une erreur est survenue lors du paiement. Veuillez réessayer.');
        }
    }

    public function handlePayment(Request $request)
    {
    $showId = $request->input('show_id');
    $amount = 100; // Montant à récupérer à partir de la base de données ou d'autres sources

    try {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = Stripe\PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'eur',
        ]);

        return view('stripe', [
            'clientSecret' => $intent->client_secret,
            'showId' => $showId,
        ]);
    } catch (Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }




    public function postPaymentStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
        ]);

        $input = $request->except('_token');

        if ($validator->passes()) {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            try {
                $token = $stripe->tokens->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    return redirect()->route('addmoney.paymentstripe');
                }

                $charge = $stripe->charges->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => 20.49, // Montant à charger
                    'description' => 'wallet',
                ]);

                if ($charge['status'] == 'succeeded') {
                    dd($charge);
                    return redirect()->route('addmoney.paymentstripe');
                } else {
                    return redirect()->route('addmoney.paymentstripe')->with('error', 'Money not add in wallet!');
                }
            } catch (\Exception $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return redirect()->route('addmoney.paymentstripe')->with('error', $e->getMessage());
            }
        }
    }
}
