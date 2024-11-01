<?php
namespace Dreamfox\DeliveryDate\Site;

use Dreamfox\DeliveryDate\Abstracts\AbstractAssets;

class AssetsManager extends AbstractAssets
{

  protected function _getEventName()
  {
    return 'wp_enqueue_scripts';
  }

  protected function _buildStyles()
	{
		return [
			'frontend' => array(
				'src'     => $this->getAssetUrl( 'frontend.css' ),
			),
		];
	}

  protected function _buildScripts()
	{
		return [];
	}

	public function registerScripts()
	{
		parent::registerScripts();

		// Load the datepicker script (pre-registered in WordPress).
    wp_enqueue_script( 'jquery-ui-datepicker' );

    // You need styling for the datepicker. For simplicity I've linked to the jQuery UI CSS on a CDN.
    wp_register_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );
	}

	protected function _getBuildType()
  {
    return 'free';
  }
}