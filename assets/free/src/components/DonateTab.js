import React from 'react'
import Heading from './Heading'
import Line from './Line'
import donation from '../assets/images/donation.png';
const DonateTab = () => {
  return (
    <div className="dreamfox-tab">
      <Heading text="Donate" />
      <Line />
      <img src={donation} alt="help-button" />
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <center>
            Like this product we've made and want to contribute to its future development? Donate however much you'd like with the below donate button<br/>
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="UNTLWQSLRH85U" />
            <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online." />
        </center>
      </form>
      <Line />
    </div>
  )
}

export default DonateTab
