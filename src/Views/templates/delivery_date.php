<?php

use Dreamfox\DeliveryDate\Helpers\DateHelper;

  $checkout = WC()->checkout();
  if (!array_key_exists(DREAMFOX_WDD_FIELD_NAME, $checkout->checkout_fields)) {
    return false;
  }
?>
<div class="dreamfox-delivery-date" id="dd__checkout_field">
  <h3><?php echo __('Delivery Info', 'dreamfox-wdd'); ?></h3>
    <?php foreach ($checkout->checkout_fields[DREAMFOX_WDD_FIELD_NAME] as $key => $field) : ?>
      <?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
    <?php endforeach; ?>
</div>


<script type="text/javascript">
  (function($){
    $(document).ready(function() {
      $('#<?php echo DREAMFOX_WDD_FIELD_NAME; ?>').datepicker({
        dateFormat : '<?php echo DateHelper::getJsDateFormat(get_option( 'date_format' )) ?>',
        minDate: <?php echo $this->getMinDate(); ?>,
      });
    })
  })(jQuery);
</script>