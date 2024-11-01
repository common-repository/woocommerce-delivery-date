import React, { useState } from 'react'
import { apiSaveSettings } from '../api/setttingApi'
import Configuration from '../Configuration'
import Heading from './Heading'
import Loading from './Loading'
import SelectCategories from './SelectCategories'

const SettingsTab = () => {
  const [saving, setSaving] = useState(false);
  const config = Configuration.getInstance()
  const [categories, setCategories] = useState(config.selectedCategories)
  const [deliveryDays, setDeliveryDays] = useState(config.deliveryDays)
  const handleChangeCategories = categories => {
    setCategories([...categories])
  }
  const handleChangeDeliveryDays = (e) => {
    setDeliveryDays(parseInt(e.target.value))
  }
  const handleSaveChanges = (e) => {
    e.preventDefault()
    setSaving(true);
    console.log(categories, deliveryDays)

    apiSaveSettings({
      deliveryDays: deliveryDays,
      categories: categories
    }, (response) => {
      console.log(response)
      setSaving(false);
    })
  }
  return (
    <div className="dreamfox-tab">
      <Heading text="Settings" />
      <div className="dreamfox-content">
        <div className="dreamfox-field no-of-delivery">
          <label className="dreamfox-field__label">No of day's to Delivery</label>
          <div className="dreamfox-field__content">
            <input type="text" defaultValue={deliveryDays} onChange={handleChangeDeliveryDays} name="delivery_date[no_of_days_to_deliver]" /><br/>
            <small>How many days user can select delivery date</small>
          </div>
        </div>
        <div className="dreamfox-field">
          <label className="dreamfox-field__label">Applicable Categories</label>
          <small>Select categories for to choose delivery date on checkout</small>
          <SelectCategories defaultValues={categories} onChange={handleChangeCategories}></SelectCategories>
          <small>You can select ONLY TWO categories. If you want more categories then use our premium version:<br/>
            <a href="https://www.dreamfoxmedia.com/portfolio/woocommerce-delivery-date-premium?utm_source=plugin&amp;utm_medium=brief_plugin_link&amp;utm_campaign=dfm-wcpgpp-f" target="_blank">https://www.dreamfoxmedia.com/portfolio/woocommerce-delivery-date-premium/</a>
          </small>
        </div>
        {saving && <Loading message="Saving..." />}
        {!saving && <input className="button-large button-primary" type="submit" value="Save Changes" onClick={handleSaveChanges}></input>}
      </div>
    </div>
  )
}

export default SettingsTab
