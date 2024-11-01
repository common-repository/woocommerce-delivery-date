<?php
namespace Dreamfox\DeliveryDate\Abstracts;

abstract class AbstractAjax
{

  const AJAX_KEY = 'dreamfox-wdd-ajax';
  const AJAX_PREFIX = 'dreamfox_wdd_';
  /**
	 * Hook in ajax handlers.
	 */
	public function init() {
		add_action( 'init', array( $this, 'defineAjax' ), 0 );
		add_action( 'template_redirect', array( $this, 'doAjax' ), 0 );
    $this->addAjaxEvents();
	}

	/**
	 * Set WC AJAX constant and headers.
	 */
	public function defineAjax() {
		// phpcs:disable
		if ( ! empty( $_GET[self::AJAX_KEY] ) ) {
			wsiaca_maybe_define_constant( 'DOING_AJAX', true );
			wsiaca_maybe_define_constant( 'DREAMFOX_WDD_DOING_AJAX', true );
			if ( ! WP_DEBUG || ( WP_DEBUG && ! WP_DEBUG_DISPLAY ) ) {
				@ini_set( 'display_errors', 0 ); // Turn off display_errors during AJAX events to prevent malformed JSON.
			}
			$GLOBALS['wpdb']->hide_errors();
		}
		// phpcs:enable
	}

	/**
	 * Send headers for WC Ajax Requests.
	 *
	 * @since 2.5.0
	 */
	private function _sendHeaders() {
		if ( ! headers_sent() ) {
			send_origin_headers();
			send_nosniff_header();
			nocache_headers();
			header( 'Content-Type: text/html; charset=' . get_option( 'blog_charset' ) );
			header( 'X-Robots-Tag: noindex' );
			status_header( 200 );
		}
	}

	/**
	 * Check for WSIACA Ajax request and fire action.
	 */
	public function doAjax() {
		global $wp_query;

		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		if ( ! empty( $_GET[self::AJAX_KEY] ) ) {
			$wp_query->set( self::AJAX_KEY, sanitize_text_field( wp_unslash( $_GET[self::AJAX_KEY] ) ) );
		}

		$action = $wp_query->get(self::AJAX_KEY);

		if ( $action ) {
			$this->_sendHeaders();
			$action = sanitize_text_field( $action );
			do_action( self::AJAX_PREFIX . '_ajax_' . $action );
			wp_die();
		}
		// phpcs:enable
	}

  protected function _getRequestData()
	{
		$request_body = file_get_contents('php://input');
		$result = json_decode($request_body);
    $data = $result->data;
		return $data;
	}

  public function addAjaxEvents()
  {
    $events = $this->getAjaxEvents();
    foreach ( $events as $event ) {
			add_action( 'wp_ajax_'. self::AJAX_PREFIX . $event, array( $this, $event ) );
			add_action( 'wp_ajax_nopriv_'. self::AJAX_PREFIX . $event, array( $this, $event ) );
		}
  }

  abstract public function getAjaxEvents();
}