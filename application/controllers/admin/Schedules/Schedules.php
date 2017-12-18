<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedules extends CI_Controller {
    
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
  
  // Manage Vechicles
  public function list_schedules(){      
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
    
      $sql_vechicles_com="SELECT vs.id AS id, ori.origin AS origin, ori1.origin AS destination,
                        vh.vehicle_name AS vehicle_name,dpt.departure_time AS departure_time,
                        vs.travel_duration AS travel_duration, vs.local_price AS local_price,
                        vs.foreigner_price AS foreigner_price, vs.`status` AS `status`
                        FROM
                        tbl_vehicle_schedule AS vs 
                        JOIN tbl_origin AS ori ON (ori.id = vs.origin)
                        JOIN tbl_origin AS ori1 ON (ori1.id = vs.destination)
                        JOIN tbl_vehicle AS vh ON (vh.v_id = vs.v_id)
                        JOIN tbl_departure_time AS dpt ON (dpt.id = vs.departure_time)
                        WHERE vs.status=1";
      $data['vschedule_list']=$this->m_crud->get_by_sql($sql_vechicles_com);
      $data['main_content']='admin/schedules/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  // Blocked schedules
  public function list_schedules_blocked(){      
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
      $data['origins']=$this->m_crud->get_by_sql("SELECT * FROM tbl_origin");
      $data['vehicles']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle");
      $data['dptimes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_departure_time"); 
      $vs_block="SELECT vs.id AS id, ori.origin AS origin, ori1.origin AS destination,
                          vh.vehicle_name AS vehicle_name,dpt.departure_time AS departure_time,
                          vs.travel_duration AS travel_duration, vs.local_price AS local_price,
                          vs.foreigner_price AS foreigner_price, vs.`status` AS `status`
                          FROM
                          tbl_vehicle_schedule AS vs 
                          JOIN tbl_origin AS ori ON (ori.id = vs.origin)
                          JOIN tbl_origin AS ori1 ON (ori1.id = vs.destination)
                          JOIN tbl_vehicle AS vh ON (vh.v_id = vs.v_id)
                          JOIN tbl_departure_time AS dpt ON (dpt.id = vs.departure_time)
                          WHERE vs.status=0";
      $data['vschedule_list']=$this->m_crud->get_by_sql($vs_block);
      $data['main_content']='admin/schedules/v_list_blocked';
          //load the view
      $this->load->view('admin/v_admin_template', $data);
         // echo "Admin Dashboard";
  }
  
  public function addForm(){      
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
      $data['origins']=$this->m_crud->get_by_sql("SELECT * FROM tbl_origin");
      $data['vehicles']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle");
      $data['dptimes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_departure_time");
      $data['main_content']='admin/schedules/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function editForm($id=''){      
      $data = array();
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
      $data['origins']=$this->m_crud->get_by_sql("SELECT * FROM tbl_origin");
      $data['vehicles']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle");
      $data['dptimes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_departure_time");    
      $vSQL = "SELECT vs.id AS id, ori.origin AS origin, ori1.origin AS destination,
              vh.vehicle_name AS vehicle_name,dpt.departure_time AS departure_time,
              vs.travel_duration AS travel_duration, vs.local_price AS local_price,
              vs.foreigner_price AS foreigner_price, vs.`status` AS `status`
              FROM
              tbl_vehicle_schedule AS vs 
              JOIN tbl_origin AS ori ON (ori.id = vs.origin)
              JOIN tbl_origin AS ori1 ON (ori1.id = vs.destination)
              JOIN tbl_vehicle AS vh ON (vh.v_id = vs.v_id)
              JOIN tbl_departure_time AS dpt ON (dpt.id = vs.departure_time)
              WHERE vs.id=$id AND vs.status=1";
      $data['data_vehicles'] = $this->m_crud->get_by_sql($vSQL);
      $data['main_content']='admin/schedules/v_edit';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function viewForm($id=''){      
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
      // $data['showfacil']=$this->m_crud->get_by_sql("SELECT * FROM test_add where id=15 ");
      $data['main_content']='admin/schedules/v_add';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function editBlock($id=''){      
      $data = array();
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
      $data['origins']=$this->m_crud->get_by_sql("SELECT * FROM tbl_origin");
      $data['vehicles']=$this->m_crud->get_by_sql("SELECT * FROM tbl_vehicle");
      $data['dptimes']=$this->m_crud->get_by_sql("SELECT * FROM tbl_departure_time");    
      $vSQL = "SELECT vs.id AS id, ori.origin AS origin, ori1.origin AS destination,
              vh.vehicle_name AS vehicle_name,dpt.departure_time AS departure_time,
              vs.travel_duration AS travel_duration, vs.local_price AS local_price,
              vs.foreigner_price AS foreigner_price, vs.`status` AS `status`
              FROM
              tbl_vehicle_schedule AS vs 
              JOIN tbl_origin AS ori ON (ori.id = vs.origin)
              JOIN tbl_origin AS ori1 ON (ori1.id = vs.destination)
              JOIN tbl_vehicle AS vh ON (vh.v_id = vs.v_id)
              JOIN tbl_departure_time AS dpt ON (dpt.id = vs.departure_time)
              WHERE vs.id=$id AND vs.status=0";
      $data['data_vehicles'] = $this->m_crud->get_by_sql($vSQL);
      $data['main_content']='admin/schedules/v_edit_block';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  public function get_block_Schedule(){
    $form = ''; 
    $vs_id = $this->input->post('vs_id');
    $vslist = $this->m_crud->get_blocked_schedule_query($vs_id);
    if (count($vslist)>0){
      foreach ($vslist as $vs){
        $form .=' <input type="hidden" name="vs_id" id="vs_id" value="'.$vs->id.'">';
        $form .=' <input type="hidden" name="status" id="status" value="0">';
        $form .=' <h4>Are you sure, Do you want to Blocked this Schedule?</h4>';
      }  
          // End foreach
      echo json_encode($form);    
    }    
  }

  public function update_block_Schedule(){
    $vs_id = $this->input->post('vs_id');
    $data_update = array(
        'status' =>$this->input->post('status'),
      );
    $update_cate = $this->m_crud->update_blocked_schedule_query($vs_id,$data_update);
    if($update_cate)
      echo "1";
    else
      echo "0";
  }

// End Manage Vechickes 

// Save
  function save($param1 = '', $param2 = ''){
        if ($param1 == 'create') {
            $data['origin']       = $this->input->post('origin');
            $data['destination']  = $this->input->post('destination');
            $data['v_id']         = $this->input->post('v_id');
            $data['local_price']  = $this->input->post('local_price');
            $data['foreigner_price']  = $this->input->post('foreigner_price');
            $data['departure_time']   = $this->input->post('departure_time');
            $data['travel_duration']  = $this->input->post('travel_duration');
            $data['status']           = $this->input->post('status_hide');   
            $this->db->insert('tbl_vehicle_schedule', $data);            
            redirect(base_url() . 'add-schedules.html', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['origin']       = $this->input->post('origin');
            $data['destination']  = $this->input->post('destination');
            $data['v_id']         = $this->input->post('v_id');
            $data['local_price']  = $this->input->post('local_price');
            $data['foreigner_price']  = $this->input->post('foreigner_price');
            $data['departure_time']   = $this->input->post('departure_time');
            $data['travel_duration']  = $this->input->post('travel_duration');
            $data['status']           = $this->input->post('status_hide'); 
            $this->db->where('id', $param2);
            $this->db->update('tbl_vehicle_schedule', $data);
            // $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'list-schedules.html', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('class', array(
                'class_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'update_block') {
            $data['origin']       = $this->input->post('origin');
            $data['destination']  = $this->input->post('destination');
            $data['v_id']         = $this->input->post('v_id');
            $data['local_price']  = $this->input->post('local_price');
            $data['foreigner_price']  = $this->input->post('foreigner_price');
            $data['departure_time']   = $this->input->post('departure_time');
            $data['travel_duration']  = $this->input->post('travel_duration');
            $data['status']           = $this->input->post('status_hide'); 
            $this->db->where('id', $param2);
            $this->db->update('tbl_vehicle_schedule', $data);
            // $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'list-schedules-blocked.html', 'refresh');
        }
  }

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
    for($i=0; $i<$count; $i++){
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
    for($i=0; $i<$count; $i++){
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
    } else {
        $user_id = $this->input->post('user_id');
        $this->welcome->edit_upload_image($user_id,$this->input->post());
    }
        redirect('welcome/view');
  }
}