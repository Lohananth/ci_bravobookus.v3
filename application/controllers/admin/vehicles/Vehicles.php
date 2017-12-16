<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles extends CI_Controller {
    
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
      $this->load->model('M_Upload','welcome'); 

      date_default_timezone_set('Asia/Phnom_Penh');
  }
  
  public function index(){    
    $data=array();      
     $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
     // Count Vehicles
     $data['vehicles_count']=$this->m_crud->get_by_sql("SELECT count(v_id) as vehicles_count FROM tbl_vehicle");
      $uid=$this->session->userdata('uid');
      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");  
      $data['form_title']=$this->replaceAll($this->uri->segment(1));
      $data['head']='admin/inc/v_dashboard_head';
      $data['footer']='admin/inc/v_dashboard_footer';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['main_content']='admin/vehicles/v_dashboard';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
  }
  // Booking Bus
  public function booking($param1='',$param2=''){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
      $company_id=$this->session->userdata('company_id');
      $data['company_id']=$company_id;
      $data['uid']=$uid;
      $data['gro_id']=$gro_id;
      $data['currency_name']="$";
      $today = date("Y-m-d"); 
      $data['today']=$today;
      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
      // v_ticket
   
      if($gro_id==1){
        if($param1 !=''){
           $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket WHERE status='".$param1."'");
        }else{

           $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket WHERE booking_date='". $today ."' order by booking_code DESC");
        }       

      }else{       
        if($param1 !=''){
           $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket WHERE status='".$param1."'");
        }else{

           $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket WHERE booking_date='". $today ."' order by booking_code DESC");

            // $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket where c_id=$company_id AND status='".$param1."'");
        }  

      }
    
// $data['v_ticket']=$this->m_crud->get_by_sql("SELECT * FROM tbl_ticket WHERE booking_date='". $today ."' order by booking_code DESC");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));
      $data['panel_title']='All Bookings';
      $data['head']='admin/head/v_head_table';
      $data['footer']='admin/footer/v_footer_table';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
          // $data['main_content']='admin/booking/v_booking';
      $data['main_content']='admin/booking/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);    
          //echo "Admin Dashboard";
  }

  
  // Manage Vechicles
  public function list_vehicles(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
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

      // tbl_amenity
      $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");

      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");    
     
     if($gro_id ==1){
       $sql_vechicles_com="SELECT dr.driver_name,dr.phone,p.company_name,p.logo,v.* from tbl_vehicle as v INNER JOIN tbl_company as p ON p.company_id=v.company_id 
         INNER JOIN tbl_driver as dr ON dr.company_id=p.company_id
       WHERE v.status=1";
     }else{
       $sql_vechicles_com="SELECT v.status,p.company_id,dr.driver_name,dr.phone,p.company_name,p.logo,v.v_id,v.code,v.vehicle_name,v.drivers, u.uid, u.name FROM tbl_company as p 
       INNER JOIN  tbl_vehicle as v ON p.company_id=v.company_id 
       INNER JOIN users as u ON p.company_id=u.company_id 
       INNER JOIN tbl_driver as dr ON dr.company_id=p.company_id
       ORDER BY v.company_id";
     }
      $data['vechicles_list']=$this->m_crud->get_by_sql($sql_vechicles_com);

      $data['main_content']='admin/vehicles/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  // Blocked Vechicles
  public function list_vehicles_blocked(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');

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
       $sql_vechicles_com="SELECT dr.driver_name,dr.phone,p.company_name,p.logo,v.* from tbl_vehicle as v INNER JOIN tbl_company as p ON p.company_id=v.company_id 
         INNER JOIN tbl_driver as dr ON dr.company_id=p.company_id
       WHERE v.status=0";
     }else{
       $sql_vechicles_com="SELECT v.status,p.company_id,dr.driver_name,dr.phone,p.company_name,p.logo,v.v_id,v.code,v.vehicle_name,v.drivers, u.uid, u.name FROM tbl_company as p 
       INNER JOIN  tbl_vehicle as v ON p.company_id=v.company_id 
       INNER JOIN users as u ON p.company_id=u.company_id 
       INNER JOIN tbl_driver as dr ON dr.company_id=p.company_id
       ORDER BY v.company_id
       WHERE v.status=0
       ";
     }

      $data['vechicles_list']=$this->m_crud->get_by_sql($sql_vechicles_com);

      $data['main_content']='admin/vehicles/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  
  public function add(){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
      $uid=$this->session->userdata('uid');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
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
      // tbl_amenity
      $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");
      // tbl_inspector
      $data['tbl_inspector']=$this->m_crud->get_by_sql("SELECT * FROM tbl_inspector");



     // $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/vehicles/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function edit($id=''){
      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
      $uid=$this->session->userdata('uid');
      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
      $data['panel_title']='User Profile';
      $data['head']='admin/head/v_head_form';
      $data['footer']='admin/footer/v_footer_form';
      $data['sidebar']='admin/inc/v_sidebar';
      $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company");
      $data['vehicle_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle_type");
      $data['driver_names']=$this->m_crud->get_by_sql("SELECT * FROM tbl_driver");
      $data['seattypes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_seat_type");
      $data['facilities']=$this->m_crud->get_by_sql("SELECT * FROM facilities");
      // tbl_amenity
      $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");
    
      $vSQL="SELECT v.*,c.company_name
            FROM tbl_vehicle as v INNER JOIN tbl_company as c
            WHERE v.v_id=$id";
      $data['tbl_vehicle']=$this->m_crud->get_by_sql( $vSQL);
      print_r($data['tbl_vehicle']);exit();
      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/vehicles/v_edit';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function view($id=''){      
      $data=array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
      $uid=$this->session->userdata('uid');
      $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
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
      // tbl_amenity
      $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");
      $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/vehicles/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

// End Manage Vechickes 


// Invoice Print
public function invoice_print($id=''){
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $data['form_title']=$this->replaceAll($this->uri->segment(1));
    $uid=$this->session->userdata('uid');
    $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");    
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
    

     // Save
  function save($param1 = '', $param2 = ''){
        if ($param1 == 'create') {

            $data['company_id']   = $this->input->post('company_id');
            $data['code']         = $this->input->post('code');
            $data['vehicle_name'] = $this->input->post('vehicle_name');
            $data['vehicle_type'] = $this->input->post('vehicle_type');
            $data['drivers']      = $this->input->post('drivers');
            // $data['inspectors']= $this->input->post('inspectors');
            
            $data['amenities'] = substr(implode(',', $this->input->post('amenities')), 0);
            if(!empty($this->input->post('status'))){
              // $data['status']         = $this->input->post('status');
               $data['status']         = 1;
            }else{
               $data['status']         = 0;
            }
           
            $data['seats']   = $this->input->post('seats');          

           

             // Upload Image to Galleries
              $files = $_FILES;
              $count = count($_FILES['userfile']['name']);
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/vehicles/galleries';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
        }
          $fileName = implode(',',$images);

           $fileFeature = explode(',',$fileName);
           $i=1;
           foreach ($fileFeature as $file_feature) {
              if($i==1){
                $data['feature_image']   = $file_feature;
              }
              $i++;
           }        

          // $this->welcome->upload_image($this->input->post(),$fileName);
          $this->welcome->upload_vehicles_gallery($data,$fileName);


           // $this->db->insert('tbl_vehicle', $data);

            // $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
           redirect(base_url() . 'add-vehicles.html', 'refresh');
            // redirect('add-vehicles.html');
        }

        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
            $data['name_numeric'] = $this->input->post('name_numeric');
            $data['teacher_id']   = $this->input->post('teacher_id');

            $this->db->where('class_id', $param2);
            $this->db->update('class', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'add-hotels.html', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class', array(
                'class_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('class_id', $param2);
            $this->db->delete('class');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/classes/', 'refresh');
        }
        // $page_data['classes']    = $this->db->get('class')->result_array();
        // $page_data['page_name']  = 'class';
        // $page_data['page_title'] = get_phrase('manage_class');
        // $this->load->view('backend/index', $page_data);
  }

// End Hotel Management

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

  //Upload Feature Image
   public function do_upload_feature_image()
        {
              $files = $_FILES;
              $count = count($_FILES['feature_image']['name']);
              for($i=0; $i<$count; $i++)
                {
                $_FILES['feature_image']['name']= time().$files['feature_image']['name'][$i];
                $_FILES['feature_image']['type']= $files['feature_image']['type'][$i];
                $_FILES['feature_image']['tmp_name']= $files['feature_image']['tmp_name'][$i];
                $_FILES['feature_image']['error']= $files['feature_image']['error'][$i];
                $_FILES['feature_image']['size']= $files['feature_image']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['feature_image']['name'];
                $images[] = $fileName;
        }
          $fileName = implode(',',$images);
        }


  // File Upload
  public function file_upload(){
              $files = $_FILES;
              $count = count($_FILES['userfile']['name']);
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
        }
          $fileName = implode(',',$images);
          // $this->welcome->upload_image($this->input->post(),$fileName);
          $this->welcome->upload_vehicles_gallery($this->input->post(),$fileName);
          redirect('add-vehicles.html');
        }

  public function deleteimage(){
      $deleteid  = $this->input->post('image_id');
      $this->db->delete('photos', array('id' => $deleteid)); 
      $verify = $this->db->affected_rows();
      echo $verify;

    }


     public function edit_file_upload(){
              $files = $_FILES;
              if(!empty($files['userfile']['name'][0])){
              $count = count($_FILES['userfile']['name']);
              $user_id = $this->input->post('user_id');
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
        }
          $fileName = implode(',',$images);
          $this->welcome->edit_upload_image($user_id,$this->input->post(),$fileName);
        }else
        {
        $user_id = $this->input->post('user_id');
        $this->welcome->edit_upload_image($user_id,$this->input->post());
        }
        redirect('welcome/view');
        }
  }