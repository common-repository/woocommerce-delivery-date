<?php
namespace Dreamfox\DeliveryDate\Admin;

use Dreamfox\DeliveryDate\Abstracts\AbstractAssets;
use Dreamfox\DeliveryDate\Facades\SystemFacade;

class AssetsManager extends AbstractAssets
{
  const BUILD_TYPE = 'free';
  protected $_buildUrl;
  protected $_settings;

  public function __construct()
  {
    $jsonFilePath = sprintf('%s/assets/%s/build/asset-manifest.json', DREAMFOX_WDD_ABSPATH, $this->_getBuildType());
    $this->_settings = json_decode(file_get_contents( $jsonFilePath ), true);
    $this->_buildUrl = sprintf('%s/build', $this->_getBuildType());
  }

  protected function _getBuildType()
  {
    return self::BUILD_TYPE;
  }

  protected function _getEventName()
  {
    return 'admin_enqueue_scripts';
  }

  protected function _buildStyles()
	{
    $cssFilePath = $this->_buildUrl . $this->_settings['files']['main.css'];
		return [
			'base' => array(
				'src'     => $this->getAssetUrl( 'admin.css' ),
			),
			'style' => array(
				'src'     => $this->getAssetUrl( $cssFilePath ),
			),
		];
	}

  protected function _buildScripts()
	{
    $jsFilePath = $this->_buildUrl . $this->_settings['files']['main.js'];

		return [
			'script' => array(
				'src'     => $this->getAssetUrl( $jsFilePath ),
        'localizer' => $this->_buildLocalizerParams(),
			),
		];
	}

  protected function _buildLocalizerParams()
  {
    $facade = SystemFacade::getInstance();
    $settings = $facade->loadSettings();
    return [
      'params' => [
        'categories' => $settings->getCategories(),
        'deliveryDays' => $settings->getDeliveryDays(),
        'assetImageUrl' => $this->getAssetUrl('/images'),
      ],
    ];
  }
}