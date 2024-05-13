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
            <div class="col-lg-65">
                <label class="form-label">Tên đăng nhập: </label>
                <input required type="text" name="CTV_USERNAME" class="form-control" placeholder="Nhập Username"
                    aria-label="CTV_USERNAME">
            </div>
            <div class="col-lg-65">
                <label class="form-label">Mật khẩu: </label>
                <input required type="password" name="CTV_PASSWORD" class="form-control" placeholder="Nhập Password"
                    aria-label="CTV_PASSWORD" id="passInput">
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5">Đăng
                nhập</button>

        </form>
</body>

</html>