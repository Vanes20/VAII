CREATE TABLE `chapters`
(
    `id`      INT AUTO_INCREMENT PRIMARY KEY,
    `storyId` INT          NOT NULL,
    `title`   VARCHAR(150) NOT NULL,
    `content` TEXT         NOT NULL,
    `number`  INT          NOT NULL DEFAULT 1,
    CONSTRAINT `fk_chapters_story`
        FOREIGN KEY (`storyId`) REFERENCES `stories` (`id`)
            ON DELETE CASCADE
) DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

INSERT INTO `chapters` (`storyId`, `title`, `content`, `number`)
VALUES (1, 'Začiatok', 'Cupcake ipsum dolor sit amet candy canes.', 1),
       (1, 'Zvrat', 'Sweet roll jelly beans tart pudding.', 2),
       (2, 'Úvod', 'Gummi bears danish chupa chups.', 1);