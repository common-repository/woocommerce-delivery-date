import apiLoadList from './baseApi';
import axios from 'axios';
import Configuration from '../Configuration';
import { getAjaxActionUrl } from '../utils';

export const apiLoadCategories = (callback) => {
  apiLoadList(callback, 'categories');
}

export const apiSaveSettings = (data, callback) => {
  console.log('API: save settings...')
  if (Configuration.getInstance().is_debug) {
    callback()
    return
  }
  const requestUrl = getAjaxActionUrl('save_settings');
  const ajax = axios.post(requestUrl, {
    data: data,
  })
  if (callback) {
    ajax.then(response => callback(response));
  }
}