<?php
require_once '../classes/database.php';
class Login extends Database {
    //put your code here
    public function __construct() {
     $obj_db=new Database();   
     session_start();
    }
    public function admin_login_check($data)
    {
        $password=md5($data['admin_password']);
        $sql="SELECT * FROM tbl_admin WHERE admin_email_address='$data[admin_email_address]' AND admin_password='$password' ";
        $query_result=$this->connect()->query($sql);
        $result=  mysqli_fetch_assoc($query_result);

        if($result)
        {   $_SESSION['access_level']=$result['access_level'];
            if($result['access_level']=='1')
            {
                $_SESSION['admin_id']=$result['admin_id'];
                $_SESSION['admin_name']=$result['admin_name'];
                $sql_log="INSERT INTO tbl_user_log_info(user_name,status,deletion_status)
                VALUES('$_SESSION[admin_name]',1,0)";
                $query_result=$this->connect()->query($sql_log);
                $this->get_session('true');
                header('Location:admin_master_page.php');
            }
            if($result['access_level']=='2')
            {
                $_SESSION['admin_id']=$result['admin_id'];
                $_SESSION['admin_name']=$result['admin_name'];
                $sql_log="INSERT INTO tbl_user_log_info(user_name,status,deletion_status)
                VALUES('$_SESSION[admin_name]',1,0)";
                $query_result=$this->connect()->query($sql_log);
                $this->get_session('true');
                header('Location:admin_master_page.php');
            }
        }
        else
        {
            $message='Your Email Or Password Invalide !';
            return $message;
        }
    }
    public function get_session($gstatus=NULL)
    {
        if($_SESSION['login_status']==$gstatus)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}