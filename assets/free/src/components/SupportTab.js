import React from 'react'
import Heading from './Heading'
import Line from './Line'
import needHelpImage from '../assets/images/Need-Help.png';

const SupportTab = () => {
  return (
    <div className="dreamfox-tab">
      <Heading text="Support" />
      <Line />
      <div>
        <img src={needHelpImage} alt="help-button"/><br/><br/>
        Below you will find the top 5 questions in our FAQ. Maybe they can help you in the right direction.
        <ul className="ul-square">
          <li>
            <a href="https://www.dreamfoxmedia.com/knowledge-base/plugin-not-working?utm_source=plugin&amp;utm_medium=faq_link&amp;utm_campaign=dfm-wcpgpp-f" target="_blank" rel="noreferrer">The plugin is not working.</a>
          </li>
        </ul><br/>
        If your answer can not be found in the resources listed above, please use our support form on <a href="https://www.dreamfoxmedia.com/support-request-free-plugins?utm_source=plugin&amp;utm_medium=supform_link&amp;utm_campaign=dfm-wcpgpp-f" target="_blank" rel="noreferrer">Dreamfoxmedia.com</a>
      </div>
      <Line />
    </div>
  )
}

export default SupportTab
