<?php
namespace Dreamfox\DeliveryDate\Views;

use Dreamfox\DeliveryDate\Interfaces\ApplicationInterface;

class BaseView
{

  protected $_template = 'empty';
  protected $_app;
  protected $_childrenHtml = '';

  public function __construct(ApplicationInterface $app)
  {
    $this->_app = $app;
  }

  public function render()
  {
    $html = '';
    $template_file = dirname(__FILE__).'/templates/'. $this->_template.'.php';
    if (file_exists($template_file)) {
      ob_start();
      include($template_file);
      $html = ob_get_clean();
    }
    return $html;
  }

  public function getTemplate()
  {
    return $this->_template;
  }

  public function setTemplate($name)
  {
    $this->_template = $name;
  }

  public function getApp()
  {
    return $this->_app;
  }

  public function getChildrenHtml()
  {
    return $this->_childrenHtml;
  }

  public function setChildrenHtml($value)
  {
    $this->_childrenHtml = $value;
  }
}