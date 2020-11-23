

 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class map extends CI_Controller {  
      //functions  
      function googlemap(){  
$this->load->library('googlemaps');

$config['center'] = '37.4419, -122.1419';
$config['zoom'] = 'auto';
$this->googlemaps->initialize($config);

$marker = array();
$marker['position'] = '37.429, -122.1419';
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();

$this->load->view('map', $data);

		}
		}
