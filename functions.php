<?php
	
	class functions extends table{
		
		public function get_distinct_category(){
			global $conn;
			extract($_POST);
			$query = $conn->query("SELECT DISTINCT `menu_category`  FROM `tbl_menus` WHERE branch_id = $branch_id" );
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			$json_data = json_encode($results);
  		    echo $json_data;
		}
		
		public function search(){
			global $conn;
			extract($_POST);
			$query = $conn->query("SELECT * FROM  tbl_menus WHERE menu_name LIKE '%$search_val%' and branch_id = $branch_id and menu_status != 3" );
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			$default_menu_img = "images/res_logo/no-logo.jpg";
			$results = $this->image_process($results,'menu_img','images/menu/',$default_menu_img); 
			echo $results;    
		}
		
		public function get_product(){
			global $conn;
			extract($_POST);
			$query = $conn->query("SELECT * FROM  tbl_menus WHERE menu_id = $menu_id");
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			$default_menu_img = "images/res_logo/no-logo.jpg";
			$results = $this->image_process($results,'menu_img','images/menu/',$default_menu_img); 
			echo $results;  
		}
		
		public function product_edit(){
			extract($_POST);
			$this->table = 'tbl_menus';
			$data = $_POST['post'];
			$menu_code = "$branch_id".strtoupper(substr($data[0]['value'], 0, 3));
			
			if($img != '')
			{
				$send['menu_img'] = $menu_code.".jpg";
				$this->save_image_to_folder($img);
			}
			$send['branch_id'] = $branch_id;
			$send['menu_code'] = $menu_code;
			$send['menu_name'] = strtolower($data[0]['value']);
			$send['menu_desc'] = $data[1]['value'];
			$send['menu_price'] = $data[2]['value'];
			$send['menu_status'] = $data[6]['value'];
			$send['menu_category'] = strtolower($data[5]['value']);
			$send['uom'] = $data[4]['value'];    
			$send['quantity'] = $data[3]['value'];

			$cond['menu_id'] = $menu_id;
			$result = $this->update($send,$cond);
		}
		
		//menu_status = 3 = deleted product
		public function product_delete	(){
			extract($_POST);
			$this->table = 'tbl_menus';
			$send['menu_status'] = '3';
			$cond['menu_id'] = $menu_id;
			$result = $this->update($send,$cond);
		}
		
		public function product_add(){
			global $conn;
			extract($_POST);
			$this->table = 'tbl_menus';
			$data = $_POST['post'];
			$menu_code = "$branch_id".strtoupper(substr($data[0]['value'], 0, 3));
			
			$send['branch_id'] = $branch_id;
			$send['menu_code'] = $menu_code;
			$send['menu_img'] = $menu_code.".png";
			$send['menu_name'] = strtolower($data[0]['value']);
			$send['menu_desc'] = $data[1]['value'];
			$send['menu_price'] = $data[2]['value'];
			$send['menu_status'] = $data[6]['value'];
			$send['menu_category'] = strtolower($data[5]['value']);
			$send['uom'] = $data[4]['value'];    
			$send['quantity'] = $data[3]['value'];
			
			$id = $this->insert($send); 
			if($id > 0)
			{
			   $img_required['photo'] = str_replace("data:image/png;base64,","",$img);
			   $img_required['folder'] = 'images/menu';
			   $img_required['title'] = $menu_code;
			   $image = json_encode($img_required, true);
			   echo $this->save_image_to_folder($image);
			}else{
			  echo 0;
			}			
		}
		 /*
		 Author: Mahalia Rose
		 Function: save_image_to_folder
		 Desc: save base64 encoded image file to a folder
		*/
		  public function save_image_to_folder($image)
		  {
			$images_arr = json_decode($image, true);
			extract($images_arr);
			$entry = base64_decode($photo);
			$image = imagecreatefromstring($entry);
			$directory = dirname(__FILE__).DIRECTORY_SEPARATOR."/".$folder."/".DIRECTORY_SEPARATOR."".$title.".jpg";
			header ( 'Content-type:image/jpg' ); 
			imagejpeg($image, $directory);
			imagedestroy ( $image ); 
			return 0;
		  }
	
		/*
		  Author : Justin Xyrel
		  Function: image_base64_decode
		  Desc: Decode an  image using base64 of php
		  Params: {arr: array of data where to locate the image,
				   img_key: key of image in the array, 
				   dir: directory of image, 
				   default_img: default image to use if doesn't have image stored}

		*/
		  private function image_process($arr,$img_key,$dir,$default_img){
			 foreach($arr as &$detail){
				$logo =  base64_encode(file_get_contents($dir.$detail[$img_key]));
				$detail[$img_key] = ((file_exists($dir.$detail[$img_key])) && (!empty($detail[$img_key]))) ? $logo : '';
			 }
		   return json_encode($arr);
		  }
		 /*
		  Author : Justin Xyrel 
		  Date: 04/23/14
		  Function: login_user
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function login_user(){		 
			global $conn;
			extract($_POST);
		
			$sql_que = "SELECT u.*,ut.user_type,(SELECT res_id from tbl_restaurant_branches where branch_id = u.branch_id) as res_id from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id where 
                   u.username= '".$usr."' and u.password ='".$pwd."' and u.user_type_id != 1 ";
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/23/14
		  Function: sha1_pass
		  Desc: encrypt the params (which is password) in sha1 , a function mostly used when the js script needs the password to be encoded
          Params: post data such as $usr(username) and $pwd($password)
		*/ 		
		
		public function sha1_pass(){
		   extract($_POST);
		   $pass_encrypted = sha1($pwd);
		   echo $pass_encrypted;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: logout
		  Desc: unsets the session which is the basis if the account is logged in
          Params: NONE
		*/ 		
				
		public function logout(){
		  if(!isset($_SESSION)){
			session_start();
		  }
		   unset($_SESSION['auth']);

		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: get_profile
		  Desc: get the current user information thru getting the session['auth']
          Params: NONE
		*/ 				
		public function get_profile(){
		  if(!isset($_SESSION)){
			session_start();
		  }
		 // var_dump($_SESSION['auth']);die();
		 if(strpos($_SESSION['auth'][0]['birth_date'],'-') === false){
			$_SESSION['auth'][0]['birth_date'] =  date("Y-m-d", $_SESSION['auth'][0]['birth_date'] );
		 }
		 // echo json_encode($_SESSION['auth'][0]['birth_date'] );
		  echo json_encode($_SESSION['auth']);
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: login_success
		  Desc: set the session['auth'] if successful logged in
          Params: post data which is the user's account information
		*/ 					
		
		public function login_success(){
		   extract($_POST);
		    if(!isset($_SESSION)){
				session_start();
			}
		   $user_info = json_decode($data,true);
		   $_SESSION['auth'] = $user_info;

		}
		/*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: update_profile
		  Desc: updates the current information of the user including the password of the account
          Params: post data which is the data to be updated
		*/ 	
		public function update_profile(){
			extract($_POST['params']);
			$this->table = 'tbl_users';
			$wh = array('user_id' => $user_id);
         
			if(!isset($_SESSION)){
				session_start();
			} 

		     $this->validate_email_address($form[13]['value'],$user_id);

			foreach($form as &$data){     
				if($data['name'] !== 'email_add_verify' && $data['name'] !== 'current_password' ){
					if($data['name'] == 'password' && !empty($data['value']) ){
					
						$data['value'] = sha1($data['value']);
					}
					if($data['name'] == 'birth_date'){
						$data['value'] = strtotime($data['value']);
					}
					$arr[$data['name']] = $data['value'];
				}
			}

			  unset($arr['radio']); // does not belong to DB fields
			if(empty($arr['password'])){
			  unset($arr['password']);
			}
			$results =  $this->update($arr,$wh);

			if($results){
			 foreach($arr as $key=>&$value){
			   $_SESSION['auth'][0][$key] = $value;
			 }
			}

			echo $results;
			
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: logout_user
		  Desc: unset the session of the user
          Params: none
		*/ 	

		public function logout_user(){
			if(!isset($_SESSION)){
				session_start();
			} 
			session_destroy();
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 05/01/14
		  Function: get_manager
		  Desc: Get List of managers in a particular restaurant
		  Params: post data such us $res_id
		*/ 
		public function get_manager(){	
		  global $conn;
		  
		  if(!isset($_SESSION)){
			session_start();
		  }		
		//  echo "<pre>",print_r($_SESSION['auth']),"</pre>";
		     $fields = array('fname','lname','middle');
			  $res_id = $_SESSION['auth'][0]['res_id'];

			$sql_que = "SELECT u.*,ut.user_type,rb.branch_desc from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id 
						join tbl_restaurant_branches rb on u.branch_id = rb.branch_id where 
                   rb.res_id= ".$res_id." and u.user_type_id = 4 ";
		 //   var_dump($sql_que);die();
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		
		/********** CLASS **********/
		/*
		  Author : Mark Lopez 
		  Date: 05/19/14
		  Function: get_class
		  Desc: Select all restaurant class
		  Params:
		*/
		public function get_class(){	
			global $conn;
		  
			if(!isset($_SESSION)){
				session_start();
			}		
			
			$fields = array('fname','lname','middle');
			$res_id = $_SESSION['auth'][0]['res_id'];

			$sql_que = 	"
						SELECT rest_class_id, res_class_desc, insert_date, update_date, au_user_id
						FROM tbl_restaurant_class
						";	   
			
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		
		public function add_class(){
			global $conn;
			extract($_POST);
			$this->table = 'tbl_menus';
			$data = $_POST['post'];
			$menu_code = "$branch_id".strtoupper(substr($data[0]['value'], 0, 3));
			
			$send['branch_id'] = $branch_id;
			$send['menu_code'] = $menu_code;
			$send['menu_img'] = $menu_code.".png";
			$send['menu_name'] = strtolower($data[0]['value']);
			$send['menu_desc'] = $data[1]['value'];
			$send['menu_price'] = $data[2]['value'];
			$send['menu_status'] = $data[6]['value'];
			$send['menu_category'] = strtolower($data[5]['value']);
			$send['uom'] = $data[4]['value'];    
			$send['quantity'] = $data[3]['value'];
			
			$id = $this->insert($send); 
			if($id > 0)
			{
			   $img_required['photo'] = str_replace("data:image/png;base64,","",$img);
			   $img_required['folder'] = 'images/menu';
			   $img_required['title'] = $menu_code;
			   $image = json_encode($img_required, true);
			   echo $this->save_image_to_folder($image);
			}else{
			  echo 0;
			}			
		}
		/********** END: CLASS **********/
		
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/08/14
		  Function: add_staff
		  Desc: Add manager account
		  Params: post data 
		*/ 
		public function add_staff(){	
			global $conn;
			extract($_POST);
			if(!isset($_SESSION)){
				session_start();
			}		
			$this->table = 'tbl_users';
			$this->validate_email_address($form[13]['value']);
			$user_type_id = $_SESSION['auth'][0]['user_type_id'];
			//  var_dump( $user_type_id);die();
			//  var_dump( $_SESSION['auth'][0]);
			//	exit();
			foreach ($form as $val) {
				$val['value'] = ($val['name'] == 'password') ? sha1($val['value']) : $val['value'];
				$val['value'] = ($val['name'] == 'status') ? (($val['value'] == 'activate') ? '1' : '0') : $val['value'];
				$fields[$val['name']] = $val['value'];
				
				if($val['name'] == 'email_add'){
					$fields['username'] = $val['value'];
				}
			}
			
			$fields['user_type_id'] = ($user_type_id == '4' ) ? '5' : '4' ;
			$fields['birth_date'] = strtotime($fields['birth_date']);
			$response = $this->insert($fields);

			if($response > 0) {
				echo json_encode(array('error' => '0' ,'result'=>true));
			}
			else {
				echo json_encode(array('error' => '1' , 'err_msg' => 'Please try again.' ));
			}			
		}
		
				
		 /*
		  Author : Justin Xyrel 
		  Date: 05/09/14
		  Function: get_staff
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function get_branches(){	
		  if(!isset($_SESSION)){
			session_start();
		  }		
		  $res_id = $_SESSION['auth'][0]['res_id'];
		  $this->table = 'tbl_restaurant_branches';
		  $fields = array('branch_id','branch_desc');
		  $condition = array('res_id'=>$res_id);
		  $result = $this->select_fields_where($fields,$condition);
		  echo json_encode($result);
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 05/12/14
		  Function: send_email
		  Desc: Send mail thru mail function of PHP
		  Params:  {$mail: email_address, $subject : header, $content : content of email }
		*/ 
		
		public function send_email(){
	       extract($_POST);
		   //var_dump($_POST);
		   $result = mail($mail,$subject,$content);
	       echo $mail;
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/13/14
		  Function: validate_email_address
		  Desc: check validation of email
		  Params:  {$email_address}
		*/ 
		
		public function validate_email_address($email_address,$user_id = 0){
	       $this->table = 'tbl_users';
		 //  var_dump($user_id);die();
		   $email_exist  = $this->check_existence("email_add = '".$email_address."' and user_id != '".$user_id."'" );
		 //  var_dump($email_exist);
		   $is_valid_email = filter_var($email_address,FILTER_VALIDATE_EMAIL);
		    if($email_exist){
				echo json_encode(array('error' => '1' , 'err_msg' => 'The email address is already taken.' )); die();
			}elseif(!$is_valid_email){
				echo json_encode(array('error' => '1' , 'err_msg' => 'The email address is invalid.' )); die();	  
			}
		}
		
		
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/14/14
		  Function: sysad_report
		  Desc:  shows restaurant report in system admin side
		  Params:  None
		*/ 
		
		public function sysad_report(){
			global $conn;
			extract($_POST);

		    $this->table = 'tbl_restaurant_name';
		    $results['count_rest'] = $this->select_count();
			$this->table = 'tbl_restaurant_branches';
		    $results['count_branches'] = $this->select_count();
			$this->table = 'tbl_orders';
		    $results['count_orders'] = $this->select_count();

			$sql_que = "SELECT res_id,res_desc,contact_no,address,branch_no, 
							(SELECT t_u.fname FROM  tbl_users t_u JOIN 
									tbl_restaurant_branches t_b ON t_u.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id AND t_u.user_type_id = 2 limit 1) as admin_fname,
(							SELECT t_u.lname FROM  tbl_users t_u JOIN 
									tbl_restaurant_branches t_b ON t_u.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id AND t_u.user_type_id = 2 limit 1) as admin_lname,
							(SELECT COUNT(*) FROM  tbl_orders t_o JOIN 
									tbl_restaurant_branches t_b ON t_o.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id) as order_count
							FROM tbl_restaurant_name t_n";
			$query = $conn->query($sql_que);

            $results['lists'] = $query->fetchAll(PDO::FETCH_ASSOC);

            $json_data = json_encode($results);
  		    echo $json_data;

		} 

		/*
		  Author : Justin Xyrel 
		  Date: 05/14/14
		  Function: restadmin_report
		  Desc:  shows restaurant report in restaurant admin side
		  Params:  None
		*/ 
		
		public function restadmin_report(){
			global $conn;
			extract($_POST);

			$this->table = 'tbl_restaurant_branches';
		    $results['count_branches'] = $this->select_count_where('res_id='.$res_id);
			
			$total_order = 0;
			
			$sql_que = "SELECT t_b.branch_id,t_b.branch_desc,t_b.branch_contact_person,t_b.branch_contact_no,t_b.unit_no,
							   t_b.building_name,t_b.street,t_b.town_city,t_b.state_province,t_b.country,
								(SELECT count(*) from tbl_orders where branch_id = t_b.branch_id) as total_order
						FROM tbl_restaurant_branches t_b
						WHERE t_b.res_id =".$res_id;

			$query = $conn->query($sql_que);

            $results['lists'] = $query->fetchAll(PDO::FETCH_ASSOC);

			foreach($results['lists'] as $list){
			  $total_order += $list['total_order'];
			}
			 $results['count_orders'] = $total_order;
			 $json_data = json_encode($results);
  		     echo $json_data;

		} 
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/19/14
		  Function: get_transactions
		  Desc: get restaurant transactions 
		  Params:  None
		*/ 
		
		public function get_transactions(){
			global $conn;
			extract($_POST);
			$this->table = 'tbl_orders';
		    $results['count_orders'] = $this->select_count_where('branch_id='.$branch_id);
			$this->table = 'tbl_users';
		    $results['count_staff'] = $this->select_count_where('user_type_id=5 and branch_id='.$branch_id);
			$sql_que = "SELECT o.order_id,o.user_id,o.table_id,o.discount_type_id,o.guests_no,o.note,o.order_status,o.order_type,
						o.del_address,o.event_type,o.expected_date,o.expected_time,
						o.expected_time_to,o.processed_date,o.discount_percentage,
						o.total_amount,o.discount_amount,o.total_payment,o.insert_date,u.fname,u.lname,u.mname,u.unit_no,
						u.building_name,u.street,u.town_city,
						u.state_province,u.country,u.contact_no,u.email_add,
						(SELECT currency from tbl_restaurant_branches where branch_id = ".$branch_id.") as currency
						
						FROM tbl_orders o JOIN tbl_users u on o.user_id = u.user_id 
						WHERE o.branch_id = ". $branch_id ;

			$query = $conn->query($sql_que) ;
			
			$results['lists'] = $query->fetchAll(PDO::FETCH_ASSOC);
			$results = json_encode($results);
			echo $results;
		} 

		/*
		Author : Justin Xyrel
		Function: get_order_details
		Desc: Get order details
		*/
 
		public function get_order_details(){
			global $conn;
			extract($_POST);

			$sql_que = "SELECT od.menu_id,od.mix_match_id,od.discount_type_id,
						od.quantity,od.discount_percentage,od.discount_amount,
						od.total_payment,od.status,m.menu_id,m.menu_name,mx.mix_match_id,mx.mix_match_name 
						FROM tbl_order_details od LEFT JOIN tbl_menus m on od.menu_id = m.menu_id 
						LEFT JOIN tbl_mix_matches mx on od.mix_match_id = mx.mix_match_id where od.order_id = ".$order_id;

			$query = $conn->query($sql_que) ;
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
		//	var_dump($results);die();
			$results = json_encode($results);
			echo $results;
		} 

		/*
		  Author : Justin Xyrel 
		  Date: 05/20/14
		  Function: get_manager_staff
		  Desc: get staff of manager
 		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function get_staff(){	
		  global $conn;
		  
		  if(!isset($_SESSION)){
			session_start();
		  }		

		     $fields = array('fname','lname','middle');
			 $branch_id = $_SESSION['auth'][0]['branch_id'];

			$sql_que = "SELECT u.*,ut.user_type,rb.branch_desc from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id 
						join tbl_restaurant_branches rb on u.branch_id = rb.branch_id where 
                   rb.branch_id= ".$branch_id." and u.user_type_id = 5 ";

			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		

	}
	
?>