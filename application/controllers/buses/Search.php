<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Search extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('Crud_model','m_crud');
        $this->load->database();
        // $this->load->library('Ajax_pagination');
        // $this->perPage = 2;
        $this->load->helper('url');
    }
    
    public function index(){     
      $data = array();
      // $data['origin']=$origin;
      // $data['dest']=$dest;
      // $data['book_date']=$book_date;
      $origin=$_GET['txtOrigin'];
      $dest=$_GET['txtDestination'];
      $book_date=$_GET['txtBusDate'];

      $origin=$_GET['txtOrigin'];
      $dest=$_GET['txtDestination'];
      $book_date=$_GET['txtBusDate'];

      $from=$_GET['from'];      
      $to=$_GET['to'];
      $type=$_GET['type'];

    if(isset($from)){
        $data['from']=$from;
    }else{
        $data['from']=$this->input->post['from'];
    }

    if(isset($to)){
        $data['to']= $to;
    }else{
        $data['to']=$this->input->post['to'];
    }

      
    if(isset($origin)){
        $data['origin']=$_GET['txtOrigin'];
    }else{
        $data['origin']=$this->input->post['txtOrigin'];
    }
    if(isset($dest)){
        $data['dest']=$_GET['txtDestination'];
    }else{
        $data['dest']=$this->input->post['txtDestination'];
    }
    if(isset($book_date)){
        $data['book_date']=$_GET['txtBusDate'];
    }else{
        $data['book_date']=$this->input->post['txtBusDate'];
    }     

      // Add Style Home
      $data['header_top']="inc/v_header_top";
	  $data['nav']="inc/v_nav";
       // $data['nav']=null;
      $data['style_home']="inc/v_style_home";
      $data['settings']=$this->m_crud->get_by_sql("SELECT * FROM settings");     
      $data['service']="home/v_services";
        // $data['service']=NULL;
    // recent_view
    // $data['recent_view']="home/v_recent_view";
    $data['recent_view']=NULL;

     $data['last_minute_deals']="home/v_last_minute_deals";
    // $data['last_minute_deals']=NULL;     
     $sql_deal="SELECT 
            distinct  d.dest_id,d.destinations,d.dest_landmark,d.country
            ,h.hotel_id,h.h_name,h.h_slug,h.h_feature_image,h.h_description,h.h_address,h.star_rating,
            hr.hroom_id,hr.hr_name,hr.hr_image,hr.hr_max,min(hr.hr_base_rate) as base_rate
            FROM destinations as d LEFT JOIN hotels as h on h.dest_id=d.dest_id
            INNER JOIN hotel_rooms as hr ON h.hotel_id=hr.hotel_id
            GROUP BY h.hotel_id";
    $data['last_minute_deals_data']=$this->m_crud->get_by_sql($sql_deal);

    // $sql_search="SELECT "
    // $data['result_search']=$this->m_crud->get_by_sql($sql_search);




      $data['footer']="inc/v_footer";
      $data['script_footer_home']="inc/v_script_footer_home";
      $data['services']=$this->m_crud->get_by_sql("SELECT * FROM services");
     
        $query = $this->m_crud->getOrigin();
            $contacts=json_encode (array($query)); 
            $contacts=substr($contacts, 1);
            $contacts=substr($contacts,0,strlen($contacts)-1);        
            $data['origins']=$contacts;





        $data['title']="Welcome to BravoBookus.com | Book bus, boat and private taxi in Cambodia";
        $data['seo_description']="Travelling or planning your trip across Cambodia, Laos, Vietnam and Thailand? Find the best deals on bus, taxi and ferry tickets on BravoBookus.com. Book now!";
        $data['seo_image']="front/images/standard_bookmebus-home-page-cover-limited.png";
        $data['seo_url']="https://bravobookus.com";
        $data['twitter_creator']="@BravoBookus";
        $data['seo_keywords']="book bus tickets online in cambodia, bus tickets, buy bus tickets online phnompenh to siemreap, angkor, bus angkorwat temple,cambodia bus travel, bus phnom penh schedule, siemreap transportation, bus tickets, bus in phnompenh";

$data['vehicles'] =$this->m_crud->get_by_sql("SELECT 
        vs.*, vt.vehicle_type, vt.vt_id AS vtid,v.v_id as vid, v.drivers, v.inspectors, v.amenities, v.seats, v.`status` AS v_status,v.feature_image, dt.departure_time AS time, dt.id AS tid, c.company_name,c.Rank, c.logo, c.id AS cid
        FROM 
        tbl_vehicle_schedule AS vs
        INNER JOIN
        tbl_departure_time AS dt
        ON vs.departure_time = dt.id
        INNER JOIN
        tbl_vehicle AS v
        ON vs.v_id = v.v_id
        INNER JOIN
        tbl_vehicle_type AS vt
        ON v.vehicle_type = vt.vt_id
        INNER JOIN
        tbl_company AS c
        ON v.company_id = c.id
        WHERE 
        vs.origin=$from AND vs.destination=$to
        ");

       // $data['vehicles']="Hellow Vechicles";

        $data['currencies']='USD';

        $this->load->view('front/v_template_search',$data);


    }
      function getValues(){
    // $this->load->model('get_db');
    $data['contacts'] = $this->m_crud->getAllOrigin();
    // $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($data));
    return $data;
    }

    function getOrigin(){
        $query = $this->m_crud->getOrigin();
        $contacts=json_encode (array($query)); 
        $contacts=substr($contacts, 1);
         $contacts=substr($contacts,0,strlen($contacts)-1);

        // $contacts='[
        //             {"id":"1","country":"Cambodia","heroName":"Sime Reap"},
        //             {"id":"2","country":"Cambodia","heroName":"Battambang"},
        //             {"id":"3","country":"Cambodia","heroName":"Phnom Penh"},
        //             {"id":"4","country":"Thai","heroName":"Bangkork"}
        //             ]';
        echo $contacts;
    }

    
    function ajaxPaginationData(){
        $conditions = array();
        
        //calc offset number
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        
        //set conditions for search
        $keywords = $this->input->post('keywords');
        $sortBy = $this->input->post('sortBy');
        if(!empty($keywords)){
            $conditions['search']['keywords'] = $keywords;
        }
        if(!empty($sortBy)){
            $conditions['search']['sortBy'] = $sortBy;
        }
        
        //total rows count
        $totalRec = count($this->post->getRows($conditions));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'posts/ajaxPaginationData';
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        $config['link_func']   = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        
        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        
        //get posts data
        $data['posts'] = $this->post->getRows($conditions);
        
        //load the view
        $this->load->view('posts/ajax-pagination-data', $data, false);
    }




}