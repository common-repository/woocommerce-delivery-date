import React from 'react'
import Heading from './Heading'
import Line from './Line'

const InformationTab = () => {
  return (
    <div className="dreamfox-tab">
      <Heading text="Information" />
      <Line />
      <p>This plugin will allow the customer to choose an order delivery date on the checkout page. The customer can choose any delivery date that is after the current date plus days you specified here below.</p>
      <p>This version is limited in features. For just a small fee (19,95) you can get the Premium version with extra features and no limitation. To see all the premium features:<br/>
        <a href="https://www.dreamfoxmedia.com" target="_blank" rel="noreferrer">https://www.dreamfoxmedia.com/portfolio/woocommerce-delivery-date-premium/</a>
      </p>
      <Line />
    </div>
  )
}

export default InformationTab
