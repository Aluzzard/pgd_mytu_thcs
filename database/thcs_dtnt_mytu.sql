/*
 Navicat Premium Data Transfer

 Source Server         : DB Laravel
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : 127.0.0.1:3307
 Source Schema         : thcs_dtnt_mytu

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 14/12/2022 17:00:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_administrators
-- ----------------------------
DROP TABLE IF EXISTS `account_administrators`;
CREATE TABLE `account_administrators`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` int(10) UNSIGNED NULL DEFAULT NULL,
  `numberphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` bit(1) NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `account`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account_administrators
-- ----------------------------
INSERT INTO `account_administrators` VALUES (1, 'administrator', '$2y$10$WsOV9QULyB6EM95Kv7i0LOH406GaBc5ZJWmkmSPA1qi/Z2tGsO8.e', 'Thái Đình Cẩn1saddsa', 'super.administrator@gmail.com', 1, '08541452422sdaadsdsa', '/upload/avatar_account/logo-vnpt-app.jpg', b'1', NULL, NULL, '2022-08-30 14:24:54');

-- ----------------------------
-- Table structure for account_users
-- ----------------------------
DROP TABLE IF EXISTS `account_users`;
CREATE TABLE `account_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `numberphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` int(11) NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `account`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account_users
-- ----------------------------
INSERT INTO `account_users` VALUES (1, 'admin', '$2y$10$LXijS28SFPN9Pb8KO1m8deB0Co06EdArBaGxWTVaIkVc0t0y33j1a', 'Quản trị viên', NULL, NULL, '/upload/avatar_account/25694.png', 1, NULL, NULL, '2022-11-03 16:09:34');
INSERT INTO `account_users` VALUES (4, 'admin3', '$2y$10$oCCc/8L1BAl8YVemy9JuLei3yUJFvfxSG6F1kM/bGaR2WvMRZzSuu', 'test1', NULL, NULL, NULL, 1, NULL, '2022-06-10 15:57:38', '2022-07-12 08:45:13');
INSERT INTO `account_users` VALUES (6, 'test', '$2y$10$1Yy/9w0L224YlnzQNIkmM.6Ce3gDpLSk0kXNqu8wa3uBsfsOuEK5y', 'Người dùng test', NULL, NULL, NULL, 1, NULL, '2022-07-11 17:05:56', '2022-07-25 15:03:25');
INSERT INTO `account_users` VALUES (7, 'test3', '$2y$10$7as2OOsfiQsy145ZboNeNuj5ysXT6EqFX3VPHiezl1A1Fj64i1rT.', 'dsf', NULL, NULL, NULL, 1, NULL, '2022-07-12 08:41:13', '2022-07-12 08:41:13');
INSERT INTO `account_users` VALUES (8, 'sss', '$2y$10$o3kQlx5YWHQKXC5SnyHoZuV4K4g6QQcwIEX6I2Ikm9DmtQRufsqfu', 'dsa', NULL, NULL, NULL, 1, NULL, '2022-07-12 08:42:23', '2022-07-12 08:42:23');
INSERT INTO `account_users` VALUES (9, 'admin2', '$2y$10$CS7pjfon.V7tEhu2UM5hNeVwXr/ODw2mOgV3lO9bwTkZvHy52rLP2', 'sad', NULL, NULL, NULL, 1, NULL, '2022-07-12 08:43:27', '2022-07-12 08:43:27');

-- ----------------------------
-- Table structure for module_advertisements
-- ----------------------------
DROP TABLE IF EXISTS `module_advertisements`;
CREATE TABLE `module_advertisements`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `show_from_date` timestamp(0) NULL DEFAULT NULL,
  `show_to_date` timestamp(0) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_advertisements
-- ----------------------------
INSERT INTO `module_advertisements` VALUES (4, 'Quảng cáo giữa', '1', NULL, NULL, NULL, '<img alt=\"\" src=\"/upload/photos/1/banner/CHU_DE_NAM_HOC_2022_-_2023_97b1b.png\" style=\"height:19%; width:100%\" />', '2022-11-30 15:38:42', '2022-11-30 15:38:42');
INSERT INTO `module_advertisements` VALUES (5, 'Quảng cáo phải', '1', NULL, NULL, NULL, '<img alt=\"\" src=\"/upload/photos/1/banner/tra-cuu-ket-qua.gif\" style=\"height:67%; width:100%\" />', '2022-12-14 16:55:06', '2022-12-14 16:55:06');

-- ----------------------------
-- Table structure for module_article_by_menus
-- ----------------------------
DROP TABLE IF EXISTS `module_article_by_menus`;
CREATE TABLE `module_article_by_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_permissions` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'view, edit, delete',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_article_by_menus
-- ----------------------------
INSERT INTO `module_article_by_menus` VALUES (64, 6, '5,6,36', 'view');
INSERT INTO `module_article_by_menus` VALUES (66, 6, '5,6', 'edit');
INSERT INTO `module_article_by_menus` VALUES (67, 6, '5,6,36', 'delete');
INSERT INTO `module_article_by_menus` VALUES (68, 7, '6', 'view');
INSERT INTO `module_article_by_menus` VALUES (70, 7, '5', 'edit');
INSERT INTO `module_article_by_menus` VALUES (71, 7, NULL, 'delete');
INSERT INTO `module_article_by_menus` VALUES (72, 6, NULL, 'add');

-- ----------------------------
-- Table structure for module_articles
-- ----------------------------
DROP TABLE IF EXISTS `module_articles`;
CREATE TABLE `module_articles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `new_window` tinyint(1) NOT NULL DEFAULT 0,
  `new_news` tinyint(1) NOT NULL DEFAULT 0,
  `featured_news` tinyint(1) NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `show_from_date` timestamp(0) NULL DEFAULT NULL,
  `show_to_date` timestamp(0) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `posts_user_id_index`(`user_id`) USING BTREE,
  INDEX `posts_category_id_index`(`category_id`) USING BTREE,
  INDEX `posts_photo_id_index`(`avatar`(250)) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_articles
-- ----------------------------
INSERT INTO `module_articles` VALUES (66, 1, 87, 'CHÀO MỪNG NGÀY CHUYỂN ĐỔI SỐ 10/10 CHUYỂN ĐỔI SỐ GIẢI QUYẾT CÁC VẤN ĐỀ CỦA XÃ HỘI VÌ MỘT CUỘC SỐNG TỐT ĐẸP HƠN CHO NGƯỜI DÂN', 'chao-mung-ngay-chuyen-doi-so-1010-chuyen-doi-so-giai-quyet-cac-van-de-cua-xa-hoi-vi-mot-cuoc-song-tot-dep-hon-cho-nguoi-dan', '/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png', 1, 0, 0, 1, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png\" style=\"height:67%; width:100%\" /></p>', NULL, NULL, '2022-10-13 15:10:00', '2022-11-30 10:40:34');
INSERT INTO `module_articles` VALUES (72, 1, 87, 'KẾT QUẢ KIỂM TRA ĐIỀU KIỆN, TIÊU CHUẨN CỦA THÍ SINH DỰ TẠI VÒNG 1 VÀ NỘI DUNG TÀI LIỆU ÔN TẬP, PHÍ TUYỂN DỤNG VÀ THỜI GIAN TỔ CHỨC THI VIẾT VÒNG 2 KỲ TUYỂN DỤNG VIÊN CHỨC SỰ NGHIỆP GIÁO DỤC H', 'ket-qua-kiem-tra-dieu-kien-tieu-chuan-cua-thi-sinh-du-tai-vong-1-va-noi-dung-tai-lieu-on-tap-phi-tuyen-dung-va-thoi-gian-to-chuc-thi-viet-vong-2-ky-tuyen-dung-vien-chuc-su-nghiep-giao-duc-huy', NULL, 0, 0, 0, 0, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/thong bao ket kiem tra qua vong 1_page-0001(1).jpg\" style=\"height:131%; width:100px\" /><img alt=\"\" src=\"/upload/photos/1/thong bao ket kiem tra qua vong 1_page-0002.jpg\" style=\"height:137%; width:100px\" /><img alt=\"\" src=\"/upload/photos/1/thong bao ket kiem tra qua vong 1_page-0003.jpg\" style=\"height:110%; width:100px\" /><img alt=\"\" src=\"/upload/photos/1/thong bao ket kiem tra qua vong 1_page-0004.jpg\" style=\"height:110%; width:100px\" /><img alt=\"\" src=\"/upload/photos/1/thong bao ket kiem tra qua vong 1_page-0005.jpg\" style=\"height:110%; width:100px\" /></p>', NULL, NULL, '2022-12-05 10:44:00', '2022-12-05 10:48:42');
INSERT INTO `module_articles` VALUES (73, 1, 87, 'Thi tốt nghiệp THPT năm 2022: Những điều thí sinh cần lưu ý', 'thi-tot-nghiep-thpt-nam-2022-nhung-dieu-thi-sinh-can-luu-y', NULL, 0, 0, 0, 0, '<p><span style=\"color:rgb(119, 119, 119); font-family:arial; font-size:14px\">Ngày 6/7, hơn 1 triệu thí sinh sẽ tới điểm thi để làm thủ tục dự thi kỳ thi tốt nghiệp THPT năm 2022. Cùng với việc sẵn sàng về kiến thức, kỹ năng, các thí sinh cũng cần ghi nhớ quy chế thi, nhất là trách nhiệm của cá nhân, xác định rõ những việc được và không được phép làm khi tham dự kỳ thi.</span></p>', NULL, NULL, '<p><span style=\"font-size:14px\"><strong>Hai mục đích cơ bản của kỳ thi tốt nghiệp THPT năm 2022</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Kỳ thi tốt nghiệp THPT năm 2022 có hai mục đích cơ bản: Lấy kết quả để xét công nhận tốt nghiệp trung học phổ thông, làm căn cứ cho nhiều cơ sở giáo dục đại học xét tuyển. Với tính chất quan trọng này, thí sinh cần lưu ý những quy định liên quan đến trách nhiệm của mình để tuân thủ đúng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Một trong những quy định quan trọng đầu tiên là phải đến đúng giờ thi, tuyệt đối không đến muộn vì có thể bị động về tâm lý, ảnh hưởng đến chất lượng bài làm. Nếu thí sinh đến chậm quá 15 phút sau khi có hiệu lệnh tính giờ làm bài sẽ không được dự thi buổi thi đó.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Trong khi theo quy chế, để được xét công nhận tốt nghiệp trung học phổ thông, thí sinh phải làm đủ 4 bài thi, gồm 3 bài thi độc lập là toán, ngữ văn, ngoại ngữ và 1 bài tổ hợp khoa học tự nhiên (hoặc khoa học xã hội). Để tránh sơ suất này, thí sinh cần chủ động tính toán thời gian di chuyển tới điểm thi, lưu ý có thời gian dự phòng cho tình huống phát sinh trên đường (ùn tắc giao thông, thời tiết...).</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Liên quan đến bài thi tổ hợp (khoa học tự nhiên hoặc khoa học xã hội), thí sinh cần nhớ, đã đăng ký bài thi tổ hợp nào thì chỉ được làm bài thi tổ hợp đó, không được làm cả hai bài thi tổ hợp. Bởi đã có năm, Bộ Giáo dục và Đào tạo cho phép thí sinh được làm cả hai bài tổ hợp, nên cần ghi nhớ điều này ở kỳ thi năm nay để tránh nhầm lẫn.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Một lưu ý khác là ngay khi đến điểm thi, thí sinh cần xem kỹ sơ đồ phòng thi, bởi việc được chọn bài thi tổ hợp sẽ khiến số lượng thí sinh dự thi ở từng bài thi khác nhau, nên phòng thi cũng sẽ thay đổi, dù thí sinh vẫn chỉ có duy nhất một số báo danh.</span></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size:14px\"><img alt=\"\" src=\"/upload/photos/1/thi tot nghiep thpt.png\" style=\"height:110%; width:100px\" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Lưu ý “danh mục cấm”</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Quy chế thi của Bộ Giáo dục và Đào tạo đã quy định rõ các vật dụng thí sinh được phép mang vào phòng thi trong kỳ thi tốt nghiệp trung học phổ thông gồm: Bút viết, bút chì, compa, tẩy, thước kẻ, máy tính bỏ túi không có chức năng soạn thảo văn bản, không có thẻ nhớ, Atlat địa lý Việt Nam đối với môn thi địa lý do Nhà Xuất bản Giáo dục Việt Nam phát hành, các loại máy ghi âm, ghi hình chỉ có chức năng ghi thông tin nhưng không thể nghe, xem và không thể truyền, nhận được thông tin, tín hiệu âm thanh, hình ảnh trực tiếp nếu không có thiết bị hỗ trợ khác.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Danh mục cấm mang vào phòng thi gồm: Giấy than, đồ uống có cồn, bút xóa, vũ khí và chất gây nổ, gây cháy, các tài liệu, thiết bị truyền tin hoặc chứa thông tin. Tại các điểm thi đều bố trí khu vực bảo quản các vật dụng cá nhân của thí sinh, nếu lỡ mang theo những vật dụng trong&nbsp;</span>“danh<span style=\"font-size:14px\">&nbsp;mục&nbsp;</span>cấm”<span style=\"font-size:14px\">, trong đó có điện thoại (kể cả điện thoại đã tắt nguồn), thí sinh cần gửi lại bên ngoài phòng thi.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Thực tế từ các kỳ thi cho thấy, vẫn có thí sinh vi phạm, trong đó có lỗi mang điện thoại vào phòng thi. Do đó, trước khi vào phòng thi, các phụ huynh cần nhắc con đưa lại điện thoại cho bố mẹ cầm hộ, không nên để con đem theo vào khu vực thi, vì có thể các con sẽ lơ đễnh, mang vào phòng thi dẫn đến bị phạm quy mà lãng phí cả 12 năm học.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Kỳ thi tốt nghiệp trung học phổ thông năm 2022 có 5 bài thi, gồm: Toán, ngữ văn, ngoại ngữ, bài thi tổ hợp khoa học tự nhiên và bài thi tổ hợp khoa học xã hội. Trong đó, chỉ có ngữ văn thi theo hình thức tự luận, các môn còn lại thi theo hình thức trắc nghiệm khách quan.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Quy chế thi không cho phép các em rời khỏi phòng thi trong suốt thời gian làm bài thi trắc nghiệm. Còn với buổi thi môn tự luận, thí sinh có thể được ra khỏi phòng thi sau khi hết 2/3 thời gian làm bài của buổi thi (phải nộp bài thi kèm theo đề thi, giấy nháp trước khi ra khỏi phòng thi). Thí sinh cần nhớ quy định này để giải quyết các nhu cầu cá nhân trước khi vào phòng thi để có tâm thế làm bài tốt nhất.</span></p>\r\n\r\n<p><strong>Lịch thi tốt nghiệp THPT năm 2022</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><img alt=\"\" src=\"/upload/photos/1/thi tot nghiep thpt1.png\" style=\"height:120%; width:100px\" /></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">Thí sinh phải đến đúng giờ thi, tuyệt đối không đến muộn vì có thể bị động về tâm lý, ảnh hưởng đến chất lượng bài làm.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Khi nào công bố kết quả thi tốt nghiệp THPT năm 2022?</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Trước đó, ngày 19/4, Bộ Giáo dục và Đào tạo (GDĐT) ban hành công văn số 1523/BGDĐT-QLCL gửi các Sở GDĐT và Cục Nhà trường - Bộ Quốc phòng về việc hướng dẫn tổ chức Kỳ thi tốt nghiệp trung học phổ thông (THPT) năm 2022.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Theo đó, Kỳ thi tốt nghiệp THPT năm 2022 được tổ chức theo Quy chế thi tốt nghiệp THPT ban hành kèm theo Thông tư số 15/2020/TT-BGDĐT ngày 26/5/2020 được sửa đổi, bổ sung tại Thông tư số 05/2021/TT-BGDĐT ngày 12/3/2021 của Bộ trưởng Bộ GDĐT (Quy chế thi).</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Kỳ thi sẽ được tổ chức vào ngày 7, 8/7/2022. Cụ thể: Sáng 7/7, thí sinh dự thi môn Ngữ Văn; chiều 7/7, thí sinh dự thi môn Toán; sáng 8/7, thí sinh dự thi bài thi Khoa học Tự nhiên và bài thi Khoa học Xã hội; chiều 8/7, thí sinh dự thi môn Ngoại ngữ. Chiều 6/7, thí sinh đến phòng thi làm thủ tục dự thi, đính chính sai sót (nếu có) và nghe phổ biến Quy chế thi, lịch thi. Ngày 9/7 là ngày thi dự phòng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Theo hướng dẫn, các Sở GDĐT tổ chức cho thí sinh đang học lớp 12 năm học 2021-2022 đăng ký dự thi trực tuyến từ ngày 4/5 đến 17h ngày 13/5; hoàn thành tổ chức tập huấn Quy chế thi và nghiệp vụ tổ chức thi cho cán bộ làm công tác thi trước ngày 26/4, thành lập Hội đồng thi, phân công nhiệm vụ các thành viên trước ngày 01/6; tập huấn nghiệp vụ cho cán bộ coi thi trước ngày 6/7.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Các Ban Chỉ đạo thi cấp tỉnh, các Hội đồng thi phải tổ chức chấm thi, tổng kết công tác chấm thi, gửi dữ liệu kết quả thi về Bộ GDĐT và đối sánh kết quả thi chậm nhất ngày 22/7.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Kết quả thi tốt nghiệp THPT sẽ được công bố vào 24/7. Việc xét công nhận tốt nghiệp THPT hoàn thành chậm nhất vào 26/7. Hiệu trưởng các trường phổ thông cấp giấy chứng nhận tốt nghiệp tạm thời, trả học bạ và các loại giấy chứng nhận liên quan (bản chính) cho học sinh chậm nhất ngày 30/7. Các Hội đồng thi hoàn thành tổ chức phúc khảo bài thi (nếu có) chậm nhất ngày 14/8.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Công văn của Bộ GDĐT cũng cho biết, trong trường hợp phải tổ chức thêm đợt thi của Kỳ thi do ảnh hưởng của dịch Covid-19, Bộ GDĐT sẽ có hướng dẫn riêng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Thời tiết những ngày diễn ra kỳ thi tốt nghiệp THPT năm 2022</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khu vực Tây Nguyên và Nam Bộ:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ngày 06-09/7: Chiều tối và tối có mưa rào và dông, cục bộ có mưa to, ngày nắng gián đoạn. Nhiệt độ cao nhất dao động từ 29-33 độ.</span></p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, '2022-12-05 10:59:31', '2022-12-05 10:59:31');
INSERT INTO `module_articles` VALUES (74, 1, 87, 'Học sinh, sinh viên nghèo được vay tới 10 triệu đồng mua máy tính', 'hoc-sinh-sinh-vien-ngheo-duoc-vay-toi-10-trieu-dong-mua-may-tinh', NULL, 0, 0, 0, 0, NULL, NULL, NULL, '<p><span style=\"font-size:14px\">Ngày 04/4/2022, Thủ tướng ban hành&nbsp;<a href=\"http://pgdmytu.edu.vn/cong-van-van-ban/van-ban-quy-pham-phap-luat/quyet-dinh-ve-tin-dung-doi-voi-hoc-sinh-sinh-vien-co-hoan-ca.html\" rel=\"noreferrer noopener\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(51, 51, 51); text-decoration-line: none;\" target=\"_blank\">Quyết định 09/2022/QĐ-TTg</a>&nbsp;về tín dụng đối với học sinh, sinh viên có hoàn cảnh gia đình khó khăn để mua máy tính, thiết bị phục vụ học tập trực tuyến.<br />\r\n<br />\r\nTheo đó, học sinh, sinh viên được hỗ trợ vay tối đa 10 triệu đồng/người với lãi suất 1,2%/năm, để mua máy tính, thiết bị phục vụ học tập trực tuyến khi đáp ứng các điều kiện sau:<br />\r\n- Là thành viên của hộ gia đình thuộc một trong các đối tượng: hộ nghèo, hộ cận nghèo, hộ có mức sống trung bình theo chuẩn quy định của pháp luật hoặc hộ gia đình có hoàn cảnh khó khăn do ảnh hưởng của dịch Covid-19 (có bố hoặc mẹ hoặc bố và mẹ mất do dịch Covid-19);<br />\r\n- Không có máy tính, thiết bị đủ điều kiện đáp ứng yêu cầu học tập trực tuyến và chưa được hưởng chính sách hỗ trợ máy tính, thiết bị học tập trực tuyến dưới mọi hình thức.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Vốn vay được sử dụng để mua máy tính, thiết bị đủ điều kiện đáp ứng yêu cầu học tập trực tuyến bao gồm:<br />\r\n- Máy tính để bàn;<br />\r\n- Máy tính xách tay;<br />\r\n- Máy tính bảng;<br />\r\n- Các thiết bị ghi hình kỹ thuật số (webcam);<br />\r\n- Thiết bị thu thanh (microphone).<br />\r\n<br />\r\n<a href=\"http://pgdmytu.edu.vn/cong-van-van-ban/van-ban-quy-pham-phap-luat/quyet-dinh-ve-tin-dung-doi-voi-hoc-sinh-sinh-vien-co-hoan-ca.html\" rel=\"noreferrer noopener\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(51, 51, 51); text-decoration-line: none;\" target=\"_blank\">Quyết định 09/2022/QĐ-TTg</a>&nbsp;có hiệu lực từ ngày ký ban hành.</span></p>', NULL, NULL, '2022-12-05 11:01:49', '2022-12-05 11:01:49');
INSERT INTO `module_articles` VALUES (75, 1, 100, 'Quy định mới về đánh giá học sinh trung học theo Chương trình GDPT 2018', 'quy-dinh-moi-ve-danh-gia-hoc-sinh-trung-hoc-theo-chuong-trinh-gdpt-2018', NULL, 0, 0, 0, 0, '<p><span style=\"color:rgb(119, 119, 119); font-family:arial; font-size:12px\">Bộ Giáo dục và Đào tạo (GDĐT) vừa ban hành Thông tư số 22/2021/TT-BGDĐT Quy định về đánh giá học sinh trung học cơ sở (THCS) và học sinh trung học phổ thông (THPT). Thông tư có hiệu lực từ ngày 5/9/2021 và thực hiện theo lộ trình triển khai chương trình giáo dục phổ thông mới (CT GDPT 2018) đối với cấp trung học.</span></p>', NULL, NULL, '<div class=\"content-detail font-size-text mb-20\" style=\"box-sizing: border-box; font-family: Arial; font-size: 12px; margin-bottom: 20px !important;\">\r\n<p>Cụ thể, từ năm học 2021-2022 áp dụng Thông tư 22/2021/TT-BGDĐT đối với lớp 6. Từ năm học 2022-2023 áp dụng tiếp cho lớp 7 và lớp 10. Từ năm học 2023-2024 thực hiện tiếp nối việc đánh giá học sinh theo&nbsp;<a href=\"https://moet.gov.vn/content/tintuc/Lists/News/Attachments/7488/FILE_20210819_161943_22_2021_TT_BGDDT.pdf\" rel=\"noreferrer noopener\" style=\"box-sizing: border-box; background-color: transparent; color: rgb(51, 51, 51); text-decoration-line: none;\" target=\"_blank\">Thông tư 22/2021/TT-BGDĐT</a>&nbsp;đối với lớp 8 và lớp 11. Từ năm học 2024-2025 thực hiện đánh giá theo Thông tư này cho 2 lớp còn lại là lớp 9 và lớp 12.</p>\r\n\r\n<p>Thông tư 22 ra đời sẽ thay thế cho hai Thông tư 58 và 26 quy định về đánh giá, xếp loại học sinh THCS và THPT được ban hành trước đó.</p>\r\n\r\n<p><strong>Đánh giá vì sự tiến bộ của người học</strong></p>\r\n\r\n<p>Kế thừa Thông tư 26/2020/TT-BGDĐT sửa đổi, bổ sung một số điều của Quy chế đánh giá, xếp loại học sinh THCS và THPT, Thông tư 22 yêu cầu việc đánh giá phải vì sự tiến bộ của người học. Theo đó, việc đánh giá căn cứ vào yêu cầu cần đạt được quy định trong CT GDPT; bảo đảm tính chính xác, toàn diện, công bằng, trung thực, khách quan. Việc đánh giá thực hiện bằng nhiều phương pháp, hình thức, kĩ thuật và công cụ khác nhau, kết hợp giữa đánh giá thường xuyên và đánh giá định kì. Hoạt động này phải coi trọng việc động viên, khuyến khích sự cố gắng trong rèn luyện và học tập của học sinh; không so sánh học sinh này với học sinh khác.</p>\r\n\r\n<p>Mục đích của việc đánh giá là xác định mức độ hoàn thành nhiệm vụ rèn luyện và học tập của học sinh theo yêu cầu cần đạt được quy định trong CT GDPT. Hoạt động này nhằm cung cấp thông tin chính xác, kịp thời để học sinh điều chỉnh hoạt động rèn luyện và học tập; cán bộ quản lý giáo dục và giáo viên thông qua đó cũng có sự điều chỉnh hoạt động dạy học cho phù hợp.</p>\r\n\r\n<p><strong>Nhiều môn chỉ đánh giá bằng nhận xét</strong></p>\r\n\r\n<p>Thông tư 22 quy định 2 hình thức đánh giá là bằng nhận xét và bằng điểm số. Trong đó, việc đánh giá bằng nhận xét, ngoài ý kiến chính của giáo viên, còn có sự tham gia phối hợp của học sinh, phụ huynh, và các cơ quan, tổ chức, cá nhân có tham gia vào quá trình giáo dục học trò. Cả đánh giá bằng nhận xét và điểm số đều được sử dụng trong đánh giá thường xuyên, đánh giá định kỳ.</p>\r\n\r\n<p>Tuy nhiên, khác với các Thông tư quy định về đánh giá học sinh THCS và THPT trước đây, Thông tư 22 cho phép một số một chỉ thực hiện đánh giá bằng nhận xét. Cụ thể, các môn: Giáo dục thể chất, Nghệ thuật, Âm nhạc, Mĩ thuật, Nội dung giáo dục của địa phương, Hoạt động trải nghiệm, hướng nghiệp, kết quả học tập theo môn học chỉ được đánh giá bằng nhận xét theo một trong hai mức: Đạt, Chưa đạt.</p>\r\n\r\n<p>Đối với các môn học còn lại, kết hợp giữa đánh giá bằng nhận xét với đánh giá bằng điểm số. Kết quả học tập theo môn học được đánh giá bằng điểm số theo thang điểm 10 và phải làm tròn đến chữ số thập phân thứ nhất nếu điểm là số nguyên hoặc số thập phân.</p>\r\n\r\n<p><strong>Bỏ tính điểm trung bình tất cả các môn học</strong></p>\r\n\r\n<p>Nếu Thông tư 58 có quy định về điểm trung bình học các môn để lấy căn cứ xếp loại học lực học sinh trong học kỳ và cả năm, thì ở Thông tư 22 mới, quy định này đã không còn. Điểm trung bình học kì và năm học chỉ được tính của riêng cho từng môn học.</p>\r\n\r\n<p>Thay vì xếp loại học lực Giỏi, khá, trung bình, yếu, kém như Thông tư 58, thì Thông tư 22 vì đánh giá sự phát triển năng lực của người học theo yêu cầu cần đạt của chương trình, nên đánh giá kết quả học tập của người học theo 4 mức “Tốt, Khá, Đạt, Chưa đạt” đối với môn học đánh giá bằng nhận xét kết hợp với điểm số và 2 mức “Đạt, Chưa đạt” đối với môn chỉ đánh giá bằng nhận xét.</p>\r\n\r\n<p>Khi tất cả các môn học đánh giá bằng nhận xét được đánh giá mức Đạt; tất cả môn đánh giá bằng nhận xét kết hợp với điểm số có điểm trung bình môn học kỳ và điểm trung bình môn cuối năm đạt từ 6,5 điểm trở lên, trong đó có ít nhất 06 môn học có đạt từ 8,0 điểm trở lên, thì học sinh được đánh giá kết quả học tập là “Tốt”.</p>\r\n\r\n<p>Nếu học sinh có kết quả học tập tất cả các môn đánh giá bằng nhận xét được đánh giá mức Đạt, đồng thời tất cả các môn đánh giá bằng nhận xét kết hợp với điểm số có điểm trung bình môn học kỳ và điểm trung bình môn cuối năm đạt từ 5,0 điểm trở lên, trong đó có ít nhất 06 môn đạt từ 6,5 điểm trở lên, thì được đánh giá mức “Khá”.</p>\r\n\r\n<p>Kết quả học tập của học sinh được đánh giá mức “Đạt” khi có nhiều nhất 01 môn học đánh giá bằng nhận xét được đánh giá mức “Chưa đạt” và có ít nhất 06 môn đánh giá bằng nhận xét kết hợp điểm số có điểm trung bình môn học kỳ và điểm trung bình môn cuối năm đạt từ 5,0 điểm trở lên, không có môn học nào dưới 3,5 điểm.</p>\r\n\r\n<p>Các trường hợp còn lại, học sinh được đánh giá là “Chưa đạt”.</p>\r\n\r\n<p>Việc đánh giá kết quả rèn luyện của học sinh ở Thông tư 22 được đánh giá theo một trong 04 mức: Tốt, Khá, Đạt, Chưa đạt; thay vì xếp loại Hạnh kiểm: Tốt, khá, trung bình, yếu như Thông tư 58.</p>\r\n\r\n<div>&nbsp;</div>\r\n</div>', NULL, NULL, '2022-12-05 14:52:57', '2022-12-05 14:52:57');
INSERT INTO `module_articles` VALUES (76, 1, 100, 'V/v tăng cường dạy học qua internet trong thời gian nghỉ học để phòng, chống Covid-19', 'vv-tang-cuong-day-hoc-qua-internet-trong-thoi-gian-nghi-hoc-de-phong-chong-covid-19', NULL, 0, 0, 0, 0, '<p><a href=\"/upload/files/1/file/2022/154_31_3_20_CvtangcuongdayhoctructuyentrongthoinghidichnCoV_b34e94b223 (1).pdf\"><iframe frameborder=\"0\" height=\"500\" scrolling=\"no\" src=\"/upload/files/1/file/2022/154_31_3_20_CvtangcuongdayhoctructuyentrongthoinghidichnCoV_b34e94b223 (1).pdf\" width=\"100%\"></iframe></a></p>', NULL, NULL, '<p><strong>1.</strong>&nbsp;Chỉ đạo tổ chuyên môn rà soát, tinh giảm nội dung dạy học, xây dựng kế hoạch dạy học theo hướng dẫn tại Công văn số 4612/BGDĐT-GDTrH ngày 03/10/2017 của Bộ GDĐT về việc hướng dẫn thực hiện chương trình giáo dục phổ thông hiện hành theo định hướng phát triển năng lực và phẩm chất học sinh từ năm 2017 – 2018 để tổ chức dạy học qua internet một cách phù hợp. Trong quá trình triển khai thực hiện, cần tham khảo, sử dụng các nguồn học liệu tin cậy, chuẩn xác để tổ chức dạy học và hướng dẫn học sinh học tập.</p>\r\n\r\n<p><strong>2.</strong>&nbsp;Lựa chọn công cụ dạy học qua internet phù hợp với nhu cầu và điều kiện thực tế của từng đơn vị. Trong đó, đặc biệt chú ý đến các điều kiện bảo đảm tổ chức dạy học qua internet có chất lượng. Trường Đại học Sư phạm Hà Nội sẽ hỗ trợ miễn phí các trường tổ chức dạy học qua internet (thông tin liên hệ tại địa chỉ&nbsp;<a href=\"https://olm.vn/\">https://olm.vn&nbsp;</a>và thư điện tử&nbsp;<a href=\"mailto:a@olm.vn\">a@olm.vn</a>).</p>\r\n\r\n<p><strong>3.</strong>&nbsp;Phân công giáo viên giao&nbsp;nhiệm&nbsp;vụ học tập theo nội dung bài học và hướng dẫn học sinh thực hiện các bài học qua&nbsp;internet;&nbsp;Phối hợp với gia đình học sinh có biện pháp quản lý hoạt động học của học sinh qua&nbsp;internet;&nbsp;Nhận xét, đánh giá kết quả thực hiện&nbsp;nhiệm&nbsp;vụ học tập đã giao cho học&nbsp;sinh.</p>\r\n\r\n<p><strong>4.</strong>&nbsp;Hướng dẫn giáo viên, học sinh tham khảo lịch phát sóng các bài học (do Bộ GDĐT phối hợp với Đài truyền hình Việt Nam xây dựng) trên Kênh truyền hình giáo dục quốc gia (kênh VTV7 và một số kênh truyền hình quốc&nbsp;&nbsp; gia khác) và các kênh truyền hình khác được công bố trên Cổng thông tin của Bộ GDĐT (tại địa chỉ&nbsp;<a href=\"https://www.moet.gov.vn/\">https://www.moet.gov.vn</a>).</p>\r\n\r\n<p><strong>5.</strong>&nbsp;Khi học sinh đi học lại, các đơn vị tổ chức rà soát, đánh giá kết quả học tập qua internet để từ đó hướng dẫn giáo viên rà soát, tinh giảm nội dung dạy học và điều chỉnh kế hoạch dạy học theo hướng kế thừa những nội dung kiến thức đã học qua internet, nhằm tối ưu hóa thời gian và nội dung kiến thức cần tiếp tục dạy học trong chương theo quy định.</p>\r\n\r\n<p><strong>6.</strong>&nbsp;Các đơn vị hướng dẫn cho học sinh, giáo viên khai thác kho bài giảng e-Learning của Bộ GDĐT tại địa chỉ&nbsp;<a href=\"https://elearning.moet.edu.vn/\">https://elearning.moet.edu.vn/</a>&nbsp;theo công văn 1951/HD-SGDĐT ngày 17/9/2019 của Sở GDĐT về việc Thực hiện nhiệm vụ công nghệ thông tin năm học 2019-2020.</p>\r\n\r\n<p><strong>1.</strong>&nbsp;Chỉ đạo tổ chuyên môn rà soát, tinh giảm nội dung dạy học, xây dựng kế hoạch dạy học theo hướng dẫn tại Công văn số 4612/BGDĐT-GDTrH ngày 03/10/2017 của Bộ GDĐT về việc hướng dẫn thực hiện chương trình giáo dục phổ thông hiện hành theo định hướng phát triển năng lực và phẩm chất học sinh từ năm 2017 – 2018 để tổ chức dạy học qua internet một cách phù hợp. Trong quá trình triển khai thực hiện, cần tham khảo, sử dụng các nguồn học liệu tin cậy, chuẩn xác để tổ chức dạy học và hướng dẫn học sinh học tập.</p>\r\n\r\n<p><strong>2.</strong>&nbsp;Lựa chọn công cụ dạy học qua internet phù hợp với nhu cầu và điều kiện thực tế của từng đơn vị. Trong đó, đặc biệt chú ý đến các điều kiện bảo đảm tổ chức dạy học qua internet có chất lượng. Trường Đại học Sư phạm Hà Nội sẽ hỗ trợ miễn phí các trường tổ chức dạy học qua internet (thông tin liên hệ tại địa chỉ&nbsp;<a href=\"https://olm.vn/\">https://olm.vn&nbsp;</a>và thư điện tử&nbsp;<a href=\"mailto:a@olm.vn\">a@olm.vn</a>).</p>\r\n\r\n<p><strong>3.</strong>&nbsp;Phân công giáo viên giao&nbsp;nhiệm&nbsp;vụ học tập theo nội dung bài học và hướng dẫn học sinh thực hiện các bài học qua&nbsp;internet;&nbsp;Phối hợp với gia đình học sinh có biện pháp quản lý hoạt động học của học sinh qua&nbsp;internet;&nbsp;Nhận xét, đánh giá kết quả thực hiện&nbsp;nhiệm&nbsp;vụ học tập đã giao cho học&nbsp;sinh.</p>\r\n\r\n<p><strong>4.</strong>&nbsp;Hướng dẫn giáo viên, học sinh tham khảo lịch phát sóng các bài học (do Bộ GDĐT phối hợp với Đài truyền hình Việt Nam xây dựng) trên Kênh truyền hình giáo dục quốc gia (kênh VTV7 và một số kênh truyền hình quốc&nbsp;&nbsp; gia khác) và các kênh truyền hình khác được công bố trên Cổng thông tin của Bộ GDĐT (tại địa chỉ&nbsp;<a href=\"https://www.moet.gov.vn/\">https://www.moet.gov.vn</a>).</p>\r\n\r\n<p><strong>5.</strong>&nbsp;Khi học sinh đi học lại, các đơn vị tổ chức rà soát, đánh giá kết quả học tập qua internet để từ đó hướng dẫn giáo viên rà soát, tinh giảm nội dung dạy học và điều chỉnh kế hoạch dạy học theo hướng kế thừa những nội dung kiến thức đã học qua internet, nhằm tối ưu hóa thời gian và nội dung kiến thức cần tiếp tục dạy học trong chương theo quy định.</p>\r\n\r\n<p><strong>6.</strong>&nbsp;Các đơn vị hướng dẫn cho học sinh, giáo viên khai thác kho bài giảng e-Learning của Bộ GDĐT tại địa chỉ&nbsp;<a href=\"https://elearning.moet.edu.vn/\">https://elearning.moet.edu.vn/</a>&nbsp;theo công văn 1951/HD-SGDĐT ngày 17/9/2019 của Sở GDĐT về việc Thực hiện nhiệm vụ công nghệ thông tin năm học 2019-2020.</p>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, '2022-12-05 15:04:00', '2022-12-05 15:26:56');
INSERT INTO `module_articles` VALUES (77, 1, 87, 'CHÀO MỪNG NGÀY CHUYỂN ĐỔI SỐ 10/10 CHUYỂN ĐỔI SỐ GIẢI QUYẾT CÁC VẤN ĐỀ CỦA XÃ HỘI VÌ MỘT CUỘC SỐNG TỐT ĐẸP HƠN CHO NGƯỜI DÂN', 'chao-mung-ngay-chuyen-doi-so-1010-chuyen-doi-so-giai-quyet-cac-van-de-cua-xa-hoi-vi-mot-cuoc-song-tot-dep-hon-cho-nguoi-dan', '/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png', 1, 0, 0, 1, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png\" style=\"height:67%; width:100%\" /></p>', NULL, NULL, '2022-10-13 15:10:00', '2022-11-30 10:40:34');
INSERT INTO `module_articles` VALUES (78, 1, 87, 'CHÀO MỪNG NGÀY CHUYỂN ĐỔI SỐ 10/10 CHUYỂN ĐỔI SỐ GIẢI QUYẾT CÁC VẤN ĐỀ CỦA XÃ HỘI VÌ MỘT CUỘC SỐNG TỐT ĐẸP HƠN CHO NGƯỜI DÂN', 'chao-mung-ngay-chuyen-doi-so-1010-chuyen-doi-so-giai-quyet-cac-van-de-cua-xa-hoi-vi-mot-cuoc-song-tot-dep-hon-cho-nguoi-dan', '/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png', 1, 0, 0, 1, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png\" style=\"height:67%; width:100%\" /></p>', NULL, NULL, '2022-10-13 15:10:00', '2022-11-30 10:40:34');
INSERT INTO `module_articles` VALUES (79, 1, 87, 'CHÀO MỪNG NGÀY CHUYỂN ĐỔI SỐ 10/10 CHUYỂN ĐỔI SỐ GIẢI QUYẾT CÁC VẤN ĐỀ CỦA XÃ HỘI VÌ MỘT CUỘC SỐNG TỐT ĐẸP HƠN CHO NGƯỜI DÂN', 'chao-mung-ngay-chuyen-doi-so-1010-chuyen-doi-so-giai-quyet-cac-van-de-cua-xa-hoi-vi-mot-cuoc-song-tot-dep-hon-cho-nguoi-dan', '/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png', 1, 0, 0, 1, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png\" style=\"height:67%; width:100%\" /></p>', NULL, NULL, '2022-10-13 15:10:00', '2022-11-30 10:40:34');
INSERT INTO `module_articles` VALUES (80, 1, 87, 'CHÀO MỪNG NGÀY CHUYỂN ĐỔI SỐ 10/10 CHUYỂN ĐỔI SỐ GIẢI QUYẾT CÁC VẤN ĐỀ CỦA XÃ HỘI VÌ MỘT CUỘC SỐNG TỐT ĐẸP HƠN CHO NGƯỜI DÂN', 'chao-mung-ngay-chuyen-doi-so-1010-chuyen-doi-so-giai-quyet-cac-van-de-cua-xa-hoi-vi-mot-cuoc-song-tot-dep-hon-cho-nguoi-dan', '/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png', 1, 0, 0, 1, NULL, NULL, NULL, '<p><img alt=\"\" src=\"/upload/photos/1/tin-tuc/2022/thang10/30-11-2022/CHAO MUNG NGAY CHUYEN DOI SO.png\" style=\"height:67%; width:100%\" /></p>', NULL, NULL, '2022-10-13 15:10:00', '2022-11-30 10:40:34');

-- ----------------------------
-- Table structure for module_articles_categories
-- ----------------------------
DROP TABLE IF EXISTS `module_articles_categories`;
CREATE TABLE `module_articles_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_parent` int(11) NOT NULL DEFAULT 0,
  `is_parent` bit(1) NOT NULL DEFAULT b'0',
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `display_method` tinyint(4) NOT NULL COMMENT 'Kiểu hiển thị',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `new_window` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Bật cửa sổ mới',
  `show_h_menu` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Hiện trên menu ngang',
  `display_h_order` int(11) NULL DEFAULT NULL COMMENT 'Thú tự',
  `show_v_menu` tinyint(1) NOT NULL DEFAULT 0,
  `display_v_order` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 159 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of module_articles_categories
-- ----------------------------
INSERT INTO `module_articles_categories` VALUES (5, 'Trang chủ', 'trang-chu', NULL, 0, b'0', '/', 1, 1, 0, 1, 0, 0, NULL, '2022-03-30 15:55:13', '2022-12-13 16:36:58');
INSERT INTO `module_articles_categories` VALUES (6, 'Giới thiệu', 'gioi-thieu', NULL, 0, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-03-30 16:30:41', '2022-08-06 16:36:40');
INSERT INTO `module_articles_categories` VALUES (8, 'Tin tức - Sự kiện', 'tin-tuc-su-kien', NULL, 0, b'0', NULL, 1, 1, 0, 1, 5, 0, NULL, '2022-03-30 16:31:04', '2022-12-13 16:49:40');
INSERT INTO `module_articles_categories` VALUES (9, 'Liên hệ', 'lien-he', NULL, 0, b'0', NULL, 1, 1, 0, 1, 20, 0, NULL, '2022-03-30 16:31:13', '2022-12-14 15:49:41');
INSERT INTO `module_articles_categories` VALUES (82, 'Cơ cấu tổ chức', 'co-cau-to-chuc', NULL, 0, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-11-30 00:52:50', '2022-12-13 16:42:49');
INSERT INTO `module_articles_categories` VALUES (84, 'Ban giám hiệu', 'ban-giam-hieu', NULL, 82, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-11-30 00:53:38', '2022-12-13 16:43:14');
INSERT INTO `module_articles_categories` VALUES (85, 'Công đoàn cơ sở', 'cong-doan-co-so', NULL, 82, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-11-30 00:53:46', '2022-12-13 16:43:32');
INSERT INTO `module_articles_categories` VALUES (86, 'Đoàn - Đội', 'doan-doi', NULL, 82, b'0', NULL, 1, 1, 0, 1, 3, 0, NULL, '2022-11-30 00:53:52', '2022-12-13 16:43:53');
INSERT INTO `module_articles_categories` VALUES (87, 'Hoạt động của Trường', 'hoat-dong-cua-truong', NULL, 8, b'0', NULL, 2, 1, 0, 1, 1, 0, NULL, '2022-11-30 00:54:28', '2022-12-14 10:22:18');
INSERT INTO `module_articles_categories` VALUES (88, 'Hoạt động Công đoàn', 'hoat-dong-cong-doan', NULL, 8, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-11-30 12:54:27', '2022-12-14 10:22:32');
INSERT INTO `module_articles_categories` VALUES (89, 'Hoạt động Đoàn - Đội', 'hoat-dong-doan-doi', NULL, 8, b'0', NULL, 1, 1, 0, 1, 3, 0, NULL, '2022-11-30 12:55:58', '2022-12-14 10:22:54');
INSERT INTO `module_articles_categories` VALUES (97, 'Hoạt động chuyên môn', 'hoat-dong-chuyen-mon', NULL, 8, b'0', NULL, 1, 1, 0, 1, 4, 0, NULL, '2022-11-30 16:11:37', '2022-12-14 10:23:06');
INSERT INTO `module_articles_categories` VALUES (98, 'Thông báo Phòng', 'thong-bao-phong', NULL, 8, b'0', NULL, 1, 1, 0, 1, 5, 0, NULL, '2022-11-30 16:12:26', '2022-12-14 10:24:04');
INSERT INTO `module_articles_categories` VALUES (99, 'Tin tức từ Phòng', 'tin-tuc-tu-phong', NULL, 8, b'0', NULL, 1, 1, 0, 1, 6, 0, NULL, '2022-11-30 16:13:00', '2022-12-14 10:24:18');
INSERT INTO `module_articles_categories` VALUES (100, 'Thông báo từ Sở', 'thong-bao-tu-so', NULL, 8, b'0', NULL, 1, 1, 0, 1, 7, 0, NULL, '2022-11-30 16:13:23', '2022-12-14 10:24:37');
INSERT INTO `module_articles_categories` VALUES (101, 'Tin tức từ Sở', 'tin-tuc-tu-so', NULL, 8, b'0', NULL, 1, 1, 0, 1, 8, 0, NULL, '2022-11-30 16:14:12', '2022-12-14 10:24:44');
INSERT INTO `module_articles_categories` VALUES (102, 'Kế hoạch giáo dục', 'ke-hoach-giao-duc', NULL, 0, b'0', NULL, 1, 1, 0, 1, 3, 0, NULL, '2022-11-30 16:15:06', '2022-12-13 16:46:21');
INSERT INTO `module_articles_categories` VALUES (103, 'Thời khóa biểu', 'thoi-khoa-bieu', NULL, 102, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-11-30 16:15:30', '2022-12-13 16:46:57');
INSERT INTO `module_articles_categories` VALUES (104, 'Thi kiểm tra', 'thi-kiem-tra', NULL, 102, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-11-30 16:15:55', '2022-12-13 16:47:00');
INSERT INTO `module_articles_categories` VALUES (106, 'Văn bản', 'van-ban', NULL, 0, b'0', NULL, 1, 1, 0, 1, 4, 0, NULL, '2022-11-30 16:19:35', '2022-12-13 16:49:14');
INSERT INTO `module_articles_categories` VALUES (116, 'Tài nguyên', 'tai-nguyen', NULL, 0, b'0', NULL, 1, 1, 0, 1, 6, 0, NULL, '2022-11-30 16:30:16', '2022-12-14 16:35:15');
INSERT INTO `module_articles_categories` VALUES (122, 'Thư viện ảnh', 'thu-vien-anh', NULL, 116, b'0', NULL, 1, 1, 0, 1, 2, 0, 2, '2022-11-30 16:33:18', '2022-12-14 10:46:29');
INSERT INTO `module_articles_categories` VALUES (123, 'Video Clip', 'video-clip', NULL, 116, b'0', NULL, 1, 1, 0, 1, 3, 1, 3, '2022-11-30 16:33:38', '2022-12-14 10:46:21');
INSERT INTO `module_articles_categories` VALUES (138, 'Tổ văn phòng', 'to-van-phong', NULL, 82, b'0', NULL, 1, 1, 0, 1, 4, 0, NULL, '2022-12-13 16:44:04', '2022-12-13 16:44:25');
INSERT INTO `module_articles_categories` VALUES (139, 'Tổ chuyên môn', 'to-chuyen-mon', NULL, 82, b'0', NULL, 1, 1, 0, 1, 5, 0, NULL, '2022-12-13 16:44:21', '2022-12-13 16:44:27');
INSERT INTO `module_articles_categories` VALUES (140, 'Ban đại diện cha mẹ học sinh', 'ban-dai-dien-cha-me-hoc-sinh', NULL, 82, b'0', NULL, 1, 1, 0, 1, 6, 0, NULL, '2022-12-13 16:44:57', '2022-12-13 16:45:02');
INSERT INTO `module_articles_categories` VALUES (141, 'Lịch công tác tuần BGH', 'lich-cong-tac-tuan-bgh', NULL, 8, b'0', NULL, 1, 1, 0, 1, 9, 0, NULL, '2022-12-14 10:25:07', '2022-12-14 10:26:58');
INSERT INTO `module_articles_categories` VALUES (142, 'Công khai theo TT36', 'cong-khai-theo-tt36', NULL, 8, b'0', NULL, 1, 1, 0, 1, 10, 0, NULL, '2022-12-14 10:25:20', '2022-12-14 10:27:09');
INSERT INTO `module_articles_categories` VALUES (143, 'Kế hoạch Năm - Tháng', 'ke-hoach-nam-thang', NULL, 8, b'0', NULL, 1, 1, 0, 1, 11, 0, NULL, '2022-12-14 10:25:35', '2022-12-14 10:27:15');
INSERT INTO `module_articles_categories` VALUES (144, 'Thông báo', 'thong-bao', NULL, 8, b'0', NULL, 1, 1, 0, 1, 12, 0, NULL, '2022-12-14 10:25:51', '2022-12-14 10:27:26');
INSERT INTO `module_articles_categories` VALUES (145, 'Hoạt động NGLL', 'hoat-dong-ngll', NULL, 8, b'0', NULL, 1, 1, 0, 1, 13, 0, NULL, '2022-12-14 10:26:00', '2022-12-14 10:27:35');
INSERT INTO `module_articles_categories` VALUES (146, 'Công tác Nội trú', 'cong-tac-noi-tru', NULL, 8, b'0', NULL, 1, 1, 0, 1, 14, 0, NULL, '2022-12-14 10:26:16', '2022-12-14 10:27:43');
INSERT INTO `module_articles_categories` VALUES (147, 'Ban đại diện CMHS', 'ban-dai-dien-cmhs', NULL, 8, b'0', NULL, 1, 1, 0, 1, 15, 0, NULL, '2022-12-14 10:26:26', '2022-12-14 10:27:51');
INSERT INTO `module_articles_categories` VALUES (148, 'Hoạt động tổ Hóa - Sinh - Công nghệ - Thể dục', 'hoat-dong-to-hoa-sinh-cong-nghe-the-duc', NULL, 97, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-12-14 10:28:41', '2022-12-14 10:29:25');
INSERT INTO `module_articles_categories` VALUES (149, 'Hoạt động tổ Toán - Lý - Tin', 'hoat-dong-to-toan-ly-tin', NULL, 97, b'0', NULL, 1, 1, 0, 1, 3, 0, NULL, '2022-12-14 10:28:58', '2022-12-14 10:29:35');
INSERT INTO `module_articles_categories` VALUES (150, 'Hoạt động tổ Xã hội', 'hoat-dong-to-xa-hoi', NULL, 97, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-12-14 10:29:08', '2022-12-14 10:29:30');
INSERT INTO `module_articles_categories` VALUES (151, 'Đề thi - Kiểm tra', 'de-thi-kiem-tra', NULL, 116, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-12-14 10:44:35', '2022-12-14 10:45:57');
INSERT INTO `module_articles_categories` VALUES (152, 'Bài giảng điện tử', 'bai-giang-dien-tu', NULL, 116, b'0', NULL, 1, 1, 0, 1, 4, 0, NULL, '2022-12-14 10:45:03', '2022-12-14 10:46:38');
INSERT INTO `module_articles_categories` VALUES (153, 'Giáo án mẫu', 'giao-an-mau', NULL, 116, b'0', NULL, 1, 1, 0, 1, 5, 0, NULL, '2022-12-14 10:45:11', '2022-12-14 10:46:44');
INSERT INTO `module_articles_categories` VALUES (154, 'Phần mềm', 'phan-mem', NULL, 116, b'0', NULL, 1, 1, 0, 1, 6, 0, NULL, '2022-12-14 10:45:27', '2022-12-14 10:46:53');
INSERT INTO `module_articles_categories` VALUES (155, 'Đề tài, SK- KN', 'de-tai-sk-kn', NULL, 116, b'0', NULL, 1, 1, 0, 1, 7, 0, NULL, '2022-12-14 10:45:30', '2022-12-14 10:46:58');
INSERT INTO `module_articles_categories` VALUES (156, 'Đề thi', 'de-thi', NULL, 151, b'0', NULL, 1, 1, 0, 1, 1, 0, NULL, '2022-12-14 10:47:07', '2022-12-14 10:47:26');
INSERT INTO `module_articles_categories` VALUES (157, 'Đề kiểm tra', 'de-kiem-tra', NULL, 151, b'0', NULL, 1, 1, 0, 1, 2, 0, NULL, '2022-12-14 10:47:12', '2022-12-14 10:47:32');
INSERT INTO `module_articles_categories` VALUES (158, 'Kỹ năng sống', 'ky-nang-song', NULL, 0, b'0', NULL, 1, 1, 0, 0, NULL, 1, 0, '2022-12-14 16:34:57', '2022-12-14 16:34:57');

-- ----------------------------
-- Table structure for module_banner_footers
-- ----------------------------
DROP TABLE IF EXISTS `module_banner_footers`;
CREATE TABLE `module_banner_footers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_default` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `show_from_date` timestamp(0) NULL DEFAULT NULL,
  `show_to_date` timestamp(0) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_banner_footers
-- ----------------------------
INSERT INTO `module_banner_footers` VALUES (1, 'Banner', '1', '1', '1', NULL, NULL, '<img alt=\"\" src=\"/upload/photos/1/banner/banner.png\" style=\"height:18%; width:100%\" />', '2022-08-17 11:02:11', '2022-12-02 09:19:16');
INSERT INTO `module_banner_footers` VALUES (2, 'Footer', '1', '1', '2', NULL, NULL, '<div class=\"d-flex\" style=\"background: #dfecff;padding: 20px;\">\r\n<div class=\"col-md-8\">\r\n<p style=\"text-align:center\"><strong>ĐƠN VỊ CHỦ QUẢN: Phòng GD&amp;ĐT Huyện Mỹ Tú</strong></p>\r\n\r\n<p style=\"text-align:center\">Địa chỉ: Đường Hùng Vương, ấp Cầu Đồn,TT Huỳnh Hữu Nghĩa, Mỹ Tú, Sóc Trăng.</p>\r\n\r\n<p style=\"text-align:center\">Điện thoại: 02993 871 040&nbsp; -&nbsp;Fax:&nbsp;&nbsp;-&nbsp;Email: pgdmytu@soctrang.edu.vn</p>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"fb-page\" data-href=\"https://www.facebook.com/pgdmytu\" data-tabs=\"\" data-width=\"\" data-height=\"\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"true\"><blockquote cite=\"https://www.facebook.com/pgdmytu\" class=\"fb-xfbml-parse-ignore\"><a href=\"https://www.facebook.com/pgdmytu\">Ngành Giáo dục huyện Mỹ Tú</a></blockquote></div>\r\n</div>\r\n</div>', '2022-08-17 13:54:51', '2022-12-05 09:21:22');

-- ----------------------------
-- Table structure for module_contacts
-- ----------------------------
DROP TABLE IF EXISTS `module_contacts`;
CREATE TABLE `module_contacts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `numberphone` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_contacts
-- ----------------------------
INSERT INTO `module_contacts` VALUES (13, 'sad3', 2147483647, 'dsa', NULL, 0, NULL, '2022-08-30 10:34:40', '2022-08-30 10:35:39');

-- ----------------------------
-- Table structure for module_image_libraries
-- ----------------------------
DROP TABLE IF EXISTS `module_image_libraries`;
CREATE TABLE `module_image_libraries`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of module_image_libraries
-- ----------------------------
INSERT INTO `module_image_libraries` VALUES (33, 'Phát quà cho học sinh ngày hội \"THẮP SÁNG ưỚC MƠ TUỔI TRẺ VIỆT NAM\" LẦN VII- NĂM 2018', NULL, 1, '2022-03-30 15:50:46', '2022-12-01 22:15:09');
INSERT INTO `module_image_libraries` VALUES (39, 'Khu di tích lịch sử Mỹ Phước', NULL, 1, '2022-12-01 22:15:37', '2022-12-01 22:15:40');
INSERT INTO `module_image_libraries` VALUES (40, 'Ngày hội \"THẮP SÁNG ưỚC MƠ TUỔI TRẺ VIỆT NAM\" LẦN VII- NĂM 2018', NULL, 1, '2022-12-01 22:16:11', '2022-12-01 22:16:11');

-- ----------------------------
-- Table structure for module_rules_of_laws
-- ----------------------------
DROP TABLE IF EXISTS `module_rules_of_laws`;
CREATE TABLE `module_rules_of_laws`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_id` smallint(5) UNSIGNED NOT NULL,
  `type_id` smallint(5) UNSIGNED NOT NULL,
  `organization_id` smallint(5) UNSIGNED NOT NULL,
  `signor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `date_issue` date NULL DEFAULT NULL,
  `date_effect` date NOT NULL,
  `file` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_rules_of_laws
-- ----------------------------
INSERT INTO `module_rules_of_laws` VALUES (5, '1910/UBND-VX', 'Tạm hoãn việc thu học phí học sinh công lập năm học 2022 - 2023', 1, 1, 14, 'Trần Văn Lâu', '2022-08-30', '2022-08-29', '1910_UBND_VX_29_8_2022_SH_20220830075757927920_1signed515_2955a.pdf', '/upload/document/steeringdocument/zJ57_1910_UBND_VX_29_8_2022_SH_20220830075757927920_1signed515_2955a.pdf');
INSERT INTO `module_rules_of_laws` VALUES (6, '2083/QĐ-UBND', 'QUYẾT ĐỊNH BAN HÀNH KẾ HOẠCH THỜI GIAN NĂM HỌC 2022 - 2023 CỦA UBND TỈNH SÓC TRĂNG', 1, 5, 14, 'Huỳnh Thị Diễm Ngọc', '2022-08-12', '2022-08-12', 'FILE_20220812_095120_FILE_20220812_094617_20220812094114682680_PVX_QD_Ke_hoach_thoi_gian_nam_hoc_2022-2023-re_20220811102840840840_1signed516_2signed390_3signedsim20220811050743_4signed643_5signed928_b96af.pdf', '/upload/document/steeringdocument/aSkY_FILE_20220812_095120_FILE_20220812_094617_20220812094114682680_PVX_QD_Ke_hoach_thoi_gian_nam_hoc_2022-2023-re_20220811102840840840_1signed516_2signed390_3signedsim20220811050743_4signed643_5signed928_b96af.pdf');

-- ----------------------------
-- Table structure for module_school_timetables
-- ----------------------------
DROP TABLE IF EXISTS `module_school_timetables`;
CREATE TABLE `module_school_timetables`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_school_timetables
-- ----------------------------

-- ----------------------------
-- Table structure for module_schools
-- ----------------------------
DROP TABLE IF EXISTS `module_schools`;
CREATE TABLE `module_schools`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of module_schools
-- ----------------------------
INSERT INTO `module_schools` VALUES (32, 'Trường Mẫu giáo Hưng Phú', 1, 'http://mghungphu.pgdmytu.edu.vn/', '0', 1, '2022-12-05 23:37:32', '2022-12-06 00:05:11');
INSERT INTO `module_schools` VALUES (33, 'Trường Mẫu giáo Long Hưng', 1, 'http://mglonghung.pgdmytu.edu.vn/', '1', 1, '2022-12-05 23:45:26', '2022-12-05 23:49:38');
INSERT INTO `module_schools` VALUES (34, 'Trường Mẫu giáo Mỹ Phước', 1, 'http://mgmyphuoc.pgdmytu.edu.vn/', '2', 1, '2022-12-05 23:45:37', '2022-12-05 23:49:41');
INSERT INTO `module_schools` VALUES (35, 'Trường Mẫu giáo Mỹ Thuận', 1, 'http://mgmythuan.pgdmytu.edu.vn/', '3', 1, '2022-12-05 23:45:51', '2022-12-05 23:49:44');
INSERT INTO `module_schools` VALUES (36, 'Trường Mẫu giáo Mỹ Tú', 1, 'http://mgmytu.pgdmytu.edu.vn/', '4', 1, '2022-12-05 23:46:00', '2022-12-05 23:49:49');
INSERT INTO `module_schools` VALUES (37, 'Trường Mẫu giáo Phú Mỹ', 1, 'http://mgphumy.pgdmytu.edu.vn/', '5', 1, '2022-12-05 23:46:12', '2022-12-06 00:05:16');
INSERT INTO `module_schools` VALUES (38, 'Trường Mầm non Huỳnh Hữu Nghĩa', 1, 'http://mnhuynhhuunghia.pgdmytu.edu.vn/', '6', 1, '2022-12-05 23:46:25', '2022-12-05 23:49:19');
INSERT INTO `module_schools` VALUES (39, 'Trường Mầm non Thuận Hưng', 1, 'http://mnthuanhung.pgdmytu.edu.vn/', '7', 1, '2022-12-05 23:47:07', '2022-12-06 00:51:15');
INSERT INTO `module_schools` VALUES (40, 'Trường Mầm non Mỹ Hương', 1, 'http://mnmyhuong.pgdmytu.edu.vn/', '8', 1, '2022-12-05 23:47:22', '2022-12-05 23:48:58');
INSERT INTO `module_schools` VALUES (41, 'Trường TH A Huỳnh Hữu Nghĩa', 2, 'http://thahuynhhuunghia.pgdmytu.edu.vn/', '9', 1, '2022-12-05 23:52:30', '2022-12-05 23:52:30');
INSERT INTO `module_schools` VALUES (42, 'Trường TH B Huỳnh Hữu Nghĩa', 2, 'http://thbhuynhhuunghia.pgdmytu.edu.vn/', '10', 1, '2022-12-05 23:52:43', '2022-12-05 23:52:43');
INSERT INTO `module_schools` VALUES (43, 'Trường TH Hưng Phú A', 2, 'http://thhungphua.pgdmytu.edu.vn/', '11', 1, '2022-12-05 23:52:56', '2022-12-05 23:55:28');
INSERT INTO `module_schools` VALUES (44, 'Trường TH Hưng Phú B', 2, 'http://thhungphub.pgdmytu.edu.vn/', '12', 1, '2022-12-05 23:53:43', '2022-12-05 23:53:43');
INSERT INTO `module_schools` VALUES (45, 'Trường TH Long Hưng A', 2, 'http://thlonghunga.pgdmytu.edu.vn/', '13', 1, '2022-12-05 23:59:01', '2022-12-05 23:59:01');
INSERT INTO `module_schools` VALUES (46, 'Trường TH Long Hưng B', 2, 'http://thlonghungb.pgdmytu.edu.vn/', '14', 1, '2022-12-05 23:59:17', '2022-12-05 23:59:17');
INSERT INTO `module_schools` VALUES (47, 'Trường TH Long Hưng C', 2, 'http://thlonghungc.pgdmytu.edu.vn/', '15', 1, '2022-12-05 23:59:38', '2022-12-05 23:59:38');
INSERT INTO `module_schools` VALUES (48, 'Trường TH Mỹ Hương A', 2, 'http://thmyhuonga.pgdmytu.edu.vn/', '16', 1, '2022-12-05 23:59:50', '2022-12-05 23:59:50');
INSERT INTO `module_schools` VALUES (49, 'Trường TH Mỹ Phước A', 2, 'http://thmyphuoca.pgdmytu.edu.vn/', '17', 1, '2022-12-06 00:00:19', '2022-12-06 00:00:26');
INSERT INTO `module_schools` VALUES (50, 'Trường TH Mỹ Phước C', 2, 'http://thmyphuocc.pgdmytu.edu.vn/', '18', 1, '2022-12-06 00:01:18', '2022-12-06 00:02:21');
INSERT INTO `module_schools` VALUES (51, 'Trường TH Mỹ Phước D', 2, 'http://thmyphuocd.pgdmytu.edu.vn/', '19', 1, '2022-12-06 00:01:28', '2022-12-06 00:02:26');
INSERT INTO `module_schools` VALUES (52, 'Trường TH Mỹ Thuận A', 2, 'http://thmythuana.pgdmytu.edu.vn/', '20', 1, '2022-12-06 00:01:37', '2022-12-06 00:02:44');
INSERT INTO `module_schools` VALUES (53, 'Trường TH Mỹ Thuận B', 2, 'http://thmythuanb.pgdmytu.edu.vn/', '21', 1, '2022-12-06 00:01:48', '2022-12-06 00:02:48');
INSERT INTO `module_schools` VALUES (54, 'Trường TH Mỹ Tú A', 2, 'http://thmytua.pgdmytu.edu.vn/', '22', 1, '2022-12-06 00:03:01', '2022-12-06 00:03:01');
INSERT INTO `module_schools` VALUES (55, 'Trường TH Mỹ Tú B', 2, 'http://thmytub.pgdmytu.edu.vn/', '23', 1, '2022-12-06 00:03:14', '2022-12-06 00:03:14');
INSERT INTO `module_schools` VALUES (56, 'Trường TH Mỹ Tú C', 2, 'http://thmytuc.pgdmytu.edu.vn/', '24', 1, '2022-12-06 00:03:24', '2022-12-06 00:03:24');
INSERT INTO `module_schools` VALUES (57, 'Trường TH Phú Mỹ B', 2, 'http://thphumyb.pgdmytu.edu.vn/', '25', 1, '2022-12-06 00:03:34', '2022-12-06 00:03:34');
INSERT INTO `module_schools` VALUES (58, 'Trường TH Thuận Hưng A', 2, 'http://ththuanhunga.pgdmytu.edu.vn/', '26', 1, '2022-12-06 00:03:46', '2022-12-06 00:03:46');
INSERT INTO `module_schools` VALUES (59, 'Trường TH Thuận Hưng B', 2, 'http://ththuanhungb.pgdmytu.edu.vn/', '27', 1, '2022-12-06 00:05:46', '2022-12-06 00:05:46');
INSERT INTO `module_schools` VALUES (60, 'Trường TH Thuận Hưng C', 2, 'http://ththuanhungc.pgdmytu.edu.vn/', '28', 1, '2022-12-06 00:05:58', '2022-12-06 00:05:58');
INSERT INTO `module_schools` VALUES (61, 'Trường tiểu học Phú Mỹ C', 2, 'http://thphumyc.pgdmytu.edu.vn/', '29', 1, '2022-12-06 00:06:09', '2022-12-06 00:06:09');
INSERT INTO `module_schools` VALUES (62, 'Trường THCS DTNT Mỹ Tú', 3, 'http://thcsdtntmytu.pgdmytu.edu.vn/', '30', 1, '2022-12-06 00:07:27', '2022-12-06 00:07:27');
INSERT INTO `module_schools` VALUES (63, 'Trường THCS Huỳnh Hữu Nghĩa', 3, 'http://thcshuynhhuunghia.pgdmytu.edu.vn/', '31', 1, '2022-12-06 00:07:44', '2022-12-06 00:07:44');
INSERT INTO `module_schools` VALUES (64, 'Trường THCS Hưng Phú', 3, 'http://thcshungphu.pgdmytu.edu.vn/', '32', 1, '2022-12-06 00:07:55', '2022-12-06 00:07:55');
INSERT INTO `module_schools` VALUES (65, 'Trường THCS Mỹ Phước', 3, 'http://thcsmyphuoc.pgdmytu.edu.vn/', '33', 1, '2022-12-06 00:08:07', '2022-12-06 00:08:07');
INSERT INTO `module_schools` VALUES (66, 'Trường THCS Mỹ Phước A', 3, 'http://thcsmyphuoca.pgdmytu.edu.vn/', '34', 1, '2022-12-06 00:08:19', '2022-12-06 00:08:19');
INSERT INTO `module_schools` VALUES (67, 'Trường THCS Mỹ Tú', 3, 'http://thcsmytu.pgdmytu.edu.vn/', '35', 1, '2022-12-06 00:08:34', '2022-12-06 00:08:34');
INSERT INTO `module_schools` VALUES (68, 'Trường THCS Phú Mỹ', 3, 'http://thcsphumy.pgdmytu.edu.vn/', '36', 1, '2022-12-06 00:08:47', '2022-12-06 00:08:47');
INSERT INTO `module_schools` VALUES (69, 'Trường THCS Thuận Hưng', 3, 'http://thcsthuanhung.pgdmytu.edu.vn/', '37', 1, '2022-12-06 00:09:00', '2022-12-06 00:09:00');

-- ----------------------------
-- Table structure for module_steering_documents
-- ----------------------------
DROP TABLE IF EXISTS `module_steering_documents`;
CREATE TABLE `module_steering_documents`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_id` smallint(5) UNSIGNED NOT NULL,
  `type_id` smallint(5) UNSIGNED NOT NULL,
  `organization_id` smallint(5) UNSIGNED NOT NULL,
  `signor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `date_issue` date NULL DEFAULT NULL,
  `date_effect` date NOT NULL,
  `file` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_steering_documents
-- ----------------------------
INSERT INTO `module_steering_documents` VALUES (5, '98/SGDĐT-GDTrH', 'Hướng dẫn thực hiện nội dung giáo dục địa phương từ năm học 2021 - 2022', 1, 1, 4, NULL, NULL, '2022-01-18', 'Hướng dẫn thực hiện nội dung giáo dục địa phương từ năm học 2021 - 2022.pdf', '/upload/document/steeringdocument/IbBZ_Hướng dẫn thực hiện nội dung giáo dục địa phương từ năm học 2021 - 2022.pdf');
INSERT INTO `module_steering_documents` VALUES (6, '73/PGDĐT-VP', 'Tổ chức đón Tết Nguyên đán Mậu Tuất 2018 và thực hiện chế độ thông tin báo cáo', 1, 5, 11, 'Nguyễn Văn Giàu', '2018-01-24', '2018-01-24', '73_24_01_18_TochucdoanTetNguyendanMauTuatnam2018vaBC.pdf', '/upload/document/steeringdocument/uSgO_73_24_01_18_TochucdoanTetNguyendanMauTuatnam2018vaBC.pdf');
INSERT INTO `module_steering_documents` VALUES (7, '74/PGDĐT-NVTrH', 'Mời họp Trưởng đoàn và Tổ trọng tài HKPĐ lần thứ 34 năm 2018', 1, 5, 11, 'Lê Thanh Khởi', '2018-01-24', '2018-01-25', '74_24_01_18_moihoptruongdoanvatotrongtaoHKPD34nam2018.pdf', '/upload/document/steeringdocument/poPX_74_24_01_18_moihoptruongdoanvatotrongtaoHKPD34nam2018.pdf');

-- ----------------------------
-- Table structure for module_video_youtubes
-- ----------------------------
DROP TABLE IF EXISTS `module_video_youtubes`;
CREATE TABLE `module_video_youtubes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `check_new` tinyint(1) NOT NULL DEFAULT 0,
  `check_outstanding` tinyint(1) NOT NULL DEFAULT 0,
  `check_internal` tinyint(1) NOT NULL DEFAULT 0,
  `check_active` tinyint(1) NOT NULL DEFAULT 0,
  `show_from_date` timestamp(0) NULL DEFAULT NULL,
  `show_to_date` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_video_youtubes
-- ----------------------------
INSERT INTO `module_video_youtubes` VALUES (2, 'asd1', 'https://www.youtube.com/embed/GRJ55FuXug0', 'Đây là mô tả', 1, 0, 0, 0, 1, NULL, NULL, '2022-08-05 14:40:06', '2022-08-05 15:33:50');

-- ----------------------------
-- Table structure for module_visitors
-- ----------------------------
DROP TABLE IF EXISTS `module_visitors`;
CREATE TABLE `module_visitors`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `counter` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of module_visitors
-- ----------------------------
INSERT INTO `module_visitors` VALUES (1, 'today', 1, '2021-07-06 17:02:06', '2022-12-12 16:54:02');
INSERT INTO `module_visitors` VALUES (2, 'week', 5, '2021-07-06 17:02:06', '2022-12-14 14:24:36');
INSERT INTO `module_visitors` VALUES (3, 'month', 23, '2021-07-06 17:02:06', '2022-12-14 14:24:36');
INSERT INTO `module_visitors` VALUES (4, 'year', 23, '2021-07-06 17:02:06', '2022-12-14 14:24:36');
INSERT INTO `module_visitors` VALUES (5, 'total', 23, '2021-07-06 17:02:06', '2022-12-14 14:24:36');

-- ----------------------------
-- Table structure for module_website_links
-- ----------------------------
DROP TABLE IF EXISTS `module_website_links`;
CREATE TABLE `module_website_links`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of module_website_links
-- ----------------------------
INSERT INTO `module_website_links` VALUES (22, 'Hệ thống bài giảng điện tử', 'http://pgdmytu.edu.vn/elearning.pgdmytu.edu.vn', '2', '/upload/photos/1/link/elearning.jpg', 1, '2022-08-03 14:37:43', '2022-11-30 10:08:32');
INSERT INTO `module_website_links` VALUES (23, 'Hệ thống email @soctrang.edu.vn', 'https://accounts.google.com/AccountChooser/signinchooser?hd=soctrang.edu.vn&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&osid=1&service=mail&ss=1&ltmpl=default&flowName=GlifWebSignIn&flowEntry=AccountChooser', '1', '/upload/photos/1/link/mailst.jpg', 1, '2022-08-03 14:44:47', '2022-11-30 10:06:58');
INSERT INTO `module_website_links` VALUES (24, 'Hệ thống quản lý CSDL ngành', 'http://csdl.moet.gov.vn/', '0', '/upload/photos/1/link/ht-quan-ly-csdl-nganh.png', 1, '2022-11-30 10:06:17', '2022-11-30 10:06:17');
INSERT INTO `module_website_links` VALUES (25, 'Hệ thống quản lý trường học', 'https://login.smas.edu.vn/Account/LogOn', '3', '/upload/photos/1/link/quan-ly-truong.png', 1, '2022-11-30 10:08:57', '2022-11-30 10:08:57');
INSERT INTO `module_website_links` VALUES (26, 'Thủ tục hành chính', 'http://motcua.soctrang.gov.vn/thu-tuc-hanh-chinh', '4', '/upload/photos/1/link/dich-vu-cong50.png', 1, '2022-11-30 10:09:19', '2022-11-30 10:09:32');
INSERT INTO `module_website_links` VALUES (27, 'Quản lý Kiểm định chất lượng giáo dục', 'http://qa.eos.edu.vn/', '5', '/upload/photos/1/link/danh-gia-hanh-chinh16.png', 1, '2022-11-30 10:09:58', '2022-11-30 10:09:58');
INSERT INTO `module_website_links` VALUES (28, 'Hệ thống thông tin PCGD – CMC', 'http://duphong.pcgd.moet.gov.vn/nguoidung/dangnhap', '6', '/upload/photos/1/link/cmc2.png', 1, '2022-11-30 10:10:21', '2022-11-30 10:10:21');
INSERT INTO `module_website_links` VALUES (29, 'Trường học kết nối', 'http://viettelstudy.vn/', '7', '/upload/photos/1/link/truong-hoc-ket-noi.png', 1, '2022-11-30 10:10:41', '2022-11-30 10:10:41');
INSERT INTO `module_website_links` VALUES (30, 'Hệ thống văn phòng điện tử', 'http://vpdt.mytu.soctrang.gov.vn/Login.aspx', '8', '/upload/photos/1/link/vpdt.jpg', 1, '2022-11-30 10:11:05', '2022-11-30 10:11:05');
INSERT INTO `module_website_links` VALUES (31, 'Sở Giáo dục và Đào tạo', 'http://soctrang.edu.vn/', '0', NULL, 1, '2022-12-01 22:08:17', '2022-12-01 22:08:17');

-- ----------------------------
-- Table structure for partial_module_library_images
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_library_images`;
CREATE TABLE `partial_module_library_images`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `order` int(11) NULL DEFAULT 0,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `library_id` int(10) UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `library_id`(`library_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 246 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of partial_module_library_images
-- ----------------------------
INSERT INTO `partial_module_library_images` VALUES (241, 'syqy_IMG_5335__1_80.jfif', NULL, 0, '/upload/library/syqy_IMG_5335__1_80.jfif', 1, 33, NULL, '2022-12-01 22:15:18', '2022-12-01 22:15:18');
INSERT INTO `partial_module_library_images` VALUES (242, '60F3_IMG_533513.jfif', NULL, 0, '/upload/library/60F3_IMG_533513.jfif', 1, 33, NULL, '2022-12-01 22:15:18', '2022-12-01 22:15:18');
INSERT INTO `partial_module_library_images` VALUES (243, 'ww6c_IMG20180428085553.jpg', NULL, 0, '/upload/library/ww6c_IMG20180428085553.jpg', 1, 39, NULL, '2022-12-01 22:15:55', '2022-12-01 22:15:55');
INSERT INTO `partial_module_library_images` VALUES (244, 'Za5g_34563609_1959913494028372_6920816009062383616_n.jpg', NULL, 0, '/upload/library/Za5g_34563609_1959913494028372_6920816009062383616_n.jpg', 1, 40, NULL, '2022-12-01 22:16:50', '2022-12-01 22:16:50');
INSERT INTO `partial_module_library_images` VALUES (245, '5Dmw_logo-ioc.png', NULL, 0, '/upload/library/5Dmw_logo-ioc.png', 1, 33, NULL, '2022-12-02 01:10:47', '2022-12-02 01:10:47');

-- ----------------------------
-- Table structure for partial_module_rules_of_law_by_fields
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_rules_of_law_by_fields`;
CREATE TABLE `partial_module_rules_of_law_by_fields`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_rules_of_law_by_fields
-- ----------------------------
INSERT INTO `partial_module_rules_of_law_by_fields` VALUES (1, 'Giáo dục');

-- ----------------------------
-- Table structure for partial_module_rules_of_law_by_organizations
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_rules_of_law_by_organizations`;
CREATE TABLE `partial_module_rules_of_law_by_organizations`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_rules_of_law_by_organizations
-- ----------------------------
INSERT INTO `partial_module_rules_of_law_by_organizations` VALUES (4, 'Sở giáo dục và đào tạo');
INSERT INTO `partial_module_rules_of_law_by_organizations` VALUES (11, 'Phòng giáo dục và đào tạo');
INSERT INTO `partial_module_rules_of_law_by_organizations` VALUES (14, 'HĐND-UBND Huyện');

-- ----------------------------
-- Table structure for partial_module_rules_of_law_by_types
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_rules_of_law_by_types`;
CREATE TABLE `partial_module_rules_of_law_by_types`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_rules_of_law_by_types
-- ----------------------------
INSERT INTO `partial_module_rules_of_law_by_types` VALUES (1, 'Nghị định');
INSERT INTO `partial_module_rules_of_law_by_types` VALUES (5, 'Quyết định');

-- ----------------------------
-- Table structure for partial_module_steering_document_by_fields
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_steering_document_by_fields`;
CREATE TABLE `partial_module_steering_document_by_fields`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_steering_document_by_fields
-- ----------------------------
INSERT INTO `partial_module_steering_document_by_fields` VALUES (1, 'Giáo dục');

-- ----------------------------
-- Table structure for partial_module_steering_document_issued_by_organizations
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_steering_document_issued_by_organizations`;
CREATE TABLE `partial_module_steering_document_issued_by_organizations`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_steering_document_issued_by_organizations
-- ----------------------------
INSERT INTO `partial_module_steering_document_issued_by_organizations` VALUES (4, 'Sở giáo dục và đào tạo');
INSERT INTO `partial_module_steering_document_issued_by_organizations` VALUES (11, 'Phòng giáo dục và đào tạo');
INSERT INTO `partial_module_steering_document_issued_by_organizations` VALUES (12, 'HĐND-UBND Huyện');

-- ----------------------------
-- Table structure for partial_module_steering_document_of_types
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_steering_document_of_types`;
CREATE TABLE `partial_module_steering_document_of_types`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_steering_document_of_types
-- ----------------------------
INSERT INTO `partial_module_steering_document_of_types` VALUES (1, 'Nghị định');
INSERT INTO `partial_module_steering_document_of_types` VALUES (4, 'Quyết định');
INSERT INTO `partial_module_steering_document_of_types` VALUES (5, 'Công văn');

-- ----------------------------
-- Table structure for partial_module_tourism_destination_images
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_tourism_destination_images`;
CREATE TABLE `partial_module_tourism_destination_images`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `order` int(11) NULL DEFAULT 0,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `destination_id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `library_id`(`destination_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 252 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_tourism_destination_images
-- ----------------------------
INSERT INTO `partial_module_tourism_destination_images` VALUES (251, '1PzH_296608743_2264175733734585_8089597942686195209_n.jpg', NULL, 0, '/upload/tourisms/destination/1PzH_296608743_2264175733734585_8089597942686195209_n.jpg', 1, 83, NULL, '2022-08-04 15:29:20', '2022-08-04 15:29:20');

-- ----------------------------
-- Table structure for partial_module_video_youtube_categories
-- ----------------------------
DROP TABLE IF EXISTS `partial_module_video_youtube_categories`;
CREATE TABLE `partial_module_video_youtube_categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of partial_module_video_youtube_categories
-- ----------------------------
INSERT INTO `partial_module_video_youtube_categories` VALUES (1, 'sad232', '235', NULL, NULL, '2022-08-05 12:55:12', '2022-08-05 14:02:52');

-- ----------------------------
-- Table structure for sys_catalog_modules
-- ----------------------------
DROP TABLE IF EXISTS `sys_catalog_modules`;
CREATE TABLE `sys_catalog_modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_catalog_modules
-- ----------------------------
INSERT INTO `sys_catalog_modules` VALUES (1, 'Hệ thống tin tức');
INSERT INTO `sys_catalog_modules` VALUES (2, 'Tiện ích, Quảng cáo');

-- ----------------------------
-- Table structure for sys_function_of_controllers
-- ----------------------------
DROP TABLE IF EXISTS `sys_function_of_controllers`;
CREATE TABLE `sys_function_of_controllers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_module` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `method` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '1: GET; 2: Post',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_id_module`(`id_module`) USING BTREE,
  CONSTRAINT `sys_function_of_controllers_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `sys_list_modules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_function_of_controllers
-- ----------------------------
INSERT INTO `sys_function_of_controllers` VALUES (1, 'index', 2, 'Index, giao diện hiển thì khởi tạo đầu tiên của module', '1', NULL, '2022-02-14 03:08:44');
INSERT INTO `sys_function_of_controllers` VALUES (24, 'index', 24, NULL, '1', '2022-03-10 07:29:55', '2022-03-10 07:29:55');
INSERT INTO `sys_function_of_controllers` VALUES (25, 'ajax', 24, NULL, '2', '2022-03-10 09:29:34', '2022-03-10 09:29:34');
INSERT INTO `sys_function_of_controllers` VALUES (26, 'ajax', 2, NULL, '2', '2022-03-11 07:28:30', '2022-03-11 07:28:30');
INSERT INTO `sys_function_of_controllers` VALUES (27, 'index', 25, NULL, '1', '2022-03-24 09:31:07', '2022-03-24 09:31:07');
INSERT INTO `sys_function_of_controllers` VALUES (28, 'ajaxLibrary', 25, NULL, '2', '2022-03-24 09:31:13', '2022-03-24 10:17:47');
INSERT INTO `sys_function_of_controllers` VALUES (29, 'listArticles', 2, NULL, '2', '2022-03-24 11:02:20', '2022-03-24 11:02:20');
INSERT INTO `sys_function_of_controllers` VALUES (30, 'ajaxImageLibrary', 25, NULL, '2', '2022-03-28 23:25:58', '2022-03-28 23:25:58');
INSERT INTO `sys_function_of_controllers` VALUES (43, 'index', 31, NULL, '1', '2022-05-27 10:03:15', '2022-05-27 10:03:15');
INSERT INTO `sys_function_of_controllers` VALUES (44, 'ajax', 31, NULL, '2', '2022-05-27 10:04:41', '2022-05-27 10:04:41');
INSERT INTO `sys_function_of_controllers` VALUES (45, 'index', 32, NULL, '1', '2022-05-29 23:00:52', '2022-05-29 23:00:52');
INSERT INTO `sys_function_of_controllers` VALUES (46, 'ajax', 32, NULL, '2', '2022-05-29 23:00:56', '2022-05-29 23:00:58');
INSERT INTO `sys_function_of_controllers` VALUES (62, 'index', 38, NULL, '1', '2022-08-05 10:19:08', '2022-08-05 10:19:08');
INSERT INTO `sys_function_of_controllers` VALUES (63, 'ajax', 38, NULL, '2', '2022-08-05 10:19:12', '2022-08-05 10:19:12');
INSERT INTO `sys_function_of_controllers` VALUES (64, 'ajaxCategory', 38, NULL, '2', '2022-08-05 10:48:13', '2022-08-05 10:48:13');
INSERT INTO `sys_function_of_controllers` VALUES (65, 'index', 39, NULL, '1', '2022-08-10 09:09:13', '2022-08-10 09:09:13');
INSERT INTO `sys_function_of_controllers` VALUES (66, 'ajaxDocument', 39, NULL, '2', '2022-08-10 09:09:18', '2022-08-10 09:09:28');
INSERT INTO `sys_function_of_controllers` VALUES (67, 'ajaxPartial', 39, NULL, '2', '2022-08-10 09:09:40', '2022-08-11 10:36:44');
INSERT INTO `sys_function_of_controllers` VALUES (70, 'index', 40, NULL, '1', '2022-08-13 20:03:13', '2022-08-13 20:03:13');
INSERT INTO `sys_function_of_controllers` VALUES (71, 'ajax', 40, NULL, '2', '2022-08-13 20:03:17', '2022-08-13 20:03:17');
INSERT INTO `sys_function_of_controllers` VALUES (72, 'index', 41, NULL, '1', '2022-08-13 21:40:14', '2022-08-13 21:40:14');
INSERT INTO `sys_function_of_controllers` VALUES (73, 'ajax', 41, NULL, '2', '2022-08-13 21:40:18', '2022-08-13 21:40:18');
INSERT INTO `sys_function_of_controllers` VALUES (74, 'index', 42, NULL, '1', '2022-08-17 10:34:48', '2022-08-17 10:34:48');
INSERT INTO `sys_function_of_controllers` VALUES (75, 'ajax', 42, NULL, '2', '2022-08-17 10:34:52', '2022-08-17 10:34:52');
INSERT INTO `sys_function_of_controllers` VALUES (76, 'index', 43, NULL, '1', '2022-08-17 14:28:01', '2022-08-17 14:28:01');
INSERT INTO `sys_function_of_controllers` VALUES (77, 'ajax', 43, NULL, '2', '2022-08-17 14:28:04', '2022-08-17 14:28:04');
INSERT INTO `sys_function_of_controllers` VALUES (78, 'index', 44, NULL, '1', '2022-08-17 14:36:39', '2022-08-17 14:36:39');
INSERT INTO `sys_function_of_controllers` VALUES (79, 'ajax', 44, NULL, '2', '2022-08-17 14:36:43', '2022-08-17 14:36:43');
INSERT INTO `sys_function_of_controllers` VALUES (80, 'listArticles', 44, NULL, '2', '2022-08-17 14:36:49', '2022-08-17 14:36:49');
INSERT INTO `sys_function_of_controllers` VALUES (89, 'index', 48, NULL, '1', '2022-12-01 14:50:16', '2022-12-01 14:50:16');
INSERT INTO `sys_function_of_controllers` VALUES (90, 'ajaxDocument', 48, NULL, '2', '2022-12-01 14:50:21', '2022-12-01 14:50:21');
INSERT INTO `sys_function_of_controllers` VALUES (91, 'ajaxPartial', 48, NULL, '2', '2022-12-01 14:50:32', '2022-12-01 14:50:32');
INSERT INTO `sys_function_of_controllers` VALUES (92, 'index', 49, NULL, '1', '2022-12-05 23:24:38', '2022-12-05 23:24:38');
INSERT INTO `sys_function_of_controllers` VALUES (93, 'ajax', 49, NULL, '2', '2022-12-05 23:24:42', '2022-12-05 23:24:42');

-- ----------------------------
-- Table structure for sys_function_permissions_according_to_users
-- ----------------------------
DROP TABLE IF EXISTS `sys_function_permissions_according_to_users`;
CREATE TABLE `sys_function_permissions_according_to_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `function_permissions` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_function_permissions_according_to_users
-- ----------------------------
INSERT INTO `sys_function_permissions_according_to_users` VALUES (1, 1, '1,2,3,4,5,6', 'view');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (2, 1, '1,2,3,4,5,6', 'edit');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (3, 1, '1,2,3,4,5,6', 'delete');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (7, 4, '1,2,3,4', 'view');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (8, 4, '1,2,3,4', 'edit');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (9, 4, '1,2,3,4', 'delete');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (10, 5, '2', 'view');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (11, 5, NULL, 'edit');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (12, 5, '2', 'delete');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (13, 6, '1', 'view');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (14, 6, '1,2', 'edit');
INSERT INTO `sys_function_permissions_according_to_users` VALUES (15, 6, '3', 'delete');

-- ----------------------------
-- Table structure for sys_groups_modules
-- ----------------------------
DROP TABLE IF EXISTS `sys_groups_modules`;
CREATE TABLE `sys_groups_modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_groups_modules
-- ----------------------------
INSERT INTO `sys_groups_modules` VALUES (1, 'Hệ thống tin tức', 0);
INSERT INTO `sys_groups_modules` VALUES (6, 'Thư viện đa phương tiện', 1);
INSERT INTO `sys_groups_modules` VALUES (7, 'Bất động sản', 4);
INSERT INTO `sys_groups_modules` VALUES (8, 'Nông nghiệp', 5);
INSERT INTO `sys_groups_modules` VALUES (9, 'Tiện ích', 2);
INSERT INTO `sys_groups_modules` VALUES (10, 'Ẩm thực', 6);
INSERT INTO `sys_groups_modules` VALUES (11, 'Du lịch', 7);
INSERT INTO `sys_groups_modules` VALUES (12, 'Hệ thống văn bản', 8);
INSERT INTO `sys_groups_modules` VALUES (13, 'Sàn đấu giá', 3);
INSERT INTO `sys_groups_modules` VALUES (14, 'Trường học', 7);

-- ----------------------------
-- Table structure for sys_guest_layouts
-- ----------------------------
DROP TABLE IF EXISTS `sys_guest_layouts`;
CREATE TABLE `sys_guest_layouts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_guest_layouts
-- ----------------------------
INSERT INTO `sys_guest_layouts` VALUES (1, 'Top-OneColumn-Footer', '/assets/administration/mainstructure/img/layout/1Column.png', NULL);
INSERT INTO `sys_guest_layouts` VALUES (2, 'Top-TwoColumn-Footer', '/assets/administration/mainstructure/img/layout/2column.png', NULL);
INSERT INTO `sys_guest_layouts` VALUES (3, 'Top-ThreeColumn-Footer', '/assets/administration/mainstructure/img/layout/UIPanelTopLeftRightBottom.png', NULL);

-- ----------------------------
-- Table structure for sys_guest_layouts_columns
-- ----------------------------
DROP TABLE IF EXISTS `sys_guest_layouts_columns`;
CREATE TABLE `sys_guest_layouts_columns`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `column` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_guest_layouts_columns
-- ----------------------------
INSERT INTO `sys_guest_layouts_columns` VALUES (1, 'Một cột', '1', NULL);
INSERT INTO `sys_guest_layouts_columns` VALUES (2, 'Hai cột', '2', NULL);
INSERT INTO `sys_guest_layouts_columns` VALUES (3, 'Ba cột', '3', NULL);
INSERT INTO `sys_guest_layouts_columns` VALUES (4, 'Bốn cột', '4', NULL);
INSERT INTO `sys_guest_layouts_columns` VALUES (5, 'Năm cột', '5', NULL);
INSERT INTO `sys_guest_layouts_columns` VALUES (6, 'Sáu cột', '6', NULL);

-- ----------------------------
-- Table structure for sys_guest_page_controls
-- ----------------------------
DROP TABLE IF EXISTS `sys_guest_page_controls`;
CREATE TABLE `sys_guest_page_controls`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `row_id` int(11) NULL DEFAULT NULL COMMENT 'Row number',
  `column_id` int(11) NOT NULL COMMENT 'Column number',
  `position_id` int(11) NOT NULL COMMENT 'TopContent: 1; MiddleContent: 2; BottomContent: 3',
  `page_layout_id` int(11) NOT NULL,
  `config` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_guest_page_controls
-- ----------------------------
INSERT INTO `sys_guest_page_controls` VALUES (1, 42, NULL, 1, 1, 1, NULL);

-- ----------------------------
-- Table structure for sys_guest_pages
-- ----------------------------
DROP TABLE IF EXISTS `sys_guest_pages`;
CREATE TABLE `sys_guest_pages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `layout_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_guest_pages
-- ----------------------------
INSERT INTO `sys_guest_pages` VALUES (1, 'Trang chủ', '/', 1);

-- ----------------------------
-- Table structure for sys_list_modules
-- ----------------------------
DROP TABLE IF EXISTS `sys_list_modules`;
CREATE TABLE `sys_list_modules`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `path_controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `path_view` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` int(11) NOT NULL COMMENT '1: Admin Interface;\r\n2: Guest Interface',
  `order` int(11) NOT NULL DEFAULT 0,
  `id_group` int(11) NOT NULL,
  `content_config` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `foreign_key_module_group`(`id_group`) USING BTREE,
  CONSTRAINT `sys_list_modules_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `sys_groups_modules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_list_modules
-- ----------------------------
INSERT INTO `sys_list_modules` VALUES (2, 'Quản lý bài viết', 'quan-ly-bai-viet', 'Modules\\AIArticles\\AIArticlesController', 'modules.AIArticle', 1, 1, 1, NULL, '/upload/icon/module/AIArticles.png', NULL, '2022-08-30 16:53:46', 'AIArticles', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (24, 'Quản lý chuyên mục', 'quan-ly-chuyen-muc', 'Modules\\AIArticlesCategory\\AIArticlesCategoryController', 'modules.AIArticlesCategory', 1, 0, 1, NULL, '/upload/icon/module/AIArticlesCategory.png', '2022-03-10 07:28:40', '2022-08-30 16:54:00', 'AIArticlesCategory', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (25, 'Quản lý thư viện ảnh', 'quan-ly-thu-vien-anh', 'Modules\\AIImageLibraries\\AIImageLibrariesController', 'modules.AIImageLibraries', 1, 0, 6, NULL, '/upload/icon/module/AIImageLibraries.png', '2022-03-24 09:23:49', '2022-08-30 16:58:45', 'AIImageLibraries', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (31, 'Quản lý liên hệ', 'quan-ly-lien-he', 'Modules\\AIContact\\AIContactController', 'modules.AIContact', 1, 0, 9, NULL, '/upload/icon/module/AIContact.png', '2022-05-27 10:01:30', '2022-08-30 17:05:44', 'AIContact', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (32, 'Quản lý liên kết website', 'quan-ly-lien-ket-website', 'Modules\\AIWebsiteLinks\\AIWebsiteLinksController', 'modules.AIWebsiteLinks', 1, 1, 9, NULL, '/upload/icon/module/AIWebsiteLinks.png', '2022-05-29 23:00:26', '2022-08-30 17:05:50', 'AIWebsiteLinks', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (38, 'Quản lý video Youtube', 'quan-ly-video-youtube', 'Modules\\AIVideoYoutube\\AIVideoYoutubeController', 'modules.AIVideoYoutube', 1, 2, 6, NULL, '/upload/icon/module/AIVideoYoutube.png', '2022-08-05 10:17:41', '2022-08-30 16:59:15', 'AIVideoYoutube', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (39, 'Quản lý văn bản điều hành', 'quan-ly-van-ban-dieu-hanh', 'Modules\\AISteeringDocument\\AISteeringDocumentController', 'modules.AISteeringDocument', 1, 0, 12, NULL, '/upload/icon/module/AISteeringDocument.png', '2022-08-09 17:28:14', '2022-08-30 17:04:23', 'AISteeringDocument', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (40, 'Phân quyền quản lý bài viết', 'phan-quyen-quan-ly-bai-viet', 'Modules\\AIArticleByMenu\\AIArticleByMenuController', 'modules.AIArticleByMenu', 1, 3, 1, NULL, '/upload/icon/module/AIArticleByMenu.png', '2022-08-13 20:03:01', '2022-08-30 16:54:06', 'AIArticleByMenu', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (41, 'Quản lý thời khóa biểu', 'quan-ly-thoi-khoa-bieu', 'Modules\\AISchoolTimetable\\AISchoolTimetableController', 'modules.AISchoolTimetable', 1, 3, 9, NULL, '/upload/icon/module/AISchoolTimetable.png', '2022-08-13 21:39:58', '2022-08-30 17:02:41', 'AISchoolTimetable', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (42, 'Quản lý Banner Footer', 'quan-ly-banner-footer', 'Modules\\AIBannerFooter\\AIBannerFooterController', 'modules.AIBannerFooter', 1, 0, 9, NULL, '/upload/icon/module/AIBannerFooter.png', '2022-08-17 10:34:22', '2022-08-30 17:02:51', 'AIBannerFooter', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (43, 'Quản lý quảng cáo', 'quan-ly-quang-cao', 'Modules\\AIAdvertisement\\AIAdvertisementController', 'modules.AIAdvertisement', 1, 3, 9, NULL, '/upload/icon/module/AIAdvertisement.png', '2022-08-17 14:27:17', '2022-08-30 17:08:06', 'AIAdvertisement', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (44, 'Quản lý bài viết theo phân quyền', 'quan-ly-bai-viet-theo-phan-quyen', 'Modules\\AIArticlesByPermission\\AIArticlesByPermissionController', 'modules.AIArticlesByPermission', 1, 4, 1, NULL, '/upload/icon/module/AIArticlesByPermission.png', '2022-08-17 14:36:21', '2022-11-28 16:05:42', 'AIArticlesByPermission', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (48, 'Quản lý văn bản quy phạm pháp luật', 'quan-ly-van-ban-quy-pham-phap-luat', 'Modules\\AIRulesOfLaw\\AIRulesOfLawController', 'modules.AIRulesOfLaw', 1, 1, 12, NULL, '/upload/icon/module/AIRulesOfLaw.png', '2022-12-01 14:32:45', '2022-12-01 14:49:29', 'AIRulesOfLaw', NULL, 1);
INSERT INTO `sys_list_modules` VALUES (49, 'Quản lý danh sách trường học', 'quan-ly-danh-sach-truong-hoc', 'Modules\\AISchools\\AISchoolsController', 'modules.AISchools', 1, 0, 14, NULL, '/upload/icon/module/AISchoolsController.png', '2022-12-05 23:22:33', '2022-12-05 23:28:32', 'AISchools', NULL, 1);

-- ----------------------------
-- Table structure for sys_logs
-- ----------------------------
DROP TABLE IF EXISTS `sys_logs`;
CREATE TABLE `sys_logs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 598 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_logs
-- ----------------------------
INSERT INTO `sys_logs` VALUES (98, 'Đăng nhập', 'Đăng nhập thành công', 1, 'Tài khoản: admin', '2022-07-01 15:02:30', '2022-07-01 15:02:30');
INSERT INTO `sys_logs` VALUES (99, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-01 15:04:05', '2022-07-01 15:04:05');
INSERT INTO `sys_logs` VALUES (100, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-01 15:07:45', '2022-07-01 15:07:45');
INSERT INTO `sys_logs` VALUES (101, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-01 15:07:58', '2022-07-01 15:07:58');
INSERT INTO `sys_logs` VALUES (102, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 1, 'Doanh nghiệpsad', '2022-07-01 15:08:42', '2022-07-01 15:08:42');
INSERT INTO `sys_logs` VALUES (103, 'Doanh nghiệp nông nghiệp', 'Sửa', 1, 'Doanh nghiệpdoanh nghiệp abc', '2022-07-01 15:10:58', '2022-07-01 15:10:58');
INSERT INTO `sys_logs` VALUES (104, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-01 15:15:22', '2022-07-01 15:15:22');
INSERT INTO `sys_logs` VALUES (105, 'Doanh nghiệp nông nghiệp', 'Sửa', 4, 'Doanh nghiệpdoanh nghiệp abc1', '2022-07-01 15:50:44', '2022-07-01 15:50:44');
INSERT INTO `sys_logs` VALUES (106, 'Doanh nghiệp nông nghiệp', 'Xoá', 4, 'Doanh nghiệpa', '2022-07-01 15:52:17', '2022-07-01 15:52:17');
INSERT INTO `sys_logs` VALUES (107, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-01 16:38:41', '2022-07-01 16:38:41');
INSERT INTO `sys_logs` VALUES (108, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-01 16:45:01', '2022-07-01 16:45:01');
INSERT INTO `sys_logs` VALUES (109, 'Sản phẩm nông nghiệp', 'Thêm mới', 4, 'Sản phẩm: 1111111', '2022-07-01 16:45:20', '2022-07-01 16:45:20');
INSERT INTO `sys_logs` VALUES (110, 'Sản phẩm nông nghiệp', 'Sửa', 4, 'Sản phẩm: TTT2', '2022-07-01 16:45:57', '2022-07-01 16:45:57');
INSERT INTO `sys_logs` VALUES (111, 'Sản phẩm nông nghiệp', 'Xoá', 4, 'Sản phẩm: 23', '2022-07-01 16:46:02', '2022-07-01 16:46:02');
INSERT INTO `sys_logs` VALUES (112, 'Sản phẩm nông nghiệp', 'Thêm mới', 4, 'Sản phẩm: 1122223333', '2022-07-01 16:49:34', '2022-07-01 16:49:34');
INSERT INTO `sys_logs` VALUES (113, 'Sản phẩm nông nghiệp', 'Thêm mới', 4, 'Sản phẩm: test1', '2022-07-01 16:50:44', '2022-07-01 16:50:44');
INSERT INTO `sys_logs` VALUES (114, 'Danh mục nông nghiệp', 'Thêm mới', 4, 'Danh mục: 1223', '2022-07-01 17:01:39', '2022-07-01 17:01:39');
INSERT INTO `sys_logs` VALUES (115, 'Danh mục nông nghiệp', 'Sửa', 4, 'Danh mục: 21631', '2022-07-01 17:03:12', '2022-07-01 17:03:12');
INSERT INTO `sys_logs` VALUES (116, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-07 08:59:33', '2022-07-07 08:59:33');
INSERT INTO `sys_logs` VALUES (117, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-07 09:20:55', '2022-07-07 09:20:55');
INSERT INTO `sys_logs` VALUES (118, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-07 10:38:00', '2022-07-07 10:38:00');
INSERT INTO `sys_logs` VALUES (119, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-11 08:18:42', '2022-07-11 08:18:42');
INSERT INTO `sys_logs` VALUES (120, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-11 14:10:33', '2022-07-11 14:10:33');
INSERT INTO `sys_logs` VALUES (121, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-11 14:32:16', '2022-07-11 14:32:16');
INSERT INTO `sys_logs` VALUES (122, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-12 08:03:37', '2022-07-12 08:03:37');
INSERT INTO `sys_logs` VALUES (123, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-12 08:03:44', '2022-07-12 08:03:44');
INSERT INTO `sys_logs` VALUES (124, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Doanh nghiệp: test', '2022-07-12 08:17:33', '2022-07-12 08:17:33');
INSERT INTO `sys_logs` VALUES (125, 'Quản lý người dùng', 'Thêm mới', 1, 'Tài khoản: sss', '2022-07-12 08:42:23', '2022-07-12 08:42:23');
INSERT INTO `sys_logs` VALUES (126, 'Đăng nhập', 'Đăng nhập', 4, '', '2022-07-12 08:43:13', '2022-07-12 08:43:13');
INSERT INTO `sys_logs` VALUES (127, 'Quản lý người dùng', 'Thêm mới', 4, 'Tài khoản: admin2', '2022-07-12 08:43:27', '2022-07-12 08:43:27');
INSERT INTO `sys_logs` VALUES (128, 'Quản lý người dùng', 'Sửa đổi', 4, 'Tài khoản: admin3', '2022-07-12 08:44:56', '2022-07-12 08:44:56');
INSERT INTO `sys_logs` VALUES (129, 'Quản lý người dùng', 'Sửa đổi', 4, 'Tài khoản: admin3', '2022-07-12 08:45:14', '2022-07-12 08:45:14');
INSERT INTO `sys_logs` VALUES (130, 'Phân quyền module', 'Sửa đổi', 4, 'Phân quyền tài khoản: {\"id\":6,\"account\":\"test\",\"name\":\"test\",\"email\":null,\"numberphone\":null,\"active\":1,\"remember_token\":null,\"created_at\":\"2022-07-11T10:05:56.000000Z\",\"updated_at\":\"2022-07-11T10:05:56.000000Z\"}', '2022-07-12 09:08:12', '2022-07-12 09:08:12');
INSERT INTO `sys_logs` VALUES (131, 'Phân quyền module', 'Sửa đổi', 4, 'Phân quyền tài khoản: {\"id\":6,\"account\":\"test\",\"name\":\"test\",\"email\":null,\"numberphone\":null,\"active\":1,\"remember_token\":null,\"created_at\":\"2022-07-11T10:05:56.000000Z\",\"updated_at\":\"2022-07-11T10:05:56.000000Z\"}', '2022-07-12 09:08:40', '2022-07-12 09:08:40');
INSERT INTO `sys_logs` VALUES (132, 'Phân quyền chức năng', 'Sửa đổi', 4, 'Phân quyền tài khoản: {\"id\":6,\"account\":\"test\",\"name\":\"test\",\"email\":null,\"numberphone\":null,\"active\":1,\"remember_token\":null,\"created_at\":\"2022-07-11T10:05:56.000000Z\",\"updated_at\":\"2022-07-11T10:05:56.000000Z\"}', '2022-07-12 09:08:43', '2022-07-12 09:08:43');
INSERT INTO `sys_logs` VALUES (133, 'Phân quyền chức năng', 'Sửa đổi', 4, 'Phân quyền tài khoản: test', '2022-07-12 09:17:39', '2022-07-12 09:17:39');
INSERT INTO `sys_logs` VALUES (134, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-12 15:13:35', '2022-07-12 15:13:35');
INSERT INTO `sys_logs` VALUES (135, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-12 15:59:35', '2022-07-12 15:59:35');
INSERT INTO `sys_logs` VALUES (136, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-12 16:02:32', '2022-07-12 16:02:32');
INSERT INTO `sys_logs` VALUES (137, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-13 08:35:31', '2022-07-13 08:35:31');
INSERT INTO `sys_logs` VALUES (138, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-13 08:42:29', '2022-07-13 08:42:29');
INSERT INTO `sys_logs` VALUES (139, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-13 15:25:14', '2022-07-13 15:25:14');
INSERT INTO `sys_logs` VALUES (140, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-18 10:57:46', '2022-07-18 10:57:46');
INSERT INTO `sys_logs` VALUES (141, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-18 14:35:05', '2022-07-18 14:35:05');
INSERT INTO `sys_logs` VALUES (142, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-18 14:35:17', '2022-07-18 14:35:17');
INSERT INTO `sys_logs` VALUES (143, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-18 14:46:40', '2022-07-18 14:46:40');
INSERT INTO `sys_logs` VALUES (144, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-18 14:47:02', '2022-07-18 14:47:02');
INSERT INTO `sys_logs` VALUES (145, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-19 07:57:50', '2022-07-19 07:57:50');
INSERT INTO `sys_logs` VALUES (146, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-19 10:16:39', '2022-07-19 10:16:39');
INSERT INTO `sys_logs` VALUES (147, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 10:23:49', '2022-07-25 10:23:49');
INSERT INTO `sys_logs` VALUES (148, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 10:38:45', '2022-07-25 10:38:45');
INSERT INTO `sys_logs` VALUES (149, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 14:23:10', '2022-07-25 14:23:10');
INSERT INTO `sys_logs` VALUES (150, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 14:24:23', '2022-07-25 14:24:23');
INSERT INTO `sys_logs` VALUES (151, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:51', '2022-07-25 14:24:51');
INSERT INTO `sys_logs` VALUES (152, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:52', '2022-07-25 14:24:52');
INSERT INTO `sys_logs` VALUES (153, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:53', '2022-07-25 14:24:53');
INSERT INTO `sys_logs` VALUES (154, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:54', '2022-07-25 14:24:54');
INSERT INTO `sys_logs` VALUES (155, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:54', '2022-07-25 14:24:54');
INSERT INTO `sys_logs` VALUES (156, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:54', '2022-07-25 14:24:54');
INSERT INTO `sys_logs` VALUES (157, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:54', '2022-07-25 14:24:54');
INSERT INTO `sys_logs` VALUES (158, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:24:55', '2022-07-25 14:24:55');
INSERT INTO `sys_logs` VALUES (159, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:25:00', '2022-07-25 14:25:00');
INSERT INTO `sys_logs` VALUES (160, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 14:25:02', '2022-07-25 14:25:02');
INSERT INTO `sys_logs` VALUES (161, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:35:19', '2022-07-25 14:35:19');
INSERT INTO `sys_logs` VALUES (162, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:54:24', '2022-07-25 14:54:24');
INSERT INTO `sys_logs` VALUES (163, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:57:40', '2022-07-25 14:57:40');
INSERT INTO `sys_logs` VALUES (164, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:58:01', '2022-07-25 14:58:01');
INSERT INTO `sys_logs` VALUES (165, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:58:23', '2022-07-25 14:58:23');
INSERT INTO `sys_logs` VALUES (166, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-25 14:58:42', '2022-07-25 14:58:42');
INSERT INTO `sys_logs` VALUES (167, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 14:58:48', '2022-07-25 14:58:48');
INSERT INTO `sys_logs` VALUES (168, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 15:03:25', '2022-07-25 15:03:25');
INSERT INTO `sys_logs` VALUES (169, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 15:03:34', '2022-07-25 15:03:34');
INSERT INTO `sys_logs` VALUES (170, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-25 15:03:40', '2022-07-25 15:03:40');
INSERT INTO `sys_logs` VALUES (171, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 15:04:22', '2022-07-25 15:04:22');
INSERT INTO `sys_logs` VALUES (172, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 15:04:49', '2022-07-25 15:04:49');
INSERT INTO `sys_logs` VALUES (173, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-25 15:05:01', '2022-07-25 15:05:01');
INSERT INTO `sys_logs` VALUES (174, 'Quản lý người dùng', 'Sửa đổi', 1, 'Tài khoản: test', '2022-07-25 15:05:05', '2022-07-25 15:05:05');
INSERT INTO `sys_logs` VALUES (175, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 15:05:50', '2022-07-25 15:05:50');
INSERT INTO `sys_logs` VALUES (176, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:06:39', '2022-07-25 15:06:39');
INSERT INTO `sys_logs` VALUES (177, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:07:24', '2022-07-25 15:07:24');
INSERT INTO `sys_logs` VALUES (178, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:10:52', '2022-07-25 15:10:52');
INSERT INTO `sys_logs` VALUES (179, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:11:00', '2022-07-25 15:11:00');
INSERT INTO `sys_logs` VALUES (180, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:12:36', '2022-07-25 15:12:36');
INSERT INTO `sys_logs` VALUES (181, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-25 15:20:03', '2022-07-25 15:20:03');
INSERT INTO `sys_logs` VALUES (182, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 15:20:13', '2022-07-25 15:20:13');
INSERT INTO `sys_logs` VALUES (183, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:23:18', '2022-07-25 15:23:18');
INSERT INTO `sys_logs` VALUES (184, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:24:21', '2022-07-25 15:24:21');
INSERT INTO `sys_logs` VALUES (185, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:50:02', '2022-07-25 15:50:02');
INSERT INTO `sys_logs` VALUES (186, 'Phân quyền module', 'Sửa đổi', 6, 'Phân quyền tài khoản: test3', '2022-07-25 15:50:16', '2022-07-25 15:50:16');
INSERT INTO `sys_logs` VALUES (187, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:56:25', '2022-07-25 15:56:25');
INSERT INTO `sys_logs` VALUES (188, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:57:15', '2022-07-25 15:57:15');
INSERT INTO `sys_logs` VALUES (189, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:57:37', '2022-07-25 15:57:37');
INSERT INTO `sys_logs` VALUES (190, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:59:04', '2022-07-25 15:59:04');
INSERT INTO `sys_logs` VALUES (191, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 15:59:48', '2022-07-25 15:59:48');
INSERT INTO `sys_logs` VALUES (192, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:00:01', '2022-07-25 16:00:01');
INSERT INTO `sys_logs` VALUES (193, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:00:32', '2022-07-25 16:00:32');
INSERT INTO `sys_logs` VALUES (194, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:01:21', '2022-07-25 16:01:21');
INSERT INTO `sys_logs` VALUES (195, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:01:36', '2022-07-25 16:01:36');
INSERT INTO `sys_logs` VALUES (196, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:01:51', '2022-07-25 16:01:51');
INSERT INTO `sys_logs` VALUES (197, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:02:46', '2022-07-25 16:02:46');
INSERT INTO `sys_logs` VALUES (198, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:03:02', '2022-07-25 16:03:02');
INSERT INTO `sys_logs` VALUES (199, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:03:43', '2022-07-25 16:03:43');
INSERT INTO `sys_logs` VALUES (200, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:03:54', '2022-07-25 16:03:54');
INSERT INTO `sys_logs` VALUES (201, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:04:03', '2022-07-25 16:04:03');
INSERT INTO `sys_logs` VALUES (202, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:04:19', '2022-07-25 16:04:19');
INSERT INTO `sys_logs` VALUES (203, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-25 16:08:51', '2022-07-25 16:08:51');
INSERT INTO `sys_logs` VALUES (204, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:11:12', '2022-07-25 16:11:12');
INSERT INTO `sys_logs` VALUES (205, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-25 16:56:23', '2022-07-25 16:56:23');
INSERT INTO `sys_logs` VALUES (206, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-25 17:08:24', '2022-07-25 17:08:24');
INSERT INTO `sys_logs` VALUES (207, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-26 14:59:13', '2022-07-26 14:59:13');
INSERT INTO `sys_logs` VALUES (208, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-27 13:52:17', '2022-07-27 13:52:17');
INSERT INTO `sys_logs` VALUES (209, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-27 14:17:54', '2022-07-27 14:17:54');
INSERT INTO `sys_logs` VALUES (210, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-27 15:11:23', '2022-07-27 15:11:23');
INSERT INTO `sys_logs` VALUES (211, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:11:30', '2022-07-27 15:11:30');
INSERT INTO `sys_logs` VALUES (212, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: admin3', '2022-07-27 15:11:33', '2022-07-27 15:11:33');
INSERT INTO `sys_logs` VALUES (213, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: sss', '2022-07-27 15:11:45', '2022-07-27 15:11:45');
INSERT INTO `sys_logs` VALUES (214, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-27 15:15:54', '2022-07-27 15:15:54');
INSERT INTO `sys_logs` VALUES (215, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-27 15:16:06', '2022-07-27 15:16:06');
INSERT INTO `sys_logs` VALUES (216, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:16:56', '2022-07-27 15:16:56');
INSERT INTO `sys_logs` VALUES (217, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:17:22', '2022-07-27 15:17:22');
INSERT INTO `sys_logs` VALUES (218, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:20:20', '2022-07-27 15:20:20');
INSERT INTO `sys_logs` VALUES (219, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:20:59', '2022-07-27 15:20:59');
INSERT INTO `sys_logs` VALUES (220, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-27 15:21:15', '2022-07-27 15:21:15');
INSERT INTO `sys_logs` VALUES (221, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:21:23', '2022-07-27 15:21:23');
INSERT INTO `sys_logs` VALUES (222, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:22:38', '2022-07-27 15:22:38');
INSERT INTO `sys_logs` VALUES (223, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:49:36', '2022-07-27 15:49:36');
INSERT INTO `sys_logs` VALUES (224, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:49:51', '2022-07-27 15:49:51');
INSERT INTO `sys_logs` VALUES (225, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:50:23', '2022-07-27 15:50:23');
INSERT INTO `sys_logs` VALUES (226, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:50:33', '2022-07-27 15:50:33');
INSERT INTO `sys_logs` VALUES (227, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-27 15:50:50', '2022-07-27 15:50:50');
INSERT INTO `sys_logs` VALUES (228, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-27 15:54:52', '2022-07-27 15:54:52');
INSERT INTO `sys_logs` VALUES (229, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:55:04', '2022-07-27 15:55:04');
INSERT INTO `sys_logs` VALUES (230, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:55:21', '2022-07-27 15:55:21');
INSERT INTO `sys_logs` VALUES (231, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:55:38', '2022-07-27 15:55:38');
INSERT INTO `sys_logs` VALUES (232, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:55:47', '2022-07-27 15:55:47');
INSERT INTO `sys_logs` VALUES (233, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:55:53', '2022-07-27 15:55:53');
INSERT INTO `sys_logs` VALUES (234, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:56:03', '2022-07-27 15:56:03');
INSERT INTO `sys_logs` VALUES (235, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-27 15:56:16', '2022-07-27 15:56:16');
INSERT INTO `sys_logs` VALUES (236, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 15:56:40', '2022-07-27 15:56:40');
INSERT INTO `sys_logs` VALUES (237, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:05:46', '2022-07-27 16:05:46');
INSERT INTO `sys_logs` VALUES (238, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:05:55', '2022-07-27 16:05:55');
INSERT INTO `sys_logs` VALUES (239, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-27 16:06:14', '2022-07-27 16:06:14');
INSERT INTO `sys_logs` VALUES (240, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:06:36', '2022-07-27 16:06:36');
INSERT INTO `sys_logs` VALUES (241, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:08:49', '2022-07-27 16:08:49');
INSERT INTO `sys_logs` VALUES (242, 'Phân quyền chức năng', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:08:57', '2022-07-27 16:08:57');
INSERT INTO `sys_logs` VALUES (243, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:32:33', '2022-07-27 16:32:33');
INSERT INTO `sys_logs` VALUES (244, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: Thái Đình Cẩn', '2022-07-27 16:32:46', '2022-07-27 16:32:46');
INSERT INTO `sys_logs` VALUES (245, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:32:55', '2022-07-27 16:32:55');
INSERT INTO `sys_logs` VALUES (246, 'Doanh nghiệp nông nghiệp', 'Xoá', 6, 'Doanh nghiệp: sad', '2022-07-27 16:33:40', '2022-07-27 16:33:40');
INSERT INTO `sys_logs` VALUES (247, 'Doanh nghiệp nông nghiệp', 'Xoá', 6, 'Doanh nghiệp: Thái Đình Cẩn', '2022-07-27 16:33:50', '2022-07-27 16:33:50');
INSERT INTO `sys_logs` VALUES (248, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:37:38', '2022-07-27 16:37:38');
INSERT INTO `sys_logs` VALUES (249, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: fds', '2022-07-27 16:39:23', '2022-07-27 16:39:23');
INSERT INTO `sys_logs` VALUES (250, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: fds', '2022-07-27 16:39:27', '2022-07-27 16:39:27');
INSERT INTO `sys_logs` VALUES (251, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:40:56', '2022-07-27 16:40:56');
INSERT INTO `sys_logs` VALUES (252, 'Sản phẩm nông nghiệp', 'Thêm mới', 6, 'Sản phẩm: hjhn', '2022-07-27 16:41:12', '2022-07-27 16:41:12');
INSERT INTO `sys_logs` VALUES (253, 'Sản phẩm nông nghiệp', 'Thêm mới', 6, 'Sản phẩm: hhh', '2022-07-27 16:41:55', '2022-07-27 16:41:55');
INSERT INTO `sys_logs` VALUES (254, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-27 16:42:46', '2022-07-27 16:42:46');
INSERT INTO `sys_logs` VALUES (255, 'Sản phẩm nông nghiệp', 'Sửa', 6, 'Sản phẩm: hhh1', '2022-07-27 16:42:57', '2022-07-27 16:42:57');
INSERT INTO `sys_logs` VALUES (256, 'Sản phẩm nông nghiệp', 'Thêm ảnh', 6, 'Sản phẩm: hjhn; Tên ảnh: Jd1a_25694.png', '2022-07-27 16:49:21', '2022-07-27 16:49:21');
INSERT INTO `sys_logs` VALUES (257, 'Sản phẩm nông nghiệp', 'Sửa ảnh', 6, 'Sản phẩm: hjhn; Tên ảnh: Jd1a_25694.png', '2022-07-27 16:54:53', '2022-07-27 16:54:53');
INSERT INTO `sys_logs` VALUES (258, 'Sản phẩm nông nghiệp', 'Sửa ảnh', 6, 'Sản phẩm: hjhn; Tên ảnh: Jd1a_25694.png', '2022-07-27 16:55:58', '2022-07-27 16:55:58');
INSERT INTO `sys_logs` VALUES (259, 'Sản phẩm nông nghiệp', 'Sửa', 6, 'Sản phẩm: hjhn2', '2022-07-27 16:56:31', '2022-07-27 16:56:31');
INSERT INTO `sys_logs` VALUES (260, 'Sản phẩm nông nghiệp', 'Sửa', 6, 'Sản phẩm: hjhn2', '2022-07-27 16:59:33', '2022-07-27 16:59:33');
INSERT INTO `sys_logs` VALUES (261, 'Sản phẩm nông nghiệp', 'Sửa', 6, 'Sản phẩm: hjhn2', '2022-07-27 16:59:53', '2022-07-27 16:59:53');
INSERT INTO `sys_logs` VALUES (262, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-28 08:55:46', '2022-07-28 08:55:46');
INSERT INTO `sys_logs` VALUES (263, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-28 09:00:57', '2022-07-28 09:00:57');
INSERT INTO `sys_logs` VALUES (264, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:01:08', '2022-07-28 09:01:08');
INSERT INTO `sys_logs` VALUES (265, 'Sản phẩm nông nghiệp', 'Xoá', 6, 'Sản phẩm: a', '2022-07-28 09:01:15', '2022-07-28 09:01:15');
INSERT INTO `sys_logs` VALUES (266, 'Sản phẩm nông nghiệp', 'Xoá', 6, 'Sản phẩm: 111111', '2022-07-28 09:01:21', '2022-07-28 09:01:21');
INSERT INTO `sys_logs` VALUES (267, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:04:36', '2022-07-28 09:04:36');
INSERT INTO `sys_logs` VALUES (268, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:15:20', '2022-07-28 09:15:20');
INSERT INTO `sys_logs` VALUES (269, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:15:38', '2022-07-28 09:15:38');
INSERT INTO `sys_logs` VALUES (270, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:16:51', '2022-07-28 09:16:51');
INSERT INTO `sys_logs` VALUES (271, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:23:13', '2022-07-28 09:23:13');
INSERT INTO `sys_logs` VALUES (272, 'Danh mục nông nghiệp', 'Thêm mới', 6, 'Danh mục: eee', '2022-07-28 09:25:20', '2022-07-28 09:25:20');
INSERT INTO `sys_logs` VALUES (273, 'Danh mục nông nghiệp', 'Sửa', 6, 'Danh mục: eee1', '2022-07-28 09:29:46', '2022-07-28 09:29:46');
INSERT INTO `sys_logs` VALUES (274, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: doanh nghiệp abc1', '2022-07-28 09:35:14', '2022-07-28 09:35:14');
INSERT INTO `sys_logs` VALUES (275, 'Doanh nghiệp nông nghiệp', 'Xoá', 6, 'Doanh nghiệp: fds', '2022-07-28 09:35:21', '2022-07-28 09:35:21');
INSERT INTO `sys_logs` VALUES (276, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: doanh nghiệp abc1', '2022-07-28 09:35:56', '2022-07-28 09:35:56');
INSERT INTO `sys_logs` VALUES (277, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: doanh nghiệp abc1', '2022-07-28 09:41:43', '2022-07-28 09:41:43');
INSERT INTO `sys_logs` VALUES (278, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: doanh nghiệp abc1', '2022-07-28 09:41:58', '2022-07-28 09:41:58');
INSERT INTO `sys_logs` VALUES (279, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 09:50:57', '2022-07-28 09:50:57');
INSERT INTO `sys_logs` VALUES (280, 'Danh mục nông nghiệp', 'Xoá', 6, 'Danh mục: eee1', '2022-07-28 09:51:07', '2022-07-28 09:51:07');
INSERT INTO `sys_logs` VALUES (281, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-28 10:10:19', '2022-07-28 10:10:19');
INSERT INTO `sys_logs` VALUES (282, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-28 10:16:21', '2022-07-28 10:16:21');
INSERT INTO `sys_logs` VALUES (283, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-28 14:56:45', '2022-07-28 14:56:45');
INSERT INTO `sys_logs` VALUES (284, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-28 14:56:51', '2022-07-28 14:56:51');
INSERT INTO `sys_logs` VALUES (285, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 14:57:12', '2022-07-28 14:57:12');
INSERT INTO `sys_logs` VALUES (286, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:19:01', '2022-07-28 15:19:01');
INSERT INTO `sys_logs` VALUES (287, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:25:26', '2022-07-28 15:25:26');
INSERT INTO `sys_logs` VALUES (288, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:52:37', '2022-07-28 15:52:37');
INSERT INTO `sys_logs` VALUES (289, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:52:57', '2022-07-28 15:52:57');
INSERT INTO `sys_logs` VALUES (290, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:53:05', '2022-07-28 15:53:05');
INSERT INTO `sys_logs` VALUES (291, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-28 15:56:31', '2022-07-28 15:56:31');
INSERT INTO `sys_logs` VALUES (292, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-07-29 09:21:30', '2022-07-29 09:21:30');
INSERT INTO `sys_logs` VALUES (293, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-07-29 09:21:58', '2022-07-29 09:21:58');
INSERT INTO `sys_logs` VALUES (294, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-29 09:22:09', '2022-07-29 09:22:09');
INSERT INTO `sys_logs` VALUES (295, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-29 09:22:29', '2022-07-29 09:22:29');
INSERT INTO `sys_logs` VALUES (296, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-29 10:30:29', '2022-07-29 10:30:29');
INSERT INTO `sys_logs` VALUES (297, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-07-29 10:40:02', '2022-07-29 10:40:02');
INSERT INTO `sys_logs` VALUES (298, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-01 08:16:06', '2022-08-01 08:16:06');
INSERT INTO `sys_logs` VALUES (299, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-01 09:27:51', '2022-08-01 09:27:51');
INSERT INTO `sys_logs` VALUES (300, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-01 09:29:24', '2022-08-01 09:29:24');
INSERT INTO `sys_logs` VALUES (301, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-01 09:35:21', '2022-08-01 09:35:21');
INSERT INTO `sys_logs` VALUES (302, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-02 08:58:54', '2022-08-02 08:58:54');
INSERT INTO `sys_logs` VALUES (303, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-02 09:00:04', '2022-08-02 09:00:04');
INSERT INTO `sys_logs` VALUES (304, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-02 15:31:04', '2022-08-02 15:31:04');
INSERT INTO `sys_logs` VALUES (305, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-02 15:32:06', '2022-08-02 15:32:06');
INSERT INTO `sys_logs` VALUES (306, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-02 15:32:54', '2022-08-02 15:32:54');
INSERT INTO `sys_logs` VALUES (307, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-02 15:33:03', '2022-08-02 15:33:03');
INSERT INTO `sys_logs` VALUES (308, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-03 09:12:23', '2022-08-03 09:12:23');
INSERT INTO `sys_logs` VALUES (309, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-03 09:16:57', '2022-08-03 09:16:57');
INSERT INTO `sys_logs` VALUES (310, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 09:35:08', '2022-08-03 09:35:08');
INSERT INTO `sys_logs` VALUES (311, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 09:37:11', '2022-08-03 09:37:11');
INSERT INTO `sys_logs` VALUES (312, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 09:47:30', '2022-08-03 09:47:30');
INSERT INTO `sys_logs` VALUES (313, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 09:52:44', '2022-08-03 09:52:44');
INSERT INTO `sys_logs` VALUES (314, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 09:55:48', '2022-08-03 09:55:48');
INSERT INTO `sys_logs` VALUES (315, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:11:00', '2022-08-03 10:11:00');
INSERT INTO `sys_logs` VALUES (316, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:19:52', '2022-08-03 10:19:52');
INSERT INTO `sys_logs` VALUES (317, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:22:02', '2022-08-03 10:22:02');
INSERT INTO `sys_logs` VALUES (318, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:26:23', '2022-08-03 10:26:23');
INSERT INTO `sys_logs` VALUES (319, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:26:29', '2022-08-03 10:26:29');
INSERT INTO `sys_logs` VALUES (320, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:27:22', '2022-08-03 10:27:22');
INSERT INTO `sys_logs` VALUES (321, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 10:47:05', '2022-08-03 10:47:05');
INSERT INTO `sys_logs` VALUES (322, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-03 14:09:35', '2022-08-03 14:09:35');
INSERT INTO `sys_logs` VALUES (323, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-03 14:35:21', '2022-08-03 14:35:21');
INSERT INTO `sys_logs` VALUES (324, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:35:42', '2022-08-03 14:35:42');
INSERT INTO `sys_logs` VALUES (325, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:45:10', '2022-08-03 14:45:10');
INSERT INTO `sys_logs` VALUES (326, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:46:32', '2022-08-03 14:46:32');
INSERT INTO `sys_logs` VALUES (327, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:48:17', '2022-08-03 14:48:17');
INSERT INTO `sys_logs` VALUES (328, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:48:31', '2022-08-03 14:48:31');
INSERT INTO `sys_logs` VALUES (329, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 14:51:45', '2022-08-03 14:51:45');
INSERT INTO `sys_logs` VALUES (330, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:00:24', '2022-08-03 15:00:24');
INSERT INTO `sys_logs` VALUES (331, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:01:32', '2022-08-03 15:01:32');
INSERT INTO `sys_logs` VALUES (332, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:01:50', '2022-08-03 15:01:50');
INSERT INTO `sys_logs` VALUES (333, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:04:30', '2022-08-03 15:04:30');
INSERT INTO `sys_logs` VALUES (334, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:04:40', '2022-08-03 15:04:40');
INSERT INTO `sys_logs` VALUES (335, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:05:09', '2022-08-03 15:05:09');
INSERT INTO `sys_logs` VALUES (336, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:30:39', '2022-08-03 15:30:39');
INSERT INTO `sys_logs` VALUES (337, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 15:54:36', '2022-08-03 15:54:36');
INSERT INTO `sys_logs` VALUES (338, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-03 16:45:24', '2022-08-03 16:45:24');
INSERT INTO `sys_logs` VALUES (339, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-04 08:47:58', '2022-08-04 08:47:58');
INSERT INTO `sys_logs` VALUES (340, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-04 08:48:07', '2022-08-04 08:48:07');
INSERT INTO `sys_logs` VALUES (341, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-04 08:54:27', '2022-08-04 08:54:27');
INSERT INTO `sys_logs` VALUES (342, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 08:54:42', '2022-08-04 08:54:42');
INSERT INTO `sys_logs` VALUES (343, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 08:56:20', '2022-08-04 08:56:20');
INSERT INTO `sys_logs` VALUES (344, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 08:56:35', '2022-08-04 08:56:35');
INSERT INTO `sys_logs` VALUES (345, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 09:00:08', '2022-08-04 09:00:08');
INSERT INTO `sys_logs` VALUES (346, 'Du lịch', 'Doanh nghiệp du lịch', 6, 'Thêm doanh nghiệp du lịch: asd', '2022-08-04 09:03:55', '2022-08-04 09:03:55');
INSERT INTO `sys_logs` VALUES (347, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 09:09:01', '2022-08-04 09:09:01');
INSERT INTO `sys_logs` VALUES (348, 'Du lịch', 'Doanh nghiệp du lịch', 6, 'Sửa doanh nghiệp du lịch: asd thành asd2222', '2022-08-04 09:09:17', '2022-08-04 09:09:17');
INSERT INTO `sys_logs` VALUES (349, 'Du lịch', 'Doanh nghiệp du lịch', 6, 'Sửa doanh nghiệp du lịch: dsa thành dsa', '2022-08-04 09:38:06', '2022-08-04 09:38:06');
INSERT INTO `sys_logs` VALUES (350, 'Du lịch', 'Doanh nghiệp du lịch', 6, 'Sửa doanh nghiệp du lịch: doanh nghiệp abc2333323 thành doanh nghiệp abc2333323', '2022-08-04 09:38:15', '2022-08-04 09:38:15');
INSERT INTO `sys_logs` VALUES (351, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 09:40:41', '2022-08-04 09:40:41');
INSERT INTO `sys_logs` VALUES (352, 'Du lịch', 'Doanh nghiệp du lịch', 6, 'Xóa doanh nghiệp du lịch: asd2222', '2022-08-04 09:40:51', '2022-08-04 09:40:51');
INSERT INTO `sys_logs` VALUES (353, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 09:41:16', '2022-08-04 09:41:16');
INSERT INTO `sys_logs` VALUES (354, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 10:04:24', '2022-08-04 10:04:24');
INSERT INTO `sys_logs` VALUES (355, 'Du lịch', 'Loại hình du lịch', 6, 'Thêm loại hình du lịch: sad', '2022-08-04 10:06:49', '2022-08-04 10:06:49');
INSERT INTO `sys_logs` VALUES (356, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 10:09:16', '2022-08-04 10:09:16');
INSERT INTO `sys_logs` VALUES (357, 'Du lịch', 'Loại hình du lịch', 6, 'Sửa loại hình du lịch: sss thành sss2', '2022-08-04 10:11:18', '2022-08-04 10:11:18');
INSERT INTO `sys_logs` VALUES (358, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 10:11:40', '2022-08-04 10:11:40');
INSERT INTO `sys_logs` VALUES (359, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 10:46:53', '2022-08-04 10:46:53');
INSERT INTO `sys_logs` VALUES (360, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 11:03:00', '2022-08-04 11:03:00');
INSERT INTO `sys_logs` VALUES (361, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-04 13:44:34', '2022-08-04 13:44:34');
INSERT INTO `sys_logs` VALUES (362, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-04 14:21:57', '2022-08-04 14:21:57');
INSERT INTO `sys_logs` VALUES (363, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 14:24:21', '2022-08-04 14:24:21');
INSERT INTO `sys_logs` VALUES (364, 'Du lịch', 'Điểm đến du lịch', 6, 'Thêm điểm đến du lịch: 6545', '2022-08-04 14:41:22', '2022-08-04 14:41:22');
INSERT INTO `sys_logs` VALUES (365, 'Du lịch', 'Điểm đến du lịch', 6, 'Sửa điểm đến du lịch: 6545 thành 6545', '2022-08-04 14:42:32', '2022-08-04 14:42:32');
INSERT INTO `sys_logs` VALUES (366, 'Du lịch', 'Điểm đến du lịch', 6, 'Sửa điểm đến du lịch: 6545 thành 6545', '2022-08-04 14:46:35', '2022-08-04 14:46:35');
INSERT INTO `sys_logs` VALUES (367, 'Du lịch', 'Điểm đến du lịch', 6, 'Sửa điểm đến du lịch: 6545 thành 6545', '2022-08-04 14:47:30', '2022-08-04 14:47:30');
INSERT INTO `sys_logs` VALUES (368, 'Du lịch', 'Điểm đến du lịch', 6, 'Sửa điểm đến du lịch: 6545 thành 6545', '2022-08-04 14:48:26', '2022-08-04 14:48:26');
INSERT INTO `sys_logs` VALUES (369, 'Sản phẩm nông nghiệp', 'Thêm ảnh', 6, 'Sản phẩm: test1; Tên ảnh: R9Ru_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 15:10:05', '2022-08-04 15:10:05');
INSERT INTO `sys_logs` VALUES (370, 'Điểm đến du lịch', 'Thêm ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: ezTN_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 15:12:40', '2022-08-04 15:12:40');
INSERT INTO `sys_logs` VALUES (371, 'Điểm đến du lịch', 'Sửa ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: 22.jpg', '2022-08-04 15:14:26', '2022-08-04 15:14:26');
INSERT INTO `sys_logs` VALUES (372, 'Điểm đến du lịch', 'Xoá ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: 22.jpg', '2022-08-04 15:15:17', '2022-08-04 15:15:17');
INSERT INTO `sys_logs` VALUES (373, 'Điểm đến du lịch', 'Thêm ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: JbyU_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 15:15:25', '2022-08-04 15:15:25');
INSERT INTO `sys_logs` VALUES (374, 'Điểm đến du lịch', 'Sửa ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: 5.jpg', '2022-08-04 15:15:38', '2022-08-04 15:15:38');
INSERT INTO `sys_logs` VALUES (375, 'Điểm đến du lịch', 'Sửa ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: 454.jpg', '2022-08-04 15:15:49', '2022-08-04 15:15:49');
INSERT INTO `sys_logs` VALUES (376, 'Điểm đến du lịch', 'Xoá ảnh', 6, 'Điểm đến: sadsda; Tên ảnh: 454.jpg', '2022-08-04 15:16:02', '2022-08-04 15:16:02');
INSERT INTO `sys_logs` VALUES (377, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 15:26:56', '2022-08-04 15:26:56');
INSERT INTO `sys_logs` VALUES (378, 'Điểm đến du lịch', 'Thêm ảnh', 6, 'Điểm đến: 6545; Tên ảnh: 1PzH_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 15:29:20', '2022-08-04 15:29:20');
INSERT INTO `sys_logs` VALUES (379, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 15:30:47', '2022-08-04 15:30:47');
INSERT INTO `sys_logs` VALUES (380, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 15:58:12', '2022-08-04 15:58:12');
INSERT INTO `sys_logs` VALUES (381, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 15:59:49', '2022-08-04 15:59:49');
INSERT INTO `sys_logs` VALUES (382, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 16:17:14', '2022-08-04 16:17:14');
INSERT INTO `sys_logs` VALUES (383, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 16:17:31', '2022-08-04 16:17:31');
INSERT INTO `sys_logs` VALUES (384, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 16:30:42', '2022-08-04 16:30:42');
INSERT INTO `sys_logs` VALUES (385, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 16:35:15', '2022-08-04 16:35:15');
INSERT INTO `sys_logs` VALUES (386, 'Đặc sản', 'Thêm mới', 6, 'Sản phẩm: sss', '2022-08-04 16:39:50', '2022-08-04 16:39:50');
INSERT INTO `sys_logs` VALUES (387, 'Đặc sản', 'Sửa', 6, 'Sản phẩm: eee thành eees', '2022-08-04 16:41:26', '2022-08-04 16:41:26');
INSERT INTO `sys_logs` VALUES (388, 'Đặc sản', 'Thêm mới', 6, 'Sản phẩm: eeeèw', '2022-08-04 16:41:37', '2022-08-04 16:41:37');
INSERT INTO `sys_logs` VALUES (389, 'Đặc sản', 'Thêm ảnh', 6, 'Sản phẩm: sss; Tên ảnh: PsGI_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 16:48:18', '2022-08-04 16:48:18');
INSERT INTO `sys_logs` VALUES (390, 'Đặc sản', 'Thêm ảnh', 6, 'Sản phẩm: sss; Tên ảnh: JfhI_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 16:49:11', '2022-08-04 16:49:11');
INSERT INTO `sys_logs` VALUES (391, 'Đặc sản', 'Sửa ảnh', 6, 'Sản phẩm: sss; Tên ảnh: 3.jpg', '2022-08-04 16:49:15', '2022-08-04 16:49:15');
INSERT INTO `sys_logs` VALUES (392, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-04 16:49:45', '2022-08-04 16:49:45');
INSERT INTO `sys_logs` VALUES (393, 'Đặc sản', 'Thêm ảnh', 6, 'Sản phẩm: eeeèw; Tên ảnh: 7igH_296608743_2264175733734585_8089597942686195209_n.jpg', '2022-08-04 16:50:46', '2022-08-04 16:50:46');
INSERT INTO `sys_logs` VALUES (394, 'Đặc sản', 'Xoá', 6, 'Sản phẩm: eees', '2022-08-04 16:51:59', '2022-08-04 16:51:59');
INSERT INTO `sys_logs` VALUES (395, 'Đặc sản', 'Thêm ảnh', 6, 'Sản phẩm: eeeèw; Tên ảnh: VICT_A23.jpg', '2022-08-04 16:52:04', '2022-08-04 16:52:04');
INSERT INTO `sys_logs` VALUES (396, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-05 08:32:57', '2022-08-05 08:32:57');
INSERT INTO `sys_logs` VALUES (397, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-05 08:56:36', '2022-08-05 08:56:36');
INSERT INTO `sys_logs` VALUES (398, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-05 09:12:23', '2022-08-05 09:12:23');
INSERT INTO `sys_logs` VALUES (399, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-05 10:21:32', '2022-08-05 10:21:32');
INSERT INTO `sys_logs` VALUES (400, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-05 10:33:12', '2022-08-05 10:33:12');
INSERT INTO `sys_logs` VALUES (401, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: sad', '2022-08-05 14:25:58', '2022-08-05 14:25:58');
INSERT INTO `sys_logs` VALUES (402, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: asd', '2022-08-05 14:40:06', '2022-08-05 14:40:06');
INSERT INTO `sys_logs` VALUES (403, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: asd', '2022-08-05 14:42:44', '2022-08-05 14:42:44');
INSERT INTO `sys_logs` VALUES (404, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: asd2', '2022-08-05 14:43:31', '2022-08-05 14:43:31');
INSERT INTO `sys_logs` VALUES (405, 'Doanh nghiệp nông nghiệp', 'Thêm mới', 6, 'Doanh nghiệp: asd5', '2022-08-05 14:45:42', '2022-08-05 14:45:42');
INSERT INTO `sys_logs` VALUES (406, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-05 14:47:16', '2022-08-05 14:47:16');
INSERT INTO `sys_logs` VALUES (407, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-05 14:47:38', '2022-08-05 14:47:38');
INSERT INTO `sys_logs` VALUES (408, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: asd5', '2022-08-05 15:04:03', '2022-08-05 15:04:03');
INSERT INTO `sys_logs` VALUES (409, 'Doanh nghiệp nông nghiệp', 'Sửa', 6, 'Doanh nghiệp: asd5', '2022-08-05 15:04:19', '2022-08-05 15:04:19');
INSERT INTO `sys_logs` VALUES (410, 'Phân quyền module', 'Sửa đổi', 1, 'Phân quyền tài khoản: test', '2022-08-05 15:04:59', '2022-08-05 15:04:59');
INSERT INTO `sys_logs` VALUES (411, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd5 thành asd5', '2022-08-05 15:08:47', '2022-08-05 15:08:47');
INSERT INTO `sys_logs` VALUES (412, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd5 thành asd5', '2022-08-05 15:27:27', '2022-08-05 15:27:27');
INSERT INTO `sys_logs` VALUES (413, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd5 thành asd5', '2022-08-05 15:27:34', '2022-08-05 15:27:34');
INSERT INTO `sys_logs` VALUES (414, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd thành asd1', '2022-08-05 15:28:47', '2022-08-05 15:28:47');
INSERT INTO `sys_logs` VALUES (415, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd1 thành asd1', '2022-08-05 15:29:26', '2022-08-05 15:29:26');
INSERT INTO `sys_logs` VALUES (416, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd1 thành asd1', '2022-08-05 15:30:21', '2022-08-05 15:30:21');
INSERT INTO `sys_logs` VALUES (417, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad232', '2022-08-05 15:30:32', '2022-08-05 15:30:32');
INSERT INTO `sys_logs` VALUES (418, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd1 thành asd1', '2022-08-05 15:31:08', '2022-08-05 15:31:08');
INSERT INTO `sys_logs` VALUES (419, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad232', '2022-08-05 15:31:16', '2022-08-05 15:31:16');
INSERT INTO `sys_logs` VALUES (420, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad232', '2022-08-05 15:31:49', '2022-08-05 15:31:49');
INSERT INTO `sys_logs` VALUES (421, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad232', '2022-08-05 15:31:52', '2022-08-05 15:31:52');
INSERT INTO `sys_logs` VALUES (422, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad232', '2022-08-05 15:31:58', '2022-08-05 15:31:58');
INSERT INTO `sys_logs` VALUES (423, 'Video Youtube', 'Sửa', 6, 'Tên Video: asd1 thành asd1', '2022-08-05 15:33:50', '2022-08-05 15:33:50');
INSERT INTO `sys_logs` VALUES (424, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: sad', '2022-08-05 15:41:21', '2022-08-05 15:41:21');
INSERT INTO `sys_logs` VALUES (425, 'Chủ đề video youtube', 'Xoá', 6, 'Tên video youtube: 545', '2022-08-05 15:42:12', '2022-08-05 15:42:12');
INSERT INTO `sys_logs` VALUES (426, 'Video Youtube', 'Thêm mới', 6, 'Tên Video: sad', '2022-08-05 15:43:02', '2022-08-05 15:43:02');
INSERT INTO `sys_logs` VALUES (427, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-05 16:23:59', '2022-08-05 16:23:59');
INSERT INTO `sys_logs` VALUES (428, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-12 09:21:08', '2022-08-12 09:21:08');
INSERT INTO `sys_logs` VALUES (429, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-17 10:29:45', '2022-08-17 10:29:45');
INSERT INTO `sys_logs` VALUES (430, 'AIBannerFooter', 'Thêm', 1, 'Banner: banner', '2022-08-17 11:02:11', '2022-08-17 11:02:11');
INSERT INTO `sys_logs` VALUES (431, 'Doanh nghiệp nông nghiệp', 'Sửa', 1, 'Doanh nghiệp: banner', '2022-08-17 12:49:42', '2022-08-17 12:49:42');
INSERT INTO `sys_logs` VALUES (432, 'Doanh nghiệp nông nghiệp', 'Sửa', 1, 'Doanh nghiệp: banner', '2022-08-17 12:50:08', '2022-08-17 12:50:08');
INSERT INTO `sys_logs` VALUES (433, 'Doanh nghiệp nông nghiệp', 'Sửa', 1, 'Doanh nghiệp: banner', '2022-08-17 12:50:45', '2022-08-17 12:50:45');
INSERT INTO `sys_logs` VALUES (434, 'AIBannerFooter', 'Thêm', 1, 'Banner: Footer', '2022-08-17 13:54:52', '2022-08-17 13:54:52');
INSERT INTO `sys_logs` VALUES (435, 'Đăng nhập', 'Đăng nhập', 6, '', '2022-08-17 14:51:37', '2022-08-17 14:51:37');
INSERT INTO `sys_logs` VALUES (436, 'AIBannerFooter', 'Thêm', 1, 'Banner: test', '2022-08-17 15:41:33', '2022-08-17 15:41:33');
INSERT INTO `sys_logs` VALUES (437, 'AIAdvertisement', 'Thêm', 1, 'Quảng cáo: test', '2022-08-17 15:45:37', '2022-08-17 15:45:37');
INSERT INTO `sys_logs` VALUES (438, 'AIAdvertisement', 'Sửa', 1, 'Quảng cáo: test', '2022-08-17 15:46:48', '2022-08-17 15:46:48');
INSERT INTO `sys_logs` VALUES (439, 'AIAdvertisement', 'Xoá', 1, 'Quảng cáo: test', '2022-08-17 15:54:21', '2022-08-17 15:54:21');
INSERT INTO `sys_logs` VALUES (440, 'AIBannerFooter', 'Xoá', 1, 'Banner: test', '2022-08-17 15:55:30', '2022-08-17 15:55:30');
INSERT INTO `sys_logs` VALUES (441, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-27 11:09:43', '2022-08-27 11:09:43');
INSERT INTO `sys_logs` VALUES (442, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-30 09:44:58', '2022-08-30 09:44:58');
INSERT INTO `sys_logs` VALUES (443, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-30 14:12:56', '2022-08-30 14:12:56');
INSERT INTO `sys_logs` VALUES (444, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-30 16:54:49', '2022-08-30 16:54:49');
INSERT INTO `sys_logs` VALUES (445, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-31 08:48:22', '2022-08-31 08:48:22');
INSERT INTO `sys_logs` VALUES (446, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-08-31 13:56:51', '2022-08-31 13:56:51');
INSERT INTO `sys_logs` VALUES (447, 'Danh mục nông nghiệp', 'Thêm mới', 1, 'Danh mục: test', '2022-08-31 14:12:13', '2022-08-31 14:12:13');
INSERT INTO `sys_logs` VALUES (448, 'Danh mục nông nghiệp', 'Sửa', 1, 'Danh mục: Bất động sản', '2022-08-31 14:13:47', '2022-08-31 14:13:47');
INSERT INTO `sys_logs` VALUES (449, 'Danh mục nông nghiệp', 'Thêm mới', 1, 'Danh mục: Động sản', '2022-08-31 14:13:52', '2022-08-31 14:13:52');
INSERT INTO `sys_logs` VALUES (450, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-05 14:08:04', '2022-09-05 14:08:04');
INSERT INTO `sys_logs` VALUES (451, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-06 08:56:54', '2022-09-06 08:56:54');
INSERT INTO `sys_logs` VALUES (452, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-12 14:41:25', '2022-09-12 14:41:25');
INSERT INTO `sys_logs` VALUES (453, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-12 15:03:22', '2022-09-12 15:03:22');
INSERT INTO `sys_logs` VALUES (454, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-12 15:04:11', '2022-09-12 15:04:11');
INSERT INTO `sys_logs` VALUES (455, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:18:42', '2022-09-12 16:18:42');
INSERT INTO `sys_logs` VALUES (456, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:18:43', '2022-09-12 16:18:43');
INSERT INTO `sys_logs` VALUES (457, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:19:02', '2022-09-12 16:19:02');
INSERT INTO `sys_logs` VALUES (458, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:22:46', '2022-09-12 16:22:46');
INSERT INTO `sys_logs` VALUES (459, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:24:14', '2022-09-12 16:24:14');
INSERT INTO `sys_logs` VALUES (460, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:24:24', '2022-09-12 16:24:24');
INSERT INTO `sys_logs` VALUES (461, 'Sản phẩm nông nghiệp', 'Sửa', 1, 'Sản phẩm: test1 thành test1', '2022-09-12 16:27:16', '2022-09-12 16:27:16');
INSERT INTO `sys_logs` VALUES (462, 'AIServicesBusinesses', 'Sửa', 1, 'Dịch vụ: test1 thành test1', '2022-09-12 16:29:56', '2022-09-12 16:29:56');
INSERT INTO `sys_logs` VALUES (463, 'AIServicesBusinesses', 'Thêm ảnh', 1, 'Dịch vụ: dsadsadsa; Tên ảnh: mRGb_7656536.png', '2022-09-12 16:39:45', '2022-09-12 16:39:45');
INSERT INTO `sys_logs` VALUES (464, 'AIServicesBusinesses', 'Sửa ảnh', 1, 'Dịch vụ: dsadsadsa; Tên ảnh: mRGb_765656.png', '2022-09-12 16:39:56', '2022-09-12 16:39:56');
INSERT INTO `sys_logs` VALUES (465, 'AIServicesBusinesses', 'Sửa ảnh', 1, 'Dịch vụ: dsadsadsa; Tên ảnh: test.png', '2022-09-12 16:40:02', '2022-09-12 16:40:02');
INSERT INTO `sys_logs` VALUES (466, 'AIServicesBusinesses', 'Xoá ảnh', 1, 'Dịch vụ: dsadsadsa; Tên ảnh: test.png', '2022-09-12 16:40:56', '2022-09-12 16:40:56');
INSERT INTO `sys_logs` VALUES (467, 'AIServicesBusinesses', 'Xoá', 1, 'Dịch vụ: dsadsadsa', '2022-09-12 16:48:27', '2022-09-12 16:48:27');
INSERT INTO `sys_logs` VALUES (468, 'AIServicesBusinesses', 'Xoá', 1, 'Dịch vụ: asd', '2022-09-12 16:49:40', '2022-09-12 16:49:40');
INSERT INTO `sys_logs` VALUES (469, 'AIServicesBusinesses', 'Xoá', 1, 'Dịch vụ: sad', '2022-09-12 16:49:44', '2022-09-12 16:49:44');
INSERT INTO `sys_logs` VALUES (470, 'AIServicesBusinesses', 'Xoá', 1, 'Dịch vụ: dsa', '2022-09-12 16:50:33', '2022-09-12 16:50:33');
INSERT INTO `sys_logs` VALUES (471, 'AIServicesBusinesses', 'Xoá', 1, 'Dịch vụ: asd', '2022-09-12 16:56:07', '2022-09-12 16:56:07');
INSERT INTO `sys_logs` VALUES (472, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-12 19:30:29', '2022-09-12 19:30:29');
INSERT INTO `sys_logs` VALUES (473, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-13 09:12:46', '2022-09-13 09:12:46');
INSERT INTO `sys_logs` VALUES (474, 'AIImageLibraries', 'Thêm ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: gqm6_7656536.png', '2022-09-13 09:23:38', '2022-09-13 09:23:38');
INSERT INTO `sys_logs` VALUES (475, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: bzzh_7656536.png', '2022-09-13 09:23:42', '2022-09-13 09:23:42');
INSERT INTO `sys_logs` VALUES (476, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: OObg_7656536.png', '2022-09-13 09:23:47', '2022-09-13 09:23:47');
INSERT INTO `sys_logs` VALUES (477, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: UmQo_7656536.png', '2022-09-13 09:23:54', '2022-09-13 09:23:54');
INSERT INTO `sys_logs` VALUES (478, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-13 14:01:27', '2022-09-13 14:01:27');
INSERT INTO `sys_logs` VALUES (479, 'AIImageLibraries', 'Thêm ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: JOAK_7656536.png', '2022-09-13 14:01:50', '2022-09-13 14:01:50');
INSERT INTO `sys_logs` VALUES (480, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: gqm6_7656536.png', '2022-09-13 14:01:57', '2022-09-13 14:01:57');
INSERT INTO `sys_logs` VALUES (481, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: JOAK_7656536.png', '2022-09-13 14:02:45', '2022-09-13 14:02:45');
INSERT INTO `sys_logs` VALUES (482, 'AIImageLibraries', 'Thêm ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_7656536.png', '2022-09-13 14:02:50', '2022-09-13 14:02:50');
INSERT INTO `sys_logs` VALUES (483, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_76565362444.png', '2022-09-13 14:03:29', '2022-09-13 14:03:29');
INSERT INTO `sys_logs` VALUES (484, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_76565362444.png', '2022-09-13 14:04:07', '2022-09-13 14:04:07');
INSERT INTO `sys_logs` VALUES (485, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_76565362444.png', '2022-09-13 14:04:43', '2022-09-13 14:04:43');
INSERT INTO `sys_logs` VALUES (486, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_76565362444.png', '2022-09-13 14:04:51', '2022-09-13 14:04:51');
INSERT INTO `sys_logs` VALUES (487, 'AIImageLibraries', 'Xoá ảnh', 1, 'Thư viện ảnh: Slider trang chủ; Tên ảnh: W7uk_76565362444.png', '2022-09-13 14:09:54', '2022-09-13 14:09:54');
INSERT INTO `sys_logs` VALUES (488, 'AIRealEstateProducts', 'Sửa ảnh', 1, 'Sản phẩm: d1; Tên ảnh: 12.jpg', '2022-09-13 15:10:29', '2022-09-13 15:10:29');
INSERT INTO `sys_logs` VALUES (489, 'AIRealEstateProducts', 'Xoá ảnh', 1, 'Sản phẩm: d1; Tên ảnh: 12.jpg', '2022-09-13 15:10:33', '2022-09-13 15:10:33');
INSERT INTO `sys_logs` VALUES (490, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-13 16:31:12', '2022-09-13 16:31:12');
INSERT INTO `sys_logs` VALUES (491, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-19 14:26:15', '2022-09-19 14:26:15');
INSERT INTO `sys_logs` VALUES (492, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-09-22 14:56:23', '2022-09-22 14:56:23');
INSERT INTO `sys_logs` VALUES (493, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-03 16:09:22', '2022-11-03 16:09:22');
INSERT INTO `sys_logs` VALUES (494, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-03 16:09:39', '2022-11-03 16:09:39');
INSERT INTO `sys_logs` VALUES (495, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-04 08:36:34', '2022-11-04 08:36:34');
INSERT INTO `sys_logs` VALUES (496, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-04 08:38:58', '2022-11-04 08:38:58');
INSERT INTO `sys_logs` VALUES (497, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-04 10:05:43', '2022-11-04 10:05:43');
INSERT INTO `sys_logs` VALUES (498, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-04 15:35:30', '2022-11-04 15:35:30');
INSERT INTO `sys_logs` VALUES (499, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 14:16:14', '2022-11-28 14:16:14');
INSERT INTO `sys_logs` VALUES (500, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 15:06:43', '2022-11-28 15:06:43');
INSERT INTO `sys_logs` VALUES (501, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 15:10:12', '2022-11-28 15:10:12');
INSERT INTO `sys_logs` VALUES (502, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 15:53:44', '2022-11-28 15:53:44');
INSERT INTO `sys_logs` VALUES (503, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 15:54:14', '2022-11-28 15:54:14');
INSERT INTO `sys_logs` VALUES (504, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:03:45', '2022-11-28 16:03:45');
INSERT INTO `sys_logs` VALUES (505, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:03:52', '2022-11-28 16:03:52');
INSERT INTO `sys_logs` VALUES (506, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:04:52', '2022-11-28 16:04:52');
INSERT INTO `sys_logs` VALUES (507, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:05:10', '2022-11-28 16:05:10');
INSERT INTO `sys_logs` VALUES (508, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:19:21', '2022-11-28 16:19:21');
INSERT INTO `sys_logs` VALUES (509, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-28 16:21:35', '2022-11-28 16:21:35');
INSERT INTO `sys_logs` VALUES (510, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 00:50:18', '2022-11-30 00:50:18');
INSERT INTO `sys_logs` VALUES (511, 'AIBannerFooter', 'Sửa', 1, 'Banner: banner', '2022-11-30 09:35:59', '2022-11-30 09:35:59');
INSERT INTO `sys_logs` VALUES (512, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 12:35:12', '2022-11-30 12:35:12');
INSERT INTO `sys_logs` VALUES (513, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 12:49:17', '2022-11-30 12:49:17');
INSERT INTO `sys_logs` VALUES (514, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 12:56:12', '2022-11-30 12:56:12');
INSERT INTO `sys_logs` VALUES (515, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 13:38:22', '2022-11-30 13:38:22');
INSERT INTO `sys_logs` VALUES (516, 'AIAdvertisement', 'Sửa', 1, 'Quảng cáo: Banner', '2022-11-30 15:35:23', '2022-11-30 15:35:23');
INSERT INTO `sys_logs` VALUES (517, 'AIBannerFooter', 'Sửa', 1, 'Banner: Banner', '2022-11-30 15:35:45', '2022-11-30 15:35:45');
INSERT INTO `sys_logs` VALUES (518, 'AIAdvertisement', 'Xoá', 1, 'Quảng cáo: Banner', '2022-11-30 15:35:50', '2022-11-30 15:35:50');
INSERT INTO `sys_logs` VALUES (519, 'AIAdvertisement', 'Xoá', 1, 'Quảng cáo: Footer', '2022-11-30 15:35:59', '2022-11-30 15:35:59');
INSERT INTO `sys_logs` VALUES (520, 'AIBannerFooter', 'Sửa', 1, 'Banner: Banner', '2022-11-30 15:36:19', '2022-11-30 15:36:19');
INSERT INTO `sys_logs` VALUES (521, 'AIAdvertisement', 'Thêm', 1, 'Quảng cáo: Quảng cáo giữa', '2022-11-30 15:38:42', '2022-11-30 15:38:42');
INSERT INTO `sys_logs` VALUES (522, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-11-30 15:52:55', '2022-11-30 15:52:55');
INSERT INTO `sys_logs` VALUES (523, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-11-30 15:53:01', '2022-11-30 15:53:01');
INSERT INTO `sys_logs` VALUES (524, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-11-30 15:53:50', '2022-11-30 15:53:50');
INSERT INTO `sys_logs` VALUES (525, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-11-30 15:59:38', '2022-11-30 15:59:38');
INSERT INTO `sys_logs` VALUES (526, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-11-30 16:06:18', '2022-11-30 16:06:18');
INSERT INTO `sys_logs` VALUES (527, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 16:10:14', '2022-11-30 16:10:14');
INSERT INTO `sys_logs` VALUES (528, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-11-30 21:49:10', '2022-11-30 21:49:10');
INSERT INTO `sys_logs` VALUES (529, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-01 08:48:56', '2022-12-01 08:48:56');
INSERT INTO `sys_logs` VALUES (530, 'AISteeringDocument', 'Sửa', 1, 'Lĩnh vực: Tổ chức', '2022-12-01 08:51:18', '2022-12-01 08:51:18');
INSERT INTO `sys_logs` VALUES (531, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-01 13:52:10', '2022-12-01 13:52:10');
INSERT INTO `sys_logs` VALUES (532, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:07:20', '2022-12-01 14:07:20');
INSERT INTO `sys_logs` VALUES (533, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:07:21', '2022-12-01 14:07:21');
INSERT INTO `sys_logs` VALUES (534, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:07:23', '2022-12-01 14:07:23');
INSERT INTO `sys_logs` VALUES (535, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:07:25', '2022-12-01 14:07:25');
INSERT INTO `sys_logs` VALUES (536, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:07:27', '2022-12-01 14:07:27');
INSERT INTO `sys_logs` VALUES (537, 'AISteeringDocument', 'Xoá', 1, 'Loại: ', '2022-12-01 14:09:27', '2022-12-01 14:09:27');
INSERT INTO `sys_logs` VALUES (538, 'AISteeringDocument', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 14:09:31', '2022-12-01 14:09:31');
INSERT INTO `sys_logs` VALUES (539, 'AISteeringDocument', 'Xoá', 1, 'Văn bản: test12', '2022-12-01 14:21:53', '2022-12-01 14:21:53');
INSERT INTO `sys_logs` VALUES (540, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-01 14:11:37', '2022-12-01 14:11:37');
INSERT INTO `sys_logs` VALUES (541, 'AISteeringDocument', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:11:46', '2022-12-01 14:11:46');
INSERT INTO `sys_logs` VALUES (542, 'AISteeringDocument', 'Thêm', 1, 'Cơ quan ban hành: Phòng giáo dục và đào tạo', '2022-12-01 14:23:36', '2022-12-01 14:23:36');
INSERT INTO `sys_logs` VALUES (543, 'AISteeringDocument', 'Thêm', 1, 'Cơ quan ban hành: HĐND-UBND Huyện', '2022-12-01 14:23:54', '2022-12-01 14:23:54');
INSERT INTO `sys_logs` VALUES (544, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-01 14:18:09', '2022-12-01 14:18:09');
INSERT INTO `sys_logs` VALUES (545, 'AISteeringDocument', 'Thêm', 1, 'Văn bản: 98/SGDĐT-GDTrH', '2022-12-01 14:39:44', '2022-12-01 14:39:44');
INSERT INTO `sys_logs` VALUES (546, 'AIRulesOfLaw', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 14:56:19', '2022-12-01 14:56:19');
INSERT INTO `sys_logs` VALUES (547, 'AIRulesOfLaw', 'Thêm', 1, 'Lĩnh vực: a', '2022-12-01 14:56:55', '2022-12-01 14:56:55');
INSERT INTO `sys_logs` VALUES (548, 'AIRulesOfLaw', 'Thêm', 1, 'Cơ quan ban hành: a', '2022-12-01 14:56:59', '2022-12-01 14:56:59');
INSERT INTO `sys_logs` VALUES (549, 'AIRulesOfLaw', 'Sửa', 1, 'Loại: NGHỊ ĐỊNH1', '2022-12-01 14:59:55', '2022-12-01 14:59:55');
INSERT INTO `sys_logs` VALUES (550, 'AIRulesOfLaw', 'Thêm', 1, 'Loại: a', '2022-12-01 14:59:57', '2022-12-01 14:59:57');
INSERT INTO `sys_logs` VALUES (551, 'AIRulesOfLaw', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 15:00:01', '2022-12-01 15:00:01');
INSERT INTO `sys_logs` VALUES (552, 'AIRulesOfLaw', 'Xoá', 1, 'Loại: ', '2022-12-01 15:00:04', '2022-12-01 15:00:04');
INSERT INTO `sys_logs` VALUES (553, 'AIRulesOfLaw', 'Sửa', 1, 'Loại: NGHỊ ĐỊNH', '2022-12-01 15:00:08', '2022-12-01 15:00:08');
INSERT INTO `sys_logs` VALUES (554, 'AIRulesOfLaw', 'Xoá', 1, 'Cơ quan ban hành: ', '2022-12-01 15:00:11', '2022-12-01 15:00:11');
INSERT INTO `sys_logs` VALUES (555, 'AIRulesOfLaw', 'Thêm', 1, 'Cơ quan ban hành: HĐND-UBND Huyện', '2022-12-01 15:00:23', '2022-12-01 15:00:23');
INSERT INTO `sys_logs` VALUES (556, 'AIRulesOfLaw', 'Sửa', 1, 'Loại: Nghị định', '2022-12-01 15:01:11', '2022-12-01 15:01:11');
INSERT INTO `sys_logs` VALUES (557, 'AIRulesOfLaw', 'Thêm', 1, 'Loại: Quyết định', '2022-12-01 15:01:17', '2022-12-01 15:01:17');
INSERT INTO `sys_logs` VALUES (558, 'AIRulesOfLaw', 'Sửa', 1, 'Lĩnh vực: Giáo dục', '2022-12-01 15:01:25', '2022-12-01 15:01:25');
INSERT INTO `sys_logs` VALUES (559, 'AIRulesOfLaw', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 15:01:27', '2022-12-01 15:01:27');
INSERT INTO `sys_logs` VALUES (560, 'AIRulesOfLaw', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 15:01:28', '2022-12-01 15:01:28');
INSERT INTO `sys_logs` VALUES (561, 'AIRulesOfLaw', 'Thêm', 1, 'Văn bản: 1910/UBND-VX', '2022-12-01 15:02:39', '2022-12-01 15:02:39');
INSERT INTO `sys_logs` VALUES (562, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-01 14:53:50', '2022-12-01 14:53:50');
INSERT INTO `sys_logs` VALUES (563, 'AIRulesOfLaw', 'Thêm', 1, 'Văn bản: 2083/QĐ-UBND', '2022-12-01 15:20:46', '2022-12-01 15:20:46');
INSERT INTO `sys_logs` VALUES (564, 'AISteeringDocument', 'Thêm', 1, 'Văn bản: 73/PGDĐT-VP', '2022-12-01 15:56:45', '2022-12-01 15:56:45');
INSERT INTO `sys_logs` VALUES (565, 'AISteeringDocument', 'Sửa', 1, 'Loại: Nghị định', '2022-12-01 15:56:52', '2022-12-01 15:56:52');
INSERT INTO `sys_logs` VALUES (566, 'AISteeringDocument', 'Thêm', 1, 'Loại: Quyết định', '2022-12-01 15:56:56', '2022-12-01 15:56:56');
INSERT INTO `sys_logs` VALUES (567, 'AISteeringDocument', 'Thêm', 1, 'Loại: Công văn', '2022-12-01 15:57:02', '2022-12-01 15:57:02');
INSERT INTO `sys_logs` VALUES (568, 'AISteeringDocument', 'Sửa', 1, 'Lĩnh vực: Giáo dục', '2022-12-01 15:57:09', '2022-12-01 15:57:09');
INSERT INTO `sys_logs` VALUES (569, 'AISteeringDocument', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 15:57:10', '2022-12-01 15:57:10');
INSERT INTO `sys_logs` VALUES (570, 'AISteeringDocument', 'Xoá', 1, 'Lĩnh vực: ', '2022-12-01 15:57:12', '2022-12-01 15:57:12');
INSERT INTO `sys_logs` VALUES (571, 'AISteeringDocument', 'Sửa', 1, 'Văn bản: 73/PGDĐT-VP', '2022-12-01 15:57:47', '2022-12-01 15:57:47');
INSERT INTO `sys_logs` VALUES (572, 'AISteeringDocument', 'Thêm', 1, 'Văn bản: 74/PGDĐT-NVTrH', '2022-12-01 15:59:07', '2022-12-01 15:59:07');
INSERT INTO `sys_logs` VALUES (573, 'AIRulesOfLaw', 'Sửa', 1, 'Văn bản: 1910/UBND-VX', '2022-12-01 16:13:27', '2022-12-01 16:13:27');
INSERT INTO `sys_logs` VALUES (574, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-02 09:04:59', '2022-12-02 09:04:59');
INSERT INTO `sys_logs` VALUES (575, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-02 09:18:34', '2022-12-02 09:18:34');
INSERT INTO `sys_logs` VALUES (576, 'AIBannerFooter', 'Sửa', 1, 'Banner: Banner', '2022-12-02 09:19:16', '2022-12-02 09:19:16');
INSERT INTO `sys_logs` VALUES (577, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-02 10:07:34', '2022-12-02 10:07:34');
INSERT INTO `sys_logs` VALUES (578, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-02 14:53:44', '2022-12-02 14:53:44');
INSERT INTO `sys_logs` VALUES (579, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 09:14:17', '2022-12-05 09:14:17');
INSERT INTO `sys_logs` VALUES (580, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-12-05 09:16:10', '2022-12-05 09:16:10');
INSERT INTO `sys_logs` VALUES (581, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-12-05 09:16:56', '2022-12-05 09:16:56');
INSERT INTO `sys_logs` VALUES (582, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-12-05 09:18:35', '2022-12-05 09:18:35');
INSERT INTO `sys_logs` VALUES (583, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-12-05 09:19:00', '2022-12-05 09:19:00');
INSERT INTO `sys_logs` VALUES (584, 'AIBannerFooter', 'Sửa', 1, 'Banner: Footer', '2022-12-05 09:21:22', '2022-12-05 09:21:22');
INSERT INTO `sys_logs` VALUES (585, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 10:25:22', '2022-12-05 10:25:22');
INSERT INTO `sys_logs` VALUES (586, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 10:25:55', '2022-12-05 10:25:55');
INSERT INTO `sys_logs` VALUES (587, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 14:47:54', '2022-12-05 14:47:54');
INSERT INTO `sys_logs` VALUES (588, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 15:20:56', '2022-12-05 15:20:56');
INSERT INTO `sys_logs` VALUES (589, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 15:36:08', '2022-12-05 15:36:08');
INSERT INTO `sys_logs` VALUES (590, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 15:43:55', '2022-12-05 15:43:55');
INSERT INTO `sys_logs` VALUES (591, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-05 23:15:04', '2022-12-05 23:15:04');
INSERT INTO `sys_logs` VALUES (592, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-12 15:52:23', '2022-12-12 15:52:23');
INSERT INTO `sys_logs` VALUES (593, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-13 10:05:17', '2022-12-13 10:05:17');
INSERT INTO `sys_logs` VALUES (594, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-13 16:21:23', '2022-12-13 16:21:23');
INSERT INTO `sys_logs` VALUES (595, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-14 10:11:46', '2022-12-14 10:11:46');
INSERT INTO `sys_logs` VALUES (596, 'Đăng nhập', 'Đăng nhập', 1, '', '2022-12-14 14:25:20', '2022-12-14 14:25:20');
INSERT INTO `sys_logs` VALUES (597, 'AIAdvertisement', 'Thêm', 1, 'Quảng cáo: Quảng cáo phải', '2022-12-14 16:55:06', '2022-12-14 16:55:06');

-- ----------------------------
-- Table structure for sys_module_permissions_according_to_users
-- ----------------------------
DROP TABLE IF EXISTS `sys_module_permissions_according_to_users`;
CREATE TABLE `sys_module_permissions_according_to_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_permissions` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'view, edit, delete',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_module_permissions_according_to_users
-- ----------------------------
INSERT INTO `sys_module_permissions_according_to_users` VALUES (1, 1, '', '');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (48, 4, '2,24,25', 'view');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (49, 4, '2,24,25', 'edit');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (50, 4, '25', 'delete');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (51, 6, '24,2,25,38,31,32,29,30,28,27,26,34,33,35,36,37', 'view');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (52, 6, '24,2,25,38,31,32,29,30,28,27,26,34,33,35,36,37', 'edit');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (53, 6, '24,2,25,38,31,32,29,30,28,27,26,34,33,35,36,37', 'delete');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (54, 7, '2', 'view');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (55, 7, '24', 'add');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (56, 7, '24', 'edit');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (57, 7, '24', 'delete');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (58, 6, '24,2,25,38,31,32,29,30,28,27,26,34,33,35,36,37', 'add');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (59, 4, '2,24,25', 'add');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (60, 8, NULL, 'view');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (61, 8, NULL, 'add');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (62, 8, NULL, 'edit');
INSERT INTO `sys_module_permissions_according_to_users` VALUES (63, 8, NULL, 'delete');

-- ----------------------------
-- Table structure for sys_website_information
-- ----------------------------
DROP TABLE IF EXISTS `sys_website_information`;
CREATE TABLE `sys_website_information`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `numberphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `hotline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bussiness_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `custom_footer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color_gradient` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color_background` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color_font` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color_font_hover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `color_font_focus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_dc_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_geo_region` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_geo_placename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_geo_position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meta_icbm` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `theme` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sys_website_information
-- ----------------------------
INSERT INTO `sys_website_information` VALUES (1, 'Trường THCS DTNT Mỹ Tú', 'Mỹ Tú, Sóc Trăng', '/upload/logo/logo-pgd-mt.png', NULL, NULL, NULL, NULL, NULL, NULL, 'linear-gradient(45deg, #0044cc, #b800cc)', 'red', 'red', '#448026', '#ff8000', 'Tiêu đề (meta_title):', 'sda', 'keywords', 'author', 'country', NULL, NULL, NULL, NULL, NULL, 'default');

SET FOREIGN_KEY_CHECKS = 1;
