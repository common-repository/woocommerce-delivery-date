import React from 'react'
import Heading from './Heading'
import Line from './Line'

const UpgradeTab = () => {
  return (
    <div className="dreamfox-tab">
      <Heading text="Upgrade" />
      <div style={{border: '5px dashed #B0E0E6', padding: '0 20px', background: 'white'}}>
          <h3>WooCommerce Delivery Date Premium</h3>
          <p>This plugin has a Premium version with these features:<br/>
          - Unlimited categories<br/>- Holidays<br/>- Working days<br/>- much more..<br/>
          <a href="http://www.dreamfoxmedia.com/shop/plugins/woocommerce-delivery-date-premium?utm_source=plugin&amp;utm_medium=buynow_link&amp;utm_campaign=dfm-wcpgpp-f" target="_blank" rel="noreferrer">See here all features and benefits</a>!
          </p>
      </div>
    </div>
  )
}

export default UpgradeTab
