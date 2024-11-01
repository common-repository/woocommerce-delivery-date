<?php
namespace Dreamfox\DeliveryDate\Interfaces;

interface RepositoryInterface
{

  public function save($item);
  public function load();
}