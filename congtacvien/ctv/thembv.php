<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Viết</title>
</head>

<body>
    <h2>Thêm Bài Viết</h2>
    <form action="process_baiviet.php" method="post">
        <label for="BV_TIEUDE">Tiêu Đề:</label><br>
        <input type="text" id="BV_TIEUDE" name="BV_TIEUDE"><br>

        <label for="BV_NOIDUNG">Nội Dung:</label><br>
        <textarea id="BV_NOIDUNG" name="BV_NOIDUNG"></textarea><br>

        <label for="BV_HINHANH">Ảnh:</label><br>
        <input type="file" id="BV_HINHANH" name="BV_HINHANH"><br>

        <label for="BV_TINHTRANG">Tình Trạng:</label><br>
        <select id="BV_TINHTRANG" name="BV_TINHTRANG">
            <option value="1">Hoạt Động</option>
            <option value="0">Không Hoạt Động</option>
        </select><br>

        <!-- Thêm trường nhập cho mã tour -->
        <label for="T_MA">Mã Tour:</label><br>
        <input type="text" id="T_MA" name="T_MA"><br>

        <!-- Thêm trường nhập cho mã người dùng (quản trị viên) -->
        <label for="ND_MA">Mã Người Dùng (Quản Trị Viên):</label><br>
        <input type="text" id="ND_MA" name="ND_MA"><br>

        <!-- Thêm trường nhập cho mã cộng tác viên -->
        <label for="CTV_MA">Mã Cộng Tác Viên:</label><br>
        <input type="text" id="CTV_MA" name="CTV_MA"><br>

        <input type="submit" value="Thêm Bài Viết">
    </form>
</body>

</html>