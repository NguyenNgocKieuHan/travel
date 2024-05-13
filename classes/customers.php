<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath.'/../lib/database.php');
@include_once($filepath.'/../helpers/format.php');
?>

<?php 
class customers
{
    private $db;
    private $fm;

    public function __construct(){
        $this -> db = new Database();
        $this -> fm= new Format();
    }
    public function insert_customers($data){
        $kh_hoten = mysqli_real_escape_string($this->db->link, $data['kh_hoten']);
        $kh_sdt = mysqli_real_escape_string($this->db->link, $data['kh_sdt']);
        $kh_email = mysqli_real_escape_string($this->db->link, $data['kh_email']);
        $kh_diachi = mysqli_real_escape_string($this->db->link, $data['kh_diachi']);
        $kh_password = mysqli_real_escape_string($this->db->link, md5($data['kh_password']));

        if($kh_hoten == "" || $kh_sdt == "" || $kh_email == "" || $kh_diachi == "" || $kh_password == ""){
            $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM khachhang WHERE kh_email ='$kh_email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'>Email đã tồn tại!!!</span>";
                return $alert;
            }else{
                $query = "INSERT INTO khachhang(kh_hoten, kh_sdt, kh_email, kh_diachi, kh_password) 
                VALUES ('$kh_hoten','$kh_sdt','$kh_email','$kh_diachi','$kh_password')";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='success'> Đăng ký thành công!</span>";
                    return $alert; 
                }else{
                    $alert = "<span class='error'> Đăng ký thất bại!!!</span>";
                    return $alert; 
                }
            }
        }
    }
    public function login_customers($data){
        $kh_hoten = mysqli_real_escape_string($this->db->link, $data['kh_hoten']);
        $kh_password = mysqli_real_escape_string($this->db->link, md5($data['kh_password']));

        if($kh_hoten == "" || $kh_password == ""){
            $alert = "<span class='error'>Tên hoặc mật khẩu không được trống!!!</span>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM khachhang WHERE kh_hoten = '$kh_hoten' AND kh_password = '$kh_password'";
            $result_check = $this->db->select($check_login);
            if($result_check){
                $value = $result_check ->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['kh_ma']);
                Session::set('customer_ten',$value['kh_hoten']);
                header('Location:checkout.php');
            }else{
                $alert = "<span class='error'>Tên hoặc mật khẩu không đúng!!!</span>";
            return $alert;
            }
        }
    }
    public function show_customers($id){
        $query = "SELECT * FROM khachhang WHERE kh_ma ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_customers(){
        
    }
}
?>