-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: localhost    Database: thietbisieunho
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'Tieu de bai viet',
  `description` longtext COMMENT 'Mô tả ngắn',
  `content` longtext NOT NULL COMMENT 'Noi dung bai viet',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'duong dan anh minh hoa bai viet',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: khong hien thi, 1: hien thi',
  `group_id` bigint(20) DEFAULT NULL COMMENT 'id nhom tuong ung cua bai viet',
  `meta_title` varchar(255) DEFAULT NULL COMMENT 'meta title',
  `meta_keyword` varchar(255) DEFAULT NULL COMMENT 'meta keyword',
  `meta_description` varchar(255) DEFAULT NULL COMMENT 'meta description',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `article_sluggable_idx` (`slug`,`title`),
  KEY `article_id_index_idx` (`id`),
  KEY `group_id_idx` (`group_id`),
  CONSTRAINT `article_group_id_article_group_id` FOREIGN KEY (`group_id`) REFERENCES `article_group` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin bai viet';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_group`
--

DROP TABLE IF EXISTS `article_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Ten nhom',
  `description` text COMMENT 'Mo ta',
  `is_active` tinyint(1) DEFAULT '0' COMMENT 'false: Khong kich hoat - true: Kich hoat',
  `position` varchar(255) DEFAULT NULL COMMENT 'vi tri hien thi',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin nhom bai viet';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_group`
--

