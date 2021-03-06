<?php
class M_Upload extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function upload_image($inputdata,$filename)
	{
	  $this->db->insert('tbl_vehicle', $inputdata); 
	  $insert_id = $this->db->insert_id();

	  if($filename!='' ){
	  $filename1 = explode(',',$filename);
	  foreach($filename1 as $file){
	  $file_data = array(
	  'Large_Image' => $file,
	  'v_id' => $insert_id
	  );
	  $this->db->insert('tbl_vehicle_photo_gallery', $file_data);
	  }
	  }
	}

	  public function upload_vehicles_gallery($inputdata,$filename)
	{
		
	  $this->db->insert('tbl_vehicle', $inputdata); 
	  $insert_id = $this->db->insert_id();

	  if($filename!='' ){
	  $filename1 = explode(',',$filename);
	  foreach($filename1 as $file){
	  $file_data = array(
	  'Thumbnail' => $file,
	  'Large_Image' => $file,
	  'Caption' => $inputdata['vehicle_name'],
	  'v_id' => $insert_id
	  );
	  $this->db->insert('tbl_vehicle_photo_gallery', $file_data);
	  }
	  }
	}

	// Insert Company
	  public function upload_company($inputdata,$filename)
	{
	  $this->db->insert('tbl_company', $inputdata); 
	  $insert_id = $this->db->insert_id();

	  // Create User login
	  
	  $user_data = array(
		  'gro_id' => 2, // Number 2 is Admin
		  'unique_id' => md5($insert_id),
		  'name' => $inputdata['company_name'],
		  'email' => $inputdata['email'],
		  'user_name' => $insert_id,
		  'encrypted_password' => md5($insert_id), //Password is Company ID
		  'status' => 1,
		  'image' => $inputdata['logo'],		  
		  'company_id' => $insert_id
		  );

	  $this->db->insert('users', $user_data);


	  // Upload files to tbl_company_gallery
	  if($filename!='' ){
	  $filename1 = explode(',',$filename);
		  foreach($filename1 as $file){
		  $file_data = array(
		  'Thumbnail' => $file,
		  'Large_Image' => $file,
		  'Caption' => $inputdata['company_name'],
		  'company_id' => $insert_id
		  );
		  $this->db->insert('tbl_company_gallery', $file_data);
		  }
	  }
	}





	public function view_data(){
        $query=$this->db->query("SELECT ud.*
                                 FROM user ud 
                                 ORDER BY ud.u_id DESC");
        return $query->result_array();
    }

    public function edit_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM user ud 
                                 WHERE ud.u_id = $id");
        return $query->result_array();
    }

    public function edit_data_image($id){
        $query=$this->db->query("SELECT photo.*
                                 FROM user ud 
                                 RIGHT JOIN photos as photo
								 ON ud.u_id = photo.user_id 
                                 WHERE ud.u_id = $id");
        return $query->result_array();
    }

    public function edit_upload_image($user_id,$inputdata,$filename ='')
	{

		$data = array('name'                   => $inputdata['name'],
                      'class'                  => $inputdata['class']);
	    $this->db->where('u_id', $user_id);
	    $this->db->update('user', $data);

	  if($filename!='' ){
	  $filename1 = explode(',',$filename);
	  foreach($filename1 as $file){
	  $file_data = array(
	  'image' => $file,
	  'user_id' => $user_id
	  );
	  $this->db->insert('photos', $file_data);
	  }
	  }
	}

}