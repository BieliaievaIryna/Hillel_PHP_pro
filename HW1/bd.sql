CREATE TABLE `employees` (
                             `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
                             `last_name` CHAR(100) NOT NULL,
                             `first_name` CHAR(100) NOT NULL,
                             `patronymic` CHAR(100) DEFAULT NULL,
                             `start_date` DATE NOT NULL,
                             `end_probation_date` DATE NOT NULL,
                             `contract_type` ENUM('intern', 'employee', 'fired') DEFAULT 'intern' NOT NULL,
                             `secure_approval` TINYINT DEFAULT 0
);
CREATE TABLE `cars` (
                        `id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
                        `car_number` CHAR(20) NOT NULL,
                        `brand` CHAR(50) NOT NULL,
                        `model` CHAR(50) NOT NULL,
                        `year_production` YEAR(4)
);
CREATE TABLE `employees_cars` (
                                  `car_id` INT UNSIGNED NOT NULL,
                                  `employee_id` INT UNSIGNED NOT NULL,
                                  `start_date` DATETIME NOT NULL,
                                  `end_date` DATETIME DEFAULT NULL,
                                  FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`),
                                  FOREIGN KEY (`car_id`) REFERENCES `cars`(`id`)
);
INSERT INTO `employees` (`last_name`, `first_name`, `patronymic`, `start_date`, end_probation_date, `contract_type`, `secure_approval`) VALUES ('Shevchenko', 'Andrii', 'Ivanovych', '2022-05-18','2022-08-20','employee', 1),
                                                                                                                                               ('Tkachenko', 'Lidiia', 'Sergiivna', '2020-03-02','2022-06-05','employee', 1),
                                                                                                                                               ('Shevchenko', 'Oleksandr', 'Mykolayovych','2023-11-10','2024-02-12','intern', 0),
                                                                                                                                               ('Kotyk', 'Andrii', 'Oleksandrovych', '2023-11-10','2024-02-12','intern', 0),
                                                                                                                                               ('Zirka', 'Tetiana', 'Sergiivna', '2020-08-07','2022-11-05','employee', 1);
INSERT INTO `cars` (`car_number`, `brand`, `model`, `year_production`) VALUES ('AA3535AK', 'Fiat', 'Tipo', '2019'),
                                                                              ('AA3636AK', 'Fiat', 'Tipo', '2019'),
                                                                              ('AA3737AK', 'Fiat', 'Tipo', '2020'),
                                                                              ('AA3838AK', 'Fiat', 'Tipo', '2020'),
                                                                              ('AA3939AK', 'Fiat', 'Tipo', '2020'),
                                                                              ('AA4040AK', 'Fiat', 'Tipo', '2020');
INSERT INTO `employees_cars` (car_id, employee_id, start_date) VALUES (1, 2, '2022-09-11'),
                                                                      (2, 1, '2022-06-30'),
                                                                      (5, 3, '2022-11-15');