-- user@mail.com : user123
-- admin@mail.com : admin123
-- [restaurant email] ex. hanpork@mail.com : radmin123

--  For DoW (1 = Monday, 2 = Tuesday , .., 7 = Sunday)
-- Image name pattern: restaurantID_imagename.extension

DROP DATABASE IF EXISTS `reserba`;
CREATE DATABASE `reserba`;

USE `reserba`;

CREATE TABLE `users`(
    `userID` INT NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(11) NOT NULL,
    `user_type` ENUM('user', 'admin', 'radmin') NOT NULL DEFAULT 'user',
    CONSTRAINT userPK PRIMARY KEY(`userID`)
);

CREATE TABLE `restaurant`(
    `restaurantID` INT NOT NULL AUTO_INCREMENT,
    `restaurant_name` VARCHAR(50) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `address` VARCHAR(100) NOT NULL,
    `no_of_table` INT NOT NULL,
    `pax_capacity` INT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
    CONSTRAINT restaurantPK PRIMARY KEY(`restaurantID`)
);

CREATE TABLE `restaurant_admin` (
    `userID` INT NOT NULL,
    `restaurantID` INT NOT NULL,
    CONSTRAINT rad_restid_fk FOREIGN KEY(`restaurantID`)
        REFERENCES restaurant(`restaurantID`),
    CONSTRAINT rad_userid_fk FOREIGN KEY(`userID`)
        REFERENCES users(`userID`)
);

CREATE TABLE `restaurant_open` (
    `restopenID` INT NOT NULL AUTO_INCREMENT,
    `restaurantID` INT NOT NULL,
    `DoW` TINYINT NOT NULL,
    `start_time` TIME,
    `end_time` TIME,
    CONSTRAINT restopenPK PRIMARY KEY(`restopenID`),
    CONSTRAINT ro_restid_fk FOREIGN KEY(`restaurantID`)
        REFERENCES restaurant(`restaurantID`)
);

CREATE TABLE `restaurant_images` (
    `imageID` INT NOT NULL AUTO_INCREMENT,
    `restaurantID` INT NOT NULL,
    `image_name` VARCHAR(255) NOT NULL,
    CONSTRAINT imagePK PRIMARY KEY(`imageID`),
    CONSTRAINT img_restid_fk FOREIGN KEY(`restaurantID`)
        REFERENCES restaurant(`restaurantID`)
);

CREATE TABLE `reservation`(
    `reservationID` INT NOT NULL AUTO_INCREMENT,
    `userID` INT NOT NULL,
    `restaurantID` INT NOT NULL,
    `pax` INT NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `rating` DECIMAL(2,1),
    `status` ENUM('pending', 'confirmed', 'cancelled') NOT NULL  DEFAULT 'pending',
    CONSTRAINT reservationPK PRIMARY KEY(`reservationID`),
    CONSTRAINT res_userid_fk FOREIGN KEY(`userID`) 
        REFERENCES users(`userID`),
    CONSTRAINT rest_restid_fk FOREIGN KEY(`restaurantID`)
        REFERENCES `restaurant`(`restaurantID`)
);

CREATE TABLE `menu` (
    `menuID` INT NOT NULL AUTO_INCREMENT,
    `restaurantID` INT NOT NULL,
    `menu_name` VARCHAR(50) NOT NULL,
    CONSTRAINT menuPK PRIMARY KEY(`menuID`),
    CONSTRAINT mn_resid_fk FOREIGN KEY(`restaurantID`)
        REFERENCES restaurant(`restaurantID`)
);

CREATE TABLE `food` (
    `foodID` INT NOT NULL AUTO_INCREMENT,
    `menuID` INT NOT NULL,
    `food_name` VARCHAR(50) NOT NULL,
    `food_price` DECIMAL(6,2) NOT NULL,
    CONSTRAINT foodPK PRIMARY KEY(`foodID`),
    CONSTRAINT fd_menuid_fk FOREIGN KEY(`menuID`)
        REFERENCES menu(`menuID`)
);

