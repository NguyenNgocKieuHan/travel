<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/style.login.css">
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <form role="form" class="text-start" method="post" action="dn.php">
            <div class="col-lg-6">
                <label class="form-label">Tên đăng nhập: </label>
                <input required type="text" name="ND_USERNAME" class="form-control" placeholder="Nhập Username" aria-label="ND_USERNAME">
            </div>
            <div class="col-lg-6">
                <label class="form-label">Mật khẩu: </label>
                <input required type="password" name="ND_PASSWORD" class="form-control" placeholder="Nhập Password" aria-label="ND_PASSWORD" id="passInput">
            </div>
            <div class="col-lg-6">
                <button type="submit" class="btn btn-primary py-3 px-5">Đăng
                    nhập</button>
            </div>

            <div class=" col-lg-6">
                <a href="index.php" class="text-primary text-gradient font-weight-bold">Quay
                    lại trang chủ</a>
            </div>
        </form>
</body>

</html>