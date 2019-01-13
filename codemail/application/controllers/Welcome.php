<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }
 function __construct() {
parent::__construct();
$this->load->model('User_model');
}

    
    public function index()
    {
        //path views/home.php
        //home is a templatefile name.
        $this->load->view('home'); 
    }
    public function demo()
    {
        $this->load->view('demo');
    }

    public function sendMail()
    {

    	$data = $this->input->post();
    	//print_r($data);

    	$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.gmail.com',
  'smtp_port' => 465,
  'smtp_user' => 'deepankardey12@gmail.com', // change it to yours
  'smtp_pass' => '9630994887', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '';
        $this->load->library('email', $config);
        $this->email->initialize($config); // Add 
      $this->email->set_newline("\r\n");
      $this->email->from($data['fromMail']); // change it to yours
      $this->email->to($data['toemail']);// change it to yours
      $this->email->subject($data['subjectMail']);
      $this->email->message($data['messagemail']);
      if($this->email->send())
     {
     	$data1= array('userId' =>5,'sendermail'=>$data['toemail'],'fromMail'=>$data['fromMail'],'subject'=>$data['subjectMail'],'message'=>$data['messagemail'],'action'=>'1');
        $this->User_model->form_insert_mail($data1);
        $this->demo();
     
      //echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

      }

      public function fetchEmail()
      {
      	$data = array('userId'=>'5','action'=>'0');
      	

      	$result_html = '';
        $fetchData = $this->User_model->fetch_email($data);

    foreach($fetchData as $result) {
        $result_html .= '
    	<tr class="js_open">
          <td class="inbox-small-cells">
           <input type="checkbox" class="mail-checkbox" id="'.$result->id.'">
            </td>
           <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
           <td class="view-message dont-show">'. $result->subject .'</td>
           <td class="view-message">'. $result->message .'</td>
           <td class="view-message inbox-small-cells"></td>
           <td class="view-message text-right">' . $result->time . '</td>
           <td class="view-message text-right"> <input type="button" value="Delete" onclick="deletemsg('.$result->id.')"> |  <input type="button" value="View" onclick="opentab('.$result->id.')"></td>
            </tr>';                   

    }

    echo json_encode($result_html);
      	//echo json_encode($fetchData);
      }

      public function deleteEmail()
      {
      	$deleteData = $this->uri->segment(3);
      	$delete_email_data['data'] = $this->User_model->delete_data_id($deleteData);
       $this->load->view('demo');
      }

      public function sendbox()
      {
      	$this->load->view('sendmail');
      }
      public function sendMaiil()
      {
      	$data = array('userId'=>'5','action'=>'1');
      	
      	$result_html = '';
        $fetchData = $this->User_model->send_Mail($data);

        

    foreach($fetchData as $result) {
        $result_html .= '
    	<tr >
          <td class="inbox-small-cells">
           <input type="checkbox" class="mail-checkbox" >
            </td>
           <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
           <td class="view-message dont-show">'. $result->subject .'</td>
           <td class="view-message">'. $result->message .'</td>
           <td class="view-message inbox-small-cells"></td>
           <td class="view-message text-right">' . $result->time . '</td>
           <td class="view-message text-right"> <input type="button" value="Delete" onclick="deletemsg('.$result->id.')"> |  <input type="button" value="View" onclick="opentab('.$result->id.')" </td>
            </tr>';  
      }
      echo json_encode($result_html);

  }

  public function mainbox()
  {
  	echo 'you r here';
  }

  public function inboxmail()
  {
  	$data = $this->input->post();
  	$data1= array('userId' =>5,'sendername'=>$data['sendername'],'sendermail'=>$data['toemail'],'fromMail'=>$data['fromemail'],'subject'=>$data['subject'],'message'=>$data['message'],'action'=>'0');
        $this->User_model->form_insert_mail($data1);
        $this->demo();
     
  }
  public function opentabview()
  {
  	$opentabdata = $this->uri->segment(3);
  	$data['data_tab'] = $this->User_model->open_tab_fetch_data($opentabdata);
  	//print_r($opentab_email_data);
   $this->load->view('opentabdata', $data);

  }

  public function replyformData()
  {
  	$replyData  = $this->input->post();
  	$replyfD  = $data1= array('userId' =>5,'sendermail'=>$replyData['toemail'],'fromMail'=>$replyData['fromemail'],'subject'=>$replyData['subject'],'message'=>$replyData['message'],'action'=>'1');
        $this->User_model->form_insert_mail($replyfD);
        $this->demo();
  }
}
