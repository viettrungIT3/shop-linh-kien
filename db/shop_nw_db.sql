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

 Date: 16/05/2023 07:37:31
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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
		`status` = in_status
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
		*
	FROM 
		Order_Details
	WHERE 
		order_id = in_order_id;

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
		*
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
		*
	FROM 
		Orders
	WHERE `status` = in_status;

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

    -- Lấy số lượng và số lượng đã bán của sản phẩm
    SELECT quantity, sold_quantity INTO product_quantity, product_sold_quantity
    FROM Products
    WHERE id = in_id;

    -- Kiểm tra điều kiện số lượng cần trừ phải nhỏ hơn hoặc bằng số lượng hiện có
    IF product_quantity >= in_quantity THEN
        -- Cập nhật số lượng và số lượng đã bán của sản phẩm
        UPDATE Products
        SET quantity = quantity - in_quantity,
            sold_quantity = sold_quantity + in_quantity
        WHERE id = in_id;

        -- Gán thông báo thành công
        SET message = 'Update successful';
    ELSE
        -- Gán thông báo lỗi
        SET message = 'Insufficient quantity';
    END IF;

    -- Trả về giá trị của biến message
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
