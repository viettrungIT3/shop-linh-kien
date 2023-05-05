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

 Date: 05/05/2023 07:35:49
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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
-- Procedure structure for product_list
-- ----------------------------
DROP PROCEDURE IF EXISTS `product_list`;
delimiter ;;
CREATE PROCEDURE `product_list`()
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
