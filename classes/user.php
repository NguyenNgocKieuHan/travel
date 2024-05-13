<?php
$filepath = realpath(dirname(__FILE__));
@include_once($filepath . '/../lib/database.php');
@include_once($filepath . '/../helpers/format.php');
?>

<?php
class user
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_users($data)
    {
        $kh_hoten = mysqli_real_escape_string($this->db->link, $data['kh_hoten']);
        $kh_sdt = mysqli_real_escape_string($this->db->link, $data['kh_sdt']);
        $kh_email = mysqli_real_escape_string($this->db->link, $data['kh_email']);
        $kh_diachi = mysqli_real_escape_string($this->db->link, $data['kh_diachi']);
        $kh_password = mysqli_real_escape_string($this->db->link, md5($data['kh_password']));

        if ($kh_hoten == "" || $kh_sdt == "" || $kh_email == "" || $kh_diachi == "" || $kh_password == "") {
            $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
            return $alert;
        } else {
            $check_email = "SELECT * FROM khachhang WHERE kh_email ='$kh_email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'>Email đã tồn tại!!!</span>";
                return $alert;
            } else {
                $query = "INSERT INTO khachhang(kh_hoten, kh_sdt, kh_email, kh_diachi, kh_password) 
                VALUES ('$kh_hoten','$kh_sdt','$kh_email','$kh_diachi','$kh_password')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'> Đăng ký thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'> Đăng ký thất bại!!!</span>";
                    return $alert;
                }
            }
        }
    }
    public function login_user($data)
    {

        $kh_username = mysqli_real_escape_string($this->db->link, $data['kh_username']);
        $kh_password = mysqli_real_escape_string($this->db->link, $data['kh_password']);

        if (empty($kh_username) || empty($kh_password)) {
            $alert = "Tài khoản và mật khẩu không được trống!!!";
            return $alert;
        } else {
            $query = "SELECT * FROM khachhang WHERE kh_username = '$kh_username' AND kh_password = '$kh_password'";
            $result = $this->db->select($query);
            if ($result->num_rows > 0) {
                $value = $result->fetch_assoc();
                session::set('user', true);
                session::set('kh_ma', $value['kh_ma']);
                session::set('q_ma', $value['q_ma']);
                session::set('kh_hoten', $value['kh_hoten']);
                session::set('kh_sdt', $value['kh_sdt']);
                session::set('kh_email', $value['kh_email']);
                session::set('kh_diachi', $value['kh_diachi']);
                session::set('kh_username', $value['kh_username']);
                header('location:index.php');
            } else {
                $alert = "Tài khoản hoặc mật khẩu sai!!!";
                return $alert;
            }
        }
    }

    public function show_users($id)
    {
        $query = "SELECT * FROM khachhang WHERE kh_ma ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_users($data, $id)
    {
        $kh_hoten = mysqli_real_escape_string($this->db->link, $data['kh_hoten']);
        $kh_sdt = mysqli_real_escape_string($this->db->link, $data['kh_sdt']);
        $kh_email = mysqli_real_escape_string($this->db->link, $data['kh_email']);
        $kh_diachi = mysqli_real_escape_string($this->db->link, $data['kh_diachi']);
        $kh_password = mysqli_real_escape_string($this->db->link, md5($data['kh_password']));

        if ($kh_hoten == "" || $kh_sdt == "" || $kh_email == "" || $kh_diachi == "") {
            $alert = "<span class='error'>Các thành phần này không được trống!!!</span>";
            return $alert;
        } else {
            if ($kh_password) {
                $query = "UPDATE khachhang SET kh_hoten = '$kh_hoten', kh_sdt = '$kh_sdt', kh_email = '$kh_email', 
                kh_diachi = '$kh_diachi', kh_password = '$kh_password'
                WHERE kh_ma = '$id'";
                $result = $this->db->update($query);
            } else {
                $query = "UPDATE khachhang SET kh_hoten = '$kh_hoten', kh_sdt = '$kh_sdt', kh_email = '$kh_email', kh_diachi = '$kh_diachi'
                WHERE kh_ma = '$id'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Cập nhật thông tin thành công!</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Cập nhật thông tin thất bại!!!</span>";
                return $alert;
            }
        }
    }
    public function get_usersid($id)
    {
        $query = "SELECT * FROM khachhang WHERE kh_ma ='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>