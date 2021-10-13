
CREATE TABLE `import_csv` 
(
   `id` BIGINT NOT NULL AUTO_INCREMENT primary key,
  `Series_reference` varchar(255) DEFAULT NULL,
  `Period` varchar(255) DEFAULT NULL,
  `Data_value` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `UNITS` varchar(255) DEFAULT NULL,
  `MAGNTUDE` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Series_title_1` varchar(255) DEFAULT NULL,
  `Series_title_2` varchar(255) DEFAULT NULL,
  `Series_title_3` varchar(255) DEFAULT NULL,
  `Series_title_4` varchar(255) DEFAULT NULL,
  `Series_title_5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  