INSERT INTO users (
    fname, lname, email, phone_number, user_type,
    password
) 
VALUES (
    'User', 'Doe', 'user@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'John', 'Smith', 'qwerty@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Anne', 'Johnson', 'qwerty1@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Bonny', 'Williams', 'qwerty2@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Chris', 'Brown', 'qwerty3@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Dan', 'Jones', 'qwerty4@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Erick', 'Garcia', 'qwerty5@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Fin', 'Miller', 'qwerty6@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Gum', 'Davis', 'qwerty7@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Hank', 'Rodriguez', 'qwerty8@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Illyia', 'Martinez', 'qwerty9@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Jane', 'Lopez', 'qwerty10@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Kris', 'Gonzalez', 'qwerty11@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Ling', 'Wilson', 'qwerty12@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Mim', 'Anderson', 'qwerty13@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Nate', 'Thomas', 'qwerty14@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Ollie', 'Taylor', 'qwerty15@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Pan', 'Moore', 'qwerty16@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Queb', 'Jackson', 'qwerty17@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Rand', 'Martin', 'qwerty18@mail.com', '9274857463', 1,
    '$2y$10$jRuW.hKSIM6Luqwo6quStu3tggmB9vaCuZqpqn0XJQq0cyslAtu3G'
),(
    'Admin', 'Doe', 'admin@mail.com', '9280564837', 2,
    '$2y$10$/IcW0w8X2sj2Eo2qLxfKtusDmEZKtYmp5SHmzxHPmeI/saqIYPj/i'
),(
    'Afwong', 'Admin', 'afwong@mail.com', '9280432837', 3,
    '$2y$10$NqdBjp7smeYnYcT.2iqjr.C12/aS35rvJXtXafaS3ewfmhoZfcCka'
),(
    'Hanpork', 'Admin', 'hanpork@mail.com', '9280432837', 3,
    '$2y$10$NqdBjp7smeYnYcT.2iqjr.C12/aS35rvJXtXafaS3ewfmhoZfcCka'
),(
    'JT', 'Admin', 'jt@mail.com', '9280432837', 3,
    '$2y$10$NqdBjp7smeYnYcT.2iqjr.C12/aS35rvJXtXafaS3ewfmhoZfcCka'
),(
    'Pala Pala', 'Admin', 'palapala@mail.com', '9280432837', 3,
    '$2y$10$NqdBjp7smeYnYcT.2iqjr.C12/aS35rvJXtXafaS3ewfmhoZfcCka'
),(
    'Puesto', 'Admin', 'puesto@mail.com', '9280432837', 3,
    '$2y$10$NqdBjp7smeYnYcT.2iqjr.C12/aS35rvJXtXafaS3ewfmhoZfcCka'
);


INSERT INTO restaurant (
    restaurant_name, 
    description, 
    address, 
    no_of_table, pax_capacity,
    image)
VALUES (
    'Han Pork Korean Restaurant', 
    'Han Pork is a Korean restaurant that offers UNLIMITED SAMGYEUPSAL in Cebu. It is located in the heart of the City and very easy to locate. Visit our restaurant andenjoy our unlimited samgyeupsal!', 
    'Mango Avenue 6000 Cebu City', 
    8, 5,
    'logo_hanpork.png'
),
(
    'The Pala-Pala Restaurant',
    'We are open again. Now with Al-fresco area for lunch, merienda and dinner. All safety protocols in place. All employees vaccinated.',
    'Ground Floor-Northdrive Mall, Ouano Avenue, Mandaue City',
    7, 5,
    'logo_palapala.jpg'
),
(
    'Jt’s Restaurant',
    'Jt’s Restaurant Corp. is a Korean - Chinese Restaurant Brand. Serve with different asian cuisine. Restaurant that Serves Healthy and Very Delicious Foods Perfect for Health Conscious People. Restaurant at cheap price but with a High Quality Experience.',
    'George Tampus Street, Basak, Lapu-Lapu City',
    4, 3,
    'logo_jt.jpg'
),
(
    'ASIAN Fusion WONG Restaurant',
    'Experience our all out buffet for only 350, open from Monday to Sunday between 11am to 9pm. Tag your family and barkada and visit us at : City Time Square Mactan. Come and dine at Asian Fusion and have a taste of the different blends of Asian.',
    'City Time Square Mactan 6015 Lapu-Lapu City',
    9, 6,
    'logo_afwong.jpg'
),
(
    'Puesto Restaurant',
    "The newest restaurant in town,soul food at it\'s finest. With our own original recipes inspired from Mexican Texan Mediterranean now in the heart of Metro Cebu",
    'The Greenery, Pope John Paul ave., Brgy Kasambagan, Cebu City',
    6, 4,
    'logo_puesto.jpg'
);
INSERT INTO restaurant_open 
        (restaurantID, DoW,start_time, end_time)
