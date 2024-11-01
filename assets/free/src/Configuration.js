class Configuration {
  static instance = null;

  static getInstance() {
    if (this.instance == null) {
      this.instance = new Configuration();
    }
    return this.instance;
  }

  get is_debug() {
    return false;
  }

  get ajax_url() {
    return window.ajaxurl;
  }

  get categories() {
    let cats = []
    for (let i=0; i<10; i++) {
      cats.push({value: 'cat'+i, label: 'Category '+i})
    }
    return cats
  }

  get selectedCategories()
  {
    return window.dreamfox_wdd_params['categories'];
  }

  get deliveryDays()
  {
    return window.dreamfox_wdd_params['deliveryDays'];
  }

  get asset_images_url() {
    return window.dreamfox_wdd_params['assetImageUrl'];
  }
}

export default Configuration