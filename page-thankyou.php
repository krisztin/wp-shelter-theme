<?php
/*
  Template Name: Donation Thank You page
*/
?>

<?php if (!empty($_GET['amount'])) {
  $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

  $amount = $GET['amount'];
} else {
  wp_redirect( home_url() ); exit;
}

?>

<?php get_header(); ?>

<div class="container-full">
  <h1>Thank you for your donation of <?php echo $amount; ?></h1>
  <a href="<?php echo get_home_url(); ?>" class="btn btn-primary">Check out our cats</a>or<a href="#" class="btn btn-secondary">Read cat News</a>
</div>

<?php get_footer(); ?>