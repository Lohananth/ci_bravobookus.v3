<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';

/*pages */
$route['about.html']='home/pages/about';
$route['services.html']='home/pages/services';
$route['contact.html']='home/pages/contact';
/*End pages */


// Buses Front
/* Searching Bus */
$route['search']='buses/search';

/* Payment Gateway */
$route['payment/do'] = 'payment_gateway/VPCPaymentConnection/doPayment';
$route['payment/respone'] = 'payment_gateway/VPCPaymentConnection/getPaymentRespone';
$route['payment/unsuccess'] = 'payment_gateway/VPCPaymentConnection/unsuccessPayment';

/* Booking Ticket */
$route['tickets']='buses/tickets';
$route['tickets/add']='buses/tickets/storeTicket';
$route['tickets/payment']='buses/tickets/paymentGetway';
$route['ticket/get'] = "buses/tickets/getTicket";

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
$route['select2.html'] = 'Select2_Controller/list_schedules';
$route['pdf'] = 'Select2_Controller/generate_report';

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
$route['admin/vehicles.html/disactive_Vehicle']='admin/vehicles/vehicles/update_block_Vehicle'; //update Block


// Schedules Management
// list-schedule
$route['admin/schedules-dashboard.html']='admin/schedules/schedules';
$route['admin/add-schedules.html']='admin/schedules/schedules/addForm'; //Form add
$route['admin/save-schedules.html']='admin/schedules/schedules/save/create'; //Save Schedule
$route['admin/edit-schedules.html/(:any)']='admin/schedules/schedules/editForm/$1'; //For edit
$route['admin/update-schedules.html/(:any)']='admin/schedules/schedules/save/do_update/$1'; //Update Schedule
$route['admin/view-schedules.html/(:any)']='admin/schedules/schedules/viewForm/$1'; //view schedule by id
$route['admin/get_block_Schedule.html']='admin/schedules/schedules/get_block_Schedule'; //get Block for edit
$route['admin/disactive_block_Schedule.html']='admin/schedules/schedules/update_block_Schedule'; //update Block

//list-block
$route['admin/edit-block-schedules.html/(:any)']='admin/schedules/schedules/editBlock/$1'; //edit block
$route['admin/update-block-schedules.html/(:any)']='admin/schedules/schedules/save/update_block/$1';

$route['admin/get-schedules-for-active.html']='admin/schedules/schedules/get_active_Schedule'; 
$route['admin/active-schedules.html']='admin/schedules/schedules/update_active_Schedule'; 

$route['admin/list-schedules.html'] = 'admin/schedules/schedules/list_schedules'; // for all list schedule
$route['admin/schedules-report.html'] = 'admin/schedules/schedules/pdf_report'; // for all list schedule

$route['admin/list-schedules-blocked.html'] = 'admin/schedules/schedules/list_schedules_blocked';//all list blocked schedule
$route['admin/viewForm-schedules.html'] = 'admin/schedules/schedules/viewForm';
$route['admin/viewBlock-schedules.html'] = 'admin/schedules/schedules/viewBlock';


//================User Controlling===========
$route['admin/users.html'] = 'admin/users/users';
// (:any)
$route['admin/users.html/add-company'] = 'admin/users/users/add_company';
$route['admin/companies.html/(:any)'] = 'admin/users/users/companies/$1';
//Manage User
$route['admin/manage-users.html/(:any)/(:any)'] = 'admin/users/users/manage_users/$1/$2';

$route['admin/booking.html/(:any)'] = 'admin/booking/booking/$1';


//Companies
$route['admin/companies'] = "admin/users/companies/index/dashboard"; 
$route['admin/companies/(:any)'] = "admin/users/companies/index/$1"; 
$route['admin/companies/(:any)/(:any)'] = "admin/users/companies/index/$1/$2"; 

// Logout
$route['logout'] = 'admin/Admin_Login/logout';
