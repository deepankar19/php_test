# codeigniter version and mysql specification

  codeigniter 3.0
  Mysql 5.4
  created in the xampp

# CodeIgniter Composer used

$ composer create-project kenjis/codeigniter-composer-installer codeemail

## and update

$ composer install 

And configture	 `application/config/config.php` 

//base_url

*define('APP_URL', ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . "://{$_SERVER['SERVER_NAME']}".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));
$config['base_url'] = APP_URL;


*autoload
$autoload['libraries'] = array('database','email','session');
$autoload['helper'] = array('url','file');


*constant
// call the file from folder for the theme 
define('CSS','resources/css'); // <?php echo base_url(CSS);?>  css files locations
define('JS','resources/js'); //  <?php echo base_url(JS);?> access js file
define('IMAGES','resources/img'); // <?php echo base_url(IMAGES);?> images location
define('BOOTSTRAP','resources/vendor'); //<?php echo base_url(BOOTSTRAP);?> vendore bootstrap


*DATABASE 
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'codemail',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);


*routes
$route['default_controller'] = 'welcome';
$route['(:any)'] = 'userdetails/index';


*created controller
welcome and userdetails
main controller of the this is welcome.php were all the controlling is done
Sendmail() --> send mail by use of mail() , configture smtp ,user external no libary used 
fetchEmail() --> fetching detail according to their userid
deleteEmail
inboxmail()  --> fetching details according to their action, if action =0 inbox and action = 1 sendbox
replyFormdata();


*model
user_model
all basic login


*template 
boostrap template is used with responsive inbox and sendbox pannel


~inbox page url:-http://localhost/php_test/codemail/Welcome/demo
~send box url:- http://localhost/php_test/codemail/Welcome/sendbox
~view page url:- http://localhost/php_test/codemail/Welcome/opentabview/id
~ user details directly:- http://localhost/php_test/codemail/userdetails?userId=5

~mysql details

file name:- codemail
table name:-email data

CREATE DATABASE codemail;

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS tasks (
    id INT(100) AUTO_INCREMENT,
    sendername VARCHAR(100) NOT NULL,
    senderemail VARCHAR(100) NOT NULL,
    fromMail VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    message VARCHAR(100) NOT NULL,
    action  INT(100) NOT NULL,
    time TIMESTAMP NOT NULL DEFAULT CURRENT_DATE(),
   PRIMARY KEY (id),
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

    public function form_insert_mail($data)
    {
      $this->db->insert('emailData',$data);  // this use to add the form data in the database 
    }

    public function fetch_email($data)      // this use to fetch the data from the database by get the userid and
                                               action
    {  $where = array('userid'=> $data['userId'],'action'=> $data['action']);
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        return $result = $query->result();
        //$this->load->view('edit_content/edit_content', $result);
    }

    public function delete_data_id($id)   // for detele of the email
    {
      $this->db->where('id', $id);
      $this->db->delete('emailData');
    }

    public function send_Mail($data)    //for getting only the send mail
    {
    	$where = array('userid'=>'5','action'=>'1');
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        //print_r($data);
        return $result = $query->result();
        }
        public function open_tab_fetch_data($value='')
        {
        $where = array('userid'=>'5','id'=>$value);
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        //print_r($data);
        return $result = $query->result();
        }
        public function fetch_user_detail($id)  // for getting only user details by its id 
        {

        $where = array('userid'=>$id);
    	$this->db->select('*');
        $this->db->from('emailData');
        $this->db->where($where);
        $query = $this->db->get();
        //print_r($data);
        return $result = $query->result();
        }
}