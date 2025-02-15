<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('VOTRE_CLE_SECRETE'); //WIP not included.

$montant = $_POST['montant'] * 100; // Convertir en centimes

$paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => $montant,
    'currency' => 'eur',
]);

header("Location: paiement.php?clientSecret=" . $paymentIntent->client_secret);
?>