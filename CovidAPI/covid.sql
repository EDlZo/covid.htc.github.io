CREATE TABLE IF NOT EXISTS `covid` (
    `date` DATE DEFAULT NOW(),
    `infect` INT NOT NULL,
    `recovered` INT NOT NULL,
    `death` INT NOT NULL
) ENGINE = InnoDB;