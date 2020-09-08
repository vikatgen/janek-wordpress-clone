<?php

$createUsers = "
CREATE TABLE `users`(
    `id` SERIAL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(60) NOT NULL,
    `added` DATETIME NOT NULL,
    `added_by` INT NOT NULL,
    `edited` DATETIME ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `edited_by` INT NOT NULL
) ENGINE = InnoDB;
";