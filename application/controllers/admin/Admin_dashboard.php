<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
    
  function __construct() {
      parent::__construct();
      $this->load->model('M_Hotels','mh',TRUE);
      $this->load->model('M_Sourng','m_sourng',True);
      $this->load->library('Ajax_pagination');
      $this->load->helper('text');
      $this->load->database();
      $this->perPage = 5;
     // $this->starOrder=4;

      $this->load->model('Crud_model','m_crud',True); 

      date_default_timezone_set('Asia/Phnom_Penh');
  }
  
  public function index($param1='',$param2=''){
    
    $data=array();
      
     $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $uid=$this->session->userdata('uid');
    $gro_id=$this->session->userdata('gro_id');

if ($gro_id=="")
{
     redirect('/admin/', 'refresh');
}

     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
    $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
    $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");
    $company_id=$this->session->userdata('company_id');
    $data['company_id']=$company_id;
    $data['uid']=$uid;
    $data['gro_id']=$gro_id;
    $data['currency_name']="$";
    $today = date("Y-m-d"); 
    $data['today']=$today;


   $data['form_title']=$this->replaceAll($this->uri->segment(1));

      $data['head']='admin/inc/v_dashboard_head';
      $data['footer']='admin/inc/v_dashboard_footer';
   
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      

      $data['header']='admin/inc/v_header';
      $data['main_content']='admin/dashboard/v_dashboard';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
  }
 

  // List Hotel
  public function list_hotels(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");

      $data['form_title']=$this->replaceAll($this->uri->segment(1));
      $data['panel_title']=$this->uri->segment(1);
      $data['head']='admin/head/v_head_table';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['main_content']='admin/hotels/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
      }

  // Manage Vechicles
  public function list_vechicles(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
     $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");



      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));
      $data['panel_title']=$this->uri->segment(1);
      $data['head']='admin/head/v_head_table';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company");
      $data['vehicle_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle_type");
      $data['driver_names']=$this->m_crud->get_by_sql("SELECT * FROM tbl_driver");
      $data['seattypes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_seat_type");
      $data['facilities']=$this->m_crud->get_by_sql("SELECT * FROM facilities");



      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");    
     
     if($gro_id ==1){
       $sql_vechicles_com="SELECT p.company_name,v.* from tbl_vehicle as v INNER JOIN tbl_company as p ON p.company_id=v.company_id WHERE v.status=1";
     }else{
       $sql_vechicles_com="SELECT v.status,p.company_id,p.company_name,v.v_id,v.code,v.vehicle_name,v.drivers, u.uid, u.name FROM tbl_company as p INNER JOIN  tbl_vehicle as v ON p.company_id=v.company_id INNER JOIN users as u ON p.company_id=u.company_id ";
     }
      $data['vechicles_list']=$this->m_crud->get_by_sql($sql_vechicles_com);

      $data['main_content']='admin/vechicles/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  // Blocked Vechicles
  public function list_vechicles_blocked(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");



      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));
      $data['panel_title']=$this->uri->segment(1);
      $data['head']='admin/head/v_head_table';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company");
      $data['vehicle_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle_type");
      $data['driver_names']=$this->m_crud->get_by_sql("SELECT * FROM tbl_driver");
      $data['seattypes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_seat_type");
      $data['facilities']=$this->m_crud->get_by_sql("SELECT * FROM facilities");
      


      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");    
      
      $sql_vechicles_com="SELECT v.status,p.company_id,p.company_name,v.v_id,v.code,v.vehicle_name,v.drivers, u.uid, u.name FROM tbl_company as p INNER JOIN  tbl_vehicle as v ON p.company_id=v.company_id INNER JOIN users as u ON p.company_id=u.company_id WHERE v.status=0";
      $data['vechicles_list']=$this->m_crud->get_by_sql($sql_vechicles_com);

      $data['main_content']='admin/vechicles/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  
  public function add_vechicle(){
      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
     $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


      $data['panel_title']='User Profile';
      $data['head']='admin/head/v_head_form';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company");
      $data['vehicle_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle_type");
      $data['driver_names']=$this->m_crud->get_by_sql("SELECT * FROM tbl_driver");
      $data['seattypes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_seat_type");
      $data['facilities']=$this->m_crud->get_by_sql("SELECT * FROM facilities");
      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/vechicles/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

// End Manage Vechickes 


    // Guests
public function guests(){      
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $data['form_title']=$this->replaceAll($this->uri->segment(1));
    $data['panel_title']='All Guests';
    $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


    $data['head']='admin/head/v_head_table';
    $data['footer']='admin/footer/v_footer_table';
    $data['sidebar']='admin/inc/v_sidebar';
    $data['sidebar_right']='admin/inc/v_sidebar_right'; 
    $data['header']='admin/inc/v_header';
    $data['main_content']='admin/guests/v_guests';
        //load the view
    $this->load->view('admin/v_admin_template', $data);
        // echo "Admin Dashboard";
}

// Profile
public function profile(){      
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $data['form_title']=$this->replaceAll($this->uri->segment(1));
    $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


    $data['panel_title']='User Profile';
    $data['head']='admin/head/v_head_table';
    $data['footer']='admin/footer/v_footer_table';
    $data['sidebar']='admin/inc/v_sidebar';
    $data['sidebar_right']='admin/inc/v_sidebar_right';
    $data['header']='admin/inc/v_header';
    $data['main_content']='admin/users/v_profile';
        //load the view
    $this->load->view('admin/v_admin_template', $data);
        // echo "Admin Dashboard";
}
// End Profile

// Invoice Print
public function invoice_print(){
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $data['form_title']=$this->replaceAll($this->uri->segment(1));
    $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


    $data['panel_title']='User Profile';
    $data['head']='admin/head/v_head_table';
    $data['footer']='admin/footer/v_footer_table';
      // $data['sidebar']='admin/inc/v_sidebar';
    $data['sidebar']=null;
      $data['sidebar_right']='admin/inc/v_sidebar_right';
    $data['header']='admin/inc/v_header';
    $data['main_content']='admin/inc/v_invoice_print';
        //load the view
    $this->load->view('admin/v_admin_template', $data);
    // echo "Admin Dashboard";
}
// End Invoice Print
    
// Hotel Managment
// Add New Hotel
  public function add_hotels(){
      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


      $data['panel_title']='User Profile';
      $data['head']='admin/head/v_head_form';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['facilities']=$this->m_crud->get_by_sql("SELECT * FROM facilities");
      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/hotels/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }



  function replaceAll($text) { 
      $text = strtolower(htmlentities($text)); 
      $text = str_replace(get_html_translation_table(), "-", $text);
      $text = str_replace(" ", "-", $text);
      $text = preg_replace("/[-]+/i", " ", $text);
      $text=substr($text, 0, -5 );
      return ucfirst($text);
  }

  function url_changed($text) { 
      $text = strtolower(htmlentities($text)); 
      $text = str_replace(get_html_translation_table(), "-", $text);
      $text = str_replace(" ", "-", $text);
      $text = preg_replace("/[-]+/i", "-", $text);
      return $text;
  }
  }