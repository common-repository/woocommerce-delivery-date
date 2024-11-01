import axios from 'axios';
import Configuration from '../Configuration';
import { getAjaxActionUrl } from '../utils';

const apiLoadList = (callback, listName, nonceList = '123456') => {
  if (Configuration.getInstance().is_debug) {
    const config = Configuration.getInstance();
    const argData = {}
    argData[listName] = config[listName];
    callback({data: argData});
    return;
  }

  console.log('API: Load ' + listName);
  const requestUrl = getAjaxActionUrl('load_'+listName);
  const ajax = axios.post(requestUrl, {
    nonce: nonceList,
  })
  if (callback) {
    ajax.then(response => callback(response));
  }
}
export default apiLoadList;