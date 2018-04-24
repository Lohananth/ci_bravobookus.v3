<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {
    
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
  
  public function index($param1='dashboard',$param2=''){    
    //$param1 : is for list/add/edit/delete
    //$param2 : is for condition
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $uid=$this->session->userdata('uid');
    $gro_id=$this->session->userdata('gro_id');
    if ($gro_id=='') {
      redirect('admin');
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
      
    $data['form_title']=$this->replaceAll($this->uri->segment(3));
    $data['panel_title']='All Bookings';
    $data['head']='admin/head/v_head_table';
    $data['footer']='admin/footer/v_footer_table_company';
    $data['sidebar']='admin/inc/v_sidebar';
    $data['sidebar_right']='admin/inc/v_sidebar_right';
    $data['header']='admin/inc/v_header';

    if($gro_id==1){
        if ($param1=='add') {
          $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE status=1");
          $data['service_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_service_types");
          $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");
        }

        if ($param1=='list') {
          if ($param2=='active') { //Status=1 for active
            $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE status=1");            
          }else{ //Status =0
            $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE status=0");
          }
          

        }
        if ($param1=='edit') {
           $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE id='". $param2 ."'");
           $data['service_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_service_types");
           $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");          
        }
        if ($param1=='view') {
           $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE id='". $param2 ."'");
           $data['service_type']=$this->m_crud->get_by_sql("SELECT * FROM tbl_service_types");
           $data['amenities']=$this->m_crud->get_by_sql("SELECT * FROM tbl_amenity");          
        }

        if ($param1=='print') {
           $data['v_companies']=$this->m_crud->get_by_sql("SELECT * FROM tbl_company WHERE status=1");
        }       

      }else{       
        
         
      }    

    // $data['main_content']='admin/booking/v_booking';
    //$data['main_content']='admin/users/v_dashboard';
    $data['main_content']='admin/companies/'. $param1;
          //load the view
    $this->load->view('admin/v_admin_template', $data);
  }    
  
 
  


  public function edit($id=''){      
    $data=array();
    $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");
    $data['form_title']=$this->replaceAll($this->uri->segment(1));      
    $uid=$this->session->userdata('uid');
    $gro_id=$this->session->userdata('gro_id');
     if ($gro_id=='') {
      redirect('admin');
    }
     // $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers where uid=$uid");
    $data['sidebar_menu']=$this->m_crud->get_by_sql("SELECT * FROM tbl_controllers");
    $data['user_groups']=$this->m_crud->get_by_sql("SELECT * FROM user_groups WHERE id_group=$gro_id");
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
    print_r($data['tbl_vehicle']);
    exit();    
    $data['main_content']='admin/vehicles/v_edit';
    //load the view
    $this->load->view('admin/v_admin_template', $data);
      // echo "Admin Dashboard";
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
    

  // Save
  function save($param1 = '', $param2 = ''){
        if ($param1 == 'create') {

            $data['User_ID']   = 1;//$this->input->post('User_ID');
            $data['company_name']         = $this->input->post('company_name');
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            $data['address']      = $this->input->post('address');
            $data['page_name']      = $this->input->post('page_name');
            $data['website']      = $this->input->post('website');
            $data['description']      = $this->input->post('description');
            $data['notice']      = $this->input->post('notice');
            $data['cancellation_policy']      = $this->input->post('cancellation_policy');

            $data['map']      = $this->input->post('map');
            $data['service_type']      = $this->input->post('service_type');
           // $data['service_detail']      = $this->input->post('service_detail');
           

            // $data['inspectors']= $this->input->post('inspectors');
            
            $data['service_detail'] = substr(implode(',', $this->input->post('service_detail')), 0);
            if(!empty($this->input->post('status'))){
              // $data['status']         = $this->input->post('status');
               $data['status']         = 1;
            }else{
               $data['status']         = 0;
            }
           
          //  $data['seats']   = $this->input->post('seats');          

           

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
                  $config['upload_path'] = './uploads/vechicle'; //path for upload image
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
                      $data['logo']   = $file_feature; // logo is field in table
                    }
                    $i++;
                 }        

          // $this->welcome->upload_image($this->input->post(),$fileName);
          $this->welcome->upload_company($data,$fileName);


           // $this->db->insert('tbl_company', $data);

            // $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            // redirect('admin/users/companies', 'refresh');
            // redirect('add-vehicles.html');
          redirect('admin/companies');
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






    // Blocked
  public function get_block_Company(){
    $form = ''; 
  //  $id =2;
    $id = $this->input->post('id');
    $file_condition='id'; // is a field primary key in table
    $table_name='tbl_company';
    $listData = $this->m_crud->get_blocked_query($id,$file_condition,$table_name);
    if (count($listData)>0){
      foreach ($listData as $row){
        $form .=' <input type="hidden" name="id" id="id" value="'.$row->id.'">';
        $form .=' <input type="hidden" name="status" id="status" value="0">';
        $form .='<center> <h4>Do you want to Blocked Company ?<h4><h3 style="color:red;">'.$row->company_name. '</h3></center>';
      }  
          // End foreach
      // echo $form;
      echo json_encode($form);    
    }    
  }

  public function update_block_Company(){
    $id = $this->input->post('id');
    //$id =5;// $this->input->post('id');
    $file_condition='id'; // is a field primary key in table
    $table_name='tbl_company';

    $data_update = array(
        'status' =>$this->input->post('status'),
      );
    $update_cate = $this->m_crud->update_blocked_query($id,$file_condition,$table_name,$data_update);
    if($update_cate)
      echo "1";
    else
      echo "0";
  }

  public function get_active_Company(){
      $form = ''; 
      // $id = 3;
      $id = $this->input->post('id');
      $file_condition='id'; // is a field primary key in table
      $table_name='tbl_company';

      $listData = $this->m_crud->get_active_query($id,$file_condition,$table_name);
      if (count($listData)>0){
        foreach ($listData as $row){
          $form .=' <input type="hidden" name="id" id="id" value="'.$row->id.'">';
          $form .=' <input type="hidden" name="status" id="status" value="1">';
          $form .=' <center> <h4>Do you want to Active Company ?<h4><h3 style="color:green;">'.$row->company_name .'</h3></center>';
        }  
            // End foreach
        echo json_encode($form);    
      }    

  }

  public function update_active_Company(){
    $id = $this->input->post('id');
     $file_condition='id'; // is a field primary key in table
     $table_name='tbl_company';
    $data_update = array(
        'status' =>$this->input->post('status'),
      );
    $update_cate = $this->m_crud->update_active_query($id,$file_condition,$table_name,$data_update);
    if($update_cate)
      echo "1";
    else
      echo "0";
  }


// View data popup form
  public function viewForm(){      
    $form = ''; 
    $id=3;
    //$id = $this->input->post('id');
    $file_condition='id';
    $table_name='tbl_company';
    $listData = $this->m_crud->get_view_query($id,$file_condition,$table_name);
    if (count($listData)>0){
    foreach ($listData as $row){
     $form .='<div class="row">';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Origin(From)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="origin" id="origin" class="form-control" disabled="true">';
      $form .='<option value="'.$row->company_name.'">'.$row->company_name.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="destination">Destination(To)<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="destination" id="destination" class="form-control" disabled="true">';
      $form .='<option value="'.$row->phone.'">'.$row->phone.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-12">';
      $form .='<label for="Destination">Vehicle Name<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="v_id" id="v_id" class="form-control" disabled="true">';
      $form .='<option value="'.$row->email.'">'.$row->email.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-4">';
      $form .='<label for="address">Local Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="address" id="address" class="form-control" value="'.$row->address.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="page_name">Foreign Price<span><b>*</b></span></label>';
      $form .='<input type="text" name="page_name" id="page_name" class="form-control" value="'.$row->page_name.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-4">';
      $form .='<label for="website">website<span><b>*</b></span></label>';
      $form .='<select data-plugin-selectTwo name="website" id="website" class="form-control" disabled="true">';
      $form .='<option value="'.$row->website.'">'.$row->website.'</option>';
      $form .='</select>';
      $form .='</div>';
      $form .='</div>';
      $form .='<div class="form-group">';
      $form .='<div class="col-md-6">';
      $form .='<label for="description">description <span><b>*</b></span></label>';
      $form .='<input type="text" name="description" id="description" class="form-control" value="'.$row->description.'" disabled="true">';
      $form .='</div>';
      $form .='<div class="col-md-6">';
      $form .='<label for="origin">Active/Block&nbsp;</label>';
      if($row->status==1){
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



  }