<div class="container-full container">
  <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
    <legend>Filters: </legend>
        <label><input type="radio" name="gender" value="" checked>All</label>
        <label><input type="radio" name="gender" value="male">Male</label>
        <label><input type="radio" name="gender" value="female">Female</label>
        <button>Apply filter</button>
        <input type="hidden" name="action" value="myfilter">
  </form>
</div>

<script>
  jQuery(function($){
    $('#filter').submit(function(){
      var filter = $('#filter');
      $.ajax({
        url:filter.attr('action'),
        data:filter.serialize(), // form data
        type:filter.attr('method'), // POST
        beforeSend:function(xhr){
          filter.find('button').text('Processing...');
        },
        success:function(data){
          filter.find('button').text('Apply filter');
          $('#response').html(data); // insert data
        }
      });
      return false;
    });
  });
</script>