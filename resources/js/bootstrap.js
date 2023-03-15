import _ from 'lodash';
window._ = _;


import * as Popper from '@popperjs/core'
window.Popper = Popper

import * as bootstrap from 'bootstrap'
window.bootstrap = bootstrap


import $ from 'jquery';
window.$ = $;


import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

