<?php
  require_once('vendor/autoload.php');

  \Stripe\Stripe::setApiKey("sk_test_0oCeLBHOQ4avBosyCiGvAesD");

// Sanitising post array

$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create donor in Stripe

$donor = \Stripe\donor::create(array(
  "email" => $email,
  "source" => $token
));

// Get the payment token ID submitted by the form:

$charge = \Stripe\Charge::create([
    'amount' => 999, //make dynamic??
    'currency' => 'gbp',
    'description' => 'Donation to Cat Shelter',
    'donor' => $donor->id,
    'source' => $token,
]);

// Redirect at success

header('Location: success.php?tid=' . $charge->id . '&donation=' . $charge->amount);
