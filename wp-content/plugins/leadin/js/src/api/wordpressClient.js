import $ from 'jquery';

import Raven from '../lib/Raven';
import { ajaxUrl, nonce } from '../constants/leadinConfig';
import { serializeQueryObject } from '../utils/queryParams';

function makeRequest(action, method, payload) {
  const url = `${ajaxUrl}?action=${action}&_ajax_nonce=${nonce}`;
  return new Promise((resolve, reject) => {
    const ajaxPayload = {
      url,
      method,
      contentType: 'application/json',
      success: data => resolve(data),
      error: error => {
        Raven.captureMessage(
          `HTTP request ${action} failed with code ${error.status}: ${error.message}`
        );
        reject(error);
      },
    };

    if (payload) {
      if (method === 'post') {
        ajaxPayload.data = JSON.stringify(payload);
      } else {
        ajaxPayload.url = `${ajaxPayload.url}&${serializeQueryObject(payload)}`;
      }
    }
    $.ajax(ajaxPayload);
  });
}

export function post(action, payload) {
  return makeRequest(action, 'post', payload);
}

export function get(action, payload) {
  return makeRequest(action, 'get', payload);
}
