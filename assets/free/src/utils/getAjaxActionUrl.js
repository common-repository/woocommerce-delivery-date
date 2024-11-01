import Configuration from "../Configuration";

const getAjaxActionUrl = (actionName) => {
  const config = Configuration.getInstance();
  const requestUrl = config.ajax_url + ( config.ajax_url.indexOf( '?' ) > 0 ? '&' : '?' )+ 'action=dreamfox_wdd_'+actionName;

  return requestUrl;
}

export default getAjaxActionUrl;