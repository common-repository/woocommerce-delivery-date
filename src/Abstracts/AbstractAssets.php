<?php
namespace Dreamfox\DeliveryDate\Abstracts;

use Dreamfox\DeliveryDate\Helpers\StringHelper;
use Dreamfox\DeliveryDate\Interfaces\AssetsInterface;

abstract class AbstractAssets implements AssetsInterface
{
  public function register()
  {
    $eventName = $this->_getEventName();
		add_action( $eventName, array( $this, 'registerStyles' ) );
		add_action( $eventName, array( $this, 'registerScripts' ) );
  }

  public function registerStyles()
  {
    $styles = $this->_buildStyles();
    foreach ( $styles as $name => $props ) {
      $handle = StringHelper::prefix( $name );
      $deps = isset( $props['deps'] ) ? $props['deps'] : [];
      wp_register_style( $handle, $props['src'], $deps, DREAMFOX_WDD_VERSION, 'all', false );
      wp_enqueue_style( $handle );
    }
  }

  public function registerScripts()
  {
    $scripts = $this->_buildScripts();
    foreach ( $scripts as $name => $props ) {
      $handle = StringHelper::prefix( $name );
      $deps = isset( $props['deps'] ) ? $props['deps'] : [];
      wp_register_script( $handle, $props['src'], $deps, DREAMFOX_WDD_VERSION, true );
      wp_enqueue_script( $handle );
      $this->_buildLocalizeScripts( $handle, $props );
    }
  }

  private function _buildLocalizeScripts( $name, $props )
  {
    if ( isset( $props['localizer'] ) ) {
      $localizer = $props['localizer'];
      foreach ( $localizer as $objectName => $scriptData ) {
        wp_localize_script( $name, StringHelper::prefix( $objectName ), $scriptData );
      }
    }
  }

  protected function getAssetUrl( $path )
  {
		return plugins_url( 'assets/' . $path, DREAMFOX_WDD_PLUGIN_FILE );
  }

  public function getRelativeStaticUrl()
  {
    $url = $this->getAssetUrl($this->_getBuildType().'/build/static');

    $domainUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/';
    $relativeUrl = str_replace($domainUrl, '', $url);
    return $relativeUrl;
  }

  abstract protected function _getEventName();
  abstract protected function _buildStyles();
  abstract protected function _buildScripts();
  abstract protected function _getBuildType();
}