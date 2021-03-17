import { post, get } from './wordpressClient';

export function leadinConnectPortal(portalInfo) {
  return post('leadin_registration_ajax', portalInfo);
}

export function leadinDisconnectPortal() {
  return post('leadin_disconnect_ajax', {});
}

export function skipSignup(defaultApp) {
  return post('leadin_skip_signup', { defaultApp });
}

export function searchForms(searchQuery = '', offset = 0, limit = 10) {
  const payload = {
    offset,
    limit,
    name__contains: searchQuery,
  };
  return get('leadin_search_forms', payload).then(forms => {
    const filteredForms = [];

    forms.forEach(currentForm => {
      const { guid, name } = currentForm;
      filteredForms.push({ name, guid });
    });

    return filteredForms;
  });
}
