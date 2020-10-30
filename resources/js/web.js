/**
 * FRONTEND JS
 * Please ensure to load only the scripts that are necessary and remove any unused scripts.
 */

require('./bootstrap');
require( 'datatables.net-bs4' );
require( 'datatables.net-responsive-bs4' );

import Swal from 'sweetalert2/dist/sweetalert2.js';

window.Swal = Swal;

// Custom JS Scripts
require('./site/main');
require('./site/custom');