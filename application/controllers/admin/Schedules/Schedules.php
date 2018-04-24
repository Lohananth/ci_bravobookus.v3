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
      $this->load->library('pdf_library');
      date_default_timezone_set('Asia/Phnom_Penh');
  }
  
  public function index(){    
    $data=array();      
     $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
     // Count Vehicles
     $data['vehicles_count']=$this->m_crud->get_by_sql("SELECT count(v_id) as vehicles_count FROM tbl_vehicle");
      $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
      if ($gro_id=='') {
        redirect('admin','refresh');
      }
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");

      $data['form_title']=$this->replaceAll($this->uri->segment(4));
      $data['head']='admin/inc/v_dashboard_head';
      $data['footer']='admin/inc/v_dashboard_footer';
      $data['sidebar']='admin/inc/v_sidebar';
        $data['sidebar_right']='admin/inc/v_sidebar_right';
      $data['header']='admin/inc/v_header';
      $data['main_content']='admin/schedules/v_dashboard';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
  }
  
  public function pdf_report(){
    $data=array();
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
        WHERE vs.status=1 limit 100";
    $data['vschedule_list']=$this->m_crud->get_by_sql($vSQL);
          //load the view
    // $this->load->view('admin/schedules/pdfreport_view', $data);
    $html = $this->load->view('admin/schedules/pdfreport_view', $data,true);
    $filename = 'report_'.time();
    $this->pdf_library->pdf_creator($html, $filename, true, 'A4', 'landscape');
    // $this->pdf_library->generate($html, $filename, true, 'A4', 'landscape');
    // $this->pdf_library->output($filename,'I',true);


  }

  public function schedule($param1='',$param2=''){      
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $uid=$this->session->userdata('uid');
    $gro_id=$this->session->userdata('gro_id');
   // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
    $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
    $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");
    $data['form_title']=$this->replaceAll($this->uri->segment(2));
    $data['panel_title']=$this->uri->segment(2);
    $data['head']='admin/head/v_head_table';
    $data['footer']='admin/footer/v_footer_table_schedule';
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
    if($param1=='active'){
    $data['status']=1;
      if($gro_id ==1){
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
              WHERE vs.status=1";
      } else {
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
              WHERE vs.status=1";
      }
    } else {
      $data['status']=0;
      if($gro_id ==1){
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
              WHERE vs.status=0";
      } else {
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
              WHERE vs.status=0";
      }    
    }
      $data['vschedule_list']=$this->m_crud->get_by_sql($vSQL);
      $data['main_content']='admin/schedules/v_list';
          //load the view
      $this->load->view('admin/v_admin_template', $data);// echo "Admin Dashboard";
  }


  public function add(){      
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
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");
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
  }

  public function viewForm(){      
    $form = ''; 
    $vs_id = $this->input->post('vs_id');
    $vsview = $this->m_crud->getView($vs_id);
    if (count($vsview)>0){
    foreach ($vsview as $vs){
      $form .='<div class="row">';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Origin(From)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="origin" id="origin" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->origin.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="destination">Destination(To)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="destination" id="destination" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->destination.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-12">';
      $form .='<label for="Destination">Vehicle Name<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="v_id" id="v_id" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->vehicle_name.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-4">';
      $form .='<label for="local_price">Local Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="local_price" id="local_price" class="form-control" value="'.$vs->local_price.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="foreigner_price">Foreign Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="foreigner_price" id="foreigner_price" class="form-control" value="'.$vs->foreigner_price.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="departure_time">Departure Time<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="departure_time" id="departure_time" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->departure_time.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="travel_duration">Travel Duration<span><b>*</b></span></label>';
      $form .='<input type="text" name="travel_duration" id="travel_duration" class="form-control" value="'.$vs->travel_duration.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Active/Block&nbsp;</label>';
      if($vs->status==1){
      $form .='<input type="text" name="status" value="Active" class="form-control" disabled="true">';
      // $form .='<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" disabled="true" checked />';
      // $form .='<input type="hidden" name="status_hide" id="status_hide" value="1" disabled="true"/>';
      } else {
      $form .='<input type="text" name="status" value="DisActive" class="form-control" disabled="true">';
      // $form .='<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" disabled="true"/>';
      // $form .='<input type="hidden" name="status_hide" id="status_hide" value="0" disabled="true"/>';
      }
      $form .='</div>';
      $form .='</div>';
      $form .='</div>';         
    }  
      echo json_encode($form);   
    }
  }
 
  public function edit($id=''){      
      $data = array();
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
      $data['form_title']=$this->replaceAll($this->uri->segment(1));      
     $uid=$this->session->userdata('uid');
      $gro_id=$this->session->userdata('gro_id');
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
       $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
       $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");


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
              FROM tbl_vehicle_schedule AS vs 
              JOIN tbl_origin AS ori ON (ori.id = vs.origin)
              JOIN tbl_origin AS ori1 ON (ori1.id = vs.destination)
              JOIN tbl_vehicle AS vh ON (vh.v_id = vs.v_id)
              JOIN tbl_departure_time AS dpt ON (dpt.id = vs.departure_time)
              WHERE vs.id=$id";
      $data['data_vehicles'] = $this->m_crud->get_by_sql($vSQL);
      // $data['main_content']='admin/schedules/v_edit_block';
       $data['main_content']='admin/schedules/v_edit';
      //load the view
      $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
  }

  

  public function viewBlock(){      
    $form = ''; 
    $vs_id = $this->input->post('id');
    $vsview = $this->m_crud->getBlock($vs_id);
    if (count($vsview)>0){
    foreach ($vsview as $vs){
      $form .='<div class="row">';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Origin(From)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="origin" id="origin" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->origin.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="destination">Destination(To)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="destination" id="destination" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->destination.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-12">';
      $form .='<label for="Destination">Vehicle Name<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="v_id" id="v_id" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->vehicle_name.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-4">';
      $form .='<label for="local_price">Local Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="local_price" id="local_price" class="form-control" value="'.$vs->local_price.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="foreigner_price">Foreign Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="foreigner_price" id="foreigner_price" class="form-control" value="'.$vs->foreigner_price.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="departure_time">Departure Time<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="departure_time" id="departure_time" class="form-control" disabled="true">';
      $form .='<option value="'.$vs->id.'">'.$vs->departure_time.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="travel_duration">Travel Duration<span><b>*</b></span></label>';
      $form .='<input type="text" name="travel_duration" id="travel_duration" class="form-control" value="'.$vs->travel_duration.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Active/Block&nbsp;</label>';
      if($vs->status==1){
      $form .='<input type="text" name="status" value="Active" class="form-control" disabled="true">';
      // $form .='<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" disabled="true" checked />';
      // $form .='<input type="hidden" name="status_hide" id="status_hide" value="1" disabled="true"/>';
      } else {
      $form .='<input type="text" name="status" value="DisActive" class="form-control" disabled="true">';
      // $form .='<input type="checkbox" name="status" id="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" disabled="true"/>';
      // $form .='<input type="hidden" name="status_hide" id="status_hide" value="0" disabled="true"/>';
      }
      $form .='</div>';
      $form .='</div>';
      $form .='</div>';         
    }  
      echo json_encode($form);   
    }
  }

  public function get_block_Schedule(){
    $form = ''; 
    $vs_id = $this->input->post('id');
    $vslist = $this->m_crud->get_blocked_schedule_query($vs_id);
    if (count($vslist)>0){
      foreach ($vslist as $vs){
        $form .=' <input type="hidden" name="id" id="id" value="'.$vs->id.'">';
        $form .=' <input type="hidden" name="status" id="status" value="0">';
        $form .=' <h4>Are you sure, Do you want to Blocked this Schedule?</h4>';
      }  
          // End foreach
      echo json_encode($form);    
    }    
  }

  public function update_block_Schedule(){
    $id = $this->input->post('id');
    $data_update = array('status' =>$this->input->post('status'));
    $update_cate = $this->m_crud->update_blocked_schedule_query($id,$data_update);
    if($update_cate)
      echo "1";
    else
      echo "0";
  }

  public function get_active_Schedule(){
    $form = ''; 
    $id = $this->input->post('id');
    $vslist = $this->m_crud->get_active_schedule_query($id);
    if (count($vslist)>0){
      foreach ($vslist as $vs){
        $form .=' <input type="hidden" name="id" id="id" value="'.$vs->id.'">';
        $form .=' <input type="hidden" name="status" id="status" value="1">';
        $form .=' <h4>Are you sure, Do you want to Active this Schedule?</h4>';
      }  
          // End foreach
      echo json_encode($form);    
    }    
  }

  public function update_active_Schedule(){
    $id = $this->input->post('id');
    $data_update = array(
        'status' =>$this->input->post('status'),
      );
    $update_cate = $this->m_crud->update_active_schedule_query($id,$data_update);
    if($update_cate)
      echo "1";
    else
      echo "0";
  }


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
            redirect(base_url() . 'admin/schedules.html', 'refresh');
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
            $this->session->set_flashdata('flash_message' , "Data Saved");
            redirect(base_url() . 'admin/schedules.html/list/active', 'refresh');
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
            $this->session->set_flashdata('flash_message' , "Updated Data");
            redirect(base_url() . 'list-schedules-blocked.html', 'refresh');
        }
  }

// Invoice Print
  public function invoice_print($id=''){
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