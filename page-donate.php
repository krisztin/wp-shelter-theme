<?php
/*
  Template Name: Donation Page
*/
?>
<?php get_header(); ?>
<div class="container-full">
<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="donation-form">
  <div class="form-row">
    <label for="first_name">First Name</label>
    <input id="name" type="text" name="first_name" class="StripeElement StripeElement--empty" placeholder="Jane" />
  </div>
  <div class="form-row">
    <label for="last_name">Last Name</label>
    <input id="name" type="text" name="last_name" class="StripeElement StripeElement--empty" placeholder="Doe" />
  </div>
  <div class="form-row">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" class="StripeElement StripeElement--empty" placeholder="Email Address" />
  </div>
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>
  </div>
    <!-- Used to display Element errors. -->
  <div id="card-errors" role="alert"></div>

  <button class="btn btn-primary">Donate</button>
  <input type="hidden" name="action" value="donate_form">
</form>
</div>
<script>
// Create a Stripe client.
var stripe = Stripe('pk_test_IaXZQaipb4vrjKvJtoUrpYu5');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('donation-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('donation-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>
