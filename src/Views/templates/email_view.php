<?php
$deliveryDate = $this->getDeliveryDate();
$label = $this->getLabel();
if (!empty($deliveryDate)) {
  echo sprintf('<p><strong>%s:</strong>%s</p>', $label, $deliveryDate);
}