import React from 'react'
import Configuration from '../Configuration';
import Heading from './Heading'
import Line from './Line'

const NewsletterTab = () => {
  var newsletterImage = Configuration.getInstance().asset_images_url + '/newsletter-button.png';
  console.log(newsletterImage)
  return (
    <div className="dreamfox-tab">
      <Heading text="Newsletter" />
      <Line />
      <img src={newsletterImage} alt="newsletter-button" />
      <br/><br/>
      <iframe width="100%" height="500" allowtransparency="true" frameBorder="0" scrolling="no" style={{border:'none'}} src="https://www.dreamfoxmedia.com/mailster/form?id=1&style=1"></iframe>
      <br/><br/>
      <Line />
    </div>
  )
}

export default NewsletterTab
