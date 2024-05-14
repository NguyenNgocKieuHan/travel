-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2024 lúc 10:49 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giraffe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `BV_MA` int(11) NOT NULL,
  `BV_TIEUDE` varchar(150) NOT NULL,
  `BV_NOIDUNG` text NOT NULL,
  `BV_HINHANH` varchar(150) NOT NULL,
  `BV_TINHTRANG` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`BV_MA`, `BV_TIEUDE`, `BV_NOIDUNG`, `BV_HINHANH`, `BV_TINHTRANG`) VALUES
(12, 'Cồn Sơn', 'CỒN SƠN – LÀNG DU LỊCH CỘNG ĐỒNG ĐỘC ĐÁO Ở CẦN THƠ\r\n\r\nSau những ngày làm việc căng thẳng mệt mỏi, bạn muốn thư giản và đi du lịch Miền Tây môt chuyến để có trải nghiệm mới về cuộc sống Miền Tây thì Cồn Sơn Cần Thơ là một điểm đến lý tưởng cho bạn. Nét đẹp hoang sơ của cồn Sơn được ví như viên ngọc quý giữa phố thị và với loại hình du lịch cộng đồng, cồn Sơn đã tạo nên bản sắc mới cho ngành du lịch Cần Thơ. Được thiên nhiên ưu đãi với cây trái xum xuê, cá tôm dồi dào, đến đây du khách có thể hòa mình với thiên nhiên, tìm hiểu cuộc sống giản dị của người dân Nam Bộ.\r\n\r\nCồn Sơn có diện tích khoảng 70 hec ta đất đai màu mỡ, phù sa bồi đắp quanh năm, những vườn cây xanh mướt. Đặc biệt người dân xứ cồn thật thà, chất phác, dễ mến lại vô vùng hiếu khách, nhiệt tình mang đến sự gần gũi thân thương làm say lòng bất kỳ du khách khó tính nào khi đến thăm nơi đây.\r\n', 'conson.jpg', 0),
(13, 'Nhà cổ Bình Thủy', 'Nhà cổ Bình Thủy Cần Thơ - Lắng nghe những giai thoại ly kỳ, thú vị \r\n\r\nNhà cổ Bình Thủy địa chỉ: số 142/144 đường Bùi Hữu Nghĩa - phường Bình Thủy - quận Bình Thủy - thành phố Cần Thơ\r\n\r\n1.Giờ mở cửa nhà cổ Bình Thủy Cần Thơ có 2 khung giờ mỗi ngày là:\r\nBuổi sáng: từ 8h - 12h\r\nBuổi chiều: từ 14h - 18h\r\n\r\n2.Nhà cổ Bình Thủy giá vé tham quan bao nhiêu?\r\nNhà cổ Bình Thủy giá vé tham quan: 15.000đ/ vé/ người.\r\n\r\n\r\nNhà cổ Bình Thủy Cần Thơ là một trong những công trình kiến trúc cổ độc đáo có tuổi đời gần 150 năm còn giữ nguyên vẹn nét đẹp xưa kia cho đến ngày nay. Đến đây, bạn sẽ có những trải nghiệm thú vị và được lắng nghe những giai thoại ly kỳ về ngôi nhà cổ này.', '65683239691f2.jpg', 0),
(14, 'Lễ hội bánh dân gian', 'Lễ hội Bánh dân gian Nam Bộ lần thứ XI năm 2024 sẽ diễn ra từ ngày 17 - 21.4 tại TP Cần Thơ, quy mô khoảng 200 - 250 gian hàng.\r\nSự kiện được tổ chức với nhiều hoạt động sôi nổi, đặc sắc, hứa hẹn thu hút đông đảo người dân và du khách trong và ngoài thành phố đến tham quan, trải nghiệm, thưởng thức.\r\n\r\nTrong đó, nổi bật là lễ Khai mạc lễ hội; dâng bánh dân gian nhân Ngày Giỗ tổ Hùng Vương (10.3 âm lịch); tổ chức Hội thi làm bánh dân gian và Chương trình biểu diễn cách làm các loại bánh dân gian. Lễ hội có Khu trưng bày các loại bánh dân gian Nam Bộ, Khu nghệ nhân trình diễn bánh dân gian; các gian hàng và trang trí không gian lễ hội; chương trình nghệ thuật phục vụ khách tham quan...\r\n\r\nTham gia giới thiệu sản phẩm tại lễ hội có những nghệ nhân làm bánh dân gian, ẩm thực đã được công nhận, chứng nhận tại các sự kiện, lễ hội đã được tổ chức tại các tỉnh, thành; Các chủ thể, cơ sở sản xuất sản phẩm quà tặng, đặc sản vùng miền, sản phẩm OCOP đã được cơ quan có thẩm quyền công nhận; Cá nhân, tổ chức kinh doanh có đủ điều kiện về giấy phép kinh doanh, giấy chứng nhận về sản phẩm, hàng hóa…', 'banhngon.jpg', 0),
(15, 'Du lịch Cần Thơ tháng 4 – Thăm ‘’miền gạo trắng nước trong’’', '‘Cần Thơ gạo trắng nước trong/ Ai đi đến đó, lòng không muốn về’’.\r\n\r\nVẻ đẹp của mảnh đất này dường như đã ăn sâu vào tâm khảm của du khách. Để rồi, chỉ cần nghe ai đó nhắc đến hai từ Cần Thơ là người ta đã có thể liên tưởng đến nhiều điều thú vị khác nhau, mặc dù chưa một lần đặt chân đến.\r\n\r\nNói về du lịch Cần Thơ tháng 4, người ta sẽ nhớ ngay đến nhiều hình ảnh đặc sắc, như một biểu tượng khó phai trong lòng người lữ khách phương xa. Đó là hình ảnh mộc mạc về những cảnh đi tàu/ ghe trên sông nước, vi vu chợ nổi Cái Răng, dạo chơi ở Bến Ninh Kiều, tham quan Khu du lịch Mỹ Khánh, ghé thăm những vườn trái cây chín mọng. Hoặc đơn giản chỉ là nét đẹp mộc mạc, nụ cười chân phương, hiền lành và sự mến khách của những con người thân thiện nơi đây.\r\n', 'img_v_1.jpg', 0),
(16, 'Địa điểm du lịch Cần Thơ tháng 4 đẹp nhất?', 'Có rất nhiều điểm du lịch Cần Thơ tháng 4 hấp dẫn tại vùng đất ‘gạo trắng nước trong’ này, khiến lòng du khách thập phương ‘chẳng muốn về’. Các danh thắng được gợi ý theo các lĩnh vực tiêu biểu như sau:\r\n\r\nĐiểm đến văn hóa Cần Thơ: Chợ Nổi Cái Răng, Nhà thờ họ Dương, Chùa cổ Pôthi Somrôn của tộc người Khmer, Chùa Ông, Đình Bình Thủy, Cầu Cần Thơ, Bến phà Xóm Chài, Bến Ninh Kiều, Chùa Nam Nhã, Thiền viện Trúc Lâm Phương Nam…\r\n\r\nĐiểm đến lịch sử Cần Thơ: Mộ Bùi Hữu Nghĩa, Thăm nhà cổ Bình Thủy, Bảo tàng Cần Thơ, Khu di tích lịch sử chiến thắng ông Hào, Khu di tích Vườn Mận, Khám lớn Cần Thơ…\r\nĐiểm du lịch sinh thái Cần Thơ: Vườn Cò Bằng Lăng, khu du lịch Mỹ Khánh, Vườn cây trái Vàm Xáng Cần Thơ, Vườn sinh thái Hoa Súng, Vườn sinh thái Lê Lộc, Vườn Du Lịch Sinh Thái Long Tuyền, Du lịch sinh thái Bảo Gia Trang Viên, Vườn Du Lịch Sinh Thái Giáo Dương Phong Điền, Khu du lịch sinh thái Thủy Tiên…\r\n\r\nĐiểm vui chơi, giải trí, mua sắm Cần Thơ: Khu Thương mại Tây Đô, Khu mua sắm Đệ Nhất Phan Khang, Trung tâm thương mại Cái Khế, Chợ Cần Thơ, khu vui chơi giải trí Cầu Vồng, Khu vui chơi trẻ em tiNiWorld Vincom Cần Thơ, Khu Du Lịch Lung Cột Cầu, Big C Cần Thơ…\r\n', 'conco.jpg', 0),
(17, 'Đặt tour du lịch Cần Thơ khi nào giá rẻ?', 'Mùa hè là thời điểm tốt nhất để bạn thực hiện một chuyến du lịch Cần Thơ tháng 4 giá rẻ. Đây là khoảng thời gian các vườn trái cây ở miền sông nước này bước vào mùa trĩu quả, chín mọng, thơm nức mũi. Đặc biệt, khi bạn tham quan chợ nổi Cái Răng Cần Thơ, bạn sẽ được tận hưởng không gian văn hóa rộn rã với người bán người mua nhộn nhịp. Bạn cũng sẽ có cơ hội thưởng thức nhiều đặc sản, nông sản tươi ngon, hấp dẫn với hương vị chẳng bao giờ phai.\r\n\r\nTại sao không làm ngay 1 chuyến vivu khám phá miền tây sông nước trong dịp Du lịch Cần Thơ tháng 4 này. Book ngay tour du lịch giá rẻ tại GIAFFE để có cơ hội được trải nghiệm tất cả những điều thú vị, hấp dẫn nhất mà thiên nhiên tháng 4 ban tặng cho vùng sông nước Cần Thơ nhé!', 'img-13.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `HD_MA` int(11) NOT NULL,
  `T_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `T_NGAYKHOIHANH` date NOT NULL,
  `KH_SDT` varchar(10) NOT NULL,
  `HD_SONGUOI` int(11) NOT NULL,
  `HD_TONGTIEN` varchar(10) NOT NULL,
  `HD_TRANGTHAI` enum('DAT','HUY') NOT NULL DEFAULT 'DAT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`HD_MA`, `T_MA`, `KH_MA`, `T_NGAYKHOIHANH`, `KH_SDT`, `HD_SONGUOI`, `HD_TONGTIEN`, `HD_TRANGTHAI`) VALUES
(29, 11, 2, '2024-04-02', '0567839027', 4, '6276000', 'HUY'),
(30, 12, 3, '2024-05-02', '0985467382', 7, '9093000', 'DAT'),
(31, 10, 3, '2024-04-03', '0985467382', 5, '1495000', 'DAT'),
(32, 12, 3, '2024-05-02', '0985467382', 7, '9093000', 'DAT'),
(33, 11, 3, '2024-04-02', '0985467382', 6, '9414000', 'DAT'),
(34, 10, 2, '2024-04-03', '0567839027', 6, '1794000', 'DAT'),
(35, 12, 4, '2024-05-02', '0564738921', 3, '3897000', 'DAT'),
(36, 15, 4, '2024-02-10', '0564738921', 5, '2250000', 'DAT'),
(37, 15, 5, '2024-02-10', '0756432976', 3, '1350000', 'DAT'),
(38, 13, 5, '2024-04-20', '0756432976', 6, '8340000', 'DAT'),
(40, 11, 2, '2024-04-02', '0567839027', 5, '7845000', 'DAT'),
(41, 11, 2, '2024-04-02', '0567839027', 7, '10983000', 'DAT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `KH_MA` int(11) NOT NULL,
  `KH_HOTEN` varchar(150) NOT NULL,
  `KH_EMAIL` varchar(150) NOT NULL,
  `KH_SDT` varchar(10) NOT NULL,
  `KH_DIACHI` text NOT NULL,
  `KH_USERNAME` varchar(100) NOT NULL,
  `KH_PASSWORD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`KH_MA`, `KH_HOTEN`, `KH_EMAIL`, `KH_SDT`, `KH_DIACHI`, `KH_USERNAME`, `KH_PASSWORD`) VALUES
