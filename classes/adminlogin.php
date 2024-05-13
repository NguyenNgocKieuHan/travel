<?php
$filepath = realpath(dirname(__FILE__));
@include($filepath.'/../lib/session.php');
session::checkLogin();
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class adminlogin
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function login_admin($ad_user,$ad_pass){
        $ad_user = $this -> fm -> validation ($ad_user);
        $ad_pass = $this -> fm -> validation ($ad_pass);
        
        $ad_user = mysqli_real_escape_string($this->db->link, $ad_user);
        $ad_pass = mysqli_real_escape_string($this->db->link, $ad_pass);

        if(empty($ad_user)||empty($ad_pass)){
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        }else{
            $query = "SELECT * FROM admin WHERE ad_user = '$ad_user' AND ad_pass = '$ad_pass'";
            $result = $this->db->select($query);
            if($result){
                $value = $result->fetch_assoc();
                $_SESSION['admin'] = $value;
                return true; 
            }else{
                $alert = "Tài khoản hoặc mật khẩu sai!!!";
                return false;
            }
        }

    }
}
?>