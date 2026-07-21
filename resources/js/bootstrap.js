import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import * as Bootstrap from 'bootstrap';
window.bootstrap = Bootstrap;