(2, 'Nguyễn Ngọc Kiều Hân', 'hanb2003783@student.ctu.edu.vn', '0567839027', 'Hựu thành, Trà Ôn, Vĩnh Long', 'han', '123'),
(3, 'Nguyễn Ngọc Nga', 'nga@gmail.com', '0985467382', 'Cần Thơ', 'nga', '123'),
(4, 'Trần Hy Hy', 'hy@gmail.com', '0564738921', 'Đồng Tháp', 'hy', '123'),
(5, 'Trần Ngọc Nam', 'nam@gmail.com', '0756432976', 'Sóc Trăng', 'nam', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `LH_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `LH_NOIDUNG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`LH_MA`, `KH_MA`, `LH_NOIDUNG`) VALUES
(1, 2, 'tài khoản của tôi có lẽ gặp phải vấn đề khá rắc rối, không biết tôi có thể được bạn hỗ trợ không?'),
(2, 5, 'tài khoản của tôi có lẽ gặp phải vấn đề khá rắc rối, không biết tôi có thể được bạn hỗ trợ không?'),
(3, 2, 'tài khoản của tôi có lẽ gặp phải vấn đề khá rắc rối, không biết tôi có thể được bạn hỗ trợ không?');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitour`
--

CREATE TABLE `loaitour` (
  `LT_MA` int(11) NOT NULL,
  `LT_TEN` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitour`
