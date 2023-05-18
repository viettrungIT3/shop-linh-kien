/*
 Navicat Premium Data Transfer

 Source Server         : shop-linh-kien
 Source Server Type    : MySQL
 Source Server Version : 50741
 Source Host           : localhost:3939
 Source Schema         : shop_nw_db

 Target Server Type    : MySQL
 Target Server Version : 50741
 File Encoding         : 65001

 Date: 18/05/2023 07:36:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Cart
-- ----------------------------
DROP TABLE IF EXISTS `Cart`;
CREATE TABLE `Cart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` decimal(10, 2) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Cart
-- ----------------------------
INSERT INTO `Cart` VALUES (22, 1, 212, 433.50, 1);
INSERT INTO `Cart` VALUES (23, 1, 187, 14.50, 1);
INSERT INTO `Cart` VALUES (24, 1, 143, 2771.72, 1);
INSERT INTO `Cart` VALUES (25, 3, 196, 240.50, 1);

-- ----------------------------
-- Table structure for Categories
-- ----------------------------
DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(4) NULL DEFAULT 1 COMMENT '0: blocked| 1: showing | 2: deleted',
  `total_product` int(11) NULL DEFAULT 0,
  `created_by` tinyint(11) NULL DEFAULT NULL,
  `updated_by` tinyint(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Categories
-- ----------------------------
INSERT INTO `Categories` VALUES (1, 'Laptop Accessories', '', 0, 7, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (2, 'PC Accessories', '', 0, 22, 1, 1, '2023-05-03 11:26:25', '2023-05-03 05:21:16');
INSERT INTO `Categories` VALUES (3, 'Desk Setup Accessories', NULL, 2, 8, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (4, 'Headphone Accessories', NULL, 1, 10, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (5, 'Hard Drives', NULL, 2, 3, 1, 1, '2023-05-03 11:26:25', '2023-05-03 05:20:23');
INSERT INTO `Categories` VALUES (6, 'Cables', NULL, 1, 8, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (7, 'Adapters', NULL, 1, 11, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (8, 'Signal Splitters', NULL, 1, 4, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (9, 'Other Accessories', NULL, 1, 2, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');

-- ----------------------------
-- Table structure for Order_Details
-- ----------------------------
DROP TABLE IF EXISTS `Order_Details`;
CREATE TABLE `Order_Details`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Order_Details
-- ----------------------------
INSERT INTO `Order_Details` VALUES (7, 17, 157, 1, 2.00);
INSERT INTO `Order_Details` VALUES (8, 17, 177, 1, 79.32);
INSERT INTO `Order_Details` VALUES (9, 17, 168, 1, 123.12);
INSERT INTO `Order_Details` VALUES (10, 17, 203, 1, 242.53);
INSERT INTO `Order_Details` VALUES (11, 17, 199, 1, 149.30);
INSERT INTO `Order_Details` VALUES (12, 17, 188, 1, 10.40);
INSERT INTO `Order_Details` VALUES (13, 18, 221, 1, 903.40);

-- ----------------------------
-- Table structure for Orders
-- ----------------------------
DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tax` decimal(10, 2) NULL DEFAULT 0.05 COMMENT '5% ',
  `shipping` decimal(10, 2) NULL DEFAULT 0.00,
  `total_amount` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1: Processing\r\n2: Processed\r\n3: Shipping\r\n4: Complete\r\n5: Cancelled\r\n6: On hold: Đơn hàng bị tạm dừng để chờ xử lý các vấn đề liên quan đến thanh toán hoặc sản phẩm.\r\n7: Failed: Đơn hàng không thành công do lỗi kỹ thuật hoặc khách hàng từ chối thanh toán.',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone_number` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Orders
-- ----------------------------
INSERT INTO `Orders` VALUES (17, 1, 'Admin ', 0.05, 0.00, 637.00, '3', '2023-05-13 05:01:18', 'No. 298 E. Dien Bridge, Minh Khai, Bac Tu Liem, Hanoi(Minh Khai, Bac Tu Liem, Ha Noi, ALA)', 123456, '2023-05-13 05:01:18');
INSERT INTO `Orders` VALUES (18, 3, 'Trung Nguy?n', 0.05, 0.00, 948.57, '4', '2023-05-17 14:32:58', 'No 298, Cau Dien Bridge(Minh Khai, Bac Tu Liem, Ha Noi, VNM)', 123456789, '2023-05-17 12:01:48');

-- ----------------------------
-- Table structure for Product_Images
-- ----------------------------
DROP TABLE IF EXISTS `Product_Images`;
CREATE TABLE `Product_Images`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `Products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 322 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Product_Images
-- ----------------------------
INSERT INTO `Product_Images` VALUES (85, 3, '4a47a0db6e60853dedfcfdf08a5ca249_1683454387.png');
INSERT INTO `Product_Images` VALUES (86, 144, '36b6cab091cbfd66122b9354a7a76704_1683459296.webp');
INSERT INTO `Product_Images` VALUES (87, 149, 'af688b7260c4bfa21be48e8e90489c4f_1683460820.webp');
INSERT INTO `Product_Images` VALUES (88, 149, 'fe19fd7b0f12d360460474975b15e54e_1683460820.webp');
INSERT INTO `Product_Images` VALUES (89, 149, 'f7b880116016c38b75f50c08029445f5_1683460820.webp');
INSERT INTO `Product_Images` VALUES (90, 149, 'f19f3c7e9a65169be38bdd54abaf8ee8_1683460820.webp');
INSERT INTO `Product_Images` VALUES (91, 149, '20f060312b9b8f14b479fa024aa5bd71_1683460820.webp');
INSERT INTO `Product_Images` VALUES (92, 149, '55f2028096ee274334b726fa8fee257b_1683460820.webp');
INSERT INTO `Product_Images` VALUES (93, 149, '550100b925387b19414b33545f84c112_1683460820.webp');
INSERT INTO `Product_Images` VALUES (94, 149, 'ca1726e4be74f647d84c877be2c5e182_1683460820.webp');
INSERT INTO `Product_Images` VALUES (96, 153, 'a7ba5a08727d5232ae3cf103eb4bd5b3_1683468479.webp');
INSERT INTO `Product_Images` VALUES (97, 153, '8f3b1550c0e5c4e30c9930adc045e916_1683468479.webp');
INSERT INTO `Product_Images` VALUES (98, 153, '3d16c840ac61bba306029a47f678571e_1683468479.webp');
INSERT INTO `Product_Images` VALUES (99, 153, '1b863fa2ed90892caa425c2e0c0e9eb8_1683468479.webp');
INSERT INTO `Product_Images` VALUES (100, 153, '031f29d0ba23d6c35138551488538af3_1683468479.webp');
INSERT INTO `Product_Images` VALUES (104, 154, 'a2623c222317fa36524b949293a32145_1683469468.webp');
INSERT INTO `Product_Images` VALUES (105, 154, '07bdc0d3c710cb31bc705741966d54c7_1683469468.webp');
INSERT INTO `Product_Images` VALUES (106, 154, '54ecbf75ea7a252862ed12494eae9774_1683469468.webp');
INSERT INTO `Product_Images` VALUES (107, 155, '3d16c840ac61bba306029a47f678571e_1683469668.webp');
INSERT INTO `Product_Images` VALUES (108, 155, '1b863fa2ed90892caa425c2e0c0e9eb8_1683469668.webp');
INSERT INTO `Product_Images` VALUES (109, 155, '031f29d0ba23d6c35138551488538af3_1683469668.webp');
INSERT INTO `Product_Images` VALUES (110, 155, '36b6cab091cbfd66122b9354a7a76704_1683469668.webp');
INSERT INTO `Product_Images` VALUES (111, 162, 'da1c71a730cf913d16340ea68ce35101_1683471517.webp');
INSERT INTO `Product_Images` VALUES (112, 162, 'a7ba5a08727d5232ae3cf103eb4bd5b3_1683471517.webp');
INSERT INTO `Product_Images` VALUES (113, 162, '8f3b1550c0e5c4e30c9930adc045e916_1683471517.webp');
INSERT INTO `Product_Images` VALUES (114, 163, 'da1c71a730cf913d16340ea68ce35101_1683471530.webp');
INSERT INTO `Product_Images` VALUES (115, 163, 'a7ba5a08727d5232ae3cf103eb4bd5b3_1683471530.webp');
INSERT INTO `Product_Images` VALUES (116, 163, '8f3b1550c0e5c4e30c9930adc045e916_1683471530.webp');
INSERT INTO `Product_Images` VALUES (117, 164, 'da1c71a730cf913d16340ea68ce35101_1683471539.webp');
INSERT INTO `Product_Images` VALUES (118, 164, 'a7ba5a08727d5232ae3cf103eb4bd5b3_1683471539.webp');
INSERT INTO `Product_Images` VALUES (119, 164, '8f3b1550c0e5c4e30c9930adc045e916_1683471539.webp');
INSERT INTO `Product_Images` VALUES (124, 167, 'ea15f2f443430ac8a917610a65b05773_1683472232.webp');
INSERT INTO `Product_Images` VALUES (125, 167, '3d8f28eb3a88a9dff01b6c136f6b6b35_1683472232.webp');
INSERT INTO `Product_Images` VALUES (126, 167, 'b2f27b8a7d0d0af01b35e95ace2b9866_1683472232.webp');
INSERT INTO `Product_Images` VALUES (127, 168, '225ea55f3a4d491664eb2ef902bf9b02_1683472927.webp');
INSERT INTO `Product_Images` VALUES (128, 168, '07c186118f73254fd288c6c510f29ea3_1683472927.webp');
INSERT INTO `Product_Images` VALUES (129, 168, '0adadb6fedd8f8be56361da4c79a137c_1683472927.webp');
INSERT INTO `Product_Images` VALUES (130, 169, 'a32f1ea2d525a7bb627304159fbeff5e_1683473141.webp');
INSERT INTO `Product_Images` VALUES (131, 169, 'e89666feb714ab9c3946f28f00c5d8c4_1683473141.jpg');
INSERT INTO `Product_Images` VALUES (132, 169, 'a269962fe1424e1ca3e68c328b9fed61_1683473141.jpg');
INSERT INTO `Product_Images` VALUES (133, 170, '8807b4001e17969099b8e287f66014dc_1683473307.webp');
INSERT INTO `Product_Images` VALUES (134, 170, '62e837112ff0d173315a523c363a7710_1683473307.webp');
INSERT INTO `Product_Images` VALUES (135, 170, '48176746967eb3d31121fb94b86a4ad2_1683473307.webp');
INSERT INTO `Product_Images` VALUES (136, 171, 'a49ee73d0d3b03aee060dfa27a36a9a0_1683473486.webp');
INSERT INTO `Product_Images` VALUES (137, 171, 'eb4831021c64907600692f37bf1f1308_1683473486.webp');
INSERT INTO `Product_Images` VALUES (138, 172, '0b73e73a43b6daa66eaca7f655e84410_1683473651.webp');
INSERT INTO `Product_Images` VALUES (139, 172, '1afddf0694b7485bc5f8eebdcae58f8b_1683473651.webp');
INSERT INTO `Product_Images` VALUES (140, 172, '8275ed93421af3aebd341a61fb337450_1683473651.webp');
INSERT INTO `Product_Images` VALUES (141, 173, '9784fa8d2f71819ee68ea87007f2da5a_1683474018.webp');
INSERT INTO `Product_Images` VALUES (142, 173, 'b462a2c455a2a908787a3aa4c3adf4f1_1683474018.webp');
INSERT INTO `Product_Images` VALUES (143, 174, '7953976f296a55498c333fa0de429a3a_1683474126.webp');
INSERT INTO `Product_Images` VALUES (144, 177, 'a5f089a7ff1e2ab7141a9b4d95219fb7_1683474334.webp');
INSERT INTO `Product_Images` VALUES (145, 177, '8b74364da24257b4619e35f9f907817b_1683474334.webp');
INSERT INTO `Product_Images` VALUES (146, 178, 'f6c81ba77aa30de0427d68788ab17c4c_1683474495.webp');
INSERT INTO `Product_Images` VALUES (147, 178, '19c682d941d626fec47bad4f0b6bad0d_1683474495.webp');
INSERT INTO `Product_Images` VALUES (148, 181, 'e1fd57ecf5cce6c5e4448a2c8bb365fd_1683474680.webp');
INSERT INTO `Product_Images` VALUES (149, 182, 'c653b5f7229c92d2669dc3abbbcc3b68_1683475844.webp');
INSERT INTO `Product_Images` VALUES (150, 183, 'e82ba6ec8663e3ad80d84285eb217e26_1683475974.webp');
INSERT INTO `Product_Images` VALUES (151, 183, 'b783adaf264297068ddc581ecdd0846e_1683475974.webp');
INSERT INTO `Product_Images` VALUES (152, 184, '582b27cca3e28503b7f22ea163cb7105_1683476065.webp');
INSERT INTO `Product_Images` VALUES (153, 185, '40a6192396994be09cff696d558936e6_1683476169.webp');
INSERT INTO `Product_Images` VALUES (154, 186, '6be5e86463d78c5714985897f773f7e6_1683476415.webp');
INSERT INTO `Product_Images` VALUES (155, 186, '2f4c27e5f76d5fe248c7827d9b2a0b59_1683476415.webp');
INSERT INTO `Product_Images` VALUES (156, 186, 'c429adbbb8133c1bda85dce774ffea10_1683476416.webp');
INSERT INTO `Product_Images` VALUES (157, 187, 'edc8d02f0ddf543d10bf1e5d3755516f_1683476595.webp');
INSERT INTO `Product_Images` VALUES (158, 187, 'aff1a803a6c50f11e3199731a347b1e8_1683476595.webp');
INSERT INTO `Product_Images` VALUES (159, 187, 'b6e49586108b36341bac0f0fd4d4a821_1683476595.webp');
INSERT INTO `Product_Images` VALUES (160, 187, 'acbcf975ec9dda73ec7f6aba22a4285d_1683476595.webp');
INSERT INTO `Product_Images` VALUES (161, 188, '55d16ef9bd804d0bb38e6927d56f1dd3_1683476708.webp');
INSERT INTO `Product_Images` VALUES (162, 188, 'abbd9c8de0297b5f0054966e87453c50_1683476708.webp');
INSERT INTO `Product_Images` VALUES (163, 188, 'c19c439f852bdd12270c031ea1c66cc7_1683476708.webp');
INSERT INTO `Product_Images` VALUES (164, 189, 'fc5738ccea790a450ca4e3c57c2dc87a_1683476838.webp');
INSERT INTO `Product_Images` VALUES (165, 191, '551eca42ad1eb2970d33c240848fd1dd_1683477297.webp');
INSERT INTO `Product_Images` VALUES (166, 191, 'c8362ec2121d16d1a44b90b0af75e9e5_1683477297.webp');
INSERT INTO `Product_Images` VALUES (167, 191, '69ec7ff1caf1a17780322bd40ad8c000_1683477297.webp');
INSERT INTO `Product_Images` VALUES (168, 191, '9c2e3935e04103b282d6969fddb49635_1683477297.webp');
INSERT INTO `Product_Images` VALUES (169, 191, '66479807425483ff19239516da9f76c3_1683477297.webp');
INSERT INTO `Product_Images` VALUES (177, 194, '0f20e4d1889c3479198ec3877282fa8f_1683477891.webp');
INSERT INTO `Product_Images` VALUES (178, 194, '00a0900fdecf3609afe141b538588cf9_1683477891.webp');
INSERT INTO `Product_Images` VALUES (179, 194, '3eaef72c340102b0cebd881ac0b5eee3_1683477891.webp');
INSERT INTO `Product_Images` VALUES (180, 194, 'cd8e047db7ec1551e987d60563746d79_1683477891.webp');
INSERT INTO `Product_Images` VALUES (181, 195, 'ceef510f54582d7c69f3226b207eb0b9_1683478013.webp');
INSERT INTO `Product_Images` VALUES (182, 195, '9db058965467052646fa401aa8b8c3b4_1683478013.webp');
INSERT INTO `Product_Images` VALUES (183, 196, '0d5d8872792f29a22aa66ddb938b9ea3_1683478237.webp');
INSERT INTO `Product_Images` VALUES (184, 196, '3ff382cb4caa8efd434d86091a369356_1683478237.jpg');
INSERT INTO `Product_Images` VALUES (185, 196, 'f0cd85dd575f97df3d2ac46d1bb3eb9a_1683478237.webp');
INSERT INTO `Product_Images` VALUES (186, 196, '9d79b8a982d165dcec7ef9c335252fda_1683478237.webp');
INSERT INTO `Product_Images` VALUES (187, 196, '466f1f6c5031bbc47830d77f67b58670_1683478237.webp');
INSERT INTO `Product_Images` VALUES (188, 197, 'bb13befb004c15ed1da388a58c22cb03_1683478398.webp');
INSERT INTO `Product_Images` VALUES (189, 198, 'ff82f5fd48d03ee3629bef55a3429890_1683478514.webp');
INSERT INTO `Product_Images` VALUES (190, 198, '6466136d1077a4900f42c47e312d4188_1683478514.png');
INSERT INTO `Product_Images` VALUES (191, 198, '48b5e330ce1abb26b5756ad0ade1dd24_1683478514.png');
INSERT INTO `Product_Images` VALUES (192, 198, '01dcb7af3945ba0fd64a3927f2b69fb4_1683478514.png');
INSERT INTO `Product_Images` VALUES (193, 198, '8edb3cd8e98d14be7ad0db0ad16bf05c_1683478514.webp');
INSERT INTO `Product_Images` VALUES (194, 199, '32f22a760c328ac0a46f9a0b292bed15_1683478644.webp');
INSERT INTO `Product_Images` VALUES (195, 199, '6cfafe96f060dd0a479250f7fb0fe9be_1683478644.webp');
INSERT INTO `Product_Images` VALUES (196, 199, '6d5e2f809417cc286f20e1420af899de_1683478644.webp');
INSERT INTO `Product_Images` VALUES (197, 199, '11d322c6420526478a2a54d3118df2a3_1683478644.webp');
INSERT INTO `Product_Images` VALUES (198, 199, '21084c6f86cd97a00e9b105e426dfdf0_1683478644.webp');
INSERT INTO `Product_Images` VALUES (199, 199, 'dad58524e7d40581d6c34cd5d4c38ddf_1683478644.webp');
INSERT INTO `Product_Images` VALUES (200, 200, '568d745fcc2d2284a03251b81d1e2523_1683478775.webp');
INSERT INTO `Product_Images` VALUES (201, 200, 'c325df85318837b327e6b4404d770d1d_1683478775.webp');
INSERT INTO `Product_Images` VALUES (202, 200, '21431042a42ac8a382912a33a502da4f_1683478775.webp');
INSERT INTO `Product_Images` VALUES (203, 200, '12616f49dd6001427ee2e7bc432bf41e_1683478775.webp');
INSERT INTO `Product_Images` VALUES (204, 200, '68309fc60f719bd9b57bde529d7dcedd_1683478775.webp');
INSERT INTO `Product_Images` VALUES (205, 201, '7627fce925cf8ba5091a4b9b759e4bfd_1683478987.jpg');
INSERT INTO `Product_Images` VALUES (206, 201, '93aa8fdb5a59db9fe2cbad73c0f57d87_1683478987.webp');
INSERT INTO `Product_Images` VALUES (207, 201, 'af26290ca4b8db13888b6d923d8906b6_1683478987.jpg');
INSERT INTO `Product_Images` VALUES (208, 201, 'c9a04405bdae4bcf0b0b800be4efe487_1683478987.webp');
INSERT INTO `Product_Images` VALUES (209, 201, 'c87439e20c4c011333861c880bedf60f_1683478987.webp');
INSERT INTO `Product_Images` VALUES (210, 201, 'eb66313c52900c69e35ae922ef9a0815_1683478987.webp');
INSERT INTO `Product_Images` VALUES (211, 201, '17a289ae7b2e0d62ca4ffce13dfbe92d_1683478987.webp');
INSERT INTO `Product_Images` VALUES (212, 142, '2a83f8aaa8bf159099e6a0fabcdd7e16_1683531455.jpg');
INSERT INTO `Product_Images` VALUES (213, 165, 'df8f2fb56f9b6e4a9afac023a2f8ab72_1683531524.webp');
INSERT INTO `Product_Images` VALUES (214, 165, 'd39fbca71a442115e269e0b8e81ab604_1683531524.webp');
INSERT INTO `Product_Images` VALUES (215, 165, '788fb3e39269e045dbdad2701f05af3b_1683531524.webp');
INSERT INTO `Product_Images` VALUES (216, 165, 'f8c91b0995fb673f1cf2d85f36d964d4_1683531524.webp');
INSERT INTO `Product_Images` VALUES (217, 165, '303f7f528f890d8dc473e6db2f5af7f5_1683531524.webp');
INSERT INTO `Product_Images` VALUES (218, 179, '60e4fac5580d51e8119710e935d35c39_1683531648.webp');
INSERT INTO `Product_Images` VALUES (219, 190, 'adced3b03fa5b7edb60c567a16e19e53_1683531814.webp');
INSERT INTO `Product_Images` VALUES (220, 190, '88175db72cba8132e5c5db40d2129333_1683531814.webp');
INSERT INTO `Product_Images` VALUES (221, 190, '7ec1a9ff91b4fe006be2fae0797d314e_1683531814.webp');
INSERT INTO `Product_Images` VALUES (222, 190, '0205884b0f2a8c2b800c00e7732dbcb0_1683531814.webp');
INSERT INTO `Product_Images` VALUES (223, 190, '50e7f5ff9b635def75b49592f7ec1287_1683531814.webp');
INSERT INTO `Product_Images` VALUES (224, 141, '9be0d192301baec6ec5292b6562934fb_1683532213.jpg');
INSERT INTO `Product_Images` VALUES (231, 193, '77d07b2ca1bcb033d66ab3a7ea7f5a3e_1683532221.webp');
INSERT INTO `Product_Images` VALUES (232, 193, 'f15866952ceced444690d62a609b2484_1683532221.webp');
INSERT INTO `Product_Images` VALUES (233, 193, '8e4085062f539d3c7b85009749238487_1683532221.webp');
INSERT INTO `Product_Images` VALUES (234, 193, 'eae5361bbe65b6798f8b1674113bd48a_1683532221.webp');
INSERT INTO `Product_Images` VALUES (235, 193, 'c20deb3fc3952080a1a2889fef5433eb_1683532221.webp');
INSERT INTO `Product_Images` VALUES (236, 193, '3fd0a4a399a9db1852a5cfef14be0731_1683532221.webp');
INSERT INTO `Product_Images` VALUES (237, 202, 'c52f7580acdf4b5e41d1ae430239fb3e_1683534024.webp');
INSERT INTO `Product_Images` VALUES (238, 202, '85082c3d0cb26a5e7e511c14f1e673c1_1683534024.webp');
INSERT INTO `Product_Images` VALUES (239, 202, '023095c89d9252b82bff504fc9de64d0_1683534024.webp');
INSERT INTO `Product_Images` VALUES (240, 202, 'e87d4fe09f34cc9aeedabdaeeef7b91e_1683534024.webp');
INSERT INTO `Product_Images` VALUES (241, 202, '37680f158d9b7c0181c9ccdee314398b_1683534024.webp');
INSERT INTO `Product_Images` VALUES (242, 203, 'c4f2ea2d1dabe2e6488cc13f14c12d78_1683534154.webp');
INSERT INTO `Product_Images` VALUES (243, 204, '96e1a65ccb265e904e0f2fb291a12a48_1683534278.webp');
INSERT INTO `Product_Images` VALUES (244, 204, 'aa34b514ee47fad7e7ea1dfca39ea76d_1683534278.webp');
INSERT INTO `Product_Images` VALUES (245, 204, '1f87b7e570d83dcf5914e1ca8cd836f9_1683534278.webp');
INSERT INTO `Product_Images` VALUES (246, 204, '5351699c1049d7d0fd3bd75aab90264c_1683534278.webp');
INSERT INTO `Product_Images` VALUES (247, 204, 'f023035b8538b91e679d19466d960b5d_1683534278.webp');
INSERT INTO `Product_Images` VALUES (248, 205, 'd43d175e76471ec49c961fd0dba8a566_1683534379.webp');
INSERT INTO `Product_Images` VALUES (249, 205, '3e7e99b94efd3ce1a918ff9b11b1035a_1683534379.webp');
INSERT INTO `Product_Images` VALUES (250, 206, '069a28cc95172cbf91bc8aceee606203_1683534532.webp');
INSERT INTO `Product_Images` VALUES (251, 207, '0537988dead6de215c6542c258622b07_1683534682.webp');
INSERT INTO `Product_Images` VALUES (252, 207, '5c18202ceb4b93cfbff10c6788599d2c_1683534682.webp');
INSERT INTO `Product_Images` VALUES (253, 207, 'a1d90270b28c59303f511d2cb171ce3c_1683534682.webp');
INSERT INTO `Product_Images` VALUES (254, 207, 'c80393a0b69bab1f99be7f41aa15734f_1683534682.webp');
INSERT INTO `Product_Images` VALUES (255, 207, 'cf036a718a40c0a5e3f81f9e01f9ac5d_1683534682.webp');
INSERT INTO `Product_Images` VALUES (256, 208, 'dd7ea16b19e637cd859e92aafd569897_1683534857.png');
INSERT INTO `Product_Images` VALUES (257, 208, '5156add4564892805c4bd8dee890fc6a_1683534857.webp');
INSERT INTO `Product_Images` VALUES (258, 208, '0481527be3816c05ddae106123e101fd_1683534857.png');
INSERT INTO `Product_Images` VALUES (259, 208, '08fa594157551809975a9930150d4278_1683534857.webp');
INSERT INTO `Product_Images` VALUES (260, 209, '9d945015b901dec7eafafeea5cfa304a_1683535055.webp');
INSERT INTO `Product_Images` VALUES (261, 209, 'b5bce25d336573e7072ca7f4cee0747d_1683535055.jpg');
INSERT INTO `Product_Images` VALUES (262, 209, 'dee559244612c28ff567dc7bc98aecdb_1683535055.webp');
INSERT INTO `Product_Images` VALUES (263, 209, '982dba7d499bd255150d2cd8fc380bf0_1683535055.webp');
INSERT INTO `Product_Images` VALUES (264, 209, 'cce4b5841d93fff76fffe7838cea4ab4_1683535055.webp');
INSERT INTO `Product_Images` VALUES (265, 209, '92b956ee4fe7a54a18ae23497f19f786_1683535055.jpg');
INSERT INTO `Product_Images` VALUES (266, 209, '9156d855f3eeec2fed0fa71cf8c7a254_1683535055.jpg');
INSERT INTO `Product_Images` VALUES (267, 209, 'b445a1fe176830fa1688e8584e525314_1683535055.webp');
INSERT INTO `Product_Images` VALUES (268, 209, '249918607d018737e491916e3a18823c_1683535055.webp');
INSERT INTO `Product_Images` VALUES (269, 209, '6530bf3d76e225e2522d2af06273b508_1683535055.webp');
INSERT INTO `Product_Images` VALUES (270, 210, 'c92ed10cb3bdd57927a7022c06eb6606_1683535207.webp');
INSERT INTO `Product_Images` VALUES (271, 211, '2fc2e6f1f66d639156aeeb9b2e975c07_1683535335.webp');
INSERT INTO `Product_Images` VALUES (272, 211, 'bb90f16c5103205bd5504f8007343b2d_1683535335.webp');
INSERT INTO `Product_Images` VALUES (273, 211, 'c5d7f06ce5d48ab201c02cff891b217a_1683535335.webp');
INSERT INTO `Product_Images` VALUES (274, 211, '96d0448ed89989e661730751c861de4d_1683535335.webp');
INSERT INTO `Product_Images` VALUES (275, 211, '6d0fa231d931615f3e6d8916b304dc3b_1683535335.webp');
INSERT INTO `Product_Images` VALUES (276, 211, 'f3bed06d45ca8520fec864a28f59bb16_1683535335.webp');
INSERT INTO `Product_Images` VALUES (277, 212, 'bdb32e4ff712a94274115226be107be5_1683535485.webp');
INSERT INTO `Product_Images` VALUES (278, 213, '9b0e174e7d7c4c4379549e955729dfc6_1683535604.webp');
INSERT INTO `Product_Images` VALUES (279, 213, 'a11296482ad2ae578d85334fe0775304_1683535604.webp');
INSERT INTO `Product_Images` VALUES (280, 213, 'd35622d938f56db590c112bf6f0d8f03_1683535604.webp');
INSERT INTO `Product_Images` VALUES (281, 213, '7318fe18eb19ae1f08a95268dcfcf128_1683535604.webp');
INSERT INTO `Product_Images` VALUES (282, 213, '87bf9b1f3d19e4c525fc792afb8f090d_1683535604.webp');
INSERT INTO `Product_Images` VALUES (283, 213, 'afbcf9ec75e5ba8b043eede99ed1c2f4_1683535604.webp');
INSERT INTO `Product_Images` VALUES (284, 213, '9fb6fad785339b33b63e430edc54cdd3_1683535604.webp');
INSERT INTO `Product_Images` VALUES (285, 214, 'af886468c92d1b30fb8dac9edefe37ee_1683535741.webp');
INSERT INTO `Product_Images` VALUES (286, 214, '5cf42b7070c7830865d9bc60e0f6c7bb_1683535741.webp');
INSERT INTO `Product_Images` VALUES (287, 214, '9b7eb84eab7144b5b63c1852e652989d_1683535741.webp');
INSERT INTO `Product_Images` VALUES (288, 214, 'ef0f7d7f06c36f3ab9cc60250c8c3584_1683535741.webp');
INSERT INTO `Product_Images` VALUES (289, 214, '970017c47f45df0a4f5fa66024ba1907_1683535741.webp');
INSERT INTO `Product_Images` VALUES (290, 214, '714bbfa2b3788fe87b0a814b4aacfbc2_1683535741.webp');
INSERT INTO `Product_Images` VALUES (291, 215, '105b1ca036e785f09e44612caa72da6c_1683535877.webp');
INSERT INTO `Product_Images` VALUES (292, 215, '4de89be8e43a9bda253985192e1bcb39_1683535877.webp');
INSERT INTO `Product_Images` VALUES (293, 215, 'ef0b3c1f04a3a0ec0c2820dd26b062ee_1683535877.webp');
INSERT INTO `Product_Images` VALUES (294, 215, 'c2e6cdddd1e7b04ede5d84bf23dab6a9_1683535877.webp');
INSERT INTO `Product_Images` VALUES (295, 216, 'b0c82ec17cef2ffa3a409a192b5d55d3_1683535997.webp');
INSERT INTO `Product_Images` VALUES (296, 216, '7e755531d30215d0f8fb2577e220fc7a_1683535997.webp');
INSERT INTO `Product_Images` VALUES (297, 216, '7804ba7bd498f0c82246ccd2aae0c2c2_1683535997.webp');
INSERT INTO `Product_Images` VALUES (298, 216, 'fe81db1ed6327e1fff23692ecedb6fb3_1683535997.webp');
INSERT INTO `Product_Images` VALUES (299, 217, '7e755531d30215d0f8fb2577e220fc7a_1683536140.webp');
INSERT INTO `Product_Images` VALUES (300, 217, '7804ba7bd498f0c82246ccd2aae0c2c2_1683536140.webp');
INSERT INTO `Product_Images` VALUES (301, 217, 'fe81db1ed6327e1fff23692ecedb6fb3_1683536140.webp');
INSERT INTO `Product_Images` VALUES (302, 217, '3c25840e9d9b7afeb7c40cc2f4ad7b10_1683536140.webp');
INSERT INTO `Product_Images` VALUES (303, 218, 'f16cd58727bebec3106d039e0536e14f_1683536265.webp');
INSERT INTO `Product_Images` VALUES (304, 218, '82276940e5ae2234dc9d04d9c6a1f2df_1683536265.webp');
INSERT INTO `Product_Images` VALUES (305, 218, '517c293ad1107e69cc599e3609458b12_1683536265.webp');
INSERT INTO `Product_Images` VALUES (306, 219, '4bf59b28550af8f99d77c4f0b5f8c0a7_1683536474.webp');
INSERT INTO `Product_Images` VALUES (307, 219, 'beb473c6c11c55eb05fa45c6662ad1c0_1683536474.webp');
INSERT INTO `Product_Images` VALUES (308, 219, '740436b58565ef9466eeb960fdb2b3c8_1683536474.jpg');
INSERT INTO `Product_Images` VALUES (309, 219, '7ca4d0d83e4b68d81e5695fd2664cc63_1683536474.webp');
INSERT INTO `Product_Images` VALUES (310, 219, '842d7f715a680c5f6d34b722c40138ac_1683536474.webp');
INSERT INTO `Product_Images` VALUES (311, 219, 'b2c5a55d79870d68137e63588ad389e0_1683536474.webp');
INSERT INTO `Product_Images` VALUES (312, 220, '9a4205e74018263a85ec674b6e0bcb5e_1683536656.webp');
INSERT INTO `Product_Images` VALUES (313, 220, '3dca6021a09e6ed766d929dcb0745557_1683536657.webp');
INSERT INTO `Product_Images` VALUES (314, 220, 'fca515f071f51164c31c83d5c31655e3_1683536657.webp');
INSERT INTO `Product_Images` VALUES (315, 220, 'a91b0800f6af6a5dbc03f370c61086b2_1683536657.webp');
INSERT INTO `Product_Images` VALUES (316, 220, '047fcf19833331f5333256549b9743ad_1683536657.webp');
INSERT INTO `Product_Images` VALUES (317, 220, 'ac0a6e8b11f293cec3c92a27d994178e_1683536657.webp');
INSERT INTO `Product_Images` VALUES (318, 221, 'eaf89a34ef42f82d902cbb05bce0fb77_1683536773.webp');
INSERT INTO `Product_Images` VALUES (319, 221, '23ed4d98fc725d5f1a9a1f33ef49bcd2_1683536773.webp');
INSERT INTO `Product_Images` VALUES (320, 221, '68a6ff6c583df9a466943d8ee42e3767_1683536773.webp');
INSERT INTO `Product_Images` VALUES (321, 221, 'e0e12241976c6525ecc265b29f9b4320_1683536773.webp');

-- ----------------------------
-- Table structure for Products
-- ----------------------------
DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10, 2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `brand` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `warranty` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gift_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `weight` float NULL DEFAULT NULL,
  `special_features` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(4) NULL DEFAULT 1 COMMENT '0: blocked| 1: showing | 2: deleted',
  `created_by` tinyint(11) NULL DEFAULT 2,
  `updated_by` tinyint(11) NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 222 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Products
-- ----------------------------
INSERT INTO `Products` VALUES (3, 2, 'test', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 10, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 11:56:31', '2023-05-07 10:13:07');
INSERT INTO `Products` VALUES (141, 2, 'PNY GeForce GTX 1650 4GB GDDR6 Single Fan', 16.16, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', '', '', '', 100, 0, '', 0, '', 1, 2, 2, '2023-05-07 09:47:49', '2023-05-08 01:08:31');
INSERT INTO `Products` VALUES (142, 2, 'ASUS Dual GeForce RTX 2060 OC EVO 6GB GDDR6', 272.52, 'Video Card ASUS Dual GeForce RTX 2060 OC EVO 6GB GDDR6\r\n\r\nSpecifications:\r\n\r\nGPU	NVIDIA® GeForce RTX™ 2060\r\nMultiply CUDA	1920\r\nCommunication standards	PCI Express 3.0\r\nGPU Clock	OC Mode: GPU Boost Clock : 1785 MHz - GPU Base Clock : 1395 MHz\r\nGaming Mode: GPU Boost Clock : 1755 MHz - GPU Base Clock : 1365 MHz\r\nMemory speed	14000 MHz\r\nMemory	6GB GDDR6\r\nMemory protocol	192-bit\r\n \r\n\r\nOutput port\r\n\r\nDVI-D: Yes x 1 \r\n\r\nHDMI: Yes x 2 (HDMI 2.0b)\r\n\r\nDisplayPort: Yes x 1 (DisplayPort 1.4)\r\n\r\nHDCP support: Yes (2.2)\r\n\r\nNVlink/Crossfire support	Are not\r\nPower requirement	From 500W\r\nPower connection	1 x 8-pin\r\nDimensions (DxRxC)	9.53 \" x 5.12 \" x 2.09 \" Inch\r\n24.2 x 13 x 5.3 Centimeter\r\nSlot	2.5 slot\r\nOPENGL support	4.6\r\nMaximum number of screens	4\r\nMaximum resolution	7680×4320 (8K)\r\nDetailed evaluation of ASUS Dual GeForce RTX 2060 OC edition EVO 6GB GDDR6 video card\r\nDesign of ASUS Dual GeForce RTX 2060 OC edition EVO \r\nAs an upgrade from the previous RTX 2060 OC Edition, the ASUS Dual GeForce RTX 2060 OC edition EVO retains its previous gaming look. Dressed in strong black and beautifully finished edges, the ASUS Dual GeForce RTX 2060 OC edition EVO will highlight the case in particular and the gaming angle in general.\r\n\r\n\r\n\r\nASUS Dual GeForce RTX 2060 OC edition EVO 2x Fans cooling system\r\nEquipped with 2 new and powerful fans manufactured from Axial technology, providing a longer blade design and downward rotation of air pressure to provide the best heat dissipation for ASUS Dual GeForce RTX 2060 OC edition EVO. \r\n\r\n>> See also: Uses and how to choose VGA .\r\n\r\nCombined with 0dB technology, ASUS Dual GeForce RTX 2060 OC edition EVO works intelligently when it can automatically stop working when the GPU core temperature is below 55 degrees Celsius and when the temperature rises, it will automatically work again. In return, providing a quiet space when working and playing games.\r\n\r\n\r\n\r\nSolid back protection\r\nThe PCB area of ​​the ASUS Dual GeForce RTX 2060 OC edition EVO is protected by an aluminum back panel, ensuring the safety of the PCB and avoiding unwanted impacts to the back of the VGA .\r\n\r\n\r\n\r\nPerfection from Auto-Extreme technology\r\nAll components in the ASUS Dual GeForce RTX 2060 OC edition EVO are finished with an advanced manufacturing process based on Auto-Extreme technology to bring out the best in video card quality . Internal components such as capacitors, DrMOS, and chokes help push ASUS Dual GeForce RTX 2060 OC edition EVO performance to the max.\r\n\r\n', NULL, NULL, NULL, 100, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:08:33', '2023-05-07 11:18:31');
INSERT INTO `Products` VALUES (143, 2, 'ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X', 2771.72, 'Specifications:\r\nHuman Graphics 	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	OC mode: 2640 MHz\r\nDefault mode: 2610 MHz (Boost Clock)\r\nMultiply CUDA	16384\r\nMemory speed	21 Gbps\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collector Card\r\n1 x Quick Guide\r\n1 x Adapter Cable\r\n1 x ROG Graphics Card Holder\r\n1 x ROG Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	357,6 x 149,3 x 70,1mm\r\nPSU recommends	1000W\r\nPower connection	1 x 16 pin\r\nSlot	3.5\r\nAURA SYNC	ARGB\r\nDetailed review of ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X VGA card\r\nRTX 4090 , one of the highest-end GPUs from NVIDIA\'s RTX 40 Series generation. Bringing in graphics processing technologies and improvements from its predecessor, the RTX 4090 confidently handles all medium to high-end graphics tasks smoothly. Paired with ASUS ROG, the premium GPU from NVIDIA comes complete with the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X .\r\n\r\nOptimizing heat dissipation efficiency\r\nThe massive power of the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X requires the most powerful heat dissipation possible with the goal of maintaining the performance and longevity of the video card . Put right into our eyes, we will immediately see 3 heatsink fans with Axial-tech design for the most abundant airflow possible. Working with double bearings and carefully tuned, the cooling fan helps to bring 23% more air into the product for optimal use.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe three fans on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X are adjusted to rotate relative to each other. When the two outermost fans rotate counterclockwise, this aids in optimizing the inlet air flow. Plus, it intelligently works with a sensor that makes the fan automatically work according to the GPU\'s health. In the case when the GPU operates at temperatures below 50 degrees Celsius or light processing tasks, the cooling fans will stop working for a certain smoothness and quietness. And will work again when the temperature rises to more than 50 degrees Celsius or unexpected developments during use.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe hot air from the 24GB ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GPU is directed to a large and wide heatsink area. From here, the standard Axial-tech fans will handle the work of draining and conduction of heat to provide the most ideal temperature environment.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nVapor chamber design is a heat dissipation function that is used a lot on today\'s high-end VGA cards and ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB is no exception when it comes to this heatsink design. for myself. Inside the steam chamber are heat pipes whose job is to transfer heat to the milling plates, thereby helping the heat escape. As a result, according to research, this heatsink design will help reduce the GPU temperature by 5 degrees Celsius with a load at 500W.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe power input into the 24GB ASUS ROG Strix GeForce RTX 4090 OC White Edition is moderated with premium capacitors. Not only helping to bring clean and abundant power to VGA, the capacitors ensure a balance in power efficiency. All are developed with a compact PCB platform, providing the ability to save power and optimize heat dissipation efficiency.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nTough and pure look\r\nDressed in an extremely eye-catching design with a dominant white tone, ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB transforms itself into a pure and beautiful \"Elsa\" in high-end PCs. Deep in that beauty is a sturdy metal frame, details such as the molded frame, visor and backplate are all finished and perfectly combined to create the class of products from ASUS ROG .\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nConvenient FanConnect II\r\nIncluded on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB are 2 PWM FanConnect sockets that allow you to equip the necessary cooling devices. From there, serve the needs of processing and operating with heavy CPU and GPU tasks .\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nDurable for use\r\nASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB was born with the requirement that it can cater to all user needs. The GPU bracket on the VGA appears sturdy and durable, which is the key connection between the die and the heatsink. Behind that is the I/O bracket finished from stainless steel, providing resistance and minimizing damage from rust.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nYou can also adjust performance easily via the convenient Dual BIOS switch. With just a simple operation, you can choose the operating mode for VGA between performance and quietness.\r\n\r\nSmart energy sensor\r\nYou won\'t need to have a headache in choosing a power source for the video card anymore? When right on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB will feature a smart sensor LED dedicated to reporting compatibility, health and power issues from the PSU. As a result, you can provide an early and timely solution for your PC.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nGreat finishing from Auto-Extreme\r\nTo finish and reach users, ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB has gone through an advanced Auto-Extreme manufacturing process. Every part is precisely assembled and finished together with a one-time production process. Thanks to that, the parts on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB minimize temperature stress and create the most perfect whole. Auto-Extreme adds environmental friendliness, saving power consumption for the production process.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nShine with ARGB strips\r\nASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB will become a \"superstar\" for your PC with the ability to shine from the side lights and the ROG logo. The lighting system is customized with the included dedicated software, turning your work and entertainment corner into a beautiful scene in a multitude of colors.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nUseful accessories\r\nInside the box of ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB you will be provided with an additional bracket to help fix and minimize distortion for the graphics card. Attached is a screwdriver to assist you in the installation and build of the PC.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:20:21', NULL);
INSERT INTO `Products` VALUES (144, 2, 'ASUS ROG Strix GeForce RTX 4090 OC Edition 24GB GDDR6X', 589.90, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', NULL, '', '', 1, 0, '', 0, '', 1, 1, 1, '2023-05-07 11:34:55', '2023-05-08 01:08:53');
INSERT INTO `Products` VALUES (145, 2, 'ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X', 1.00, 'Specifications:\r\nHuman Graphics 	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collector Card\r\n1 x Quick Guide\r\n1 x Adapter Cable\r\n1 x ROG Graphics Card Holder\r\n1 x ROG Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	357,6 x 149,3 x 70,1mm\r\nPSU recommends	1000W\r\nPower connection	1 x 16 pin\r\nSlot	3.5\r\nAURA SYNC	ARGB\r\nReview of ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X video card\r\n\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X series of graphics cards is equipped with countless significant upgrades in both performance and design. Helping gamers have a smooth, quality gaming experience with realistic, vivid frames with the smallest details.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nThe NVIDIA Ada Lovelace Streaming Multiprocessors architecture is engineered to deliver superior gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nASUS ROG Strix RTX 4090 24GB GDDR6X features 4th Gen Tensor cores that boost AI performance up to 2x. The card uses NVIDIA Tensor Cores architecture to enable and accelerate AI technologies and new frame rates by DLSS 3 smoother, faster frames with favorite AAA games.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nIf you are a game enthusiast and want to experience top-notch graphics quality, the ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X will not disappoint you.\r\n\r\nEquipped with the 3rd generation Ray Tracing Cores (RT Cores), the image quality becomes more realistic than ever. You will be \"immersed\" in the colorful, sharp and extremely vivid game world.\r\n\r\nCooling fan technology provides 23% more airflow\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nAxial-tech fans provide 23% stronger airflow than the previous generation . Thanks to this improvement, the Asus ROG Strix RTX 4090 24GB is cooler and therefore more stable, durable and performant.\r\n\r\nUnique design, every detail is meticulously machined\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nThe graphics card line of the RTX 4090 series is equipped with an extremely unique and aggressive design by ASUS. The bold gaming design is meticulously crafted to create an impressive beauty that you can\'t take your eyes off.\r\n\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\n \r\n\r\nCombined with that is the RGB LED array that makes the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Now your gaming corner becomes more beautiful and impressive.\r\n\r\nSoftware GPU Tweak III \r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate your ASUS RTX 4090 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:48:28', NULL);
INSERT INTO `Products` VALUES (146, 2, 'ASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X', 1.00, 'Specifications:\r\nGraphics technology	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collection Card\r\n1 x Quick Setup Guide\r\n1 x Adapter Cable\r\n1 x TUF Graphics Card Holder\r\n1 x TUF Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	348,2 x 160 x 72,6 mm\r\nPSU recommends	-- IN\r\nPower connection	1 x 16 pin\r\nSlot	3.65\r\nAURA SYNC	ARGB\r\nReview ASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X\r\n\r\nASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X series of graphics cards possesses many upgrades in performance and design, helping players have high-performance gaming experiences that deliver realistic, vivid frames with the smallest details.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nThe NVIDIA Ada Lovelace Streaming Multiprocessors architecture is engineered to deliver exceptional gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\nIn addition, ASUS TUF RTX 4090 OC Edition 24GB GDDR6X with enhanced overclocking, increasing the clock speed of VGA helps the device operate faster thereby improving overall performance.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 OC Edition 24GB GDDR6X is equipped with 4th Gen Tensor cores that increase AI performance up to 2x. Using NVIDIA Tensor Cores architecture enables and accelerates new AI technologies and frame rates with DLSS 3 giving gamers smoother, faster frames with their favorite AAA titles.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nEquipped with the 3rd generation Ray Tracing Core (RT Cores) to deliver realistic image output performance, helping players \"immerse\" in sharp and extremely vivid frames.\r\n\r\nCooling fan technology provides 23% more airflow\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nAxial-tech fans provide 23% more airflow than the previous generation . With all these improvements, the TUF Gaming RTX 4090 OC Edition 24GB will perform extremely well with intelligently handled temperatures.\r\n\r\nUnique design, every detail is meticulously machined\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nThe series of graphics cards of the RTX 4090 series are uniquely designed by ASUS. That is reflected in every meticulous gaming edge detail. \r\n\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\n \r\n\r\nCombined with that is an array of RGB LEDs that make the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Helps to make the camera angle more impressive to create an impression. Unique gaming space.\r\n\r\nSoftware GPU Tweak III \r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate the ASUS RTX 4090 OC Edition 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:49:29', NULL);
INSERT INTO `Products` VALUES (147, 2, 'ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X', 1.00, 'Specifications:\r\nHuman Graphics	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collection Card\r\n1 x Quick Setup Guide\r\n1 x Adapter Cable\r\n1 x TUF Graphics Card Holder\r\n1 x TUF Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	348,2 x 160 x 72,6 mm\r\nPSU recommends	-- IN\r\nPower connection	1 x 16 pin\r\nSlot	3.65\r\nAURA SYNC	ARGB\r\nDetailed review of ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X\r\nASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X series of video cards possess many upgrades in performance and design, helping players have high-performance gaming experiences with realistic, vivid frames and small details. best.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 24GB GDDR6X uses the NVIDIA Ada Lovelace architecture designed to provide exceptional gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 is equipped with 4th generation Tensor cores that increase AI performance by up to 2x. Using NVIDIA Tensor Cores architecture enables and accelerates new AI technologies and frame rates with DLSS 3 giving gamers smoother, faster frames with their favorite AAA titles.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nEquipped with the 3rd generation Ray Tracing Core (RT Cores) to deliver realistic image output performance, helping players \"immerse\" in sharp and extremely vivid frames.\r\n\r\nCooling fan technology provides 23% more airflow\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 24GB GDDR6X VGA card will work extremely well with intelligently handled temperatures thanks to axial-tech fans that provide 23% more airflow than previous generation.\r\n\r\nUnique design, every detail is meticulously machined\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nThe series of graphics cards of the RTX 4090 series are uniquely designed by ASUS. That is reflected in every meticulous gaming edge detail. \r\n\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\n \r\n\r\nCombined with that is an array of RGB LEDs that make the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Helps to make the camera angle more impressive to create an impression. Unique gaming space.\r\n\r\nSoftware GPU Tweak III \r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate the ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:50:47', NULL);
INSERT INTO `Products` VALUES (148, 2, 'GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G', 1.00, 'GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\nSpecifications\r\n\r\nHuman Graphics	GeForce RTX™ 4090\r\nMultiply CUDA	16384\r\nMemory speed	21 Gbps\r\nMemory storage 	24GB\r\nMemory type	GDDR6X\r\nMemory bus	384 bit\r\nBus card	PCIE 4.0\r\nMaximum digital resolution	7680 x 4320\r\nSupport maximum number of screens	4\r\nSize	L=238 W=141 H=40 mm\r\nStandard PCB	ATX\r\nDirectX	12 Ultimate\r\nOpenGL	4.6\r\nRecommended PSU	850W\r\nPower connector	16 pin x 1\r\nConnector	DisplayPort 1.4a x 3\r\nHDMI 2.1 x 1\r\nTube length	460mm ± 1.5%\r\nRadiators	360mm\r\nFan	3 x 120 mm\r\nAccessory	1. Quick start guide\r\n2. Warranty registration\r\n3. AORUS Metal sticker\r\n4. Xtreme Robot Limited Edition with AORUS flag\r\n5. One 16-pin to four-pin power adapter 8\r\nDetailed evaluation of the GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G video card\r\nGIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G has outstanding performance\r\nPossessing 16384 CUDA cores, 24GB of the latest GDDR6X RAM , the RTX 4090 is the most powerful video card on the market today. Now your gaming PC can fully handle any game with the highest graphics level and still be smooth, without lag.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\n \r\n\r\nWater cooling system\r\nWith a powerful graphics card like the RTX 4090, water cooling is extremely important to prevent the machine from overheating. AORUS provides a comprehensive cooling solution as critical components such as the GPU, VRAM and MOSFET are actively cooled to ensure a stable system under high overclocking conditions.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\nEasy installation\r\nEquipped with water pipes and pumps, users can easily install the graphics card without worrying about leaks, making it easy for beginners to assemble. \r\n\r\nThe GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G card uses a triple 360mm aluminum Radiator that increases the surface area and volume for heat dissipation, making the graphics card work more stable and cooler even in conditions. high overclock.\r\n\r\nThe 3X 120mm fan unit is designed to generate more airflow for better heat dissipation, providing a quiet gaming experience and powerful cooling. The double ball bearing construction is more heat resistant and efficient than the sleeve structure and has at least twice the service life.\r\n\r\nWithout using any auxiliary fan, WATERFORCE technology provides the best cooling solution for GPU/VRAM/MOSFET. Copper plate effectively dissipates heat to create a truly quiet environment.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\n \r\n\r\nExtremely durable\r\nVirtually non-hygroscopic, high thermal stability and high pressure resistance, sturdy FEP tubes enhance product life and durability. The metal back plate not only provides an aesthetic appearance, but also enhances the structure of the graphics card for all-round protection.\r\n\r\nThe graphics card has an excellent power phase design to allow the MOSFETs to operate at lower temperatures and provide a more stable voltage output. Load balancing of each MOSFET improves the overclocking performance and prolongs the life of the VGA.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\nFriendly PCB Design\r\nThe fully automated manufacturing process ensures top quality of the board and eliminates the sharp protrusions of solder connectors seen on conventional PCB surfaces. This user-friendly design not only extends the life of the VGA, but also helps ensure your safety during assembly.', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:51:45', NULL);
INSERT INTO `Products` VALUES (149, 2, 'GIGABYTE AORUS GeForce RTX 4090 MASTER 24G', 1.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', NULL, '', '', 1, 0, '', 0, '', 1, 1, 1, '2023-05-07 12:00:19', '2023-05-08 01:08:53');
INSERT INTO `Products` VALUES (153, 2, 'GIGABYTE AORUS GeForce RTX 4090 MASTER 24G', 58.99, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', NULL, '', '', 100, 0, 'L=358.5 W=162.8 H=75.1 mm', 1.05, '', 1, 2, 2, '2023-05-07 14:07:58', '2023-05-08 01:08:53');
INSERT INTO `Products` VALUES (154, 2, 'RAM Kingston Fury Beast 8GB 3200 DDR4 RGB (KF432C16BBA/8)', 120.00, '<p>https://gearvn.com/products/8gb-ddr4-1x8g-3200-ram-kingston-fury-beast<br></p>', NULL, '', '', 120, 0, '8GB', 0.2, '', 1, 2, 2, '2023-05-07 14:22:48', NULL);
INSERT INTO `Products` VALUES (155, 2, 'Ram PNY XLR8 Silver 1x8GB 3600 RGB', 50.00, '<p>https://gearvn.com/products/ram-pny-xlr8-silver-1-x-8gb-3600-rgb<br></p>', NULL, '', '', 135, 0, '8GB', 0.2, '', 1, 2, 2, '2023-05-07 14:27:47', NULL);
INSERT INTO `Products` VALUES (156, 9, 'test', 1.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', NULL, '', '', 1, 0, '1', 1, '', 2, 1, 1, '2023-05-07 14:42:26', '2023-05-08 07:36:04');
INSERT INTO `Products` VALUES (157, 9, 'new', 2.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.', NULL, '', '', 0, 1, '2', 2, '', 1, 1, 1, '2023-05-07 14:44:10', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (158, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '<br>', '', 150, 0, '32GB', 0.1, '', 2, 2, 1, '2023-05-07 14:50:35', '2023-05-08 07:34:37');
INSERT INTO `Products` VALUES (159, 7, 'test', 1.00, '<p>abc abc</p>', 'brand', '<p>warr</p>', '<p>gift</p>', 1, 0, '1', 1, '<p>abc</p>', 1, 1, 1, '2023-05-07 14:56:12', NULL);
INSERT INTO `Products` VALUES (160, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '36 months', '', 150, 0, '32GB', 0.1, '', 2, 2, 1, '2023-05-07 14:57:24', '2023-05-08 07:34:54');
INSERT INTO `Products` VALUES (161, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '36 months', '', 150, 0, '32GB', 0.1, '', 2, 2, 1, '2023-05-07 14:57:34', '2023-05-08 07:35:10');
INSERT INTO `Products` VALUES (162, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '36 months', '', 150, 0, '32GB', 0.1, '', 1, 2, 2, '2023-05-07 14:58:36', NULL);
INSERT INTO `Products` VALUES (163, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '36 months', '', 150, 0, '32GB', 0.1, '', 2, 2, 1, '2023-05-07 14:58:48', '2023-05-08 07:35:51');
INSERT INTO `Products` VALUES (164, 1, 'Ram Corsair Vengeance RGB 32GB (2x16GB) 5600 DDR5 White (CMH32GX5M2B5600C36W)', 45.40, '<p><b>https://gearvn.com/products/ram-corsair-vengeance-rgb-32gb-2x16gb-5600-ddr5-white-cmh32gx5m2b5600c36w</b><br></p>', NULL, '36 months', '', 150, 0, '32GB', 0.1, '', 2, 2, 1, '2023-05-07 14:58:57', '2023-05-08 07:35:31');
INSERT INTO `Products` VALUES (165, 2, 'RAM Corsair Dominator Platinum 32GB (2x16GB) RGB 5600 DDR5 (CMT32GX5M2X5600C36)', 341.20, '<p>https://gearvn.com/products/32gb-ddr5-2x16gb-5600-ram-corsair-dominator-platinum-rgb-ddr5-cl36<br></p>', 'CORSAIR', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px;\">36 Months</span><br></p>', '', 110, 0, '32GB', 0.1, '', 1, 2, 2, '2023-05-07 15:06:44', NULL);
INSERT INTO `Products` VALUES (167, 1, 'RAM Kingston Fury Beast RGB 64GB (2x32GB) bus 5600 DDR5 (KF556C40BBAK2-64)', 511.78, '<p>https://gearvn.com/products/ram-kingston-fury-beast-rgb-64gb-2x32gb-bus-5600-ddr5-kf556c40bbak2-64<br></p>', ' Kingston', '<p>36 months</p>', '', 200, 0, '64GB', 0.3, '', 1, 2, 2, '2023-05-07 15:10:31', NULL);
INSERT INTO `Products` VALUES (168, 2, 'SSD SamSung 980 PRO 500GB M.2 PCIe gen 4 NVMe (MZ-V8P500BW)', 123.12, '<p>https://gearvn.com/products/ssd-samsung-980-pro-500gb-m-2-nvme-mz-v8p500bw<br></p>', 'SamSung ', '<p>60 months</p>', '', 114, 1, '500 GB', 0, '', 1, 2, 2, '2023-05-07 15:22:06', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (169, 2, 'SSD Kingston NV1 500GB M.2 PCIe NVMe', 453.23, '<p>https://gearvn.com/products/ssd-kingston-nv1-500gb-m-2-pcie-nvme<br></p>', ' Kingston', '<p>36 months</p>', '', 300, 0, '500 GB', 0, '', 1, 2, 2, '2023-05-07 15:25:40', NULL);
INSERT INTO `Products` VALUES (170, 2, 'SSD PNY CS1031 M.2 2280 256GB Gen 3x4', 231.29, '<p>https://gearvn.com/products/ssd-pny-cs1031-m-2-2280-256gb-gen-3x4<br></p>', 'PNY', '<p>36 months</p>', '', 99, 0, '256GB', 0.66, '', 1, 2, 2, '2023-05-07 15:28:26', NULL);
INSERT INTO `Products` VALUES (171, 2, 'SSD Samsung 980 M.2 PCIe NVMe 250GB', 210.20, '<p>https://gearvn.com/products/ssd-samsung-980-m-2-pcie-nvme-250gb<br></p>', 'SamSung ', '<p>60 months</p>', '', 87, 0, '250 GB', 0, '', 1, 2, 2, '2023-05-07 15:31:25', NULL);
INSERT INTO `Products` VALUES (172, 2, 'SSD MSI Spatium M390 500GB M.2 PCIe NVMe', 88.45, '<p>https://gearvn.com/products/ssd-msi-spatium-m390-500gb-m-2-pcie-nvme<br></p>', 'MSI', '<p>60 months</p>', '', 290, 0, '', 0, '', 1, 2, 2, '2023-05-07 15:34:10', NULL);
INSERT INTO `Products` VALUES (173, 2, 'SSD Samsung 870 EVO 500GB 2.5\' SATA III', 45.32, '<p>https://gearvn.com/products/ssd-samsung-870-evo-500gb-2-5-sata-iii<br></p>', 'SamSung ', '<p>60 months</p>', '', 60, 0, '500 MB', 0, '', 1, 2, 2, '2023-05-07 15:40:17', NULL);
INSERT INTO `Products` VALUES (174, 2, 'SSD Samsung 870 EVO 500GB 2.5\' SATA III', 50.10, '<p>https://gearvn.com/products/ssd-samsung-870-evo-500gb-2-5-sata-iii<br></p>', 'SamSung ', '<p>60 months</p>', '', 79, 0, '500 GB', 0, '', 1, 2, 2, '2023-05-07 15:42:05', NULL);
INSERT INTO `Products` VALUES (177, 2, 'SSD Samsung 980 M.2 PCIe NVMe 500GB', 79.32, '<p>https://gearvn.com/products/ssd-samsung-980-m-2-pcie-nvme-500gb<br></p>', 'SamSung ', '<p>60 months</p>', '', 228, 1, '500 GB', 0, '', 1, 2, 2, '2023-05-07 15:45:33', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (178, 3, 'HDD WD Blue 1TB 7200rpm', 20.20, '<p>https://gearvn.com/products/wd-hdd-1tb-blue-7200rpm<br></p>', 'Western Digital', '<p>24 months</p>', '', 31, 0, '1 TB', 0, '', 1, 2, 2, '2023-05-07 15:48:14', NULL);
INSERT INTO `Products` VALUES (179, 3, 'HDD Seagate Barracuda 1TB 7200rpm', 98.10, '<p>https://gearvn.com/products/hdd-seagate-barracuda-1tb-7200rpm<br></p>', 'Seagate', '<p>24 months</p>', '', 245, 0, '1 TB', 0, '', 1, 2, 2, '2023-05-07 15:49:35', NULL);
INSERT INTO `Products` VALUES (181, 3, 'HDD WD Blue 2TB 5400rpm', 87.40, '<p>https://gearvn.com/products/hdd-wd-blue-2tb-5400rpm<br></p>', 'Western Digital', '<p>24 months</p>', '', 241, 0, '2 TB', 0, '', 1, 2, 2, '2023-05-07 15:51:19', NULL);
INSERT INTO `Products` VALUES (182, 3, 'HDD Seagate Barracuda 4TB 5400rpm', 110.43, '<p>https://gearvn.com/products/hdd-seagate-barracuda-4tb-5400rpm<br></p>', 'Seagate', '<p>24 months</p>', '', 342, 0, '4TB', 0, '', 1, 2, 2, '2023-05-07 16:10:43', NULL);
INSERT INTO `Products` VALUES (183, 3, 'SEAGATE Firecuda 4TB HDD', 146.42, '<p>https://gearvn.com/products/o-cung-hdd-seagate-firecuda-4tb<br></p>', 'SeaGate', '<p>36 months</p>', '', 132, 0, '4 TB', 0, '', 1, 2, 2, '2023-05-07 16:12:52', NULL);
INSERT INTO `Products` VALUES (184, 3, 'HDD WD Black 4TB 7200rpm', 231.23, '<p>https://gearvn.com/products/wd-hdd-4tb-black-7200rpm<br></p>', '	Western Digital', '<p>24 months</p>', '', 341, 0, '4 TB', 0, '', 1, 2, 2, '2023-05-07 16:14:24', NULL);
INSERT INTO `Products` VALUES (185, 3, 'HDD Seagate Ironwolf 10TB 7200RPM Thông tin chung', 305.42, '<p>https://gearvn.com/products/hdd-seagate-ironwolf-10tb-7200rpm<br></p>', ' Seagate', '<p>60 months</p>', '', 42, 0, '10 TB', 0, '', 1, 2, 2, '2023-05-07 16:16:08', NULL);
INSERT INTO `Products` VALUES (186, 4, 'Case 1st Player Fire Dancing V2-A (4 fan RGB)', 13.23, '<p>https://gearvn.com/products/case-1st-player-fire-dancing-v2-a<br></p>', ' 1st Player', '<p>12 months</p>', '', 323, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:20:14', NULL);
INSERT INTO `Products` VALUES (187, 4, 'Case Deepcool MATREXX 40 3FS (3 fan RGB)', 14.50, '<p>https://gearvn.com/products/case-deepcool-matrexx-40-3fs<br></p>', 'DEEPCOOL', '<p>12 months</p>', '', 100, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:23:14', NULL);
INSERT INTO `Products` VALUES (188, 4, 'Case JETEK EM4', 10.40, '<p>https://gearvn.com/products/case-jetek-em4<br></p>', 'JETEK', '<p>12 months</p>', '', 128, 1, '', 0, '', 1, 2, 2, '2023-05-07 16:25:08', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (189, 4, 'Case Jetek Mini I8-22B (ITX)', 12.30, '<p>https://gearvn.com/products/case-jetek-mini-i8-22b-itx<br></p>', 'Jetek', '<p>36 months</p>', '', 323, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:27:17', NULL);
INSERT INTO `Products` VALUES (190, 4, 'Case XIGMATEK GEMINI II PINK 3FB', 15.04, '<p>https://gearvn.com/products/case-xigmatek-gemini-ii-pink-3fb-premium-gaming-m-atx<br></p>', 'XIGMATEK', '<p>12 months</p>', '', 241, 0, '390 x 210 x 420mm', 0, '', 1, 2, 2, '2023-05-07 16:30:21', NULL);
INSERT INTO `Products` VALUES (191, 4, 'Case Asus TUF GT301 (3 fan RGB)', 14.40, '<p>https://gearvn.com/products/case-asus-tuf-gt301<br></p>', '	Asus', '<p>12 months</p>', '', 242, 0, '426 x 214 x 482 mm ', 0, '', 1, 2, 2, '2023-05-07 16:34:56', NULL);
INSERT INTO `Products` VALUES (192, 4, 'Case Corsair 4000D AIRFLOW White', 30.42, '<p>https://gearvn.com/products/case-corsair-4000d-airflow-white<br></p>', 'Corsair', '<p>24 months</p>', '', 241, 0, '	453mm x 230mm x 466mm', 0, '', 1, 2, 2, '2023-05-07 16:38:22', NULL);
INSERT INTO `Products` VALUES (193, 5, 'Case Thermaltake Divider 300 TG Snow', 78.35, '<p>https://gearvn.com/products/case-thermaltake-divider-300-tg-snow<br></p>', 'Thermaltake', '<p>24 months</p>', '', 342, 0, '475 x 220 x 461 mm ', 0, '', 1, 2, 2, '2023-05-07 16:40:53', NULL);
INSERT INTO `Products` VALUES (194, 5, 'ASUS TUF GAMING B660M-PLUS WIFI DDR4', 170.64, '<p>https://gearvn.com/products/asus-tuf-gaming-b660m-plus-wifi-ddr4<br></p>', 'ASUS', '<p>36 months</p>', '', 241, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:44:50', NULL);
INSERT INTO `Products` VALUES (195, 6, 'GIGABYTE Z690 AORUS ELITE AX DDR4 (rev. 1.0) V2', 230.50, '<p>https://gearvn.com/products/gigabyte-z690-aorus-elite-ax-ddr4-rev-1-0<br></p>', 'GIGABYTE', '<p>24 months</p>', '', 245, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:46:52', NULL);
INSERT INTO `Products` VALUES (196, 6, 'ASUS PRIME H510M-A WIFI', 240.50, '<p>https://gearvn.com/products/asus-prime-h510m-a-wifi<br></p>', 'ASUS', '<p>36 months</p>', '', 240, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:50:36', NULL);
INSERT INTO `Products` VALUES (197, 6, 'ASUS PRIME H610M-A WIFI D4', 124.50, '<p>https://gearvn.com/products/asus-prime-h610m-a-wifi-d4<br></p>', 'ASUS', '<p>36 months</p>', '', 256, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:53:17', NULL);
INSERT INTO `Products` VALUES (198, 6, 'MSI MAG B560M MORTAR WIFI', 134.30, '<p>https://gearvn.com/products/msi-mag-b560m-mortar-wifi<br></p>', 'MSI', '<p>36 months</p>', '', 421, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:55:12', NULL);
INSERT INTO `Products` VALUES (199, 7, 'ASUS ROG STRIX Z690-A GAMING WIFI DDR4', 149.30, '<p>https://gearvn.com/products/asus-rog-strix-z690-a-gaming-wifi-ddr4<br></p>', 'ASUS', '<p>36 months</p>', '', 519, 1, '', 0, '', 1, 2, 2, '2023-05-07 16:57:23', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (200, 4, 'MSI MPG Z690 FORCE WIFI DDR5', 342.40, '<p>https://gearvn.com/products/msi-mpg-z690-force-wifi<br></p>', 'MSI', '<p>36 months</p>', '', 240, 0, '', 0, '', 1, 2, 2, '2023-05-07 16:59:34', NULL);
INSERT INTO `Products` VALUES (201, 6, 'ASUS ROG MAXIMUS Z690 HERO DDR5', 543.50, '<p>https://gearvn.com/products/asus-rog-maximus-z690-hero<br></p>', 'ASUS', '<p>36 months</p><p><br></p>', '', 245, 0, '', 0, '', 1, 2, 2, '2023-05-07 17:03:06', NULL);
INSERT INTO `Products` VALUES (202, 7, 'Intel Core i5 12400F / 2.5GHz Turbo 4.4GHz / 6 Cores 12 Threads / 18MB / LGA 1700', 543.30, '<p>https://gearvn.com/products/intel-core-i5-12400f<br></p>', 'Intel', '<p>36 months</p>', '', 244, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:20:23', NULL);
INSERT INTO `Products` VALUES (203, 7, 'Intel Core i5 11400F / 12MB / 4.4GHZ / 6 cores 12 threads / LGA 1200', 242.53, '<p>https://gearvn.com/products/intel-core-i5-11400f<br></p>', 'Intel', '<p>36 months</p>', '', 526, 1, '', 0, '', 1, 1, 1, '2023-05-08 08:22:33', '2023-05-15 17:53:39');
INSERT INTO `Products` VALUES (204, 7, 'Intel Core i7 12700K / 3.6GHz Turbo 5.0GHz / 12 Cores 20 Threads / 25MB / LGA 1700', 134.50, '<p>https://gearvn.com/products/intel-core-i7-12700k<br></p>', 'Intel', '<p>36 months</p>', '', 342, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:24:37', NULL);
INSERT INTO `Products` VALUES (205, 7, 'Intel Core i9 12900KS / 3.4GHz Turbo 5.5GHz / 16 Cores 24 Threads / 30MB / LGA 1700', 325.50, '<p>https://gearvn.com/products/intel-core-i9-12900ks<br></p>', 'Intel', '<p>36 months</p>', '', 345, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:26:18', NULL);
INSERT INTO `Products` VALUES (206, 6, 'AMD Ryzen Threadripper 3960X / 3.8GHz Boost 4.5GHz / 24 cores 48 threads / 128MB / sTRX4', 535.80, '<p>https://gearvn.com/products/amd-threadripper-3960x-socket-strx4<br></p>', 'AMD', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px;\">36 months</span><br></p>', '', 643, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:28:51', NULL);
INSERT INTO `Products` VALUES (207, 8, 'Noctua NH-U12S REDUX heatsink', 135.90, '<p>https://gearvn.com/products/tan-nhiet-noctua-nh-u12s-redux<br></p>', 'NOCTUA', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">&nbsp;72 Months</span><br></p>', '', 357, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:31:21', NULL);
INSERT INTO `Products` VALUES (208, 7, 'Cooler Master MASTERLIQUID ML240L V2 ARGB', 356.70, '<p>https://gearvn.com/products/tan-nhiet-cooler-master-liquid-ml240l-v2-argb<br></p>', 'Cooler Master', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px; background-color: rgb(201, 215, 241);\">24 Months</span><br></p>', '', 463, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:34:16', NULL);
INSERT INTO `Products` VALUES (209, 8, 'DEEPCOOL GAMMAXX 400 XT . Heatsink', 355.40, '<p>https://gearvn.com/products/tan-nhiet-deepcool-gammaxx-400-xt<br></p>', 'Deepcool', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px; background-color: rgb(201, 215, 241);\">12 months</span><br></p>', '', 352, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:37:34', NULL);
INSERT INTO `Products` VALUES (210, 7, 'Cooler Master Hyper 212 ARGB', 354.70, '<p>https://gearvn.com/products/tan-nhiet-cooler-master-hyper-212-argb<br></p>', 'Cooler Master ', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px; background-color: rgb(201, 215, 241);\">12 months</span><br></p>', '', 467, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:40:06', NULL);
INSERT INTO `Products` VALUES (211, 7, 'MSI MPG CORELIQUID K240 Heatsink', 454.53, '<p>https://gearvn.com/products/tan-nhiet-msi-mpg-coreliquid-k240<br></p>', 'MSI', '', '', 356, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:42:14', NULL);
INSERT INTO `Products` VALUES (212, 8, 'NZXT Kraken Z63 RGB water cooler - 280mm ( RL-KRZ63-R1 )', 433.50, '<p>https://gearvn.com/products/tan-nhiet-nuoc-nzxt-kraken-z63-rgb-280mm-rl-krz63-r1-ho-tro-socket-1700<br></p>', 'NZXT', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">72 months</span><br></p>', '', 352, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:44:43', NULL);
INSERT INTO `Products` VALUES (213, 7, 'ASUS ROG RYUJIN II 360 ARGB water cooler', 843.50, '<p>https://gearvn.com/products/tan-nhiet-nuoc-asus-rog-ryujin-ii-360-argb-ho-tro-socket-1700<br></p>', 'ASUS', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">72 Months</span><br></p>', '', 325, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:46:43', NULL);
INSERT INTO `Products` VALUES (214, 4, 'XIGMATEK GALAXY III ROYAL - BR120 ARGB', 414.50, '<p>https://gearvn.com/products/fan-xigmatek-galaxy-iii-essential-br120-argb-3-fan<br></p>', 'XIGMATEK ', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">72 Months</span><br></p>', '', 258, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:48:59', NULL);
INSERT INTO `Products` VALUES (215, 6, 'Fan Cooler Master MASTERFAN MF120 PRISMATIC 3 IN 1', 324.60, '<p>https://gearvn.com/products/fan-cooler-master-masterfan-mf120-prismatic-3-in-1<br></p>', 'Cooler Master', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">24 Months</span><br></p>', '', 350, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:51:15', NULL);
INSERT INTO `Products` VALUES (216, 8, 'Fan XIGMATEK X22F - RGB FIXED', 26.40, '<p>https://gearvn.com/products/fan-xigmatek-x22f-rgb-fixed<br></p>', 'XIGMATEK', '<p>6 months</p>', '', 423, 0, '', 0, '', 1, 1, 1, '2023-05-08 08:53:16', NULL);
INSERT INTO `Products` VALUES (217, 7, 'Fan Cooler Master SICKLEFLOW 120 ARGB 3 IN 1', 34.50, '<p>https://gearvn.com/products/fan-cooler-master-sickleflow-120-argb-3in1<br></p>', 'Cooler Master', '<p>24 months</p>', '', 355, 0, ' 120 x 120 x 25 (mm)', 0, '', 2, 1, 1, '2023-05-08 08:55:39', '2023-05-08 23:37:15');
INSERT INTO `Products` VALUES (218, 5, 'Fan Cooler Master MASTERFAN MF120 HALO kit 3 fan', 232.20, '<p>https://gearvn.com/products/masterfan-mf120-halo<br></p>', 'CoolerMaster', '<p>36 months</p>', '', 425, 0, '120 x 120 x 25 mm', 0, '', 1, 1, 1, '2023-05-08 08:57:44', NULL);
INSERT INTO `Products` VALUES (219, 3, '( 500W ) SilverStone ST50F-ES230 - 80 Plus . Power', 876.80, '<p>https://gearvn.com/products/500w-silverstone-st50f-es230-80-plus<br></p>', 'SliverStone', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px;\">36 Months</span><br></p>', '', 346, 0, '', 0, '', 1, 1, 1, '2023-05-08 09:01:12', NULL);
INSERT INTO `Products` VALUES (220, 6, '( 750W ) CoolerMaster MWE 750 BRONZE - V2 230V . Power', 453.50, '<p>https://gearvn.com/products/750w-nguon-may-tinh-cooler-master-mwe-750-bronze-v2-230v<br></p>', 'Cooler Master', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px;\">60 Months</span><br></p>', '', 352, 0, '', 0, '', 1, 1, 1, '2023-05-08 09:04:15', NULL);
INSERT INTO `Products` VALUES (221, 4, '( 1200W ) Power Supply ASUS Rog Thor 1200P - 80 Plus Platinum - Full Modular', 903.40, '<p>https://gearvn.com/products/1200w-platinum-nguon-asus-rog-thor-1200p-80-plus-platinum<br></p>', 'ASUS', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 20px; background-color: rgb(201, 215, 241);\">10 years</span><br></p>', '', 239, 1, '', 0, '', 1, 1, 1, '2023-05-08 09:06:12', '2023-05-17 14:30:26');

-- ----------------------------
-- Table structure for Promotion_Products
-- ----------------------------
DROP TABLE IF EXISTS `Promotion_Products`;
CREATE TABLE `Promotion_Products`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promotion_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `promotion_id`(`promotion_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `promotion_products_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `Promotions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `promotion_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Promotion_Products
-- ----------------------------

-- ----------------------------
-- Table structure for Promotions
-- ----------------------------
DROP TABLE IF EXISTS `Promotions`;
CREATE TABLE `Promotions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Promotions
-- ----------------------------

-- ----------------------------
-- Table structure for Reviews
-- ----------------------------
DROP TABLE IF EXISTS `Reviews`;
CREATE TABLE `Reviews`  (
  `id` int(11) NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rating` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `Review_Users_ibfk_1`(`user_id`) USING BTREE,
  CONSTRAINT `Review_Users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Reviews
-- ----------------------------

-- ----------------------------
-- Table structure for forgot_password_check_hash
-- ----------------------------
DROP TABLE IF EXISTS `forgot_password_check_hash`;
CREATE TABLE `forgot_password_check_hash`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of forgot_password_check_hash
-- ----------------------------

-- ----------------------------
-- Table structure for otp_checks
-- ----------------------------
DROP TABLE IF EXISTS `otp_checks`;
CREATE TABLE `otp_checks`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `otp_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of otp_checks
-- ----------------------------
INSERT INTO `otp_checks` VALUES (1, 1, '298626', '2023-05-08 23:26:42');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'Admin');
INSERT INTO `role` VALUES (2, 'Staff');
INSERT INTO `role` VALUES (3, 'User');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(4) NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone_number` int(11) NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_id`(`role_id`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', '', 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 1, NULL, NULL, 'avt.jpg', '2023-04-23 13:49:25', '2023-04-23 13:28:34');
INSERT INTO `users` VALUES (2, 'Trung', 'Nguyễn', 'viettrungcntt03@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 2, NULL, NULL, 'avt.jpg', '2023-04-23 06:49:01', NULL);
INSERT INTO `users` VALUES (3, 'Trung', 'Nguyễn', 'user@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 3, NULL, NULL, NULL, '2023-05-11 14:29:19', NULL);

-- ----------------------------
-- Procedure structure for cart_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_create`;
delimiter ;;
CREATE PROCEDURE `cart_create`(IN in_user_id INT,
	IN in_product_id INT,
	IN in_product_price DOUBLE,
	IN in_qty INT)
BEGIN
	INSERT INTO
		Cart (
			user_id,
			product_id,
			product_price,
			qty
		)
	VALUES
		(
			in_user_id,
			in_product_id,
			in_product_price,
			in_qty
		);

	SELECT
		*
	FROM
		Cart
	WHERE
		id = LAST_INSERT_ID();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_delete_by_user_and_product
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_delete_by_user_and_product`;
delimiter ;;
CREATE PROCEDURE `cart_delete_by_user_and_product`(IN in_user_id INT,
	IN in_product_id INT)
BEGIN
	DELETE FROM Cart
	WHERE user_id = in_user_id AND product_id = in_product_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_get`;
delimiter ;;
CREATE PROCEDURE `cart_get`(IN in_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		t1.gift_info,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE t0.id = in_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_list`;
delimiter ;;
CREATE PROCEDURE `cart_list`()
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_list_by user_and_product
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_list_by user_and_product`;
delimiter ;;
CREATE PROCEDURE `cart_list_by user_and_product`(IN in_user_id INT,
	IN in_product_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE t0.user_id = in_user_id AND t0.product_id = in_product_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_list_by_product
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_list_by_product`;
delimiter ;;
CREATE PROCEDURE `cart_list_by_product`(IN in_product_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE t0.product_id = in_product_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_list_by_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_list_by_user`;
delimiter ;;
CREATE PROCEDURE `cart_list_by_user`(IN in_user_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		t1.gift_info,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE t0.user_id = in_user_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_list_by_user_and_product
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_list_by_user_and_product`;
delimiter ;;
CREATE PROCEDURE `cart_list_by_user_and_product`(IN in_user_id INT,
	IN in_product_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Cart t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE t0.user_id = in_user_id AND t0.product_id = in_product_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for cart_update
-- ----------------------------
DROP PROCEDURE IF EXISTS `cart_update`;
delimiter ;;
CREATE PROCEDURE `cart_update`(IN in_user_id INT,
	IN in_product_id INT,
	IN in_product_price DOUBLE,
	IN in_qty INT)
BEGIN
	UPDATE
		Cart
	SET
		user_id = in_user_id,
		product_id = in_product_id,
		product_price = in_product_price,
		qty = in_qty
	WHERE
		user_id = in_user_id AND product_id = in_product_id;
		
	SELECT
		*
	FROM
		Cart
	WHERE
		user_id = in_user_id AND product_id = in_product_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_create`;
delimiter ;;
CREATE PROCEDURE `category_create`(IN in_user_id INT,
	IN in_name VARCHAR(255) CHARACTER SET utf8mb4,
	IN in_description VARCHAR(1000) CHARACTER SET utf8mb4)
BEGIN
	INSERT INTO
		Categories (
			`name`,
			description,
			created_by,
			updated_by,
			created_at
		)
	VALUES
		(
			in_name,
			in_description,
			in_user_id,
			in_user_id,
			NOW()
		);

	SELECT
		*
	FROM
		Categories
	WHERE
		id = LAST_INSERT_ID();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_get`;
delimiter ;;
CREATE PROCEDURE `category_get`(IN in_id INT)
BEGIN
	SELECT 
		*
	FROM 
		Categories
	WHERE id = in_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_list`;
delimiter ;;
CREATE PROCEDURE `category_list`()
BEGIN
	SELECT 
		t0.*,
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id
	FROM 
		Categories t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_list_by_userID
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_list_by_userID`;
delimiter ;;
CREATE PROCEDURE `category_list_by_userID`(IN in_user_id INT)
BEGIN
	SELECT 
		t0.*,
		CONCAT(t1.first_name, " ", t1.last_name) AS "user_name",
		t1.role_id
	FROM 
		Categories t0
		INNER JOIN users t1 ON t0.created_by = t1.id
	WHERE t1.id = in_user_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_update
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_update`;
delimiter ;;
CREATE PROCEDURE `category_update`(IN in_user_id INT,
	IN in_id INT,
	IN in_name VARCHAR(255) CHARACTER SET utf8mb4,
	IN in_description VARCHAR(1000) CHARACTER SET utf8mb4,
	IN in_status INT)
BEGIN
	UPDATE
		Categories
	SET
		`name` = in_name,
		description = in_description,
		`status` = in_status,
		updated_by = in_user_id,
		updated_at = NOW()
	WHERE
		id = in_id;
		
	SELECT
		*
	FROM
		categories
	WHERE
		id = in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for category_update_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `category_update_status`;
delimiter ;;
CREATE PROCEDURE `category_update_status`(IN in_user_id INT,
	IN in_id INT,
	IN in_status INT)
BEGIN
	DECLARE user_role_id INT;
	SELECT role_id INTO user_role_id FROM users WHERE id = in_user_id;
	
	IF user_role_id = 1 OR (SELECT created_by FROM Categories WHERE id = in_id) = in_user_id THEN
			UPDATE Categories SET
					`status` = in_status,
					updated_by = in_user_id,
					updated_at = NOW()
			WHERE id = in_id;
			SELECT 'Update successful' AS message;
	ELSE
			SELECT 'Err: You do not have access' AS message;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for forgot_password_check_hash
-- ----------------------------
DROP PROCEDURE IF EXISTS `forgot_password_check_hash`;
delimiter ;;
CREATE PROCEDURE `forgot_password_check_hash`(IN `in_id_user` INT)
BEGIN
  SELECT
			*
  FROM forgot_password_check_hash t0
  WHERE t0.user_id = in_id_user
	ORDER BY t0.created_at DESC
	LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for forgot_password_check_hash_insert
-- ----------------------------
DROP PROCEDURE IF EXISTS `forgot_password_check_hash_insert`;
delimiter ;;
CREATE PROCEDURE `forgot_password_check_hash_insert`(IN `user_id` INT, IN `hash` VARCHAR(50))
BEGIN
	INSERT INTO forgot_password_check_hash
	( `user_id`, 
	`hash`
	 )
 VALUES 
	 (user_id,
	 hash
	 );
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for forgot_password_hash_delete
-- ----------------------------
DROP PROCEDURE IF EXISTS `forgot_password_hash_delete`;
delimiter ;;
CREATE PROCEDURE `forgot_password_hash_delete`(IN `user_id` INT)
BEGIN
 DELETE FROM forgot_password_check_hash WHERE user_id = user_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_change_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_change_status`;
delimiter ;;
CREATE PROCEDURE `order_change_status`(IN in_id INT,
	IN in_status INT)
BEGIN
	UPDATE
		Orders
	SET
		`status` = in_status,
		order_date = NOW()
	WHERE
		id = in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_create`;
delimiter ;;
CREATE PROCEDURE `order_create`(IN in_user_id INT,
	IN in_name VARCHAR(255),
	IN in_tax DOUBLE,
	IN in_shipping DOUBLE,
	IN in_total_amount DOUBLE,
	IN in_address VARCHAR(255),
	IN in_phone_number INT)
BEGIN
	INSERT INTO
		Orders (
			user_id,
			`name`,
			tax,
			shipping,
			total_amount,
			address,
			phone_number,
			created_at

		)
	VALUES
		(
			in_user_id,
			in_name,
			in_tax,
			in_shipping,
			in_total_amount,
			in_address,
			in_phone_number,
			NOW()
		);

	SELECT
		*
	FROM
		Orders
	WHERE
		id = LAST_INSERT_ID();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_detail_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_detail_create`;
delimiter ;;
CREATE PROCEDURE `order_detail_create`(IN in_order_id INT,
	IN in_product_id INT,
	IN in_quantity INT,
	IN in_price DOUBLE)
BEGIN
	INSERT INTO
		Order_Details (
			order_id,
			product_id,
			quantity,
			price
		)
	VALUES
		(
			in_order_id,
			in_product_id,
			in_quantity,
			in_price
		);

	SELECT
		*
	FROM
		Order_Details
	WHERE
		id = LAST_INSERT_ID();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_detail_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_detail_list`;
delimiter ;;
CREATE PROCEDURE `order_detail_list`(IN in_order_id INT)
BEGIN
	SELECT 
		t0.* ,
		t1.name,
		GROUP_CONCAT(t2.url SEPARATOR ',')       AS 'images'
	FROM Order_Details t0
		INNER JOIN Products t1 ON t0.product_id = t1.id
		LEFT JOIN Product_Images t2 ON t0.product_id = t2.product_id
	WHERE 
		order_id = in_order_id
	GROUP BY
		t0.id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_get`;
delimiter ;;
CREATE PROCEDURE `order_get`(IN in_order_id INT)
BEGIN
	SELECT 
		*,
		CONV(SUBSTRING(MD5(id), 1, 5), 16, 10) as 'key'
	FROM 
		Orders
	WHERE 
		id = in_order_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_list`;
delimiter ;;
CREATE PROCEDURE `order_list`()
BEGIN
	SELECT 
		*,
		CONV(SUBSTRING(MD5(id), 1, 5), 16, 10) as 'key'
	FROM 
		Orders;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_list_by_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_list_by_status`;
delimiter ;;
CREATE PROCEDURE `order_list_by_status`(IN in_status INT)
BEGIN
	SELECT 
		*,
		CONV(SUBSTRING(MD5(id), 1, 5), 16, 10) as 'key'
	FROM 
		Orders
	WHERE `status` = in_status;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for order_list_by_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `order_list_by_user`;
delimiter ;;
CREATE PROCEDURE `order_list_by_user`(IN in_user_id INT)
BEGIN
	SELECT 
		*,
		CONV(SUBSTRING(MD5(id), 1, 5), 16, 10) as 'key'
	FROM 
		Orders
	WHERE user_id = in_user_id
	ORDER BY order_date DESC;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for otp_check_exist
-- ----------------------------
DROP PROCEDURE IF EXISTS `otp_check_exist`;
delimiter ;;
CREATE PROCEDURE `otp_check_exist`(IN `user_id` INT, IN `otp_hash` VARCHAR(255))
BEGIN
    DECLARE existing_id INT;
    SELECT id INTO existing_id FROM otp_checks WHERE user_id = user_id;
    IF existing_id IS NOT NULL THEN
        DELETE FROM otp_checks WHERE id = existing_id;
    END IF;
    INSERT INTO otp_checks(user_id, otp_hash) VALUES(user_id, otp_hash);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for otp_delete
-- ----------------------------
DROP PROCEDURE IF EXISTS `otp_delete`;
delimiter ;;
CREATE PROCEDURE `otp_delete`(IN `user_id` INT)
BEGIN
 DELETE FROM otp_checks WHERE user_id = user_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for otp_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `otp_get`;
delimiter ;;
CREATE PROCEDURE `otp_get`(IN `in_id_user` INT)
BEGIN
  SELECT
			*
  FROM otp_checks t0
  WHERE t0.user_id = in_id_user
	ORDER BY t0.created_at DESC
	LIMIT 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for otp_insert
-- ----------------------------
DROP PROCEDURE IF EXISTS `otp_insert`;
delimiter ;;
CREATE PROCEDURE `otp_insert`(IN `user_id` INT, IN `otp_hash` VARCHAR(50))
BEGIN
	INSERT INTO otp_checks
	( `user_id`, 
	`otp_hash`
	 )
 VALUES 
	 (user_id,
	 otp_hash
	 );
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_create`;
delimiter ;;
CREATE PROCEDURE `product_create`(IN in_user_id INT,
  IN in_category_id INT,
  IN in_name VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_price DOUBLE,
  IN in_description VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_brand VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_warranty VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_gift_info VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_quantity INT,
  IN in_size VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_weight FLOAT,
  IN in_special_features VARCHAR(10000) CHARACTER SET utf8mb4)
BEGIN
    INSERT INTO Products (
            category_id,
            name,
            price,
            description,
            brand,
            warranty,
            gift_info,
            quantity,
            size,
            weight,
            special_features,
            created_by,
            updated_by,
            created_at
    )
    VALUES (
            in_category_id,
            in_name,
            in_price,
            in_description,
            in_brand,
            in_warranty,
            in_gift_info,
            in_quantity,
            in_size,
            in_weight,
            in_special_features,
            in_user_id, 
            in_user_id, 
            NOW()
    );
    
    UPDATE Categories SET total_product = (SELECT COUNT(*) FROM Products WHERE category_id = in_category_id) WHERE id = in_category_id;

    SELECT * FROM Products WHERE id = LAST_INSERT_ID();
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_get`;
delimiter ;;
CREATE PROCEDURE `product_get`(IN in_id INT)
BEGIN
	SELECT 
		t0.*,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	WHERE t0.id = in_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_images_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_images_create`;
delimiter ;;
CREATE PROCEDURE `product_images_create`(IN in_product_id INT,
  IN name_file VARCHAR(255))
BEGIN
	INSERT INTO
		Product_Images (
			product_id,
			url
		)
	VALUES
		(
			in_product_id,
			name_file
		);
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_images_delete
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_images_delete`;
delimiter ;;
CREATE PROCEDURE `product_images_delete`(IN in_product_id INT)
BEGIN
	DELETE FROM Product_Images WHERE product_id = in_product_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list`;
delimiter ;;
CREATE PROCEDURE `product_list`()
BEGIN
	SELECT
		t0.*,
		t3.`name`                                AS "category_name",
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id
		INNER JOIN Categories t3 ON t0.category_id = t3.id
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_by_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_by_status`;
delimiter ;;
CREATE PROCEDURE `product_list_by_status`(IN in_status INT)
BEGIN
	SELECT
		t0.*,
		t3.`name`                                AS "category_name",
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id
		INNER JOIN Categories t3 ON t0.category_id = t3.id
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	WHERE t0.`status` = in_status
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_by_user
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_by_user`;
delimiter ;;
CREATE PROCEDURE `product_list_by_user`(IN in_user_id INT)
BEGIN
	SELECT
		t0.*,
		t3.`name`                                AS "category_name",
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id
		INNER JOIN Categories t3 ON t0.category_id = t3.id
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	WHERE t0.created_by = in_user_id
	GROUP BY
		t0.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_by_userID	
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_by_userID	`;
delimiter ;;
CREATE PROCEDURE `product_list_by_userID	`(IN in_user_id INT)
BEGIN
	SELECT 
		t0.*,
		t3.`name` AS "category_name",
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id
	FROM 
		Products t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id
		INNER JOIN Categories t3 ON t0.category_id = t3.id
	WHERE t1.id = in_user_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_public
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_public`;
delimiter ;;
CREATE PROCEDURE `product_list_public`()
BEGIN
	SELECT
		t0.*,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	WHERE t0.`status` = 1
	GROUP BY
		t0.id
	ORDER BY RAND();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_public_by_category
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_public_by_category`;
delimiter ;;
CREATE PROCEDURE `product_list_public_by_category`(IN in_category_id INT)
BEGIN
	SELECT
		t0.*,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	WHERE t0.`status` = 1 AND t0.category_id = in_category_id
	GROUP BY
		t0.id
	ORDER BY RAND();

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_showing
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_showing`;
delimiter ;;
CREATE PROCEDURE `product_list_showing`()
BEGIN
	SELECT 
		t0.*,
		t3.`name` AS "category_name",
		CONCAT(t1.first_name, " ", t1.last_name) AS "name_of_created_by",
		CONCAT(t2.first_name, " ", t2.last_name) AS "name_of_updated_by",
		t2.role_id
	FROM 
		Products t0
		INNER JOIN users t1 ON t0.created_by = t1.id
		INNER JOIN users t2 ON t0.updated_by = t2.id
		INNER JOIN Categories t3 ON t0.category_id = t3.id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_list_top5_new
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list_top5_new`;
delimiter ;;
CREATE PROCEDURE `product_list_top5_new`()
BEGIN
	SELECT
		t0.*,
		GROUP_CONCAT(t4.url SEPARATOR ',')       AS 'images'
	FROM
		Products t0
		LEFT JOIN Product_Images t4 ON t0.id = t4.product_id
	GROUP BY
        t0.id
	ORDER BY t0.created_at DESC 
    LIMIT 5;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_update
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_update`;
delimiter ;;
CREATE PROCEDURE `product_update`(IN in_user_id INT,
	IN in_id INT,
	IN in_category_id INT,
  IN in_name VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_price DOUBLE,
  IN in_description VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_warranty VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_gift_info VARCHAR(10000) CHARACTER SET utf8mb4,
  IN in_quantity INT,
  IN in_size VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_weight FLOAT,
  IN in_special_features VARCHAR(10000) CHARACTER SET utf8mb4,
	IN in_status INT)
BEGIN
	UPDATE
		Products
	SET
		category_id = in_category_id,
		`name` = in_name,
		price = in_price,
		description = in_description,
		brand = in_brand,
		warranty = in_warranty,
		gift_info = in_gift_info,
		quantity = in_quantity,
		size = in_size,
		weight = in_weight,
		special_features = in_special_features,
		`status` = in_status,
		updated_by = in_user_id,
		updated_at = NOW()

	WHERE
		id = in_id;
		
	SELECT
		*
	FROM
		Products
	WHERE
		id = in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_update_qty
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_update_qty`;
delimiter ;;
CREATE PROCEDURE `product_update_qty`(IN in_id INT,
  IN in_quantity INT,
	IN in_status INT)
BEGIN
	UPDATE
		Products
	SET
		quantity = in_quantity,
		sold_quantity = in_sold_quantity
	WHERE
		id = in_id;
		
	SELECT
		*
	FROM
		Products
	WHERE
		id = in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_update_qty_after_order
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_update_qty_after_order`;
delimiter ;;
CREATE PROCEDURE `product_update_qty_after_order`(IN in_id INT,
    IN in_quantity INT)
BEGIN
    DECLARE product_quantity INT;
    DECLARE product_sold_quantity INT;
    DECLARE message VARCHAR(255);

    
    SELECT quantity, sold_quantity INTO product_quantity, product_sold_quantity
    FROM Products
    WHERE id = in_id;

    
    IF product_quantity >= in_quantity THEN
        
        UPDATE Products
        SET quantity = quantity - in_quantity,
            sold_quantity = sold_quantity + in_quantity
        WHERE id = in_id;

        
        SET message = 'Update successful';
    ELSE
        
        SET message = 'Insufficient quantity';
    END IF;

    
    SELECT message AS message;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for product_update_status
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_update_status`;
delimiter ;;
CREATE PROCEDURE `product_update_status`(IN in_user_id INT,
	IN in_id INT,
	IN in_status INT)
BEGIN
	DECLARE user_role_id INT;
	SELECT role_id INTO user_role_id FROM users WHERE id = in_user_id;
	
	IF user_role_id = 1 OR (SELECT created_by FROM Categories WHERE id = in_id) = in_user_id THEN
			UPDATE Products SET
					`status` = in_status,
					updated_by = in_user_id,
					updated_at = NOW()
			WHERE id = in_id;
			SELECT 'Update successful' AS message;
	ELSE
			SELECT 'Err: You do not have access' AS message;
	END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_delete
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_delete`;
delimiter ;;
CREATE PROCEDURE `users_delete`(IN `in_id` INT)
BEGIN
  UPDATE users SET status = 0 WHERE id = in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_get
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_get`;
delimiter ;;
CREATE PROCEDURE `users_get`(IN `in_id` INT)
BEGIN
  SELECT
    id,
    first_name,
    last_name,
    login,
    `password`,
    `status`,
    role_id,
    address,
    phone_number,
    avatar,
    created_at,
    updated_at
  FROM
    users
  WHERE
    id = in_id;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_get_email
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_get_email`;
delimiter ;;
CREATE PROCEDURE `users_get_email`(IN `in_email`  VARCHAR(50))
BEGIN
  SELECT
    *
  FROM users t0
  WHERE t0.login = in_email;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_login
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_login`;
delimiter ;;
CREATE PROCEDURE `users_login`(IN `in_login` VARCHAR(50))
BEGIN
SELECT 
    t0.id, 
    t0.login, 
    t0.password 
  FROM users t0
  WHERE t0.login = in_login AND t0.status = 1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_set_password
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_set_password`;
delimiter ;;
CREATE PROCEDURE `users_set_password`(IN `in_id_user` INT, IN `in_password` VARCHAR(50))
BEGIN
	UPDATE users SET password = in_password WHERE id = in_id_user;
    SELECT 'Ok' status;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_update
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_update`;
delimiter ;;
CREATE PROCEDURE `users_update`(IN `in_id` INT, IN `in_first_name` VARCHAR(50), IN `in_last_name` VARCHAR(50), IN `in_status` TINYINT)
BEGIN
	  UPDATE users SET
        first_name = in_first_name,
        last_name = in_last_name,
		status = in_status,
		updated_on = NOW()
	  WHERE id =  in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for users_update2
-- ----------------------------
DROP PROCEDURE IF EXISTS `users_update2`;
delimiter ;;
CREATE PROCEDURE `users_update2`(IN `in_id` INT, 
	IN `in_first_name` VARCHAR(50), 
	IN `in_last_name` VARCHAR(50), 
	IN in_login VARCHAR(50),
	IN in_address VARCHAR(2555),
	IN in_phone int,
	IN in_avatar VARCHAR(255))
BEGIN
	  UPDATE users SET
        first_name = in_first_name,
        last_name = in_last_name,
				login = in_login,
				address = in_address,
				phone_number = in_phone,
				avatar = in_avatar,
				updated_on = NOW()
	  WHERE id =  in_id;
		
		SELECT *
		FROM users
		WHERE id =  in_id;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for user_create
-- ----------------------------
DROP PROCEDURE IF EXISTS `user_create`;
delimiter ;;
CREATE PROCEDURE `user_create`(IN input_user_first_name VARCHAR(50),
  IN input_user_last_name VARCHAR(50),
  IN input_user_login VARCHAR(250),
  IN input_user_password VARCHAR(255))
BEGIN
	INSERT INTO
		users (
			first_name, 
			last_name, 
			login, 
			`password`, 
			`status`,
			role_id,
			created_at
		)
	VALUES
		(
			input_user_first_name,
			input_user_last_name,
			input_user_login,
			input_user_password,
			1,
			3,
			NOW()
		);

	SELECT
		*
	FROM
		users
	WHERE
		id = LAST_INSERT_ID();
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for user_get_by_id
-- ----------------------------
DROP PROCEDURE IF EXISTS `user_get_by_id`;
delimiter ;;
CREATE PROCEDURE `user_get_by_id`(IN `in_id` INT)
BEGIN
  SELECT
    id,
    first_name,
    last_name,
    login,
    `password`,
    `status`,
    role_id,
    address,
    phone_number,
    avatar,
    created_at,
    updated_at
  FROM
    users
  WHERE
    id = in_id;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
