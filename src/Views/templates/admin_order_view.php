<?php
  $deliveryDate = $this->getDeliveryDate();
  $label = $this->getLabel();
?>
<div class="order_data_column">
  <h4><?php echo __('Delivery Date'); ?></h4>
  <p><?php echo $deliveryDate; ?></p>
</div>