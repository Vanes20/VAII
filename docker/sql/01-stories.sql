CREATE TABLE `stories`
(
    `id`          INT AUTO_INCREMENT PRIMARY KEY,
    `title`       VARCHAR(150) NOT NULL,
    `description` TEXT         NOT NULL,
    `status`      VARCHAR(20)  NOT NULL DEFAULT 'draft',
    `chapters`    INT          NOT NULL DEFAULT 0
) DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `stories` (`title`, `description`, `status`, `chapters`)
VALUES ('Prvý príbeh', 'Jelly bonbon dragée cotton candy macaroon cheesecake marshmallow cotton candy ice cream.', 'published', 12),
       ('Rozpísaný príbeh', 'Marshmallow cookie topping dessert carrot cake topping tart tiramisu powder.', 'draft', 4);