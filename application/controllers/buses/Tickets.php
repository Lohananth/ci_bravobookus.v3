<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Posts Management class created by CodexWorld
 */
class Tickets extends CI_Controller {
    
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
      $data['footer']="inc/v_footer";
      $data['script_footer_home']="inc/v_script_footer_home";
      $data['services']=$this->m_crud->get_by_sql("SELECT * FROM services");

      $data['all_contacts'] = $this->m_crud->getAllOrigin();

      $data['origin']=$this->m_crud->get_by_sql("SELECT * FROM tbl_contacts");


        $data['title']="Welcome to BravoBookus.com | Book bus, boat and private taxi in Cambodia";
        $data['seo_description']="Travelling or planning your trip across Cambodia, Laos, Vietnam and Thailand? Find the best deals on bus, taxi and ferry tickets on BravoBookus.com. Book now!";
        $data['seo_image']="front/images/standard_bookmebus-home-page-cover-limited.png";
        $data['seo_url']="https://bravobookus.com";
        $data['twitter_creator']="@BravoBookus";
        $data['seo_keywords']="book bus tickets online in cambodia, bus tickets, buy bus tickets online phnompenh to siemreap, angkor, bus angkorwat temple,cambodia bus travel, bus phnom penh schedule, siemreap transportation, bus tickets, bus in phnompenh";

        $vehicle_schedule = $_GET['route_schedule_vehicle_id'];
        $data['vehicle_schedule_data'] = $this->db->query("
          SELECT
            vt.seats_map,
            vt.`columns`,
            vt.vehicle_type,
            c.company_name,
            c.description,
            c.id,
            o.origin AS origin,
            d.origin AS destination,
            o.id AS oid,
            d.id AS did,
            c.id AS cid,
            t.departure_time,
            vs.local_price,
            vs.foreigner_price,
            ( SELECT map FROM tbl_branch WHERE company_id = c.id AND location = o.id ) AS boarding_point,
            ( SELECT map FROM tbl_branch WHERE company_id = c.id AND location = d.id ) AS drop_off 
          FROM
            tbl_vehicle AS v
            INNER JOIN tbl_vehicle_type AS vt ON v.vehicle_type = vt.vt_id
            INNER JOIN tbl_company AS c ON v.company_id = c.id
            INNER JOIN tbl_vehicle_schedule AS vs ON v.v_id = vs.v_id
            INNER JOIN tbl_origin AS o ON vs.origin = o.id
            INNER JOIN tbl_origin AS d ON vs.destination = d.id
            INNER JOIN tbl_departure_time AS t ON vs.departure_time = t.id 
          WHERE
            vs.id = $vehicle_schedule
            LIMIT 1
        ")->row();

        $departure_date = $_GET['on_date'];
        $data['seats_booked'] = $this->m_crud->get_by_sql("
          SELECT
            * 
          FROM
            tbl_ticket 
          WHERE
            vs_id = $vehicle_schedule
            AND departure_date = '$departure_date'
        "); 

        $this->load->view('front/v_template_seats',$data);


    }
    
    

}