--

INSERT INTO `loaitour` (`LT_MA`, `LT_TEN`) VALUES
(1, 'TOUR 3N2Đ'),
(2, 'TOUR 2N1Đ'),
(3, 'TOUR TRONG NGÀY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ND_MA` int(11) NOT NULL,
  `ND_HOTEN` varchar(150) NOT NULL,
  `ND_EMAIL` varchar(150) NOT NULL,
  `ND_SDT` varchar(10) NOT NULL,
  `ND_USERNAME` varchar(150) NOT NULL,
  `ND_PASSWORD` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ND_MA`, `ND_HOTEN`, `ND_EMAIL`, `ND_SDT`, `ND_USERNAME`, `ND_PASSWORD`) VALUES
(1, 'NGUYỄN NGỌC KIỀU HÂN', 'han@gmail.com', '0967845555', 'admin1', '123'),
(2, 'NGUYỄN KIỀU KIỀU', 'kieu@gmail.com', '0983452987', 'admin2', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `R_MA` int(11) NOT NULL,
  `T_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `R_RATING` float NOT NULL,
  `R_COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`R_MA`, `T_MA`, `KH_MA`, `R_RATING`, `R_COMMENT`) VALUES
(53, 11, 3, 5, 'trời ơi tui vừa đi tour này xong, trải nghiệm thích lắm luôn á nè ^.^'),
(54, 10, 2, 5, 'tour đi vui lắm nè, Được trải nghiệm thú vụ lắm ấy ^.^'),
(55, 15, 4, 3, 'Trãi nghiệm cũng vui đấy nhưng mà thái độ hướng dẫn viên không được tốt lắm !!!!!!!!'),
(56, 15, 5, 5, 'uii trời tour này đi vui cực luôn ấy, muốn đi thêm lần nữa!!!'),
(57, 13, 5, 1, 'trãi nghiệm không tốt lắm , không giống mô tả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoidiem`
--

CREATE TABLE `thoidiem` (
  `T_MA` int(11) NOT NULL,
  `TD_THOIGIAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `T_MA` int(11) NOT NULL,
  `LT_MA` int(11) NOT NULL,
  `T_TEN` varchar(150) NOT NULL,
  `T_MOTA` text NOT NULL,
  `T_HINHANH` varchar(150) NOT NULL,
  `T_NGAYKHOIHANH` date NOT NULL,
  `T_GIA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`T_MA`, `LT_MA`, `T_TEN`, `T_MOTA`, `T_HINHANH`, `T_NGAYKHOIHANH`, `T_GIA`) VALUES
(10, 3, 'Tour Cần Thơ 1 ngày', 'Chương trình tour Cần Thơ 1 ngày (Ăn sáng, trưa)\r\n\r\n05h00: HDV đón quý khách tại địa điểm hẹn trước, sau đó di chuyển xuống tàu tham quan, bắt đầu hành trình khám phá vùng đất Cần Thơ\r\n\r\nTham quan chợ nổi Cái Răng Cần Thơ, chợ nổi bán sỉ lớn nhất của vùng đất Miền Tây. Len lỏi giữa hàng trăm chiếc ghe bán hàng nông sản, quý khách có thể mua nhiều loại trái cây đặc sản tươi ngon tại chợ nổi như xoài, chôm chôm, sầu riêng, măng cụt, mít, mãng cầu…(theo mùa)\r\n\r\nĐừng quên thưởng thức 1 tô hủ tiếu nóng hổi, nhâm nhi 1 ly cafe mát lạnh trên ghe tại chợ bạn nhé.\r\nCheck- in ghe khóm địa phương: chụp ảnh lưu niệm trên ghe và ăn khóm tươi (theo mùa)\r\n\r\nKhám phá lò hủ tiếu Cần Thơ, tự do thưởng thức đặc sản pizza hủ tiếu trứ danh, độc đáo (chi phí tự túc). Bạn có thể học cách làm hủ tiếu tươi truyền thống với sự hướng dẫn của người địa phương. Đặc biệt, bạn còn được tự tay trải nghiệm làm hủ tiếu và có những tấm ảnh cực đẹp.\r\n\r\nThưởng thức món “hủ tiếu pizza” giòn trứ danh\r\n\r\n07h00: Về lại bến Ninh Kiều, Xe và HDV đón quý khách về trung tâm Ninh Kiều (Ăn sáng tự túc).\r\n09h00: Xe và HDV đón quý khách tại khách sạn hoặc điểm hẹn nội ô Q.Ninh Kiều – TP.Cần Thơ khởi hành đi tham quan nhà cổ Bình Thủy – ngôi nhà cổ có kiến trúc tuyệt đẹp. Căn nhà cổ có lối kiến trúc Đông Tây rất đẹp và đặc sắc ở vùng Nam Bộ lúc đương thời. Đây còn từng là phim trường của nhiều bộ phim nổi tiếng như Người Tình, Người đẹp Tây Đô…\r\n\r\n10:00: Xuống thuyền đi sang Cồn Sơn, ghé thăm làng cá bè, cùng người dân cho cá ăn, vui đùa cùng “massage cá Koi”  cực vui.\r\n\r\nTrưa quý khách dùng cơm với các món ăn đậm chất miền Tây tại nhà dân địa phương và tự do nghỉ ngơi.\r\nSau đó, tham quan vườn cây ăn trái như chôm chôm, ổi, bưởi, vú sữa…theo mùa\r\n\r\nTrải nghiệm tận tay làm bánh thơm ngon đậm chất Miền Tây\r\n\r\nVà thưởng thức bánh dân gian hấp dẫn và ngon do nghệ nhân tại Cồn Sơn làm.\r\n\r\nXem màn trình diễn tuyệt vời của “Cá lóc bay” tại miệt vườn Cồn Sơn.\r\n\r\n16h00: Thuyền đưa quý khách về đất liền. Xe đưa quý khách về điểm đón ban đầu hoặc ra sân bay (nếu quý khách có nhu cầu). Kết thúc tour Cần Thơ 1 ngày tại miền Tây và xin hẹn gặp lại quý khách!', 'img-1.jpg', '2024-04-03', '299000'),
(11, 3, 'Tour Cồn Sơn Cần Thơ nửa ngày ', 'Lịch trình tour du lịch Cồn Sơn Cần Thơ (Ăn trưa)\r\n\r\n09h00: HDV đón quý khách tại khách sạn, hoặc điểm hẹn (Nội ô TP.Cần Thơ).  Du khách sẽ được tham quan:\r\n\r\nNhà cổ Bình Thủy Cần Thơ, ngôi nhà với kiến trúc độc đáo hơn 100 năm tuổi tại “Đất Tây Đô”. Ngôi nhà có lối kiến trúc hài hòa giữa văn hóa phương Đông và phương Tây. Bên ngoài ngôi nhà mang vẻ đẹp của kiến trúc Pháp nhưng bên trong ngôi nhà lại thể hiện nền văn hóa Việt Nam đặc sắc. Ngôi nhà từng là phim trường của bộ phim Pháp  “Người Tình”; The Lover nổi tiếng trên toàn thế giới.\r\n\r\n10:00, Sau đó quý khách đến bến phà Cô Bắc, đò ngang sẽ xuôi dòng sông Hậu tới Làng cá bè chú 7 Bon. Quý khách sẽ được tìm hiểu nhiều loại cá đặc trưng, quý hiếm trên dòng sông Mekong.\r\n\r\nĐiều đặc biệt khiến du khách đến đây là bè nuôi cá Koi cực đẹp, các bạn có thể thả chân xuống dòng nước cho cá Koi massage và có những bức ảnh cực đẹp với chúng.\r\n\r\nRời bè cá, quý khách tiếp tục di chuyển trên sông Hậu đến Cồn Sơn Cần Thơ. Tại nơi đây, quý khách như được trở về vùng quê của miền Tây, tránh xa sự ồn ào náo nhiệt của thành thị.\r\n\r\nTrưa, quý khách dùng cơm với các món ăn đậm chất miền Tây tại nhà dân địa phương và tự do nghỉ ngơi.\r\n\r\nQuý khách chỉ có thể đi bộ trên Cồn tìm hiểu nhiều hơn về cuộc sống của người miền Tây tại nơi đây. Điểm đến đầu tiên sẽ là vườn trái cây trên cồn (tùy theo mùa).\r\n\r\nQúy khách sẽ được tự do hái trái cây và thưởng thức thoải mái trong vườn.\r\n\r\nSau đó, quý khách được cùng thưởng thức  bánh ngon dân dã Nam Bộ: bánh lá mít, bánh khọt… Còn gì tuyệt vời hơn khi được thưởng thức bánh và có những phút giây đáng nhớ cùng bạn bè và người thân. Các bạn còn được thử 1 ly nước mát như trà hoa đậu biếc hay sa kê…được nấu bởi người bản địa Cồn Sơn\r\n\r\n\r\nĐến với một gia đình khác trên cồn, quý khách sẽ được mãn nhãn với màn biểu diễn “cá lóc bay” có 1 không 2. Trong suốt tour Cồn Sơn, đừng quên cầm máy lên chụp những bức ảnh hay quay những thước phim cực đẹp của cá lóc bay Cồn Sơn tại đây nhé.\r\n\r\nBạn còn được cảm giác mạnh với chiếc cầu tre miền Tây hay gọi với cái tên thân thương là “cầu khỉ”. Đi cầu khỉ và có bức ảnh cực đẹp tại Cồn Sơn quý khách nhé.\r\n\r\nTrong suốt hình trình khám phá và tìm hiểu về người và đất Cồn Sơn, các bạn sẽ được thưởng thức các trái cây đặc sản địa phương.\r\n\r\n16h00:  Trở về thuyền, HDV đưa quý khách về điểm đón ban đầu.\r\n\r\nĐến bến Ninh Kiều, kết thúc tour Cồn Sơn nửa ngày, chào tạm biệt và xin hẹn gặp lại quý khách trong những tour tiếp theo tại miền Tây.', 'conson.jpg', '2024-04-02', '1569000'),
(12, 2, 'Cần Thơ 2 ngày 1 đêm', 'Ngày 1 : Đón khách tại sân bay(Nếu có nhu cầu) – Đi miệt vườn Cần Thơ (Ăn trưa)\r\n\r\nTham quan nhà Cổ Cần Thơ – Ngôi nhà hơn 140 năm tuổi có sự giao thoa hài hoà giữa hai nét văn hoá kiến trúc Đông Tây.  Ngoài ra ngôi nhà còn là phim trường chính của những bộ phim nổi tiếng như: Người Đẹp Tây Đô, Những Nẻo Đường Phù Sa, Người Tình…\r\n\r\nSau khi tìm hiểu nhà cổ, đoàn sẽ tiếp tục di chuyển đến bến phà Cô Bắc.\r\n10h30: Đò ngang sẽ xuôi dòng sông Hậu đưa Qúy khách đến với làng cá bè Cồn Sơn ở Cần Thơ. Tại đây đoàn sẽ được tham quan mô hình nuôi cá bè với khoảng 50 bè cá, cùng người địa phương cho cá ăn, chụp ảnh lưu niệm.\r\n\r\nDùng cơm trưa với các món: canh chua, cá kho tộ… đậm chất miền quê.\r\n\r\nRời bè cá, Quý khách tiếp tục di chuyển trên sông Hậu. Đò ngang đưa đoàn đến Cồn Sơn. Quý khách sẽ  được  người dân Cồn Sơn mến khách chào đón bằng loại nước mát đặc trưng được nấu từ lá cây Sa Kê và Đinh Lăng trong vườn nhà và trải nghiệm làm các loại bánh ngon dân gian mang đậm chất Nam Bộ.\r\n\r\nĐoàn di chuyển tham quan vườn chôm chôm/ bưởi hay vú sữa tùy vào từng thởi điểm.\r\n\r\nKhám phá tuyệt chiêu “cá lóc bay” của nông dân sông Hậu.\r\n\r\nTrong suốt hình trình khám phá và tìm hiểu về người và đất Cồn Sơn quý khách sẽ được thưởng thức các trái cây đặc sản địa phương (theo mùa như: vú sữa, ổi, bưởi…)\r\n16h00: Quý khách trở về đất liền, HDV đưa quý khách về khách sạn nghỉ ngơi.\r\n\r\nTối: Quý khách tự do khám phá các món đặc sản.\r\n\r\nNgày 2: Chợ Nổi Cái Răng – Lò hủ tiếu – Pizza hủ tiếu – Vườn trái cây (Ăn sáng)\r\n\r\n05h00: Quý khách tập trung tại bến Ninh Kiều xuống tàu du lịch tham quan chợ nổi Cái Răng ở Cần Thơ. Len lỏi giữa hàng trăm chiếc ghe bán hàng nông sản, quý khách thưởng thức những đặc sản địa phương tại ghe của người dân.\r\n\r\nTham quan lò hủ tiếu Cần Thơ sản xuất hủ tiếu tươi theo cách truyền thống. Quý khách có thể thưởng thức đặc sản “pizza hủ tiếu” độc đáo chỉ có ở Cần Thơ (chi phí tự túc)\r\n\r\n7h30: Quý khách trở về bến Ninh Kiều, xe đưa đoàn ra sân bay (nếu có yêu cầu), kết thúc chuyến đi khám phá đất Tây Đô và xin tạm biệt quý khách.', 'gal_1.jpg', '2024-05-02', '1299000'),
(13, 2, 'Tour Cần Thơ 2 ngày 1 đêm khách đoàn', '                                                                Ai về sông nước miền Tây\r\n                                                         Một lần sẽ thấy ngất ngây tuyệt vời\r\n\r\nMiền Tây sông nước hữu tình với vô vàn cảnh đẹp được thiên nhiên ban tặng, nếp sống văn hóa bao đời được con người nơi đây gìn giữ và truyền trao. Tour du lịch Cần Thơ 2 ngày 1 đêm dành cho khách đoàn , sẽ đưa quý khách đến với những khung cảnh bình dị, đậm chất dân dả miền Tây như: vườn trái cây, chợ nổi Cái Răng,.. chắc chắn quý khách sẽ có những trải nghiệm đặc biệt trong chuyến đi này.\r\n\r\n14h30 lộ trình xe đưa quý khách đến Cần Thơ.Trên xe HDV tổ chức các trò chơi vui nhộn như: tìm người bí ẩn, truy tìm báu vật, chiếc nón kỳ cục, hành trình kết nối… với nhiều phần quà hấp dẫn và nghe giới thiệu những điểm trên cung đường mà đã đi qua. Tới nơi quý khách nhận phòng khách sạn, nghỉ ngơi.\r\n\r\n19h00 Xe đưa quý khách ra khu vực bến Ninh Kiều – Quý khách dùng cơm tối trên Du Thuyền Cần Thơ. Sau khi dùng cơm tối đoàn theo xe về lại khách sạn hoặc tự do dạo bến Ninh Kiều và tự túc về khách sạn.\r\n\r\n05h00 Đoàn xuống đò đi Chợ Nổi Cái Răng, Quý khách có cơ hội được tận mắt chứng kiến một “phương thức quảng cáo độc đáo” của người dân nơi đây. Họ treo các món hàng mà họ có trên “cây bẹo” ở đầu ghe, thuyền của mình. Du khách có thể tham gia vào các hoạt động mua bán với khách thương hồ Miền Tây, tìm hiểu nét văn hóa mua bán trên sông rất đặc trưng của người Nam Bộ.\r\n\r\n07h00 Đoàn về khách sạn dùng Buffet sáng. Trả phòng khách sạn, xe đưa đoàn đến bến tàu.\r\nTàu đưa quý khách tham quan Phim trường cổ trang Phố Xưa. Quý khách tự do chụp ảnh với các cảnh cổ trang Việt Nam – Hàn Quốc – Nhật Bản – Trung Quốc: tửu lầu, ngư đình, phòng hoa chúc, ngai vàng, tiệm mai, tiệm hoa,... Quý khách có thể tự túc thuê trang phục và hóa thân thành các nhân vật cổ trang tại đây. \r\n\r\nTàu tiếp tục đưa quý khách đến Vườn Sinh Thái Bà Hiệp, quý khách sẽ được dịp trong vai một người nông dân miệt vườn. Quý khách nhận xe đạp dạo quanh đường quê. \r\n\r\nTiếp tục hành trình, quý khách nhận đồ bà ba và đi thăm vườn trái cây với các loại trái cây chín mọng và trĩu quả (theo mùa). Ngoài ra, quý khách còn có thể trải nghiệm cảm giác thú vị khi bơi xuồng ba lá tham quan vườn. Quý khách tiếp tục công việc nông dân miệt vườn với chương trình \"Tát mương bắt cá\". Quý khách tự tay bắt những chú cá ẩn nấp trong bùn sẽ là những trải nghiệm thú vị của quý du khách.\r\n\r\nTrưa Quý khách dùng cơm trưa với menu từ các món đồng quê.\r\n15h00 Tàu đưa quý khách về lại bến tàu. Đoàn lên xe khởi hành trở về.', 'benninhkieu.webp', '2024-04-20', '1390000'),
(14, 3, 'Chợ nổi Cái Răng – Cồn Sơn', 'Chương trình tour Cần Thơ 1 ngày (Ăn sáng, trưa)\r\n- 05h00: HDV đón quý khách tại địa điểm hẹn trước, sau đó di chuyển xuống tàu tham quan, bắt đầu hành trình khám phá vùng đất Cần Thơ\r\n- Tham quan chợ nổi Cái Răng Cần Thơ, chợ nổi bán sỉ lớn nhất của vùng đất Miền Tây. Len lỏi giữa hàng trăm chiếc ghe bán hàng nông sản, quý khách có thể mua nhiều loại trái cây đặc sản tươi ngon tại chợ nổi như xoài, chôm chôm, sầu riêng, măng cụt, mít, mãng cầu…(theo mùa).\r\n- Đừng quên thưởng thức 1 tô hủ tiếu nóng hổi, nhâm nhi 1 ly cafe mát lạnh trên ghe tại chợ bạn nhé.\r\n- Check- in ghe khóm địa phương: chụp ảnh lưu niệm trên ghe và ăn khóm tươi (theo mùa)\r\n- Khám phá lò hủ tiếu Cần Thơ, tự do thưởng thức đặc sản pizza hủ tiếu trứ danh, độc đáo (chi phí tự túc). Bạn có thể học cách làm hủ tiếu tươi truyền thống với sự hướng dẫn của người địa phương. Đặc biệt, bạn còn được tự tay trải nghiệm làm hủ tiếu và có những tấm ảnh cực đẹp.\r\n- Thưởng thức món “hủ tiếu pizza” giòn trứ danh. Trải nghiệm làm hủ tiếu truyền thống\r\n- 07h00: Về lại bến Ninh Kiều, Xe và HDV đón quý khách về trung tâm Ninh Kiều (Ăn sáng tự túc).\r\n- 09h00: Xe và HDV đón quý khách tại khách sạn hoặc điểm hẹn nội ô Q.Ninh Kiều – TP.Cần Thơ khởi hành đi tham quan nhà cổ Bình Thủy – ngôi nhà cổ có kiến trúc tuyệt đẹp. Căn nhà cổ có lối kiến trúc Đông Tây rất đẹp và đặc sắc ở vùng Nam Bộ lúc đương thời. Đây còn từng là phim trường của nhiều bộ phim nổi tiếng như Người Tình, Người đẹp Tây Đô…\r\n- 10:00: Xuống thuyền đi sang Cồn Sơn, ghé thăm làng cá bè, cùng người dân cho cá ăn, vui đùa cùng “massage cá Koi”  cực vui.\r\n- Check-in làng cá bè cực đẹp với cá Koi masage\r\n- Trưa quý khách dùng cơm với các món ăn đậm chất miền Tây tại nhà dân địa phương và tự do nghỉ ngơi.\r\n- Sau đó, tham quan vườn cây ăn trái như chôm chôm, ổi, bưởi, vú sữa…theo mùa\r\n- Trải nghiệm tận tay làm bánh thơm ngon đậm chất Miền Tây\r\n- Trải nghiệm làm bánh cồn sơn\r\n- Tận tay làm ra những chiếc bánh kẹp thơm ngon (Tùy vào thời điểm)\r\n- Và thưởng thức bánh dân gian hấp dẫn và ngon do nghệ nhân tại Cồn Sơn làm.\r\n- Xem màn trình diễn tuyệt vời của “Cá lóc bay” tại miệt vườn Cồn Sơn.\r\n- 15h00: Thuyền đưa quý khách về đất liền. Xe và HDV sẽ tiếp tục hành trình tham quan tại Lễ hội Bánh nhân gian Nam Bộ. Tại đây, Quý khách sẽ được trải nghiệm nhiều hoạt động thú vị và thưởng thức ẩm thực Nam Bộ độc đáo!\r\nlễ hội bánh nhân gian nam bộ 2024\r\n- Ưu đãi đặc biệt khi đặt tour một ngày khám phá vùng đất Tây Đô tại Nụ Cườii Mê Kông\r\n- Xe đưa quý khách về điểm đón ban đầu hoặc ra sân bay (nếu quý khách có nhu cầu). Kết thúc tour Cần Thơ 1 ngày tại miền Tây và xin hẹn gặp lại quý khách!', 'banhngon.jpg', '2024-04-26', '1290000'),
(15, 3, 'Tour Cồn Sơn nữa ngày', '- 09h00: HDV đón quý khách tại khách sạn, hoặc điểm hẹn (Nội ô TP.Cần Thơ).  Du khách sẽ được tham quan:\r\nNhà cổ Bình Thủy Cần Thơ, ngôi nhà với kiến trúc độc đáo hơn 100 năm tuổi tại “Đất Tây Đô”. Ngôi nhà có lối kiến trúc hài hòa giữa văn hóa phương Đông và phương Tây. Bên ngoài ngôi nhà mang vẻ đẹp của kiến trúc Pháp nhưng bên trong ngôi nhà lại thể hiện nền văn hóa Việt Nam đặc sắc. Ngôi nhà từng là phim trường của bộ phim Pháp  “Người Tình”; The Lover nổi tiếng trên toàn thế giới.\r\n- 10:00, Sau đó quý khách đến bến phà Cô Bắc, đò ngang sẽ xuôi dòng sông Hậu tới Làng cá bè chú 7 Bon. Quý khách sẽ được tìm hiểu nhiều loại cá đặc trưng, quý hiếm trên dòng sông Mekong.\r\nTour Cồn Sơn Cần Thơ giá rẻ\r\nLàng cá bé Bảy Bon thu hút đông đảo khách du lịch\r\nĐiều đặc biệt khiến du khách đến đây là bè nuôi cá Koi cực đẹp, các bạn có thể thả chân xuống dòng nước cho cá Koi massage và có những bức ảnh cực đẹp với chúng.\r\nRời bè cá, quý khách tiếp tục di chuyển trên sông Hậu đến Cồn Sơn Cần Thơ. Tại nơi đây, quý khách như được trở về vùng quê của miền Tây, tránh xa sự ồn ào náo nhiệt của thành thị.\r\nTrưa, quý khách dùng cơm với các món ăn đậm chất miền Tây tại nhà dân địa phương và tự do nghỉ ngơi.\r\ntour cồn sơn giá rẻ\r\nBữa trưa dân giã tại Làng du lịch cộng đồng Cồn Sơn\r\nQuý khách chỉ có thể đi bộ trên Cồn tìm hiểu nhiều hơn về cuộc sống của người miền Tây tại nơi đây. Điểm đến đầu tiên sẽ là vườn trái cây trên cồn (tùy theo mùa).\r\nQúy khách sẽ được tự do hái trái cây và thưởng thức thoải mái trong vườn.\r\nThưởng thức trái cây thỏa thích tại vườn trái cây Cồn Sơn\r\nSau đó, quý khách được cùng thưởng thức  bánh ngon dân dã Nam Bộ: bánh lá mít, bánh khọt… Còn gì tuyệt vời hơn khi được thưởng thức bánh và có những phút giây đáng nhớ cùng bạn bè và người thân. Các bạn còn được thử 1 ly nước mát như trà hoa đậu biếc hay sa kê…được nấu bởi người bản địa Cồn Sơn\r\nTour Con Son 1 Ngay Lam Banh Dan Gian Voi Nguoi Dia Phuong\r\nĐến với một gia đình khác trên cồn, quý khách sẽ được mãn nhãn với màn biểu diễn “cá lóc bay” có 1 không 2. Trong suốt tour Cồn Sơn, đừng quên cầm máy lên chụp những bức ảnh hay quay những thước phim cực đẹp của cá lóc bay Cồn Sơn tại đây nhé.\r\nBạn còn được cảm giác mạnh với chiếc cầu tre miền Tây hay gọi với cái tên thân thương là “cầu khỉ”. Đi cầu khỉ và có bức ảnh cực đẹp tại Cồn Sơn quý khách nhé.\r\nTrong suốt hình trình khám phá và tìm hiểu về người và đất Cồn Sơn, các bạn sẽ được thưởng thức các trái cây đặc sản địa phương.\r\n- 16h00:  Trở về thuyền, HDV đưa quý khách về điểm đón ban đầu.\r\nĐến bến Ninh Kiều, kết thúc tour Cồn Sơn nửa ngày, chào tạm biệt và xin hẹn gặp lại quý khách trong những tour tiếp theo tại miền Tây.', 'caloc.jpg', '2024-02-10', '450000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`BV_MA`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`HD_MA`),
  ADD KEY `FK_TINH` (`T_MA`),
  ADD KEY `KH_MA` (`KH_MA`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KH_MA`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`LH_MA`),
  ADD KEY `FK_GHI` (`KH_MA`);

--
-- Chỉ mục cho bảng `loaitour`
--
ALTER TABLE `loaitour`
  ADD PRIMARY KEY (`LT_MA`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ND_MA`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`R_MA`);

--
-- Chỉ mục cho bảng `thoidiem`
--
ALTER TABLE `thoidiem`
  ADD KEY `FK_GIATOUR` (`T_MA`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`T_MA`),
  ADD KEY `FK_GOM_CO` (`LT_MA`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `BV_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `HD_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `LH_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ND_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `R_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `T_MA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_TINH` FOREIGN KEY (`T_MA`) REFERENCES `tour` (`T_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`KH_MA`) REFERENCES `khachhang` (`KH_MA`);

--
-- Các ràng buộc cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `FK_GHI` FOREIGN KEY (`KH_MA`) REFERENCES `khachhang` (`KH_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `thoidiem`
--
ALTER TABLE `thoidiem`
  ADD CONSTRAINT `FK_GIATOUR` FOREIGN KEY (`T_MA`) REFERENCES `tour` (`T_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `FK_GOM_CO` FOREIGN KEY (`LT_MA`) REFERENCES `loaitour` (`LT_MA`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