VALUES  
        (1, 1, '11:00:00', '23:00:00'),
        (1, 2, '11:00:00', '23:00:00'),
        (1, 3, '11:00:00', '23:00:00'),
        (1, 4, '11:00:00', '23:00:00'),
        (1, 5, '11:00:00', '23:00:00'),
        (1, 6, '11:00:00', '19:00:00'),
        (1, 7, NULL, NULL),
        (2, 1, '10:00:00', '17:00:00'),
        (2, 2, '10:00:00', '17:00:00'),
        (2, 3, '10:00:00', '17:00:00'),
        (2, 4, '10:00:00', '17:00:00'),
        (2, 5, NULL, NULL),
        (2, 6, NULL, NULL),
        (2, 7, NULL, NULL),
        (3, 1, '09:00:00', '17:00:00'),
        (3, 2, '09:00:00', '17:00:00'),
        (3, 3, '09:00:00', '17:00:00'),
        (3, 4, '09:00:00', '17:00:00'),
        (3, 5, NULL, NULL),
        (3, 6, '09:00:00', '17:00:00'),
        (3, 7, '11:00:00', '17:00:00'),
        (4, 1, '09:00:00', '23:00:00'),
        (4, 2, '09:00:00', '23:00:00'),
        (4, 3, '09:00:00', '23:00:00'),
        (4, 4, '09:00:00', '23:00:00'),
        (4, 5, '09:00:00', '20:00:00'),
        (4, 6, '09:00:00', '20:00:00'),
        (4, 7, NULL, NULL),
        (5, 1, '11:00:00', '18:30:00'),
        (5, 2, '11:00:00', '18:30:00'),
        (5, 3, '11:00:00', '18:30:00'),
        (5, 4, '11:00:00', '18:30:00'),
        (5, 5, '11:00:00', '18:30:00'),
        (5, 6, '11:00:00', '18:30:00'),
        (5, 7, NULL, NULL);

INSERT INTO restaurant_images (restaurantID, image_name) 
VALUES  (1, '1_Dwaejigogi.jpg'),
        (1, '1_icedtea.jpg'),
        (1, '1_interior.jpg'),
        (1, '1_jaengban.jpg'),
        (1, '1_jeyuk.jpg'),
        (2, '2_fourseason.jpg'),
        (2, '2_interior.jpg'),
        (2, '2_pata.jpeg'),
        (2, '2_pochero.jpg'),
        (2, '2_shortribs.jpg'),
        (3, '3_interior.jpg'),
        (3, '3_kbbq.jpg'),
        (3, '3_lumpia.jpg'),
        (3, '3_ngohiong.jpg'),
        (3, '3_noodle.jpg'),
        (3, '3_soybbq.jpg'),
        (4, '4_adobo.jpg'),
        (4, '4_fish.jpg'),
        (4, '4_interior.jpg'),
        (4, '4_shrimp.jpg'),
        (4, '4_tinola.jpg'),
        (5, '5_bham.jpg'),
        (5, '5_chop.jpg'),
        (5, '5_icetea.jpg'),
        (5, '5_kebab.jpg'),
        (5, '5_loco.jpg'),
        (5, '5_interior.jpg');

INSERT INTO restaurant_admin (userID, restaurantID) VALUES (22, 4),(23, 1),(24, 3),(25, 2),(26, 5);

INSERT INTO reservation 
    (userID, restaurantID, pax, date, time, rating, status)
