CREATE TABLE IF NOT EXISTS `user` (
    `userId` int AUTO_INCREMENT NOT NULL UNIQUE,
    `name` varchar(255) NOT NULL,
    `firstname` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `phoneNumber` int NOT NULL,
    `address` varchar(255) NOT NULL,
    `isVeterinary` boolean NOT NULL DEFAULT 0,
    PRIMARY KEY (`userId`)
);

CREATE TABLE IF NOT EXISTS `animalFolder` (
    `animalFolderId` int AUTO_INCREMENT NOT NULL UNIQUE,
    `name` varchar(255) NOT NULL,
    `age` int NOT NULL,
    `inscriptionDate` date NOT NULL,
    `veterinaryId` int NOT NULL,
    `ownerId` int NOT NULL,
    PRIMARY KEY (`animalFolderId`)
);

CREATE TABLE IF NOT EXISTS `document` (
    `documentId` int AUTO_INCREMENT NOT NULL UNIQUE,
    `animalId` int NOT NULL,
    `pdf` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    PRIMARY KEY (`documentId`)
);

CREATE TABLE IF NOT EXISTS `request` (
    `requestId` int AUTO_INCREMENT NOT NULL,
    `type` enum('consultation', 'vaccination', 'surgery', 'other') NOT NULL,
    `email` varchar(255) NOT NULL,
    `animal` varchar(255) NOT NULL,
    `status` enum('awaiting', 'validate', 'refuse') NOT NULL DEFAULT 'awaiting',
    `submittedDate` date NOT NULL,
    `description` text NOT NULL,
    `wantedDate` date NOT NULL,
    `animalFolderId` int NOT NULL,
    PRIMARY KEY (`requestId`)
);

ALTER TABLE `animalFolder` 
    ADD CONSTRAINT `animalFolder_fk_veterinary` FOREIGN KEY (`veterinaryId`) REFERENCES `user`(`userId`);

ALTER TABLE `animalFolder` 
    ADD CONSTRAINT `animalFolder_fk_owner` FOREIGN KEY (`ownerId`) REFERENCES `user`(`userId`);

ALTER TABLE `document` 
    ADD CONSTRAINT `document_fk_animal` FOREIGN KEY (`animalId`) REFERENCES `animalFolder`(`animalFolderId`);

ALTER TABLE `request` 
    ADD CONSTRAINT `request_fk_animalFolder` FOREIGN KEY (`animalFolderId`) REFERENCES `animalFolder`(`animalFolderId`);