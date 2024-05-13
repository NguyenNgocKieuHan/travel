<?php
$filepath = realpath(dirname(__FILE__));
@include($filepath.'/../lib/session.php');
session::checkLogin();
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class CTVlogin
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function login_CTV($ctv_username,$ctv_pass){
        $ctv_username = $this -> fm -> validation ($ctv_username);
        $ctv_pass = $this -> fm -> validation ($ctv_pass);

        $ctv_username = mysqli_real_escape_string($this->db->link, $ctv_username);
        $ctv_pass = mysqli_real_escape_string($this->db->link, $ctv_pass);

        if(empty($ctv_username)||empty($ctv_pass)){
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        }else{
            $query = "SELECT * FROM congtacvien WHERE ctv_username = '$ctv_username' AND ctv_pass = '$ctv_pass'";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                session::set('CTVlogin', true);
                session::set('ctv_ma',$value['ctv_ma']);
                session::set('QA_ma',$value['QA_ma']);
                session::set('ctv_username',$value['ctv_username']);
                session::set('ctv_ten',$value['ctv_ten']);
                header('location:index.php');
            }else{
                $alert = "Tài khoản hoặc mật khẩu sai!!!";
                return $alert;
            }
        }

    }
}
?>