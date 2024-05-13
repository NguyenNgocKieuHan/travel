 <?php
    require_once("connect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $KH_USERNAME = $_POST["KH_USERNAME"];
        $KH_PASSWORD = $_POST["KH_PASSWORD"];

        if (checkLogin($conn, $KH_USERNAME, $KH_PASSWORD)) {
            $_SESSION["KH_USERNAME"] = $KH_USERNAME;
            echo '<script>
            alert("Đăng nhập thành công! ")
            location="index.php";</script>';
            // header('Location: index.php');
        } else {
            echo '<script>
            alert("Sai USERNAME or PASSWORD! ")
            location="login.php";</script>';
        }
    }
    function checkLogin($conn, $KH_USERNAME, $KH_PASSWORD)
    {
        $sql = "SELECT KH_PASSWORD FROM khachhang WHERE KH_USERNAME= '" . $KH_USERNAME . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["KH_PASSWORD"] == $KH_PASSWORD) {
                return true;  // Đăng nhập thành công
            } else {
                return false; // Sai mật khẩu
            }
        } else {
            return false; // Sai tài khoản
        }
    }
    ?>