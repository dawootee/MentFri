CREATE TABLE `users` (
	`ID` INT NOT NULL AUTO_INCREMENT,
	`FirstName` varchar(255) NOT NULL,
	`LastName` varchar(255) NOT NULL,
	`UserName` varchar(255) NOT NULL,
	`Email` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL,
	PRIMARY KEY (`ID`)
);

CREATE TABLE `roles` (
	`Role` enum('0','1','2') NOT NULL DEFAULT '0',
	`ID` INT NOT NULL
);

CREATE TABLE `posts` (
	`PID` INT NOT NULL AUTO_INCREMENT,
	`PostTitle` TEXT NOT NULL,
	`PostContent` TEXT NOT NULL,
	`PostAuthor` INT NOT NULL,
	`DateCreated` DATETIME NOT NULL,
	`DateModified` DATETIME NOT NULL,
	PRIMARY KEY (`PID`)
);

CREATE TABLE `data` (
	`DID` INT NOT NULL AUTO_INCREMENT,
	`DataKey` varchar(255) NOT NULL,
	`DataValue` varchar(255) NOT NULL,
	`PID` int NOT NULL,
	PRIMARY KEY (`DID`)
);

ALTER TABLE `roles` ADD CONSTRAINT `roles_fk0` FOREIGN KEY (`ID`) REFERENCES `users`(`ID`);

ALTER TABLE `posts` ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`PostAuthor`) REFERENCES `users`(`ID`);

ALTER TABLE `data` ADD CONSTRAINT `data_fk0` FOREIGN KEY (`PID`) REFERENCES `posts`(`PID`);

