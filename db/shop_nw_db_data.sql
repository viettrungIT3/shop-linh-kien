/*
 Navicat Premium Data Transfer

 Source Server         : shop
 Source Server Type    : MySQL
 Source Server Version : 50741
 Source Host           : shop-nw-db-localhost:3939
 Source Schema         : shop_nw_db

 Target Server Type    : MySQL
 Target Server Version : 50741
 File Encoding         : 65001

 Date: 07/05/2023 19:03:19
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
INSERT INTO `Categories` VALUES (2, 'PC Accessories', '', 0, 10, 1, 1, '2023-05-03 11:26:25', '2023-05-03 05:21:16');
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
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

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
) ENGINE = InnoDB AUTO_INCREMENT = 150 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of Products
-- ----------------------------
INSERT INTO `Products` VALUES (3, 2, 'test', 1.00, 'Product description', 'Product brand', 'Product warranty', 'Promotion information', 10, 0, 'XXL', 1.5, 'Special features', 1, 1, 1, '2023-05-03 11:56:31', '2023-05-07 10:13:07');
INSERT INTO `Products` VALUES (141, 2, 'PNY GeForce GTX 1650 4GB GDDR6 Single Fan', 16.16, '', '', '', '', 100, 0, '', 0, '', 1, 2, 2, '2023-05-07 09:47:49', '2023-05-07 11:10:24');
INSERT INTO `Products` VALUES (142, 2, 'ASUS Dual GeForce RTX 2060 OC EVO 6GB GDDR6', 272.52, 'Video Card ASUS Dual GeForce RTX 2060 OC EVO 6GB GDDR6\r\n\r\nSpecifications:\r\n\r\nGPU	NVIDIA® GeForce RTX™ 2060\r\nMultiply CUDA	1920\r\nCommunication standards	PCI Express 3.0\r\nGPU Clock	OC Mode: GPU Boost Clock : 1785 MHz - GPU Base Clock : 1395 MHz\r\nGaming Mode: GPU Boost Clock : 1755 MHz - GPU Base Clock : 1365 MHz\r\nMemory speed	14000 MHz\r\nMemory	6GB GDDR6\r\nMemory protocol	192-bit\r\n \r\n\r\nOutput port\r\n\r\nDVI-D: Yes x 1 \r\n\r\nHDMI: Yes x 2 (HDMI 2.0b)\r\n\r\nDisplayPort: Yes x 1 (DisplayPort 1.4)\r\n\r\nHDCP support: Yes (2.2)\r\n\r\nNVlink/Crossfire support	Are not\r\nPower requirement	From 500W\r\nPower connection	1 x 8-pin\r\nDimensions (DxRxC)	9.53 \" x 5.12 \" x 2.09 \" Inch\r\n24.2 x 13 x 5.3 Centimeter\r\nSlot	2.5 slot\r\nOPENGL support	4.6\r\nMaximum number of screens	4\r\nMaximum resolution	7680×4320 (8K)\r\nDetailed evaluation of ASUS Dual GeForce RTX 2060 OC edition EVO 6GB GDDR6 video card\r\nDesign of ASUS Dual GeForce RTX 2060 OC edition EVO \r\nAs an upgrade from the previous RTX 2060 OC Edition, the ASUS Dual GeForce RTX 2060 OC edition EVO retains its previous gaming look. Dressed in strong black and beautifully finished edges, the ASUS Dual GeForce RTX 2060 OC edition EVO will highlight the case in particular and the gaming angle in general.\r\n\r\n\r\n\r\nASUS Dual GeForce RTX 2060 OC edition EVO 2x Fans cooling system\r\nEquipped with 2 new and powerful fans manufactured from Axial technology, providing a longer blade design and downward rotation of air pressure to provide the best heat dissipation for ASUS Dual GeForce RTX 2060 OC edition EVO. \r\n\r\n>> See also: Uses and how to choose VGA .\r\n\r\nCombined with 0dB technology, ASUS Dual GeForce RTX 2060 OC edition EVO works intelligently when it can automatically stop working when the GPU core temperature is below 55 degrees Celsius and when the temperature rises, it will automatically work again. In return, providing a quiet space when working and playing games.\r\n\r\n\r\n\r\nSolid back protection\r\nThe PCB area of ​​the ASUS Dual GeForce RTX 2060 OC edition EVO is protected by an aluminum back panel, ensuring the safety of the PCB and avoiding unwanted impacts to the back of the VGA .\r\n\r\n\r\n\r\nPerfection from Auto-Extreme technology\r\nAll components in the ASUS Dual GeForce RTX 2060 OC edition EVO are finished with an advanced manufacturing process based on Auto-Extreme technology to bring out the best in video card quality . Internal components such as capacitors, DrMOS, and chokes help push ASUS Dual GeForce RTX 2060 OC edition EVO performance to the max.\r\n\r\n', NULL, NULL, NULL, 100, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:08:33', '2023-05-07 11:18:31');
INSERT INTO `Products` VALUES (143, 2, 'ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X', 2771.72, 'Specifications:\r\nHuman Graphics 	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	OC mode: 2640 MHz\r\nDefault mode: 2610 MHz (Boost Clock)\r\nMultiply CUDA	16384\r\nMemory speed	21 Gbps\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collector Card\r\n1 x Quick Guide\r\n1 x Adapter Cable\r\n1 x ROG Graphics Card Holder\r\n1 x ROG Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	357,6 x 149,3 x 70,1mm\r\nPSU recommends	1000W\r\nPower connection	1 x 16 pin\r\nSlot	3.5\r\nAURA SYNC	ARGB\r\nDetailed review of ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X VGA card\r\nRTX 4090 , one of the highest-end GPUs from NVIDIA\'s RTX 40 Series generation. Bringing in graphics processing technologies and improvements from its predecessor, the RTX 4090 confidently handles all medium to high-end graphics tasks smoothly. Paired with ASUS ROG, the premium GPU from NVIDIA comes complete with the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X .\r\n\r\nOptimizing heat dissipation efficiency\r\nThe massive power of the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X requires the most powerful heat dissipation possible with the goal of maintaining the performance and longevity of the video card . Put right into our eyes, we will immediately see 3 heatsink fans with Axial-tech design for the most abundant airflow possible. Working with double bearings and carefully tuned, the cooling fan helps to bring 23% more air into the product for optimal use.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe three fans on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X are adjusted to rotate relative to each other. When the two outermost fans rotate counterclockwise, this aids in optimizing the inlet air flow. Plus, it intelligently works with a sensor that makes the fan automatically work according to the GPU\'s health. In the case when the GPU operates at temperatures below 50 degrees Celsius or light processing tasks, the cooling fans will stop working for a certain smoothness and quietness. And will work again when the temperature rises to more than 50 degrees Celsius or unexpected developments during use.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe hot air from the 24GB ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GPU is directed to a large and wide heatsink area. From here, the standard Axial-tech fans will handle the work of draining and conduction of heat to provide the most ideal temperature environment.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nVapor chamber design is a heat dissipation function that is used a lot on today\'s high-end VGA cards and ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB is no exception when it comes to this heatsink design. for myself. Inside the steam chamber are heat pipes whose job is to transfer heat to the milling plates, thereby helping the heat escape. As a result, according to research, this heatsink design will help reduce the GPU temperature by 5 degrees Celsius with a load at 500W.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nThe power input into the 24GB ASUS ROG Strix GeForce RTX 4090 OC White Edition is moderated with premium capacitors. Not only helping to bring clean and abundant power to VGA, the capacitors ensure a balance in power efficiency. All are developed with a compact PCB platform, providing the ability to save power and optimize heat dissipation efficiency.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nTough and pure look\r\nDressed in an extremely eye-catching design with a dominant white tone, ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB transforms itself into a pure and beautiful \"Elsa\" in high-end PCs. Deep in that beauty is a sturdy metal frame, details such as the molded frame, visor and backplate are all finished and perfectly combined to create the class of products from ASUS ROG .\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nConvenient FanConnect II\r\nIncluded on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB are 2 PWM FanConnect sockets that allow you to equip the necessary cooling devices. From there, serve the needs of processing and operating with heavy CPU and GPU tasks .\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nDurable for use\r\nASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB was born with the requirement that it can cater to all user needs. The GPU bracket on the VGA appears sturdy and durable, which is the key connection between the die and the heatsink. Behind that is the I/O bracket finished from stainless steel, providing resistance and minimizing damage from rust.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nYou can also adjust performance easily via the convenient Dual BIOS switch. With just a simple operation, you can choose the operating mode for VGA between performance and quietness.\r\n\r\nSmart energy sensor\r\nYou won\'t need to have a headache in choosing a power source for the video card anymore? When right on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB will feature a smart sensor LED dedicated to reporting compatibility, health and power issues from the PSU. As a result, you can provide an early and timely solution for your PC.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nGreat finishing from Auto-Extreme\r\nTo finish and reach users, ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB has gone through an advanced Auto-Extreme manufacturing process. Every part is precisely assembled and finished together with a one-time production process. Thanks to that, the parts on the ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB minimize temperature stress and create the most perfect whole. Auto-Extreme adds environmental friendliness, saving power consumption for the production process.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nShine with ARGB strips\r\nASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB will become a \"superstar\" for your PC with the ability to shine from the side lights and the ROG logo. The lighting system is customized with the included dedicated software, turning your work and entertainment corner into a beautiful scene in a multitude of colors.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X\r\n\r\nUseful accessories\r\nInside the box of ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB you will be provided with an additional bracket to help fix and minimize distortion for the graphics card. Attached is a screwdriver to assist you in the installation and build of the PC.\r\n\r\nGEARVN - ASUS ROG Strix GeForce RTX 4090 OC White Edition 24GB GDDR6X', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:20:21', NULL);
INSERT INTO `Products` VALUES (144, 2, 'ASUS ROG Strix GeForce RTX 4090 OC Edition 24GB GDDR6X', 589.90, '', NULL, '', '', 1, 0, '', 0, '', 1, 1, 1, '2023-05-07 11:34:55', '2023-05-07 11:47:01');
INSERT INTO `Products` VALUES (145, 2, 'ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X', 1.00, 'Specifications:\r\nHuman Graphics 	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collector Card\r\n1 x Quick Guide\r\n1 x Adapter Cable\r\n1 x ROG Graphics Card Holder\r\n1 x ROG Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	357,6 x 149,3 x 70,1mm\r\nPSU recommends	1000W\r\nPower connection	1 x 16 pin\r\nSlot	3.5\r\nAURA SYNC	ARGB\r\nReview of ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X video card\r\n\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X series of graphics cards is equipped with countless significant upgrades in both performance and design. Helping gamers have a smooth, quality gaming experience with realistic, vivid frames with the smallest details.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nThe NVIDIA Ada Lovelace Streaming Multiprocessors architecture is engineered to deliver superior gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nASUS ROG Strix RTX 4090 24GB GDDR6X features 4th Gen Tensor cores that boost AI performance up to 2x. The card uses NVIDIA Tensor Cores architecture to enable and accelerate AI technologies and new frame rates by DLSS 3 smoother, faster frames with favorite AAA games.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nIf you are a game enthusiast and want to experience top-notch graphics quality, the ASUS ROG Strix GeForce RTX 4090 24GB GDDR6X will not disappoint you.\r\n\r\nEquipped with the 3rd generation Ray Tracing Cores (RT Cores), the image quality becomes more realistic than ever. You will be \"immersed\" in the colorful, sharp and extremely vivid game world.\r\n\r\nCooling fan technology provides 23% more airflow\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nAxial-tech fans provide 23% stronger airflow than the previous generation . Thanks to this improvement, the Asus ROG Strix RTX 4090 24GB is cooler and therefore more stable, durable and performant.\r\n\r\nUnique design, every detail is meticulously machined\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nThe graphics card line of the RTX 4090 series is equipped with an extremely unique and aggressive design by ASUS. The bold gaming design is meticulously crafted to create an impressive beauty that you can\'t take your eyes off.\r\n\r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\n \r\n\r\nCombined with that is the RGB LED array that makes the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Now your gaming corner becomes more beautiful and impressive.\r\n\r\nSoftware GPU Tweak III \r\nASUS ROG Strix GeForce RTX 4090 24GB GDDR6X\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate your ASUS RTX 4090 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:48:28', NULL);
INSERT INTO `Products` VALUES (146, 2, 'ASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X', 1.00, 'Specifications:\r\nGraphics technology	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collection Card\r\n1 x Quick Setup Guide\r\n1 x Adapter Cable\r\n1 x TUF Graphics Card Holder\r\n1 x TUF Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	348,2 x 160 x 72,6 mm\r\nPSU recommends	-- IN\r\nPower connection	1 x 16 pin\r\nSlot	3.65\r\nAURA SYNC	ARGB\r\nReview ASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X\r\n\r\nASUS TUF Gaming GeForce RTX 4090 OC Edition 24GB GDDR6X series of graphics cards possesses many upgrades in performance and design, helping players have high-performance gaming experiences that deliver realistic, vivid frames with the smallest details.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nThe NVIDIA Ada Lovelace Streaming Multiprocessors architecture is engineered to deliver exceptional gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\nIn addition, ASUS TUF RTX 4090 OC Edition 24GB GDDR6X with enhanced overclocking, increasing the clock speed of VGA helps the device operate faster thereby improving overall performance.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 OC Edition 24GB GDDR6X is equipped with 4th Gen Tensor cores that increase AI performance up to 2x. Using NVIDIA Tensor Cores architecture enables and accelerates new AI technologies and frame rates with DLSS 3 giving gamers smoother, faster frames with their favorite AAA titles.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nEquipped with the 3rd generation Ray Tracing Core (RT Cores) to deliver realistic image output performance, helping players \"immerse\" in sharp and extremely vivid frames.\r\n\r\nCooling fan technology provides 23% more airflow\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nAxial-tech fans provide 23% more airflow than the previous generation . With all these improvements, the TUF Gaming RTX 4090 OC Edition 24GB will perform extremely well with intelligently handled temperatures.\r\n\r\nUnique design, every detail is meticulously machined\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nThe series of graphics cards of the RTX 4090 series are uniquely designed by ASUS. That is reflected in every meticulous gaming edge detail. \r\n\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\n \r\n\r\nCombined with that is an array of RGB LEDs that make the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Helps to make the camera angle more impressive to create an impression. Unique gaming space.\r\n\r\nSoftware GPU Tweak III \r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-oc-edition-24gb-gddr6x\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate the ASUS RTX 4090 OC Edition 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:49:29', NULL);
INSERT INTO `Products` VALUES (147, 2, 'ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X', 1.00, 'Specifications:\r\nHuman Graphics	NVIDIA GeForce RTX 4090\r\nStandard bus	PCI Express 4.0\r\nHeartbeat	--\r\nMultiply CUDA	--\r\nMemory speed	--\r\nOpenGL	OpenGL 4.6\r\nVideo Memory	24 GB GDDR6X\r\nMemory protocol	384-bit\r\nResolution	Maximum resolution 7680 x 4320\r\nProtocol	\r\nYes x 2 (Native HDMI 2.1)\r\n\r\nCó x 3 (Native DisplayPort 1.4a)\r\n\r\nHDCP support (2.3)\r\n\r\nMaximum number of monitors supported	4\r\nNVlink/Crossfire support 	Are not\r\n\r\nAccessory	1 x Collection Card\r\n1 x Quick Setup Guide\r\n1 x Adapter Cable\r\n1 x TUF Graphics Card Holder\r\n1 x TUF Velcro Hook & Loop\r\n1 x Thank You Card\r\nSoftware	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: please download all software from support site.\r\nSize	348,2 x 160 x 72,6 mm\r\nPSU recommends	-- IN\r\nPower connection	1 x 16 pin\r\nSlot	3.65\r\nAURA SYNC	ARGB\r\nDetailed review of ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X\r\nASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X series of video cards possess many upgrades in performance and design, helping players have high-performance gaming experiences with realistic, vivid frames and small details. best.\r\n\r\nNVIDIA Ada Lovelace Streaming Multiprocessors architecture\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 24GB GDDR6X uses the NVIDIA Ada Lovelace architecture designed to provide exceptional gaming and creativity. Professional graphics processing delivers realistic images, creating more high-quality frames that add excitement and experience to players.\r\n\r\n4th Generation Tensor Cores up to 2X AI Performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 is equipped with 4th generation Tensor cores that increase AI performance by up to 2x. Using NVIDIA Tensor Cores architecture enables and accelerates new AI technologies and frame rates with DLSS 3 giving gamers smoother, faster frames with their favorite AAA titles.\r\n\r\n3rd generation RT cores with up to 2X . ray tracing performance\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nEquipped with the 3rd generation Ray Tracing Core (RT Cores) to deliver realistic image output performance, helping players \"immerse\" in sharp and extremely vivid frames.\r\n\r\nCooling fan technology provides 23% more airflow\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nASUS TUF RTX 4090 24GB GDDR6X VGA card will work extremely well with intelligently handled temperatures thanks to axial-tech fans that provide 23% more airflow than previous generation.\r\n\r\nUnique design, every detail is meticulously machined\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nThe series of graphics cards of the RTX 4090 series are uniquely designed by ASUS. That is reflected in every meticulous gaming edge detail. \r\n\r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\n \r\n\r\nCombined with that is an array of RGB LEDs that make the VGA line from ASUS more unique when building PCs and combined with peripheral components from computer mice , keyboards , .... Helps to make the camera angle more impressive to create an impression. Unique gaming space.\r\n\r\nSoftware GPU Tweak III \r\nGEARVN-asus-tuf-gaming-geforce-rtx-4090-24gb-gddr6x\r\n\r\nGPU Tweak III software provides intuitive performance tuning, thermal control, and system monitoring. With just a few simple steps, you can calibrate the ASUS TUF Gaming GeForce RTX 4090 24GB GDDR6X graphics card to meet all your usage needs with peak performance. ', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:50:47', NULL);
INSERT INTO `Products` VALUES (148, 2, 'GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G', 1.00, 'GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\nSpecifications\r\n\r\nHuman Graphics	GeForce RTX™ 4090\r\nMultiply CUDA	16384\r\nMemory speed	21 Gbps\r\nMemory storage 	24GB\r\nMemory type	GDDR6X\r\nMemory bus	384 bit\r\nBus card	PCIE 4.0\r\nMaximum digital resolution	7680 x 4320\r\nSupport maximum number of screens	4\r\nSize	L=238 W=141 H=40 mm\r\nStandard PCB	ATX\r\nDirectX	12 Ultimate\r\nOpenGL	4.6\r\nRecommended PSU	850W\r\nPower connector	16 pin x 1\r\nConnector	DisplayPort 1.4a x 3\r\nHDMI 2.1 x 1\r\nTube length	460mm ± 1.5%\r\nRadiators	360mm\r\nFan	3 x 120 mm\r\nAccessory	1. Quick start guide\r\n2. Warranty registration\r\n3. AORUS Metal sticker\r\n4. Xtreme Robot Limited Edition with AORUS flag\r\n5. One 16-pin to four-pin power adapter 8\r\nDetailed evaluation of the GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G video card\r\nGIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G has outstanding performance\r\nPossessing 16384 CUDA cores, 24GB of the latest GDDR6X RAM , the RTX 4090 is the most powerful video card on the market today. Now your gaming PC can fully handle any game with the highest graphics level and still be smooth, without lag.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\n \r\n\r\nWater cooling system\r\nWith a powerful graphics card like the RTX 4090, water cooling is extremely important to prevent the machine from overheating. AORUS provides a comprehensive cooling solution as critical components such as the GPU, VRAM and MOSFET are actively cooled to ensure a stable system under high overclocking conditions.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\nEasy installation\r\nEquipped with water pipes and pumps, users can easily install the graphics card without worrying about leaks, making it easy for beginners to assemble. \r\n\r\nThe GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G card uses a triple 360mm aluminum Radiator that increases the surface area and volume for heat dissipation, making the graphics card work more stable and cooler even in conditions. high overclock.\r\n\r\nThe 3X 120mm fan unit is designed to generate more airflow for better heat dissipation, providing a quiet gaming experience and powerful cooling. The double ball bearing construction is more heat resistant and efficient than the sleeve structure and has at least twice the service life.\r\n\r\nWithout using any auxiliary fan, WATERFORCE technology provides the best cooling solution for GPU/VRAM/MOSFET. Copper plate effectively dissipates heat to create a truly quiet environment.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\n \r\n\r\nExtremely durable\r\nVirtually non-hygroscopic, high thermal stability and high pressure resistance, sturdy FEP tubes enhance product life and durability. The metal back plate not only provides an aesthetic appearance, but also enhances the structure of the graphics card for all-round protection.\r\n\r\nThe graphics card has an excellent power phase design to allow the MOSFETs to operate at lower temperatures and provide a more stable voltage output. Load balancing of each MOSFET improves the overclocking performance and prolongs the life of the VGA.\r\n\r\nvideo card GIGABYTE AORUS GeForce RTX 4090 XTREME WATERFORCE 24G\r\n\r\nFriendly PCB Design\r\nThe fully automated manufacturing process ensures top quality of the board and eliminates the sharp protrusions of solder connectors seen on conventional PCB surfaces. This user-friendly design not only extends the life of the VGA, but also helps ensure your safety during assembly.', NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 1, 2, 2, '2023-05-07 11:51:45', NULL);
INSERT INTO `Products` VALUES (149, 2, 'GIGABYTE AORUS GeForce RTX 4090 MASTER 24G', 1.00, '', NULL, '', '', 1, 0, '', 0, '', 1, 1, 1, '2023-05-07 12:00:19', NULL);

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
INSERT INTO `users` VALUES (2, 'Trung', 'Nguyễn', 'viettrungcntt03@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1, 2, NULL, NULL, 'avt.jpg', '2023-04-23 06:49:01', NULL);

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
