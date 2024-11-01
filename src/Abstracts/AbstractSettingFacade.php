<?php
namespace Dreamfox\DeliveryDate\Abstracts;

class AbstractSettingFacade
{

  private $_repository;
  private $_modelClass;

  public function __construct($modelClassName, $repository)
  {
    $this->_repository = $repository;
    $this->_modelClass = $modelClassName;
  }

  public function load()
  {
    return $this->_repository->load();
  }

  public function save($data)
  {
    $item = new $this->_modelClass($data);
    $this->_repository->save($item);
  }
}