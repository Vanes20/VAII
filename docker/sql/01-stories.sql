CREATE TABLE `stories`
(
    `id`          INT AUTO_INCREMENT PRIMARY KEY,
    `title`       VARCHAR(150) NOT NULL,
    `description` TEXT         NOT NULL,
    `status`      VARCHAR(20)  NOT NULL DEFAULT 'draft'
) DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `stories` (`title`, `description`, `status`)
VALUES ('Prvý príbeh', 'Jelly bonbon dragée cotton candy macaroon cheesecake marshmallow cotton candy ice cream.', 'published'),
       ('Rozpísaný príbeh', 'Marshmallow cookie topping dessert carrot cake topping tart tiramisu powder.', 'draft');