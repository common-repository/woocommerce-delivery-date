<?php
  $deliveryDate = $this->getDeliveryDate();
  $label = $this->getLabel();
?>
<div>
  <header class="title">
    <h3><?php echo $label; ?></h3></header>
    <dl>
      <?php echo $deliveryDate; ?>
    </dl>
</div>