LOCK TABLES `article_group` WRITE;
/*!40000 ALTER TABLE `article_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `article_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Ten danh muc',
  `description` varchar(255) DEFAULT NULL COMMENT 'Mô tả',
  `is_active` tinyint(4) DEFAULT NULL COMMENT '0: an, 1: hien thi',
  `priority` bigint(20) DEFAULT '10' COMMENT 'Do uu tien',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_sluggable_idx` (`slug`,`name`),
  KEY `phone_option_id_index_idx` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Bang luu danh mục sản phẩm';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Camera','',1,10,'2019-05-24 16:04:07','2019-05-24 16:04:07','camera'),(2,'Máy ghi âm','',1,2,'2019-06-02 16:59:44','2019-06-02 16:59:44','may-ghi-am'),(3,'Thiết bị định vị','',1,3,'2019-06-02 17:00:06','2019-06-02 17:00:06','thiet-bi-dinh-vi'),(4,'Máy phá sóng','',1,4,'2019-06-02 17:00:21','2019-06-02 17:00:21','may-pha-song'),(5,'Phát hiện nghe lén','',1,6,'2019-06-02 17:00:41','2019-06-02 17:00:41','phat-hien-nghe-len');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT '0' COMMENT '0: Don hang moi tao, 1..',
  `full_name` varchar(255) DEFAULT NULL COMMENT 'Ten khach hang',
  `phone_number` varchar(20) DEFAULT NULL COMMENT 'So dien thoai khach hang',
  `city_id` bigint(20) DEFAULT NULL COMMENT 'Thanh pho cua khach hang',
  `address` varchar(255) DEFAULT NULL COMMENT 'Dia chi khach hang',
  `note` longtext COMMENT 'Ghi chu cua khach hang',
  `payment_type` bigint(20) DEFAULT NULL COMMENT 'Hình thức thanh toán',
  `total_price` decimal(18,2) DEFAULT '0.00' COMMENT 'Tong so tien cua don hang',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_order_id_index_idx` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin don hang';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_order`
--

LOCK TABLES `customer_order` WRITE;
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_order`
--

DROP TABLE IF EXISTS `detail_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL COMMENT 'So id don hang',
  `product_id` bigint(20) DEFAULT NULL COMMENT 'id san pham',
  `product_name` bigint(20) DEFAULT NULL COMMENT 'ten san pham',
  `price` decimal(18,2) DEFAULT '0.00' COMMENT 'Gia san pham',
  `quantity` bigint(20) DEFAULT NULL COMMENT 'Số lượng',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sim_order_order_id_index_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin điện thoại thuoc don hang';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_order`
--

LOCK TABLES `detail_order` WRITE;
/*!40000 ALTER TABLE `detail_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Ảnh đại diện',
  `price` decimal(20,0) NOT NULL COMMENT 'Gia tien',
  `old_price` decimal(20,0) DEFAULT NULL COMMENT 'Gia tien truoc day',
  `description` longtext COMMENT 'Mô tả',
  `content` longtext COMMENT 'Nội dung chi tiết',
  `status` mediumint(9) DEFAULT NULL COMMENT 'Trạng thái của sản phẩm',
  `priority` bigint(20) DEFAULT '10' COMMENT 'Do uu tien',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_sluggable_idx` (`slug`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin sản phẩm';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Pin sạc dự phòng 10.000 mAh eValu Sword X','/uploads/images//article/0b/be/e0/5ce7b54d1d368.jpg',200000,NULL,'Dễ dàng kiểm tra lại được dung lượng pin còn lại trong sạc.\r\nSử dụng lõi pin Li-Ion an toàn.\r\nSạc được cho mọi điện thoại và máy tính bảng.\r\nBộ sản phẩm gồm: pin sạc.','Giới thiệu sản phẩm<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword c&oacute; kiểu d&aacute;ng kh&aacute; vu&ocirc;ng vức lạ mắt<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword<br />\r\n<br />\r\nC&aacute;c cổng kết nối tr&ecirc;n pin sạc dự ph&ograve;ng<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword - C&aacute;c cổng kết nối tr&ecirc;n pin sạc dự ph&ograve;ng<br />\r\n<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword - C&aacute;c cổng kết nối tr&ecirc;n pin sạc dự ph&ograve;ng<br />\r\n<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword - C&aacute;c cổng kết nối tr&ecirc;n pin sạc dự ph&ograve;ng<br />\r\n<br />\r\nDung lượng pin 10.000mAh cao cho nhiều lần sạc<br />\r\nPin sạc dự ph&ograve;ng c&oacute; thể sạc đầy được cho điện thoại v&agrave; m&aacute;y t&iacute;nh bảng c&oacute; dung lượng dưới 6.500 mAh.<br />\r\n<br />\r\nLưu &yacute;: Trong qu&aacute; tr&igrave;nh sạc pin sẽ bị hao hụt khoảng 37.5% dung lượng.<br />\r\n<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword - Dung lượng pin cao cho nhiều lần sạc<br />\r\n<br />\r\nSạc song song 2 thiết bị<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword -&nbsp; Sạc song song 2 thiết bị<br />\r\n<br />\r\nThời gian sạc đầy 5 - 6 giờ (d&ugrave;ng Adapter 2A)<br />\r\nBạn c&oacute; thể d&ugrave;ng adapter sạc hay d&acirc;y c&aacute;p nối với laptop để sạc cho pin.<br />\r\n<br />\r\n=&gt; Tham khảo th&ecirc;m c&aacute;ch chọn d&acirc;y c&aacute;p sạc ph&ugrave; hợp cho bạn.<br />\r\n<br />\r\nSạc dự ph&ograve;ng 10.000 mAh eValu Sword - Thời gian sạc đầy 5 - 6 giờ (d&ugrave;ng Adapter 2A)',1,10,'2019-05-24 16:11:41','2019-05-24 17:45:34','pin-sac-du-phong-10-000-mah-evalu-sword-x'),(2,'Camera IP Wifi Mini HD Q7','/uploads/images//article/3a/59/93/5cf3b5627c6b4.jpg',3500000,NULL,'Dung lượng PIN: 300mAh\r\nNguồn điện nạp: DC-5V\r\nĐịnh dạng ảnh: JPG\r\nKích thước ảnh: 4032×3024\r\nTỷ lệ khung ảnh: 4:3\r\nĐịnh dạng Video: AVI\r\nVideo định dạng cho 1280 * 720P 30 khung hình mỗi giây\r\nThích hợp với hệ điều hành: Windows me/2000/xp/2003/vista,Mac os,Linux.\r\nSử dụng thẻ nhớ ngoài: Tối đa 32 Gb.','<h2>Camera IP Wifi Mini HD Q7</h2>\r\n\r\n<p>- T&ecirc;n sản phẩm:&nbsp;<strong>Camera IP Wifi Mini HD Q7</strong></p>\r\n\r\n<p>-&nbsp;Gi&aacute; &quot;tốt&quot;:&nbsp;3,500,000 đ<br />\r\n-&nbsp;Li&ecirc;n hệ:</p>\r\n\r\n<p>+<em>&nbsp;Website:</em>&nbsp;www.thietbisieunho.net<br />\r\n+<em>&nbsp;Hotline:</em>&nbsp;0965-324-666<br />\r\n+&nbsp;<em>Địa chỉ:</em></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở H&agrave; Nội :</strong></p>\r\n\r\n<p><strong>71 L&ecirc; Văn Lương, Quận Thanh Xu&acirc;n</strong></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở TP. Hồ Ch&iacute; Minh :</strong></p>\r\n\r\n<p><strong>449 Trường Chinh, Phường 14, Q. T&acirc;n B&igrave;nh</strong></p>\r\n\r\n<p><strong>280/29 B&ugrave;i Hữu Nghĩa, Phường 2 ,Quận B&igrave;nh Thạnh</strong></p>\r\n\r\n<p><strong>Đường Đ&igrave;nh Phong Ph&uacute;, Quận 9</strong></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>Th&ocirc;ng số kỹ thuật: Camera IP Wifi Mini HD Q7</h2>\r\n\r\n<ul>\r\n	<li>Dung lượng PIN: 300mAh</li>\r\n	<li>Nguồn điện nạp: DC-5V</li>\r\n	<li>Định dạng ảnh: JPG</li>\r\n	<li>K&iacute;ch thước ảnh: 4032&times;3024</li>\r\n	<li>Tỷ lệ khung ảnh: 4:3</li>\r\n	<li>Định dạng Video: AVI</li>\r\n	<li>Video định dạng cho 1280 * 720P 30 khung h&igrave;nh mỗi gi&acirc;y</li>\r\n	<li>Th&iacute;ch hợp với hệ điều h&agrave;nh: Windows me/2000/xp/2003/vista,Mac os,Linux.</li>\r\n	<li>Sử dụng thẻ nhớ ngo&agrave;i: Tối đa 32 Gb.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Camera IP Wifi Mini HD Q7\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/Camera%20IP%20Wifi%20Mini%20HD%20Q7.png\" style=\"height:424px; width:420px\" /></p>\r\n\r\n<h2>T&iacute;nh năng &quot;ưu Việt&quot; cũng như chức năng của sản phẩm: Camera IP Wifi Mini HD Q7</h2>\r\n\r\n<p>- Sản phẩm nhỏ gọn c&oacute; thể để bất cứ ở đ&acirc;u<br />\r\n- Xem h&igrave;nh kh&ocirc;ng giới hạn khoảng c&aacute;ch hay thiết bị.<br />\r\n- H&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc sống động, kh&ocirc;ng bị giật.<br />\r\n- &Acirc;m thanh nghe r&otilde;, kh&ocirc;ng r&egrave;.<br />\r\n- Tr&iacute;ch suất được dữ liệu từ thẻ nhớ.<br />\r\n- Hỗ trợ thẻ nhớ l&ecirc;n đến 32 Gb.<br />\r\n- Dung lượng pin 300mAh sử dụng trong l&uacute;c cấp b&aacute;ch.</p>\r\n\r\n<h3>Nhận x&eacute;t về sản phẩm:&nbsp;Camera IP Wifi Mini HD Q7</h3>\r\n\r\n<p><img alt=\"Camera IP Wifi Mini HD Q7\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/Camera%20IP%20Wifi%20Mini%20HD%20Q7-1.jpg\" style=\"height:400px; width:400px\" /></p>\r\n\r\n<p>- Thiết kế nhỏ gọn, đẹp mắt.<br />\r\n- Coi h&igrave;nh tr&ecirc;n được mọi thiết bị kể cả tr&ecirc;n hệ điều h&agrave;nh Android hay&nbsp;<a href=\"https://www.apple.com/lae/ios/ios-11/\">IOS</a><br />\r\n- Kết hợp với xạc dự ph&ograve;ng hoặc c&oacute; nguồn điện 220V th&igrave; kh&ocirc;ng phải lo lắng g&igrave; nhiều</p>\r\n\r\n<p><em>Kết luận:</em><br />\r\nCamera IP Wifi Mini HD Q7: một sản phẩm đ&aacute;ng để quan t&acirc;m khi lựa chọn d&ograve;ng camera si&ecirc;u nhỏ.</p>',1,10,'2019-06-02 18:39:14','2019-06-02 18:39:14','camera-ip-wifi-mini-hd-q7'),(3,'Camera IP Wifi MD81','/uploads/images//article/71/4b/b7/5cf3b5b9818e0.jpg',3500000,NULL,'Camera mini MD81S-6 có kiểu dáng nhỏ gọn và đẹp mắt có thể mang bên người, dùng làm camera quan sát từ xa cho máy bay điều khiển từ xa, camera hành trình hay camera giám sát không dây.','<h2>Camera IP Wifi MD81</h2>\r\n\r\n<p>Camera mini MD81S-6 c&oacute; kiểu d&aacute;ng nhỏ gọn v&agrave; đẹp mắt c&oacute; thể mang b&ecirc;n người, d&ugrave;ng l&agrave;m camera quan s&aacute;t từ xa cho m&aacute;y bay điều khiển từ xa, camera h&agrave;nh tr&igrave;nh hay camera gi&aacute;m s&aacute;t kh&ocirc;ng d&acirc;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>T&Iacute;NH NĂNG CƠ BẢN</p>\r\n\r\n<p>- Cảm biến CMOS v&agrave; khả năng c&acirc;n bằng &aacute;nh s&aacute;ng tự động cho chất lượng h&igrave;nh ảnh r&otilde; n&eacute;t.</p>\r\n\r\n<p>- Camera mini MD81S-6 t&iacute;ch hợp micro c&oacute; độ nhạy cao, loại bỏ tạp &acirc;m tốt cho &acirc;m thanh to v&agrave; r&otilde; r&agrave;ng.</p>\r\n\r\n<p>- Quay video với độ ph&acirc;n giải 640 x 480 pixel, tốc độ ghi h&igrave;nh 12 fps.</p>\r\n\r\n<p>- Tự động ghi đ&egrave; khi thẻ nhớ đầy.</p>\r\n\r\n<p>- Hỗ trợ khe cắm thẻ nhớ ngo&agrave;i tới 32GB.</p>\r\n\r\n<p>- Camera quan s&aacute;t được h&igrave;nh ảnh v&agrave;o ban đ&ecirc;m với đ&egrave;n hồng ngoại.</p>\r\n\r\n<p>- Khoảng c&aacute;ch kết nối wifi 20m cho phạm vi lắp đặt thoải m&aacute;i hơn.</p>\r\n\r\n<p>- Pin sạc dung lượng lớn cho thời gian hoạt động l&ecirc;n tới 90&rsquo;.</p>\r\n\r\n<p>- Đồng bộ h&oacute;a dữ liệu từ camera wifi với m&aacute;y t&iacute;nh dễ d&agrave;ng với c&aacute;p USB tốc độ cao.</p>\r\n\r\n<p>- Dễ d&agrave;ng lắp đặt v&agrave; sử dụng so với c&aacute;c d&ograve;ng camera ip kh&aacute;c.</p>\r\n\r\n<p>- Hỗ trợ c&aacute;c hệ điều h&agrave;nh iOS, Android, Windows.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>BỘ SẢN PHẨM BAO GỒM</p>\r\n\r\n<p>01 Camera IP Wifi MD81S-6</p>\r\n\r\n<p>01 Bộ sạc v&agrave; c&aacute;p sạc v&agrave; truyền tải dữ liệu USB</p>\r\n\r\n<p>01 Đầu đọc thẻ nhớ</p>\r\n\r\n<p>01 Gi&aacute; gắn camera quan s&aacute;t</p>\r\n\r\n<p>01 T&agrave;i liệu sản phẩm</p>',1,10,'2019-06-02 18:40:41','2019-06-02 18:40:41','camera-ip-wifi-md81'),(4,'Camera Siêu Nhỏ DVR 2000 8Gb','/uploads/images//article/8d/a4/48/5cf3b5f74968a.jpg',1000000,NULL,'Định dạng video: AVI\r\nVideo độ phân giả: 640 * 480\r\nHình ảnh: JPG\r\nĐộ phân giải hình ảnh: 1280 * 1024\r\nPin thời lượng 90 phút, pin có thể sạc lại được\r\nUsb: 2.0\r\nPin lithium dung lượng cao\r\nThẻ nhớ: Hỗ trợ tối đa 32gb','<h2>Camera Si&ecirc;u Nhỏ DVR 2000 8Gb</h2>\r\n\r\n<p>- T&ecirc;n sản phẩm:&nbsp;<a href=\"https://www.thietbisieunho.net/camera-sieu-nho-dvr-2000-8gb\"><strong>Camera Si&ecirc;u Nhỏ DVR 2000 8Gb</strong></a>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><em>K&iacute;ch thước ( D&agrave;i * R&ocirc;ng* Cao):</em>&nbsp;27x26x26mm&nbsp;</li>\r\n	<li><em>Trọng lượng:&nbsp;</em>11g</li>\r\n</ul>\r\n\r\n<p>-&nbsp;Gi&aacute; &quot;tốt&quot;:&nbsp;1,000,000 đ<br />\r\n-&nbsp;Li&ecirc;n hệ:</p>\r\n\r\n<p>+<em>&nbsp;Website:</em>&nbsp;www.thietbisieunho.net<br />\r\n+<em>&nbsp;Hotline:</em>&nbsp;0965-324-666<br />\r\n+&nbsp;<em>Địa chỉ:</em></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở H&agrave; Nội :</strong></p>\r\n\r\n<p><strong>71 L&ecirc; Văn Lương, Quận Thanh Xu&acirc;n</strong></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở TP. Hồ Ch&iacute; Minh :</strong></p>\r\n\r\n<p><strong>449 Trường Chinh, Phường 14, Q. T&acirc;n B&igrave;nh</strong></p>\r\n\r\n<p><strong>280/29 B&ugrave;i Hữu Nghĩa, Phường 2 ,Quận B&igrave;nh Thạnh</strong></p>\r\n\r\n<p><strong>Đường Đ&igrave;nh Phong Ph&uacute;, Quận 9</strong></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>Th&ocirc;ng số kỹ thuật&nbsp;<a href=\"https://www.thietbisieunho.net/camera-sieu-nho/\">camera theo d&otilde;i si&ecirc;u nhỏ</a>&nbsp;DVR 2000 8Gb</h2>\r\n\r\n<ul>\r\n	<li>Định dạng video: AVI</li>\r\n	<li>Video độ ph&acirc;n giả: 640 * 480</li>\r\n	<li>H&igrave;nh ảnh: JPG</li>\r\n	<li>Độ ph&acirc;n giải h&igrave;nh ảnh: 1280 * 1024</li>\r\n	<li>Pin thời lượng 90 ph&uacute;t, pin c&oacute; thể sạc lại được</li>\r\n	<li>Usb: 2.0</li>\r\n	<li>Pin lithium dung lượng cao</li>\r\n	<li>Thẻ nhớ: Hỗ trợ tối đa 32gb</li>\r\n</ul>\r\n\r\n<p><img alt=\"Camera Siêu Nhỏ DVR 2000 8Gb\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/Camera%20Si%C3%AAu%20Nh%E1%BB%8F%20DVR%202000%208Gb-3.jpg\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<h2>T&iacute;nh năng &quot;ưu Việt&quot; cũng như chức năng của sản phẩm: camera si&ecirc;u nhỏ gi&aacute; rẻ DVR 2000 8Gb</h2>\r\n\r\n<ol>\r\n	<li>Camera Si&ecirc;u Nhỏ DVR 2000 8Gb c&oacute; k&iacute;ch thước nhỏ,trọng lượng nhẹ.</li>\r\n	<li>Camera si&ecirc;u nhỏ DVR 2000 hỗ trợ nhiều chức năng kh&aacute;c nhau như: quay phim, chụp h&igrave;nh v&agrave; ghi &acirc;m.</li>\r\n	<li>Được thiết kế thời trang v&agrave; xinh xắn, chất lượng ổn định, sử dụng lại đơn giản.</li>\r\n	<li>Quay phim chất lượng tốt,thời gian quay phim li&ecirc;n tục l&ecirc;n đến 30 ph&uacute;t.</li>\r\n	<li>Thẻ nhớ hỗ trợ l&ecirc;n đến 32gb.</li>\r\n</ol>\r\n\r\n<h3>Nhận x&eacute;t về sản phẩm: camera ngụy trang si&ecirc;u nhỏ đặc biệt DVR 2000 8Gb</h3>\r\n\r\n<p><img alt=\"Camera Siêu Nhỏ DVR 2000 8Gb\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/Camera%20Si%C3%AAu%20Nh%E1%BB%8F%20DVR%202000%208Gb.jpg\" style=\"height:300px; width:265px\" /></p>\r\n\r\n<ul>\r\n	<li>Kh&ocirc;ng phải c&aacute;i g&igrave; to lớn cũng l&agrave; tốt, đ&ocirc;i khi bạn lại qu&ecirc;n rằng đ&acirc;u đ&oacute; sự nhỏ b&eacute; xinh xắn lại mang lại cho bạn những điều tuyệt vời.V&agrave; đ&oacute; ch&iacute;nh l&agrave; Camera Si&ecirc;u Nhỏ DVR 2000 8Gb, sản phẩm rất th&iacute;ch hợp cho c&aacute;c cuộc hội họp, phỏng vấn, những người hay đi d&atilde; ngoại&hellip;.</li>\r\n	<li>Camera Si&ecirc;u Nhỏ DVR 2000 8Gb c&oacute; pin lithium dung lượng cao cho ph&eacute;p bạn quay phim l&ecirc;n đến 30 ph&uacute;t.</li>\r\n	<li>Camera Si&ecirc;u Nhỏ DVR 2000 8Gb hỗ trợ thẻ nhớ l&ecirc;n đến 32g cho bạn tha hồ lưu trữ c&aacute;c video.</li>\r\n	<li>Bạn c&oacute; thể ghi lại video tr&ecirc;n ch&iacute;nh điện thoại của bạn m&agrave; kh&ocirc;ng cần ghi l&ecirc;n thẻ nhớ.</li>\r\n</ul>\r\n\r\n<p><em>Kết luận:&nbsp;</em>&nbsp;<a href=\"https://www.thietbisieunho.net/camera-sieu-nho/\">camera sieu nho</a>&nbsp;DVR 2000 8Gb chắc chắn sẽ mang lại cho bạn những trải nghiệm tuyệt vời v&agrave; đ&aacute;ng nhớ, v&agrave; tất nhi&ecirc;n l&agrave; một c&ocirc;ng cụ camera mini kh&ocirc;ng thể thiếu cho bạn v&agrave; gia đ&igrave;nh.</p>',1,10,'2019-06-02 18:41:43','2019-06-02 18:41:43','camera-sieu-nho-dvr-2000-8gb'),(5,'Camera siêu nhỏ IP GSD900','/uploads/images//article/d1/8d/dd/5cf3b64833a91.jpg',3700000,NULL,'Camera IP GSD900 là một dòng camera hiện đại nhất hiện nay phục vụ cho việc quay lén, thiết kế siêu nhỏ và tích hợp khả năng kết nối với sóng WiFi, đặc biệt hình ảnh có chất lượng cao hơn so với các dòng camera quay lén thông thường. Camera IP GSD900 là một dòng sản phẩm tuyệt vời cho người sử dụng.','<h2>Camera si&ecirc;u nhỏ IP GSD900</h2>\r\n\r\n<p>Camera IP GSD900 l&agrave; một d&ograve;ng camera hiện đại nhất hiện nay phục vụ cho việc quay l&eacute;n, thiết kế si&ecirc;u nhỏ v&agrave; t&iacute;ch hợp khả năng kết nối với s&oacute;ng WiFi, đặc biệt h&igrave;nh ảnh c&oacute; chất lượng cao hơn so với c&aacute;c d&ograve;ng camera quay l&eacute;n th&ocirc;ng thường. Camera IP GSD900 l&agrave; một d&ograve;ng sản phẩm tuyệt vời cho người sử dụng.</p>\r\n\r\n<p>Camera IP GSD900 c&oacute; t&iacute;ch hợp c&ocirc;ng nghệ IP camera gi&uacute;p người d&ugrave;ng c&oacute; thể theo d&otilde;i từ xa qua điện thoại di động, người d&ugrave;ng khi cần quay trộm chỉ cần bỏ camera v&agrave;o trong một chỗ k&iacute;n đ&aacute;o, kh&oacute; ph&aacute;t hiện v&agrave; quay mắt camera ra g&oacute;c độ th&iacute;ch hợp l&agrave; c&oacute; thể dễ d&agrave;ng theo d&otilde;i quan s&aacute;t th&ocirc;ng qua m&aacute;y t&iacute;nh, laptop, điện thoại smartphone th&ocirc;ng qua ứng dụng miễn ph&iacute; BVCAM hoặc IMINICAM dễ d&agrave;ng.</p>\r\n\r\n<p>Camera IP GSD900 c&oacute; t&iacute;ch hợp mắt quan s&aacute;t chuẩn 1080p. Với cảm biến th&iacute;ch hợp c&ocirc;ng nghệ &quot;Image Sensors &quot; độ nhạy s&aacute;ng cao cho h&igrave;nh ảnh sắc n&eacute;t v&agrave; m&agrave;u sắc sống động.</p>\r\n\r\n<p>B&ecirc;n cạnh Camera IP GSD900 c&oacute; t&iacute;ch hợp 4 đ&egrave;n hồng ngoại kh&ocirc;ng ph&aacute;t s&aacute;ng trong đ&ecirc;m cũng l&agrave; 1 điểm mạnh gi&uacute;p Camera IP si&ecirc;u nhỏ Full HD GSD900, tầm xa của đ&egrave;n hồng ngoại l&agrave; 5m gi&uacute;p bạn quan s&aacute;t những vị tr&iacute; ở khoảng c&aacute;ch n&agrave;y trong đ&ecirc;m 1 c&aacute;ch r&otilde; n&eacute;t.</p>\r\n\r\n<p>Camera IP si&ecirc;u nhỏ Full HD GSD900 hỗ trợ thời gian sử dụng cực l&acirc;u v&agrave; cực bền so với c&aacute;c loại camera quay l&eacute;n kh&aacute;c. Sản phẩm hổ trợ pin l&ecirc;n đến 2300 mAh hổ trợ thời gian sử dụng l&ecirc;n đến 3 - 4 tiếng. Thiết kế k&iacute;ch thước cao 10 cm * rộng 2,6 cm * d&agrave;y 2,4 cm m&agrave; thời lượng pin tốt như vậy th&igrave; chỉ c&oacute; thể l&agrave; GSD 900 m&agrave; th&ocirc;i. Đặc biệt camera IP GsD900 cho ph&eacute;p t&iacute;ch hợp thẻ nhớ l&ecirc;n đến 64GB cho ph&eacute;p người d&ugrave;ng c&oacute; thể lưu trữ lại rất nhiều h&igrave;nh ảnh dữ liệu.</p>\r\n\r\n<p>Sản phẩm camera IP Full HD GSD900 l&agrave; một trong những d&ograve;ng camera th&iacute;ch hợp cho c&ocirc;ng t&aacute;c của b&aacute;o ch&iacute;, điều tra, th&aacute;m tử, c&ocirc;ng an c&oacute; thể sử dụng để theo d&otilde;i, ghi lại bằng chứng, ph&aacute; c&aacute;c vụ &aacute;n.</p>',1,10,'2019-06-02 18:43:04','2019-06-02 18:43:04','camera-sieu-nho-ip-gsd900'),(6,'Camera siêu nhỏ không dây Q99','/uploads/images//article/2f/2a/a2/5cf3b69c8bb2b.jpg',2990000,NULL,'Pin (pin sạc) 3000 Mah\r\nMắt camera dài 10cm\r\nHỗ trợ camera, thẻ nhớ, mic thu, dây sạc, đèn tín hiệu, sim điện thoại để điều khiển từ xa.','<h2>Camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99</h2>\r\n\r\n<p>-&nbsp;T&ecirc;n sản phẩm:&nbsp;<a href=\"https://www.thietbisieunho.net/camera-sieu-nho-khong-day-q99\"><strong>Camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99</strong></a></p>\r\n\r\n<p>-&nbsp;Gi&aacute; &quot;tốt&quot;: 2,990,000 đ<br />\r\n-&nbsp;Li&ecirc;n hệ:</p>\r\n\r\n<p>+<em>&nbsp;Website:</em>&nbsp;www.thietbisieunho.net<br />\r\n+<em>&nbsp;Hotline:</em>&nbsp;0965-324-666<br />\r\n+&nbsp;<em>Địa chỉ:</em></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở H&agrave; Nội :</strong></p>\r\n\r\n<p><strong>71 L&ecirc; Văn Lương, Quận Thanh Xu&acirc;n</strong></p>\r\n\r\n<p><strong>Mua h&agrave;ng ở TP. Hồ Ch&iacute; Minh :</strong></p>\r\n\r\n<p><strong>449 Trường Chinh, Phường 14, Q. T&acirc;n B&igrave;nh</strong></p>\r\n\r\n<p><strong>280/29 B&ugrave;i Hữu Nghĩa, Phường 2 ,Quận B&igrave;nh Thạnh</strong></p>\r\n\r\n<p><strong>Đường Đ&igrave;nh Phong Ph&uacute;, Quận 9</strong></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2>Th&ocirc;ng số kỹ thuật Camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99</h2>\r\n\r\n<ul>\r\n	<li>Pin (pin sạc) 3000 Mah</li>\r\n	<li>Mắt camera d&agrave;i 10cm</li>\r\n	<li>Hỗ trợ camera, thẻ nhớ, mic thu, d&acirc;y sạc, đ&egrave;n t&iacute;n hiệu, sim điện thoại để điều khiển từ xa.</li>\r\n</ul>\r\n\r\n<p><img alt=\"Camera siêu nhỏ không dây Q99\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/camera-sieu-nho-khong-day-q99-5.jpg\" style=\"height:295px; width:400px\" /></p>\r\n\r\n<h2>T&iacute;nh năng &quot;ưu Việt&quot; cũng như chức năng của sản phẩm: Camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99</h2>\r\n\r\n<ol>\r\n	<li>C&oacute; dung lượng pin khủng hơn 3000mah gi&uacute;p người sử dụng c&oacute; thể k&eacute;o d&agrave;i trong một khoảng thời gian d&agrave;i ( 15-20 ng&agrave;y ).</li>\r\n	<li>Mắt&nbsp;<a href=\"https://www.thietbisieunho.net/camera-sieu-nho/\">camera kh&ocirc;ng d&acirc;y si&ecirc;u nhỏ gi&aacute; rẻ</a>&nbsp;c&oacute; d&acirc;y nối d&agrave;i ra đến 10cm gi&uacute;p việc lắp đặt ngụy trang đơn giản đi rất nhiều.</li>\r\n	<li>L&agrave; sản phẩm được n&acirc;ng cấp từ phi&ecirc;n bản X009 với đầy đủ chức năng ch&iacute;nh như tự động bắt m&aacute;y khi chủ nh&acirc;n gọi v&agrave;o n&oacute;, tự động gọi lại cho chủ nh&acirc;n khi c&oacute; tiếng động, điều khiển quay phim k&egrave;m ghi &acirc;m v&agrave; ghi &acirc;m ri&ecirc;ng từ ch&iacute;nh chiếc điện thoại của bạn&hellip;vv</li>\r\n	<li>Thiết bị hoạt động đảm bảo cực k&igrave; b&iacute; mật, đảm bảo kh&ocirc;ng bị ph&aacute;t hiện.</li>\r\n	<li>Thiết kế nhỏ gọn để c&oacute; thể gắn ở bất k&igrave; vị tr&iacute; n&agrave;o đều kh&ocirc;ng g&acirc;y nghi ngờ. &nbsp;&nbsp;</li>\r\n</ol>\r\n\r\n<p><img alt=\"Camera siêu nhỏ không dây Q99\" src=\"https://www.thietbisieunho.net/image/data/camera-sieu-nho/camera-sieu-nho-khong-day-q99-4.jpg\" style=\"height:295px; width:400px\" /></p>\r\n\r\n<h3>Nhận x&eacute;t về sản phẩm: Camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99</h3>\r\n\r\n<p><a href=\"https://www.thietbisieunho.net/camera-sieu-nho/\">Camera chống trộm si&ecirc;u nhỏ</a>&nbsp;Q99 l&agrave; một chiếc camera được thiết kế si&ecirc;u nhỏ v&agrave; được ngụy trang rất ho&agrave;n hảo, camera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99 n&agrave;y c&ograve;n được n&acirc;ng cấp l&ecirc;n với dung lượng pin cực khủng l&ecirc;n tới 3000 mah.</p>\r\n\r\n<p><br />\r\nCamera si&ecirc;u nhỏ kh&ocirc;ng d&acirc;y Q99 n&agrave;y được n&acirc;ng cấp v&agrave; ra mắt để thay thế cho phi&ecirc;n bản X009.</p>',1,10,'2019-06-02 18:44:28','2019-06-02 18:44:28','camera-sieu-nho-khong-day-q99'),(7,'Máy ghi âm JVJ J125 16Gb - Black','/uploads/images//article/eb/70/0e/5cf3b871d5eb5.jpg',1000000,NULL,'Máy ghi âm JVJ J125 16Gb - Black','<h2>Máy ghi &acirc;m JVJ J125 16Gb - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>JVJ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>J125</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>16Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>72h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>MP3, WMA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>100 x 36 x 12 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>98 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>C&aacute;p, Tai nghe, Thẻ bảo h&agrave;nh, s&aacute;ch HDSD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>Độ ph&acirc;n giải m&agrave;n h&igrave;nh: 128x64 LCD.&nbsp;Bộ nhớ mở rộng: TF card, max 64GB.&nbsp;Sử dụng pin: Litihum polimer, 1430 mah.&nbsp;Kết nối trực tiếp với m&aacute;y t&iacute;nh qua cổng USB 2.0 tr&ecirc;n thiết bị, lặp lại đoạn A-B</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:52:10','2019-06-02 18:52:17','ma-y-ghi-am-jvj-j125-16gb-black'),(8,'Máy ghi âm JVJ J130 16Gb - Black','/uploads/images//article/6a/62/26/5cf3b8c775709.jpg',1500000,NULL,'Máy ghi âm JVJ J130 16Gb - Black','<h2>Máy ghi &acirc;m JVJ J130 16Gb - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>JVJ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>J130</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>16Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>30h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>MP3, WMA, FLAC, APE, OGG</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Đen X&aacute;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>92 x 50 x 10.5 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>98 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>C&aacute;p, Tai nghe, Thẻ bảo h&agrave;nh, s&aacute;ch HDSD</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>Độ ph&acirc;n giải m&agrave;n h&igrave;nh: 128x64 LCD.&nbsp;Bộ nhớ mở rộng: TF card, max 64GB.&nbsp;Sử dụng pin: Litihum polimer, 850 mah.&nbsp;Kết nối trực tiếp với m&aacute;y t&iacute;nh qua cổng USB 2.0 tr&ecirc;n thiết bị.&nbsp;Lặp lại đoạn A-B, kh&oacute;a m&aacute;y bằng mật khẩu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:53:43','2019-06-02 18:53:43','ma-y-ghi-am-jvj-j130-16gb-black'),(9,'Máy ghi âm Sony ICD-PX470 - Black','/uploads/images//article/f3/06/6f/5cf3b8fabc89f.png',2000000,NULL,'Máy ghi âm Sony ICD-PX470 - Black','<h2>Máy ghi &acirc;m Sony ICD-PX470 - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>&nbsp;ICD-PX470</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>4Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>AAA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>62h/159h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>Linear PCM, MP3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>110 x 37 x 155mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>194 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>B&ocirc;̣ nhớ trong 4GB với khe thẻ nhớ mở r&ocirc;̣ng micro SD (l&ecirc;n đ&ecirc;́n 32GB).B&ocirc;̣ S-mic ghi lại những &acirc;m thanh ở xa/ &acirc;m thanh nhỏ rõ r&agrave;ng hơn.T&iacute;nh năng ghi &acirc;m Focus v&agrave; Wide-Stereo ghi lại những &acirc;m thanh ch&iacute;nh bạn c&acirc;̀n,giảm ti&ecirc;́ng &ocirc;̀n xung quanh</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:54:34','2019-06-02 18:54:34','ma-y-ghi-am-sony-icd-px470-black'),(10,'Máy ghi âm Sony ICD-TX650 16Gb - Black','/uploads/images//article/c0/00/0c/5cf3b92663091.jpg',2500000,NULL,'Máy ghi âm Sony ICD-TX650 16Gb - Black','<h2>Máy ghi &acirc;m Sony ICD-TX650 16Gb - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>ICD-TX650</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>16Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>268h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>Linear PCM, MP3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>20,0 x 102,0 x 7,4mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>55 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>Thi&ecirc;́t k&ecirc;́ kim loại cao c&acirc;́p, mỏng, gọn nhẹ, ch&acirc;́t lượng ghi &acirc;m tuy&ecirc;̣t hảo, Ghi &acirc;m tức thời chỉ với m&ocirc;̣t nút b&acirc;́m (ngay cả khi máy đang tắt)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:55:18','2019-06-02 18:55:18','ma-y-ghi-am-sony-icd-tx650-16gb-black'),(11,'Máy ghi âm Sony ICD-TX800 16Gb - Black','/uploads/images//article/9c/64/49/5cf3b95bbf0aa.jpg',3000000,NULL,'Máy ghi âm Sony ICD-TX800 16Gb - Black','<h2>Máy ghi &acirc;m Sony ICD-TX800 16Gb - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>ICD-TX800</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>16Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Pin sạc lithium-ion</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>636h MP3 48KBPS (ĐƠN &Acirc;M); 238h&nbsp;MP3 128KBPS; 159h&nbsp;MP3 192KBPS; 21h35p&nbsp;LPCM 44.1KHZ, 16BIT</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>MP3 / L-PCM</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>140 x 55 x 94mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>22 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>M&aacute;y ghi &acirc;m kỹ thuật số c&oacute; điều khiển từ xa cho ph&eacute;p ghi &acirc;m ở mọi vị tr&iacute; trong ph&ograve;ng.&nbsp; Bộ nhớ t&iacute;ch hợp 16 GB cho ph&eacute;p ghi &acirc;m trong thời gian d&agrave;i. - Ghi &acirc;m tức thời chỉ với một n&uacute;t bấm (ngay cả khi m&aacute;y đang tắt). Thiết kế nhỏ, gọn nhẹ với kẹp c&agrave;i t&uacute;i tiện lợi. Loại bỏ ồn th&ocirc;ng minh khi ph&aacute;t lại.&nbsp; Đầu cắm micro USB t&iacute;ch hợp,&nbsp; c&aacute;p k&egrave;m theo m&aacute;y</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:56:11','2019-06-02 18:56:11','ma-y-ghi-am-sony-icd-tx800-16gb-black'),(12,'Máy ghi âm Sony ICD-UX543FTCE 4Gb - Brown','/uploads/images//article/aa/70/0a/5cf3b9c40cd51.jpg',3500000,NULL,'Máy ghi âm Sony ICD-UX543FTCE 4Gb - Brown','<h2>Máy ghi &acirc;m Sony ICD-UX543FTCE 4Gb - Brown</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>&nbsp;ICD-UX543FTCE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>4Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>26h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>Linear PCM, MP3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Brown</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>36,6 x 101,5 x 10,5mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>49 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>Cắt ti&ecirc;́ng &ocirc;̀n kỹ thu&acirc;̣t s&ocirc;́, B&ocirc;̣ l&ocirc;̣c &acirc;m t&acirc;̀n s&ocirc;́ th&acirc;́p, Tự đ&ocirc;̣ng ghi &acirc;m kỹ thu&acirc;̣t s&ocirc;́, Lựa chọn m&ocirc;i trường ghi &acirc;m, đi&ecirc;̀u chỉnh &acirc;m KTS</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:57:56','2019-06-02 18:57:56','ma-y-ghi-am-sony-icd-ux543ftce-4gb-brown'),(13,'Máy ghi âm Sony ICD-UX560F 4Gb - Black','/uploads/images//article/a2/a5/5a/5cf3b9f68d5db.jpg',3700000,NULL,'Máy ghi âm Sony ICD-UX560F 4Gb - Black','<h2>Máy ghi &acirc;m Sony ICD-UX560F 4Gb - Black</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table style=\"width:691px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>Sony</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>&nbsp;ICD-UX560F</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>4Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>23h</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>Linear PCM, MP3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Black</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>110 x 155 x 28 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>175 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>H&ocirc;̃ trợ khe thẻ nhớ mở r&ocirc;̣ng,- Sạc nhanh, 3 ph&uacute;t sạc cho 60 ph&uacute;t ghi &acirc;m, B&ocirc;̉ sung t&iacute;nh năng ghi &acirc;m &ldquo;Focus&rdquo; v&agrave; &ldquo;Wide-Stereo&rdquo;, T&iacute;nh năng đi&ecirc;̀u khi&ecirc;̉n t&ocirc;́c đ&ocirc;̣ ph&aacute;t, FM</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:58:46','2019-06-02 18:58:46','ma-y-ghi-am-sony-icd-ux560f-4gb-black'),(14,'Máy ghi âm ZOZO DVR Z300 4Gb','/uploads/images//article/51/66/65/5cf3ba257e0f5.png',3500000,NULL,'Máy ghi âm ZOZO DVR Z300 4Gb','<h2>Máy ghi &acirc;m ZOZO DVR Z300 4Gb</h2>\r\n\r\n<h2>TH&Ocirc;NG SỐ KỸ THUẬT</h2>\r\n\r\n<table border=\"1\" style=\"width:80%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Sản phẩm</td>\r\n			<td>Máy ghi &acirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&atilde;ng sản xuất</td>\r\n			<td>ZOZO</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Model</td>\r\n			<td>&nbsp;DVR Z300</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dung lượng</td>\r\n			<td>4Gb</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Loại Pin</td>\r\n			<td>Lithium</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thời gian pin/ ghi &acirc;m tối đa</td>\r\n			<td>20 - 24 giờ</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Định dạng ghi &acirc;m</td>\r\n			<td>MP3, WMA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>đen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước tối đa</td>\r\n			<td>N/A</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>30 gam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Phụ kiện k&egrave;m theo</td>\r\n			<td>Theo ti&ecirc;u chu&acirc;̉n nhà sản xu&acirc;́t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đặc đi&ecirc;̉m kh&aacute;c</td>\r\n			<td>B&ocirc;̣ lọc &acirc;m t&ocirc;́t, tích hợp loa ngoài mạnh mẽ</td>\r\n		</tr>\r\n	</tbody>\r\n</table>',1,10,'2019-06-02 18:59:33','2019-06-02 19:35:37','ma-y-ghi-am-zozo-dvr-z300-4gb');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT NULL COMMENT 'Ten nha mang',
  `category_id` bigint(20) DEFAULT NULL COMMENT 'Mo ta',
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `product_category_category_id_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `product_category_product_id_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Bang luu thong tin san pham thuoc danh muc';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,2),(8,8,1),(9,8,2),(10,9,2),(11,10,2),(12,11,2),(13,12,2),(14,13,2),(15,14,2);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions_admin`
--

DROP TABLE IF EXISTS `sessions_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions_admin` (
  `sess_id` varchar(64) NOT NULL,
  `sess_data` longtext NOT NULL,
  `sess_time` bigint(20) NOT NULL,
  `sess_userid` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions_admin`
--

LOCK TABLES `sessions_admin` WRITE;
/*!40000 ALTER TABLE `sessions_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_forgot_password`
--

DROP TABLE IF EXISTS `sf_guard_forgot_password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_forgot_password`
--

LOCK TABLES `sf_guard_forgot_password` WRITE;
/*!40000 ALTER TABLE `sf_guard_forgot_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_forgot_password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group`
--

DROP TABLE IF EXISTS `sf_guard_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group`
--

LOCK TABLES `sf_guard_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_group_permission`
--

DROP TABLE IF EXISTS `sf_guard_group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_group_permission`
--

LOCK TABLES `sf_guard_group_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_permission`
--

DROP TABLE IF EXISTS `sf_guard_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_permission`
--

LOCK TABLES `sf_guard_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_remember_key`
--

DROP TABLE IF EXISTS `sf_guard_remember_key`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_remember_key`
--

LOCK TABLES `sf_guard_remember_key` WRITE;
/*!40000 ALTER TABLE `sf_guard_remember_key` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_remember_key` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user`
--

DROP TABLE IF EXISTS `sf_guard_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `algorithm` varchar(255) NOT NULL DEFAULT 'sha1',
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `pass_update_at` datetime DEFAULT NULL COMMENT 'thoi gian update mat khau',
  `is_lock_signin` tinyint(1) DEFAULT NULL COMMENT 'Trang thai: 1 - bi khoa tai khoan, 0 - ko bi khoa',
  `locked_time` bigint(20) DEFAULT NULL COMMENT 'Thoi diem khoa tai khoan',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user`
--

LOCK TABLES `sf_guard_user` WRITE;
/*!40000 ALTER TABLE `sf_guard_user` DISABLE KEYS */;
INSERT INTO `sf_guard_user` VALUES (1,NULL,NULL,NULL,'admin','admin','sha1','b8de626c370bf34a8851a166b954440e','ae600e4a496218e6e7cab9bf79ac082910fb2454',1,1,'2019-06-02 18:10:47',NULL,NULL,NULL,'2019-05-24 15:25:34','2019-06-02 18:10:47');
/*!40000 ALTER TABLE `sf_guard_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_group`
--

DROP TABLE IF EXISTS `sf_guard_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_group`
--

LOCK TABLES `sf_guard_user_group` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sf_guard_user_permission`
--

DROP TABLE IF EXISTS `sf_guard_user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sf_guard_user_permission`
--

LOCK TABLES `sf_guard_user_permission` WRITE;
/*!40000 ALTER TABLE `sf_guard_user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `sf_guard_user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vt_user_signin_lock`
--

DROP TABLE IF EXISTS `vt_user_signin_lock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vt_user_signin_lock` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `created_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vt_user_signin_lock`
--

LOCK TABLES `vt_user_signin_lock` WRITE;
/*!40000 ALTER TABLE `vt_user_signin_lock` DISABLE KEYS */;
/*!40000 ALTER TABLE `vt_user_signin_lock` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-08 22:06:33
