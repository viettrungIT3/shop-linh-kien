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

 Date: 07/05/2023 09:00:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `Categories` VALUES (1, 'Laptop Accessories', '', 0, 19, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (2, 'PC Accessories', '', 0, 23, 1, 1, '2023-05-03 11:26:25', '2023-05-03 05:21:16');
INSERT INTO `Categories` VALUES (3, 'Desk Setup Accessories', NULL, 2, 12, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (4, 'Headphone Accessories', NULL, 1, 9, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (5, 'Hard Drives', NULL, 2, 14, 1, 1, '2023-05-03 11:26:25', '2023-05-03 05:20:23');
INSERT INTO `Categories` VALUES (6, 'Cables', NULL, 1, 22, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (7, 'Adapters', NULL, 1, 13, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (8, 'Signal Splitters', NULL, 1, 15, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');
INSERT INTO `Categories` VALUES (9, 'Other Accessories', NULL, 1, 12, 1, 1, '2023-05-03 11:26:25', '2023-05-03 11:26:25');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Order_Details
-- ----------------------------

-- ----------------------------
-- Table structure for Orders
-- ----------------------------
DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total_amount` decimal(10, 2) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Orders
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Product_Images
-- ----------------------------
INSERT INTO `Product_Images` VALUES (13, 137, '730831ef984dc59cda9d198c19da5d5f_1683380978.jpg');
INSERT INTO `Product_Images` VALUES (14, 137, '407cb71d947b75172ed4611d99097014_1683380978.png');
INSERT INTO `Product_Images` VALUES (15, 137, 'fa85b72cec4dbc2e60b1d6475245e71c_1683380978.png');
INSERT INTO `Product_Images` VALUES (16, 137, '59a001137718da6f234c44e91e69d221_1683380978.jpg');
INSERT INTO `Product_Images` VALUES (17, 137, '1efcce935084b49e59dc631b7418853f_1683380978.jpg');
INSERT INTO `Product_Images` VALUES (18, 138, '9be0d192301baec6ec5292b6562934fb_1683388855.jpg');
INSERT INTO `Product_Images` VALUES (19, 139, '9be0d192301baec6ec5292b6562934fb_1683398191.jpg');
INSERT INTO `Product_Images` VALUES (20, 1, '9be0d192301baec6ec5292b6562934fb_1683398930.jpg');
INSERT INTO `Product_Images` VALUES (21, 1, 'e9f6e79056d6e943287d01a979baeff9_1683400659.png');
INSERT INTO `Product_Images` VALUES (22, 4, '9af862a17a421b774a282380793b4c67_1683400710.png');

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
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `warranty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gift_info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quantity` int(11) NOT NULL,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `weight` float NULL DEFAULT NULL,
  `special_features` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(4) NULL DEFAULT 1 COMMENT '0: blocked| 1: showing | 2: deleted',
  `created_by` tinyint(11) NULL DEFAULT NULL,
  `updated_by` tinyint(11) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Products
-- ----------------------------
INSERT INTO `Products` VALUES (1, 4, 'Product 1', 1000000.00, 'desc 2', 'Thương hiệu sản phẩm', 'Bảo hành sản phẩm', 'Thông tin khuyến mãi', 20, 0, 'Kích thước sản phẩm', 1.5, '0', 1, 1, 1, '2023-05-03 10:30:32', '2023-05-06 19:21:48');
INSERT INTO `Products` VALUES (2, 1, 'Product name', 1000000.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 10, 0, 'Product size', 1.5, '0', 2, 1, 1, '2023-05-03 10:31:32', '2023-05-03 17:40:12');
INSERT INTO `Products` VALUES (3, 2, 'test', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 10, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 11:56:31', '2023-05-06 02:00:35');
INSERT INTO `Products` VALUES (4, 1, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:00:25', '2023-05-06 19:18:30');
INSERT INTO `Products` VALUES (5, 1, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:00:56', NULL);
INSERT INTO `Products` VALUES (6, 2, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 1, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:03:36', '2023-05-06 03:14:17');
INSERT INTO `Products` VALUES (7, 2, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 2, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:04:10', '2023-05-06 03:14:20');
INSERT INTO `Products` VALUES (8, 3, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 3, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:04:31', '2023-05-06 03:14:21');
INSERT INTO `Products` VALUES (9, 3, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 4, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 17:05:08', '2023-05-06 03:14:22');
INSERT INTO `Products` VALUES (10, 3, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 5, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-04 11:58:13', '2023-05-06 03:14:24');
INSERT INTO `Products` VALUES (11, 1, 'test', 1.00, '<p>ádcvasdvc</p>', '', '', '<p>zxcvzxcvzxcvzxcvzxc</p>', 1, 0, 'x', 1, '<p>zxvzxcvzxcv</p>', 1, 1, 1, '2023-05-04 14:01:36', NULL);
INSERT INTO `Products` VALUES (12, 5, 'aaa', 11.00, '<p>11</p>', NULL, '<p>11</p>', '<p>11</p>', 11, 0, '11', 11, '<p>11</p>', 1, 1, 1, '2023-05-04 19:31:32', NULL);
INSERT INTO `Products` VALUES (13, 3, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-04 19:32:56', NULL);
INSERT INTO `Products` VALUES (14, 4, 'test', 112.00, '', NULL, '', '', 123, 0, '123', 123, '', 1, 1, 1, '2023-05-04 19:33:51', NULL);
INSERT INTO `Products` VALUES (15, 5, 'test', 22.00, '<p><b>abc</b></p>', NULL, '', '', 22, 0, '2', 2, '<p><b>xyz</b></p>', 1, 1, 1, '2023-05-04 19:37:40', NULL);
INSERT INTO `Products` VALUES (16, 5, 'test', 11.00, '', NULL, '', '', 11, 0, '1', 11, '', 1, 1, 1, '2023-05-05 14:14:13', NULL);
INSERT INTO `Products` VALUES (17, 2, 'test', 11.00, '', NULL, '', '', 11, 0, 'x', 11, '', 1, 1, 1, '2023-05-05 15:19:05', NULL);
INSERT INTO `Products` VALUES (18, 2, 'aaa', 11.00, '', NULL, '', '', 11, 0, '22', 11, '', 1, 1, 1, '2023-05-05 16:16:36', NULL);
INSERT INTO `Products` VALUES (19, 8, 'aenean lectus pellentesque eget nunc donec quis orci', 2166.64, 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo.', 'nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla', 'in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', 'dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla justo', 178, 8, 'augue', 3.79, 'vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (20, 6, 'tincidunt nulla mollis molestie lorem', 8870.44, 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', 'nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla', 'molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse', 'ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit ultrices enim lorem', 855, 98, 'tellus', 7.13, 'tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (21, 1, 'tellus in sagittis dui vel nisl', 1142.94, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 'pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac', 'ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat', 'iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate', 910, 83, 'ut', 9.24, 'suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris morbi non', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (22, 2, 'ligula suspendisse ornare consequat lectus in est risus auctor', 9178.47, 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 'donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus', 'integer aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien', 'lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at', 842, 25, 'nullam', 6.66, 'eu interdum eu tincidunt in leo maecenas pulvinar lobortis est phasellus sit', 1, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (23, 7, 'semper interdum mauris ullamcorper purus', 5924.67, 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui.', 'a suscipit nulla elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit', 'sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam', 'tincidunt in leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu', 918, 95, 'magna', 4.69, 'lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (24, 7, 'ipsum primis in faucibus orci luctus et', 1923.90, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti', 'quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis', 'imperdiet et commodo vulputate justo in blandit ultrices enim lorem', 440, 62, 'vestibulum', 1.42, 'eu sapien cursus vestibulum proin eu mi nulla ac enim in tempor turpis nec euismod scelerisque quam', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (25, 8, 'in consequat ut nulla sed accumsan felis ut at dolor', 7923.95, 'Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', 'eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim leo', 'ligula vehicula consequat morbi a ipsum integer a nibh in quis justo maecenas rhoncus aliquam', 'laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus semper', 762, 21, 'ullamcorper', 6.78, 'justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin interdum mauris non ligula pellentesque', 0, 1, 1, '2023-05-06 04:42:22', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (26, 2, 'integer a nibh in quis', 9794.93, 'Donec ut dolor.', 'velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros', 'vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna', 'hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate', 262, 44, 'velit', 7.18, 'tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (27, 3, 'sit amet nulla quisque arcu libero', 7703.29, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 'at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna', 'vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis', 'in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis', 384, 90, 'sed', 2.8, 'metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (28, 9, 'purus eu magna vulputate luctus cum sociis natoque penatibus', 6044.62, 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.', 'tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie', 'ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus', 'urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius', 577, 43, 'vestibulum', 6.07, 'nulla dapibus dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (29, 7, 'nulla ultrices aliquet maecenas leo odio condimentum', 521.66, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue', 'in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet', 'eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit', 371, 88, 'nulla', 6.95, 'sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (30, 2, 'platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum', 4679.40, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', 'felis fusce posuere felis sed lacus morbi sem mauris laoreet ut', 'purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 'sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus', 404, 86, 'convallis', 1.65, 'praesent blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (31, 2, 'amet nunc viverra dapibus nulla suscipit ligula in', 8244.82, 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.', 'magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus', 'congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed', 'id luctus nec molestie sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique', 322, 30, 'elit', 1.99, 'sit amet sem fusce consequat nulla nisl nunc nisl duis', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (32, 1, 'tempus semper est quam pharetra magna ac consequat', 3465.23, 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus', 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis', 'odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar', 749, 34, 'non', 4.27, 'vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (33, 6, 'scelerisque mauris sit amet eros suspendisse', 6729.03, 'Nullam porttitor lacus at turpis.', 'sapien a libero nam dui proin leo odio porttitor id', 'blandit lacinia erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede', 'curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac lobortis', 729, 40, 'et', 7.82, 'primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (34, 7, 'cursus vestibulum proin eu mi nulla ac enim in', 6671.35, 'Donec semper sapien a libero. Nam dui.', 'gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede', 'etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut', 'cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend', 153, 30, 'pulvinar', 1.7, 'penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (35, 5, 'vitae mattis nibh ligula nec sem duis aliquam', 1958.16, 'Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 'posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet', 'eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla', 'aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam congue risus', 895, 28, 'ut', 8.85, 'volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie nibh in', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (36, 2, 'tempus semper est quam pharetra magna', 180.17, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', 'non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc', 'dolor vel est donec odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 217, 48, 'metus', 5.97, 'cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (37, 2, 'elementum pellentesque quisque porta volutpat', 9292.19, 'Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', 'nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla', 'montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes', 'elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur', 907, 88, 'mattis', 8.94, 'ac neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (38, 4, 'ut dolor morbi vel lectus', 2670.48, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 'nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium', 'purus sit amet nulla quisque arcu libero rutrum ac lobortis vel dapibus at diam nam tristique', 'ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla', 647, 65, 'ridiculus', 4.85, 'sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (39, 6, 'ultrices enim lorem ipsum dolor sit amet consectetuer', 7824.43, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio', 'sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel sem sed sagittis nam', 'sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus', 860, 51, 'vitae', 3.3, 'sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (40, 9, 'adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam', 6567.10, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo', 'sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec', 764, 3, 'sociis', 3.39, 'vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (41, 6, 'ornare consequat lectus in est risus auctor sed tristique', 3852.58, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.', 'sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere', 'imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam', 'pellentesque at nulla suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis', 793, 86, 'at', 5.85, 'faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (42, 5, 'eu interdum eu tincidunt in', 1307.79, 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum.', 'id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante', 'ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus dolor vel est donec odio justo', 'integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum', 650, 77, 'dui', 2.18, 'semper rutrum nulla nunc purus phasellus in felis donec semper', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (43, 8, 'erat tortor sollicitudin mi sit', 3538.84, 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend quam a odio in hac habitasse platea', 'tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante', 'neque duis bibendum morbi non quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl', 891, 63, 'eros', 4.76, 'fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (44, 6, 'praesent blandit nam nulla integer pede justo lacinia', 4232.32, 'Ut tellus. Nulla ut erat id mauris vulputate elementum.', 'fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in eleifend', 'dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida', 'congue etiam justo etiam pretium iaculis justo in hac habitasse platea dictumst etiam faucibus', 39, 55, 'non', 3.55, 'eu sapien cursus vestibulum proin eu mi nulla ac enim', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (45, 7, 'consequat varius integer ac leo pellentesque ultrices mattis odio donec', 3802.37, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', 'leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus', 'magna vestibulum aliquet ultrices erat tortor sollicitudin mi sit amet lobortis sapien sapien non mi', 'eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum', 982, 9, 'nisl', 9.93, 'ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec pharetra magna', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (46, 6, 'ut massa quis augue luctus', 931.92, 'Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 'massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien', 'neque aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo', 'integer ac neque duis bibendum morbi non quam nec dui luctus', 635, 5, 'consequat', 7.86, 'placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (47, 9, 'est quam pharetra magna ac consequat metus sapien ut nunc', 6595.89, 'Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui', 'consectetuer adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in', 'placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan', 822, 41, 'euismod', 8.59, 'mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (48, 9, 'elementum pellentesque quisque porta volutpat erat quisque erat eros viverra', 3559.23, 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.', 'mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt', 'nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis', 'hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis', 276, 26, 'eget', 9.48, 'dapibus augue vel accumsan tellus nisi eu orci mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (49, 5, 'in quam fringilla rhoncus mauris enim', 5152.18, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante.', 'rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio', 'rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum', 'cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus', 995, 42, 'vitae', 6.29, 'tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (50, 9, 'erat vestibulum sed magna at nunc commodo placerat praesent blandit', 1554.46, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui.', 'ac nibh fusce lacus purus aliquet at feugiat non pretium quis', 'montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus', 'convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci mauris lacinia', 490, 28, 'ac', 2.2, 'proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (51, 2, 'eget eleifend luctus ultricies eu nibh quisque', 6614.74, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', 'aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse', 'nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse', 'nec sem duis aliquam convallis nunc proin at turpis a pede posuere', 400, 55, 'risus', 5.31, 'rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (52, 1, 'erat fermentum justo nec condimentum neque sapien', 5718.38, 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor', 'ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium', 'pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia', 120, 62, 'nullam', 6.64, 'nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (53, 4, 'est phasellus sit amet erat nulla tempus vivamus in', 4088.83, 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.', 'potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et', 'commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet', 'sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus', 149, 99, 'faucibus', 3.52, 'accumsan tortor quis turpis sed ante vivamus tortor duis mattis', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (54, 6, 'scelerisque mauris sit amet eros suspendisse accumsan tortor quis', 9305.49, 'Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec', 'ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec', 'egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla', 15, 21, 'aliquet', 2.99, 'rutrum at lorem integer tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc commodo', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (55, 9, 'in felis eu sapien cursus vestibulum proin eu', 1895.76, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.', 'odio in hac habitasse platea dictumst maecenas ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque', 'in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis', 'velit eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium iaculis', 507, 12, 'amet', 0.37, 'mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (56, 8, 'odio odio elementum eu interdum', 2969.58, 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', 'odio justo sollicitudin ut suscipit a feugiat et eros vestibulum', 'montes nascetur ridiculus mus etiam vel augue vestibulum rutrum rutrum neque aenean auctor gravida sem praesent id massa', 'eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis in faucibus orci luctus et', 721, 80, 'cubilia', 8.23, 'turpis a pede posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (57, 7, 'platea dictumst aliquam augue quam sollicitudin vitae consectetuer eget rutrum', 1759.56, 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum.', 'adipiscing elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus', 'eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna pretium nisl', 'at dolor quis odio consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi', 353, 100, 'amet', 8.49, 'sem praesent id massa id nisl venenatis lacinia aenean sit amet justo morbi ut odio cras mi pede', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (58, 9, 'eu nibh quisque id justo sit amet', 8649.91, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.', 'dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla', 'justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam pharetra', 'porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus', 272, 65, 'semper', 6.3, 'lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (59, 2, 'integer a nibh in quis', 4341.22, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', 'nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero', 'eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla nunc purus', 'elit ac nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur', 508, 47, 'cras', 1.87, 'diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (60, 8, 'nibh ligula nec sem duis aliquam convallis', 9866.00, 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non mauris', 'feugiat et eros vestibulum ac est lacinia nisi venenatis tristique', 'eros suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget', 623, 7, 'vehicula', 3.94, 'purus phasellus in felis donec semper sapien a libero nam dui proin leo', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (61, 5, 'sapien urna pretium nisl ut volutpat sapien arcu', 6859.07, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'non mattis pulvinar nulla pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet nunc', 'blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing elit proin', 'rutrum rutrum neque aenean auctor gravida sem praesent id massa id nisl venenatis', 651, 40, 'lorem', 4.11, 'vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (62, 1, 'sem mauris laoreet ut rhoncus', 8138.13, 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo.', 'lorem id ligula suspendisse ornare consequat lectus in est risus auctor sed tristique in tempus sit amet sem fusce consequat', 'natoque penatibus et magnis dis parturient montes nascetur ridiculus mus', 'luctus et ultrices posuere cubilia curae duis faucibus accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec', 424, 47, 'lorem', 1.88, 'lacus curabitur at ipsum ac tellus semper interdum mauris ullamcorper purus', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (63, 5, 'vivamus in felis eu sapien cursus vestibulum proin eu mi', 9331.96, 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 'pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper', 'praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus', 'facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel', 814, 74, 'porttitor', 4.29, 'pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (64, 2, 'rutrum at lorem integer tincidunt ante vel', 822.01, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'pellentesque volutpat dui maecenas tristique est et tempus semper est quam', 'erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy maecenas tincidunt lacus', 'proin risus praesent lectus vestibulum quam sapien varius ut blandit non interdum', 224, 37, 'pede', 1.72, 'dui vel nisl duis ac nibh fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (65, 5, 'integer non velit donec diam neque vestibulum eget', 1098.52, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', 'nibh fusce lacus purus aliquet at feugiat non pretium quis', 'suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 'id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget', 319, 13, 'montes', 2.47, 'nulla nisl nunc nisl duis bibendum felis sed interdum venenatis turpis enim', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (66, 2, 'proin leo odio porttitor id consequat in consequat ut', 9032.95, 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 'fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa', 'accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec', 'et commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer', 439, 21, 'ut', 8.89, 'nulla sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (67, 4, 'nulla justo aliquam quis turpis', 3375.49, 'Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim.', 'sagittis nam congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci', 'nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue', 'mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus ultricies eu nibh quisque', 391, 22, 'vestibulum', 2.61, 'lectus in quam fringilla rhoncus mauris enim leo rhoncus sed', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (68, 7, 'purus aliquet at feugiat non', 9593.27, 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', 'varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero', 'vel ipsum praesent blandit lacinia erat vestibulum sed magna at nunc', 'pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing', 388, 11, 'gravida', 5.64, 'sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (69, 2, 'sit amet sapien dignissim vestibulum vestibulum', 2859.76, 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 'sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut at', 'erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy', 'ut erat curabitur gravida nisi at nibh in hac habitasse platea', 597, 98, 'sit', 8.58, 'natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (70, 4, 'adipiscing molestie hendrerit at vulputate', 4448.37, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum.', 'nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis ut', 'non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus', 'consequat ut nulla sed accumsan felis ut at dolor quis odio consequat varius integer ac leo pellentesque ultrices', 449, 36, 'vestibulum', 4.08, 'erat eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis donec semper sapien a', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (71, 6, 'ut massa volutpat convallis morbi', 769.98, 'Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', 'id consequat in consequat ut nulla sed accumsan felis ut at dolor quis odio consequat', 'platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id', 'placerat praesent blandit nam nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem id ligula', 554, 6, 'molestie', 9.14, 'hac habitasse platea dictumst maecenas ut massa quis augue luctus', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (72, 1, 'lacinia sapien quis libero nullam sit', 8682.78, 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', 'ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede', 'et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec', 'amet erat nulla tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac', 992, 50, 'integer', 4.05, 'orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (73, 8, 'turpis eget elit sodales scelerisque mauris sit', 594.08, 'Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis', 'in quam fringilla rhoncus mauris enim leo rhoncus sed vestibulum sit amet cursus id', 'leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus in felis eu sapien', 392, 5, 'turpis', 6.48, 'accumsan odio curabitur convallis duis consequat dui nec nisi volutpat eleifend donec ut', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (74, 8, 'pede posuere nonummy integer non velit donec diam neque vestibulum', 5245.16, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', 'duis consequat dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla rhoncus mauris enim', 'quisque porta volutpat erat quisque erat eros viverra eget congue eget semper rutrum nulla', 'eros viverra eget congue eget semper rutrum nulla nunc purus phasellus in felis', 144, 57, 'nec', 4.81, 'viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est quam', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (75, 9, 'etiam justo etiam pretium iaculis justo in hac', 9249.41, 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id ornare imperdiet sapien urna', 'in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis', 'felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet', 708, 24, 'venenatis', 0.35, 'cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (76, 1, 'pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas', 2168.83, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 'id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque', 'nulla integer pede justo lacinia eget tincidunt eget tempus vel pede morbi porttitor lorem', 'est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 359, 74, 'volutpat', 3.77, 'neque libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (77, 7, 'mollis molestie lorem quisque ut erat curabitur gravida', 5141.79, 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.', 'libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas pulvinar', 'risus semper porta volutpat quam pede lobortis ligula sit amet', 'dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et', 777, 59, 'luctus', 0.22, 'morbi vestibulum velit id pretium iaculis diam erat fermentum justo', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (78, 5, 'non sodales sed tincidunt eu felis fusce posuere felis', 461.63, 'Aliquam erat volutpat.', 'duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend luctus', 'integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla', 'massa donec dapibus duis at velit eu est congue elementum in', 822, 95, 'primis', 2.1, 'neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (79, 7, 'nulla tellus in sagittis dui vel nisl', 8611.37, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae', 'curae mauris viverra diam vitae quam suspendisse potenti nullam porttitor lacus at turpis donec posuere metus vitae ipsum aliquam non', 'pede posuere nonummy integer non velit donec diam neque vestibulum', 637, 69, 'rhoncus', 6.47, 'et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (80, 1, 'vestibulum aliquet ultrices erat tortor sollicitudin mi sit', 9820.64, 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', 'vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan odio', 'mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac', 'sollicitudin mi sit amet lobortis sapien sapien non mi integer ac neque duis bibendum morbi non quam nec dui', 991, 82, 'in', 5.47, 'in consequat ut nulla sed accumsan felis ut at dolor quis', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (81, 4, 'sem duis aliquam convallis nunc proin at turpis', 1208.90, 'Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 'penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis', 'nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc proin at turpis', 'nulla suspendisse potenti cras in purus eu magna vulputate luctus', 34, 16, 'varius', 9.18, 'aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (82, 6, 'porttitor lacus at turpis donec posuere metus vitae', 7932.95, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'velit donec diam neque vestibulum eget vulputate ut ultrices vel', 'ipsum integer a nibh in quis justo maecenas rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo', 'volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam pretium iaculis justo in hac habitasse', 113, 37, 'faucibus', 6.92, 'in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (83, 6, 'rhoncus mauris enim leo rhoncus', 1721.56, 'Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', 'vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat erat quisque erat eros viverra eget congue eget', 'habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum nullam varius', 'semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante ipsum primis in faucibus orci', 222, 92, 'magna', 2.49, 'sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (84, 5, 'tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum', 8514.38, 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 'aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu orci', 'amet nulla quisque arcu libero rutrum ac lobortis vel dapibus at diam nam tristique tortor eu', 'quam pede lobortis ligula sit amet eleifend pede libero quis', 707, 57, 'ipsum', 4.18, 'eu est congue elementum in hac habitasse platea dictumst morbi vestibulum velit id pretium', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (85, 1, 'ante vel ipsum praesent blandit lacinia erat vestibulum sed', 2787.23, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', 'hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc donec quis orci eget orci vehicula condimentum curabitur', 'sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel', 'cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit', 696, 39, 'proin', 9.77, 'aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede ac diam cras', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (86, 6, 'vestibulum velit id pretium iaculis diam', 8497.67, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'consequat lectus in est risus auctor sed tristique in tempus sit amet sem', 'eu massa donec dapibus duis at velit eu est congue elementum in hac habitasse platea dictumst', 'donec ut mauris eget massa tempor convallis nulla neque libero convallis eget eleifend', 687, 72, 'tempus', 2.54, 'orci luctus et ultrices posuere cubilia curae donec pharetra magna vestibulum aliquet', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (87, 4, 'sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at', 8641.06, 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula.', 'sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus vivamus vestibulum sagittis', 'mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 'leo rhoncus sed vestibulum sit amet cursus id turpis integer aliquet massa', 420, 21, 'orci', 6.4, 'nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus semper', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (88, 2, 'platea dictumst aliquam augue quam', 9100.07, 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'amet justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate', 'vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus etiam', 'aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum', 392, 53, 'duis', 1.48, 'lacus at velit vivamus vel nulla eget eros elementum pellentesque quisque porta volutpat', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (89, 7, 'interdum mauris ullamcorper purus sit amet nulla quisque', 3067.06, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'eget rutrum at lorem integer tincidunt ante vel ipsum praesent', 'diam in magna bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt', 'sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque eget nunc', 747, 72, 'malesuada', 9.25, 'quis orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (90, 3, 'duis aliquam convallis nunc proin at turpis a', 6058.64, 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'suspendisse accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus', 'nunc nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo', 'in sagittis dui vel nisl duis ac nibh fusce lacus', 606, 51, 'congue', 0.89, 'felis sed interdum venenatis turpis enim blandit mi in porttitor pede justo eu massa donec dapibus duis at', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (91, 6, 'consequat dui nec nisi volutpat eleifend donec ut', 6427.36, 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', 'aenean auctor gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet', 'primis in faucibus orci luctus et ultrices posuere cubilia curae', 'in tempus sit amet sem fusce consequat nulla nisl nunc', 209, 62, 'nam', 0.09, 'nulla ut erat id mauris vulputate elementum nullam varius nulla facilisi cras non velit nec nisi vulputate nonummy', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (92, 9, 'phasellus id sapien in sapien iaculis congue vivamus metus', 2076.72, 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 'rhoncus aliquam lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus', 'quis turpis eget elit sodales scelerisque mauris sit amet eros suspendisse accumsan tortor quis turpis sed', 'elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus', 940, 86, 'etiam', 0.26, 'metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (93, 4, 'hac habitasse platea dictumst morbi vestibulum', 3105.77, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', 'lobortis ligula sit amet eleifend pede libero quis orci nullam molestie', 'vestibulum quam sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus orci luctus et', 'faucibus orci luctus et ultrices posuere cubilia curae nulla dapibus', 19, 27, 'justo', 3.93, 'maecenas tincidunt lacus at velit vivamus vel nulla eget eros elementum', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (94, 2, 'condimentum neque sapien placerat ante nulla justo', 7336.78, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', 'bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere', 'nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam fringilla', 'accumsan tortor quis turpis sed ante vivamus tortor duis mattis egestas metus aenean fermentum', 833, 42, 'elementum', 1.82, 'orci eget orci vehicula condimentum curabitur in libero ut massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (95, 6, 'mauris eget massa tempor convallis', 4384.82, 'Etiam vel augue. Vestibulum rutrum rutrum neque.', 'nisl duis bibendum felis sed interdum venenatis turpis enim blandit mi in', 'habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum', 'nibh ligula nec sem duis aliquam convallis nunc proin at', 232, 7, 'dolor', 5.06, 'in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (96, 3, 'maecenas tincidunt lacus at velit vivamus vel nulla eget', 5127.63, 'Etiam justo.', 'quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis', 'massa volutpat convallis morbi odio odio elementum eu interdum eu tincidunt in leo maecenas', 'sed justo pellentesque viverra pede ac diam cras pellentesque volutpat dui maecenas tristique est et tempus semper est', 31, 87, 'lacinia', 0.81, 'consequat ut nulla sed accumsan felis ut at dolor quis odio consequat', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (97, 8, 'in felis donec semper sapien', 9772.06, 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum.', 'imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam', 'non velit nec nisi vulputate nonummy maecenas tincidunt lacus at velit vivamus vel nulla eget eros', 'dui maecenas tristique est et tempus semper est quam pharetra magna ac consequat metus sapien ut nunc vestibulum ante', 762, 6, 'nec', 7.64, 'nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (98, 6, 'turpis a pede posuere nonummy integer non velit donec diam', 4274.13, 'Proin at turpis a pede posuere nonummy. Integer non velit.', 'ut blandit non interdum in ante vestibulum ante ipsum primis in faucibus', 'diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere', 'justo morbi ut odio cras mi pede malesuada in imperdiet et commodo vulputate justo in blandit', 91, 73, 'volutpat', 2.58, 'eu felis fusce posuere felis sed lacus morbi sem mauris laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (99, 7, 'leo odio porttitor id consequat in consequat ut nulla', 2275.61, 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl.', 'blandit lacinia erat vestibulum sed magna at nunc commodo placerat', 'vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus', 'risus auctor sed tristique in tempus sit amet sem fusce consequat nulla nisl nunc nisl duis bibendum felis', 366, 38, 'vitae', 0.13, 'tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (100, 2, 'lobortis ligula sit amet eleifend pede libero', 244.90, 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 'ligula vehicula consequat morbi a ipsum integer a nibh in quis', 'ac consequat metus sapien ut nunc vestibulum ante ipsum primis in', 'nulla quisque arcu libero rutrum ac lobortis vel dapibus at', 722, 36, 'turpis', 8.85, 'nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus aliquet', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (101, 8, 'nec sem duis aliquam convallis nunc proin', 3488.43, 'Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'risus praesent lectus vestibulum quam sapien varius ut blandit non interdum in ante', 'posuere nonummy integer non velit donec diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis in', 'laoreet ut rhoncus aliquet pulvinar sed nisl nunc rhoncus dui vel', 299, 75, 'etiam', 5.2, 'in ante vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae duis faucibus accumsan', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (102, 1, 'dui maecenas tristique est et tempus semper', 6315.37, 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis parturient montes nascetur', 'tempus vivamus in felis eu sapien cursus vestibulum proin eu mi nulla ac enim', 'erat fermentum justo nec condimentum neque sapien placerat ante nulla justo aliquam quis turpis eget', 888, 32, 'quam', 7, 'erat vestibulum sed magna at nunc commodo placerat praesent blandit nam nulla integer pede justo lacinia', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (103, 5, 'turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis', 1137.88, 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 'ac tellus semper interdum mauris ullamcorper purus sit amet nulla quisque arcu libero rutrum ac', 'quam nec dui luctus rutrum nulla tellus in sagittis dui vel nisl duis ac nibh fusce lacus purus', 'bibendum imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis', 912, 57, 'turpis', 9.28, 'congue risus semper porta volutpat quam pede lobortis ligula sit amet eleifend pede libero quis orci nullam molestie', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (104, 1, 'interdum in ante vestibulum ante ipsum primis', 2503.65, 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh.', 'aliquam erat volutpat in congue etiam justo etiam pretium iaculis', 'sapien varius ut blandit non interdum in ante vestibulum ante ipsum primis', 'sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis', 372, 100, 'amet', 2.59, 'sit amet diam in magna bibendum imperdiet nullam orci pede venenatis non', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (105, 1, 'dictumst etiam faucibus cursus urna ut tellus', 924.55, 'Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'dui nec nisi volutpat eleifend donec ut dolor morbi vel lectus in quam', 'fusce lacus purus aliquet at feugiat non pretium quis lectus suspendisse potenti in', 'mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet', 338, 19, 'tortor', 1.55, 'nulla tempus vivamus in felis eu sapien cursus vestibulum proin', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (106, 6, 'justo aliquam quis turpis eget', 1512.87, 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar nulla pede ullamcorper augue', 'mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis dis', 'ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac', 867, 6, 'congue', 3.41, 'ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante ipsum primis', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (107, 6, 'sed accumsan felis ut at', 9595.78, 'Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 'tortor id nulla ultrices aliquet maecenas leo odio condimentum id luctus nec molestie sed justo pellentesque viverra pede', 'erat curabitur gravida nisi at nibh in hac habitasse platea dictumst aliquam augue quam sollicitudin', 'gravida sem praesent id massa id nisl venenatis lacinia aenean sit amet justo', 165, 58, 'dictumst', 2.66, 'pretium iaculis justo in hac habitasse platea dictumst etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (108, 4, 'quisque porta volutpat erat quisque erat eros', 9156.97, 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', 'mauris lacinia sapien quis libero nullam sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer a nibh in', 'pede ullamcorper augue a suscipit nulla elit ac nulla sed vel enim sit amet', 'aliquet massa id lobortis convallis tortor risus dapibus augue vel accumsan tellus nisi eu', 1000, 74, 'et', 3.76, 'tristique est et tempus semper est quam pharetra magna ac consequat', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 18:55:14');
INSERT INTO `Products` VALUES (109, 1, 'sodales scelerisque mauris sit amet eros suspendisse', 419.13, 'Pellentesque ultrices mattis odio.', 'in sagittis dui vel nisl duis ac nibh fusce lacus purus', 'posuere metus vitae ipsum aliquam non mauris morbi non lectus aliquam sit amet diam in', 'libero convallis eget eleifend luctus ultricies eu nibh quisque id justo sit amet sapien dignissim vestibulum vestibulum ante', 635, 12, 'odio', 7.06, 'consequat varius integer ac leo pellentesque ultrices mattis odio donec vitae nisi nam ultrices libero non mattis pulvinar', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (110, 6, 'iaculis justo in hac habitasse platea dictumst', 6030.74, 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'parturient montes nascetur ridiculus mus vivamus vestibulum sagittis sapien cum sociis natoque penatibus et magnis', 'non mi integer ac neque duis bibendum morbi non quam nec dui luctus', 'suspendisse potenti cras in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes', 716, 10, 'magna', 5.74, 'volutpat sapien arcu sed augue aliquam erat volutpat in congue etiam justo etiam', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (111, 9, 'a pede posuere nonummy integer non velit donec diam', 5392.41, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 'sed ante vivamus tortor duis mattis egestas metus aenean fermentum donec ut mauris eget massa tempor convallis nulla neque libero', 'dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo nec condimentum neque sapien placerat ante nulla', 'dolor vel est donec odio justo sollicitudin ut suscipit a', 336, 67, 'nisl', 7.47, 'eu magna vulputate luctus cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (112, 8, 'curae donec pharetra magna vestibulum aliquet ultrices erat tortor', 141.00, 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', 'bibendum morbi non quam nec dui luctus rutrum nulla tellus', 'leo maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus', 'iaculis congue vivamus metus arcu adipiscing molestie hendrerit at vulputate vitae nisl aenean lectus pellentesque', 156, 28, 'blandit', 3.01, 'turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (113, 6, 'tortor risus dapibus augue vel accumsan tellus nisi', 130.61, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum.', 'eleifend pede libero quis orci nullam molestie nibh in lectus pellentesque at nulla', 'sit amet turpis elementum ligula vehicula consequat morbi a ipsum integer', 'elit proin interdum mauris non ligula pellentesque ultrices phasellus id sapien', 392, 24, 'congue', 2.18, 'semper sapien a libero nam dui proin leo odio porttitor id consequat in consequat ut nulla sed accumsan felis', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (114, 7, 'volutpat in congue etiam justo etiam pretium iaculis', 4089.86, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo.', 'lacus morbi quis tortor id nulla ultrices aliquet maecenas leo odio condimentum', 'feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce', 'in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis nibh ligula nec', 173, 89, 'vestibulum', 9.07, 'sed sagittis nam congue risus semper porta volutpat quam pede', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (115, 3, 'phasellus in felis donec semper sapien', 6325.49, 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla.', 'diam neque vestibulum eget vulputate ut ultrices vel augue vestibulum ante ipsum primis', 'sollicitudin vitae consectetuer eget rutrum at lorem integer tincidunt ante vel ipsum praesent blandit', 'maecenas pulvinar lobortis est phasellus sit amet erat nulla tempus vivamus', 19, 59, 'purus', 8.62, 'in faucibus orci luctus et ultrices posuere cubilia curae mauris viverra diam vitae quam suspendisse', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (116, 8, 'morbi odio odio elementum eu interdum eu tincidunt', 3872.30, 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'penatibus et magnis dis parturient montes nascetur ridiculus mus etiam vel augue vestibulum rutrum', 'in purus eu magna vulputate luctus cum sociis natoque penatibus et magnis dis', 'aliquam non mauris morbi non lectus aliquam sit amet diam in magna bibendum imperdiet', 340, 66, 'ut', 6.09, 'odio justo sollicitudin ut suscipit a feugiat et eros vestibulum ac est lacinia nisi venenatis tristique fusce congue diam id', 1, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (117, 1, 'odio condimentum id luctus nec', 4902.54, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', 'etiam faucibus cursus urna ut tellus nulla ut erat id mauris vulputate elementum', 'tincidunt ante vel ipsum praesent blandit lacinia erat vestibulum sed magna', 'turpis adipiscing lorem vitae mattis nibh ligula nec sem duis aliquam convallis nunc', 669, 2, 'hac', 7.4, 'tincidunt eget tempus vel pede morbi porttitor lorem id ligula suspendisse ornare consequat', 0, 1, 1, '2023-05-06 04:42:23', '2023-05-06 04:49:54');
INSERT INTO `Products` VALUES (118, 3, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:15:39', NULL);
INSERT INTO `Products` VALUES (119, 1, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:15:50', NULL);
INSERT INTO `Products` VALUES (120, 2, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:15:55', NULL);
INSERT INTO `Products` VALUES (121, 4, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:15:59', NULL);
INSERT INTO `Products` VALUES (122, 5, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:16:04', NULL);
INSERT INTO `Products` VALUES (123, 6, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:16:08', NULL);
INSERT INTO `Products` VALUES (124, 7, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:16:13', NULL);
INSERT INTO `Products` VALUES (125, 8, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:16:20', NULL);
INSERT INTO `Products` VALUES (126, 9, 'test 2', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 100, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-06 07:16:27', NULL);
INSERT INTO `Products` VALUES (127, 2, 'test', 1.00, '', NULL, '', '', 1, 0, '1', 1, '', 1, 1, 1, '2023-05-06 12:41:09', NULL);
INSERT INTO `Products` VALUES (128, 2, 'test', 1.00, '', NULL, '', '', 1, 0, '1', 1, '', 1, 1, 1, '2023-05-06 12:44:03', NULL);
INSERT INTO `Products` VALUES (129, 3, 'test', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 12:55:41', NULL);
INSERT INTO `Products` VALUES (130, 3, 'aaa', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 12:57:05', NULL);
INSERT INTO `Products` VALUES (131, 3, 'test', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 13:20:39', NULL);
INSERT INTO `Products` VALUES (132, 8, 'test', 3.00, '', NULL, '', '', 3, 0, '3', 3, '', 1, 1, 1, '2023-05-06 13:22:43', NULL);
INSERT INTO `Products` VALUES (133, 8, 'aaa', 5.00, '', NULL, '', '', 5, 0, '5', 5, '', 1, 1, 1, '2023-05-06 13:26:50', NULL);
INSERT INTO `Products` VALUES (134, 6, 'new', 1.00, '', NULL, '', '', 1, 0, '1', 1, '', 1, 1, 1, '2023-05-06 13:28:26', NULL);
INSERT INTO `Products` VALUES (135, 5, 'aaa', 1.00, '', NULL, '', '', 1, 0, '1', 1, '', 1, 1, 1, '2023-05-06 13:42:06', NULL);
INSERT INTO `Products` VALUES (136, 8, 'new', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 13:44:37', NULL);
INSERT INTO `Products` VALUES (137, 6, 'test', 1.00, '', NULL, '', '', 1, 0, '1', 1, '', 1, 1, 1, '2023-05-06 13:49:36', NULL);
INSERT INTO `Products` VALUES (138, 9, 'aaa', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 16:00:53', NULL);
INSERT INTO `Products` VALUES (139, 6, 'test', 2.00, '', NULL, '', '', 2, 0, '2', 2, '', 1, 1, 1, '2023-05-06 18:36:29', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of otp_checks
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', '', 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 1, NULL, NULL, 'avt.jpg', '2023-04-23 13:49:25', '2023-04-23 13:28:34');
INSERT INTO `users` VALUES (9, 'Trung', 'Nguyễn', 'viettrungcntt03@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 2, NULL, NULL, 'avt.jpg', '2023-04-23 06:49:01', NULL);

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
  IN in_description VARCHAR(1000) CHARACTER SET utf8mb4,
  IN in_brand VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_warranty VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_gift_info VARCHAR(1000) CHARACTER SET utf8mb4,
  IN in_quantity INT,
  IN in_size VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_weight FLOAT,
  IN in_special_features VARCHAR(1000) CHARACTER SET utf8mb4)
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
		*
	FROM 
		Products
	WHERE id = in_id;

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
-- Procedure structure for product_update
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_update`;
delimiter ;;
CREATE PROCEDURE `product_update`(IN in_user_id INT,
	IN in_id INT,
	IN in_category_id INT,
  IN in_name VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_price DOUBLE,
  IN in_description VARCHAR(1000) CHARACTER SET utf8mb4,
  IN in_brand VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_warranty VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_gift_info VARCHAR(1000) CHARACTER SET utf8mb4,
  IN in_quantity INT,
  IN in_size VARCHAR(255) CHARACTER SET utf8mb4,
  IN in_weight FLOAT,
  IN in_special_features VARCHAR(1000) CHARACTER SET utf8mb4,
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

SET FOREIGN_KEY_CHECKS = 1;
