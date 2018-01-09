<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'front/home';

// Buses Front
/* Searching Bus */
$route['search']='buses/search';

/* Booking Ticket */
$route['tickets']='buses/tickets';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Accomondations
$route['hotels.html/(.+)$'] = 'accomondations/hotels_details/$1';

$route['hotels.html'] = 'hotels';
$route['hotelspage.html']='hotels';

$route['hotels'] = "hotels/listhotel";
$route['hotels/listhotel(:any)'] = "hotels/listhotel/$1";
$route['hotels/listhotel/(:any)/(:any)'] = "hotels/listhotel/$1/$2";
$route['hotels/listhotel/(:any)/(:any)/(:any)'] = "hotels/listhotel/$1/$2/$3";
$route['hotels/listhotel/(:any)/(:any)/(:any)/(:any)'] = "hotels/listhotel/$1/$2/$3/$4"; 

// ==============================================
/*admin*/
$route['admin'] = 'admin/Admin_Login/index';
$route['signin.html'] = 'admin/Admin_Login/index';

//User Signup
$route['signup.html'] = 'admin/Admin_Login/signup';
$route['admin/guest_register'] = 'admin/Admin_Login/guest_register';


//When login button click
$route['admin/verifylogin'] = 'admin/Admin_Login/verifylogin';
//$route['admin/login/validate_credentials'] = 'user/validate_credentials';

// After Login Success
$route['admin/dashboard'] = 'admin/Admin_dashboard/index';
$route['admin/dashboard.html'] = 'admin/Admin_dashboard/index';

$route['admin/booking.html'] = 'admin/booking/booking';
// (:any)
$route['admin/booking.html/add'] = 'admin/booking/booking/add';

$route['admin/booking.html/(:any)'] = 'admin/booking/booking/$1';
$route['admin/booking.html/(:any)/(:any)'] = 'admin/booking/booking/$1/$2';


$route['admin/guests.html'] = 'admin/Admin_dashboard/guests';
$route['admin/profile.html'] = 'admin/Admin_dashboard/profile';
$route['admin/invoice-print.html'] = 'admin/Admin_dashboard/invoice_print';

// Vechicles Management
// list_vechicles
$route['admin/vehicles.html'] = 'admin/vehicles/vehicles';
$route['admin/vehicles.html/list/(:any)'] = 'admin/vehicles/vehicles/vehicle/$1';

// list_vechicles_blocked
$route['admin/vehicle-blocked.html'] = 'admin/vehicles/vehicles/list_vehicles_blocked';
$route['admin/vehicle-report.html']='admin/vehicles/vehicles/vehicle_report';
//show_vechicles

// $route['list-vechicles.html'] = 'admin/Admin_dashboard/show_vechicles';

$route['admin/vehicles.html/add'] = 'admin/vehicles/vehicles/add';
$route['admin/vehicles.html/edit/(:any)'] = 'admin/vehicles/vehicles/edit/$1';
$route['admin/vehicles.html/view/(:any)'] = 'admin/vehicles/vehicles/view/$1';

$route['admin/vehicles.html/get_block_Vehicle']='admin/vehicles/vehicles/get_block_Vehicle';

// Schedules Management
// list-schedule
$route['add-schedules.html']='admin/schedules/schedules/addForm'; //Form add
$route['save-schedules.html']='admin/schedules/schedules/save/create'; //Save Schedule
$route['edit-schedules.html/(:any)']='admin/schedules/schedules/editForm/$1'; //For edit
$route['update-schedules.html/(:any)']='admin/schedules/schedules/save/do_update/$1'; //Update Schedule
$route['view-schedules.html/(:any)']='admin/schedules/schedules/viewForm/$1'; //view schedule by id
$route['get_block_Schedule.html']='admin/schedules/schedules/get_block_Schedule'; //get Block for edit
$route['disactive_block_Schedule.html']='admin/schedules/schedules/update_block_Schedule'; //update Block

//list-block
$route['edit-block-schedules.html/(:any)']='admin/schedules/schedules/editBlock/$1'; //edit block
$route['update-block-schedules.html/(:any)']='admin/schedules/schedules/save/update_block/$1';

$route['get-schedules-for-active.html']='admin/schedules/schedules/get_active_Schedule'; 
$route['active-schedules.html']='admin/schedules/schedules/update_active_Schedule'; 

$route['admin/list-schedules.html'] = 'admin/schedules/schedules/list_schedules'; // for all list schedule
$route['admin/list-schedules-blocked.html'] = 'admin/schedules/schedules/list_schedules_blocked';//all list blocked schedule
$route['admin/viewForm-schedules.html'] = 'admin/schedules/schedules/viewForm';
$route['admin/viewBlock-schedules.html'] = 'admin/schedules/schedules/viewBlock';

// Logout
$route['logout'] = 'admin/Admin_Login/logout';
