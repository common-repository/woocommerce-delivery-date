<?php
namespace Dreamfox\DeliveryDate\Helpers;

class CartHelper
{

  public static function getCategories()
  {
    $categories = [];
    $cart = WC()->cart;
    foreach ($cart->cart_contents as $cartItem) {
      $product = $cartItem['data'];
      if (is_a($product, 'WC_Product_Variation')) {
	      $parent = wc_get_product($product->get_parent_id());
	      $ids = $parent->get_category_ids();
      } else {
      	$ids = $product->get_category_ids();
      }

      $categories = array_merge($categories, $ids);
    }
    return $categories;
  }
}