VALUES
    (1, 1, 3, '2022-09-1','11:30:00', 4.3, 2),
    (1, 2, 4, '2022-09-4','15:30:00', NULL, 3),
    (1, 4, 2, '2022-09-1','11:30:00', NULL, 2),   
    (2, 2, 3, '2022-09-1','11:30:00', NULL, 3),     
    (3, 3, 3, '2022-09-1','14:30:00', NULL, 3),   
    (4, 4, 5, '2022-09-2','15:00:00', NULL, 3),   
    (5, 5, 3, '2022-09-2','11:30:00', 3.5, 2),   
    (6, 1, 3, '2022-09-2','11:30:00', 5, 2), 
    (7, 2, 3, '2022-09-13','11:30:00', NULL, 3),
    (8, 3, 3, '2022-09-4','15:50:00', 4, 2), 
    (9, 4, 5, '2022-09-10','15:00:00', NULL, 3),
    (10, 5, 3, '2022-09-5','11:30:00', 4, 2),
    (10, 3, 3, '2022-09-7','11:30:00', 4.5, 2),
    (11, 1, 3, '2022-09-5','11:30:00', 4.3, 2), 
    (12, 2, 3, '2022-09-6','11:30:00', NULL, 3), 
    (13, 3, 3, '2022-09-6','13:30:00', NULL, 3),
    (14, 4, 5, '2022-09-7','15:00:00', NULL, 3), 
    (15, 5, 3, '2022-09-8','11:30:00', 5, 2), 
    (16, 1, 3, '2022-09-8','11:30:00', 4.5, 2), 
    (17, 2, 3, '2022-09-14','11:30:00', NULL, 3),
    (18, 3, 3, '2022-09-15','14:30:00', NULL, 3),
    (2, 1, 1, '2022-09-19','11:30:00', NULL, 1),
    (3, 1, 1, '2022-09-19','11:30:00', NULL, 1),
    (4, 5, 1, '2022-09-19','11:30:00', NULL, 1),
    (5, 1, 1, '2022-09-19','11:30:00', NULL, 1),
    (6, 2, 1, '2022-09-20','11:30:00', NULL, 1),
    (7, 3, 1, '2022-09-20','11:30:00', NULL, 1),
    (8, 4, 1, '2022-09-20','11:30:00', NULL, 1),
    (2, 2, 1, '2022-09-20','11:30:00', NULL, 1),
    (14, 3, 1, '2022-09-21','11:30:00', NULL, 1),
    (15, 4, 1, '2022-09-21','11:30:00', NULL, 1),
    (16, 5, 1, '2022-09-21','11:30:00', NULL, 1),
    (17, 1, 1, '2022-09-21','11:30:00', NULL, 1),
    (18, 2, 1, '2022-09-21','11:30:00', NULL, 1),
    (19, 3, 1, '2022-09-22','11:30:00', NULL, 1),
    (20, 4, 1, '2022-09-22','11:30:00', NULL, 1),
    (12, 1, 1, '2022-09-22','11:30:00', NULL, 1),
    (13, 2, 1, '2022-09-22','11:30:00', NULL, 1),
    (19, 4, 1, '2022-09-22','15:30:00', NULL, 1),
    (20, 5, 1, '2022-09-25','12:30:00', NULL, 1),
    (1, 4, 2, '2022-09-25','12:30:00', NULL, 1),
    (2, 4, 1, '2022-09-25','12:30:00', NULL, 1),
    (3, 4, 1, '2022-09-25','12:30:00', NULL, 1),
    (4, 4, 1, '2022-09-25','12:30:00', NULL, 1),
    (5, 4, 1, '2022-09-25','12:30:00', NULL, 1),
    (6, 4, 1, '2022-09-25','12:30:00', NULL, 1),
    (7, 3, 1, '2022-09-25','12:30:00', NULL, 1),
    (8, 3, 1, '2022-09-25','12:30:00', NULL, 1),
    (9, 3, 1, '2022-09-25','12:30:00', NULL, 1),
    (10, 5, 3, '2022-09-25','12:30:00', NULL, 1);

INSERT INTO menu 
    (restaurantID, menu_name) 
VALUES  
    (1, 'Pork'),
    (1, 'Drinks'),
    (2, 'Pork'),
    (2, 'Beef'),
    (2, 'Drinks'),
    (3, 'Mixed Foods'),
    (3, 'Korean BBQ'),
    (4, 'Pilipino'),
    (4, 'Seafood'),
    (5, 'Mexican Texan Mediterranean'),
    (5, 'Drinks');

INSERT INTO food 
    (menuID, food_name, food_price)
VALUES 
    (1, "Jeyuk-deopbap", 350.00),
    (1, "Jaengban-jjajangmyeon", 245.25),
    (1, "Dwaejigogi-jjigae", 275.00),
    (2, "Iced Tea", 40.50),
    (3, "Pochero", 440.00),
    (3, "Crispy Pata", 690.00),
    (4, "Short Ribs", 430.25),
    (5, "Del Monte Four Seasons", 75.00),
    (6, "Chinese Ngohiong", 99.00),
    (6, "Pancit", 75.00),
    (6, "Lumpia Shanghai Pork", 50.00),
    (7, "Korean Spicy BBQ", 90.00),
    (7, "Korean Soy Garlic BBQ", 85.00),
    (8, "Chicken Tinola", 120.00),
    (8, "Filipino Pork Adobo", 150.50),
    (9, "Sweet and Sour Fish", 200.00),
    (9, "Buttered Shrimp", 130.50),
    (10, "Chicken Kebab", 85.00),
    (10, "Bacon and Ham Carbonara", 110.00),
    (10, "El Pollo Loco", 150.00),
    (10, "Caveman Chops", 130.00),
    (11, "Iced Tea", 50.00),
    (11, "Orange Juice", 50.00); 

-- user@mail.com : user123
-- admin@mail.com : admin123   
-- [restaurant email] ex. hanpork@mail.com : radmin123

-- For DoW (1 = Monday, 2 = Tuesday , .., 7 = Sunday)
-- Image name pattern: restaurantID_imagename.extension