DROP TABLE adopter;

CREATE TABLE `adopter` (
  `adopter_id` int(11) NOT NULL AUTO_INCREMENT,
  `adopter_fname` varchar(45) DEFAULT NULL,
  `adopter_lname` varchar(100) NOT NULL,
  `adopter_contact` varchar(45) DEFAULT NULL,
  `adopter_address` varchar(100) NOT NULL,
  PRIMARY KEY (`adopter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO adopter VALUES("1","Lisa","Manoban","546-9807","Pasig City");
INSERT INTO adopter VALUES("2","Joan","James","545-6547","Quezon City");
INSERT INTO adopter VALUES("3","Riza","Parkers","234-2343","Valenzuela City");



DROP TABLE animal;

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_picture` varchar(255) NOT NULL,
  `animal_name` varchar(45) NOT NULL,
  `animal_type` varchar(100) NOT NULL,
  `animal_gender` varchar(11) NOT NULL,
  `animal_color` varchar(45) NOT NULL,
  `animal_age` int(11) NOT NULL,
  `animal_breed` varchar(45) NOT NULL,
  `rescuer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `adopter_id` int(11) NOT NULL,
  `rescue_date` date NOT NULL,
  PRIMARY KEY (`animal_id`),
  KEY `fk_animal_adopter` (`adopter_id`),
  KEY `fk_animal_employee` (`employee_id`),
  KEY `fk_animal_rescuer1` (`rescuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO animal VALUES("3","10997938-1x1-large.jpg","Mario","Cat","Male","White&Black","3","Asian","7","3","2","2021-01-02");
INSERT INTO animal VALUES("6","de6190c4965dc5ad91e53a7fcf6d6ec6.jpg","Chu-Chu","Dog","Female","Brown","2","Bulldog","8","1","0","2021-01-09");
INSERT INTO animal VALUES("7","1f30417c19bb470f232687b726e6c7c6.jpg","Limbo","Dog","Male","Brown&Black","6","German Shepherd","3","2","3","2021-01-09");
INSERT INTO animal VALUES("8","SnapPhoto_18-11-2020_64656_PM.jpeg","Tin","Dog","Male","Brown","6","Ragdoll","10","2","1","2021-01-09");
INSERT INTO animal VALUES("9","pet-responsibility-cat-dog-fostering-adoption--1-.jpg","Sally","Cat","Female","Brown&Black","2","Bengal","10","1","1","2021-01-09");
INSERT INTO animal VALUES("10","eeee7e97805c100764b385e0254ce69b.jpg","Dolly","Dog","Male","White","3","Bulldog","7","3","0","2021-01-09");
INSERT INTO animal VALUES("25","74LS04-IC.jpg","Lion","Dog","Male","Red","2","German","7","2","1","2023-02-01");



DROP TABLE disease;

CREATE TABLE `disease` (
  `disease_Id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(100) NOT NULL,
  `disease_desc` varchar(500) NOT NULL,
  PRIMARY KEY (`disease_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO disease VALUES("1","None","None");
INSERT INTO disease VALUES("2","Anthrax","Anthrax is an infection caused by the bacterium Bacillus anthracis");



DROP TABLE diseased;

CREATE TABLE `diseased` (
  `disease_Id` int(11) NOT NULL,
  `animal_Id` int(11) NOT NULL,
  PRIMARY KEY (`disease_Id`,`animal_Id`) USING BTREE,
  KEY `fk_diseased_diseases` (`disease_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO diseased VALUES("1","1");
INSERT INTO diseased VALUES("1","2");
INSERT INTO diseased VALUES("1","3");
INSERT INTO diseased VALUES("1","6");
INSERT INTO diseased VALUES("1","7");
INSERT INTO diseased VALUES("1","8");
INSERT INTO diseased VALUES("1","9");
INSERT INTO diseased VALUES("1","10");
INSERT INTO diseased VALUES("1","11");
INSERT INTO diseased VALUES("1","12");
INSERT INTO diseased VALUES("1","13");
INSERT INTO diseased VALUES("1","14");
INSERT INTO diseased VALUES("1","16");
INSERT INTO diseased VALUES("1","17");
INSERT INTO diseased VALUES("1","18");
INSERT INTO diseased VALUES("1","19");
INSERT INTO diseased VALUES("1","20");
INSERT INTO diseased VALUES("1","21");
INSERT INTO diseased VALUES("1","22");
INSERT INTO diseased VALUES("2","15");
INSERT INTO diseased VALUES("2","23");
INSERT INTO diseased VALUES("2","24");
INSERT INTO diseased VALUES("2","25");



DROP TABLE donation;

CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_fname` varchar(100) NOT NULL,
  `donation_lname` varchar(100) NOT NULL,
  `donation_amount` varchar(45) DEFAULT NULL,
  `donation_date` date DEFAULT NULL,
  `donation_method` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO donation VALUES("1","Marie","Simons","3000","2021-01-06","Cash");
INSERT INTO donation VALUES("4","Fernando","Poe","5000","2021-01-11","Cash");



DROP TABLE donation1;

CREATE TABLE `donation1` (
  `donation1_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation1_fname` varchar(100) NOT NULL,
  `donation1_lname` varchar(100) NOT NULL,
  `donation1_type` varchar(45) DEFAULT NULL,
  `donation1_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donation1_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO donation1 VALUES("1","Rodolf","Dear","Medicine","2021-01-01");
INSERT INTO donation1 VALUES("2","Robin","Lopez","cat food","2021-01-03");
INSERT INTO donation1 VALUES("4","Mark","Santos","Dog Food","2021-01-15");



DROP TABLE employee;

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_picture` varchar(100) NOT NULL,
  `employee_desc` varchar(255) NOT NULL,
  `employee_fname` varchar(45) DEFAULT NULL,
  `employee_lname` varchar(100) NOT NULL,
  `employee_age` int(11) NOT NULL,
  `employee_gender` varchar(100) NOT NULL,
  `employee_contact` varchar(45) DEFAULT NULL,
  `employee_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO employee VALUES("1","1ta6paxd9ja21.jpg","Vet","Jihyo","Park","23","Female","845-6544","Taguig City");
INSERT INTO employee VALUES("2","Dahyun-Wiki-Net-Worth-Dating-286x286.jpg","Caretaker","Dahyun","Kim","22","Female","045-6545","Makati City");
INSERT INTO employee VALUES("3","tzuyu.jpg","Vet","Tzuyu","Chou","20","Female","564-8789","Pasig City");



DROP TABLE rescuer;

CREATE TABLE `rescuer` (
  `rescuer_id` int(11) NOT NULL AUTO_INCREMENT,
  `rescuer_picture` varchar(255) DEFAULT NULL,
  `rescuer_fname` varchar(45) DEFAULT NULL,
  `rescuer_lname` varchar(100) NOT NULL,
  `rescuer_age` int(11) NOT NULL,
  `rescuer_gender` varchar(100) NOT NULL,
  `rescuer_contact` varchar(45) DEFAULT NULL,
  `rescuer_address` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`rescuer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO rescuer VALUES("3","20191008163106-Getty-Rogers-Curry-64714.jpeg","Stephen","Curry","28","Male","305-6545","Pasay City");
INSERT INTO rescuer VALUES("7","dwayne-the-rock-0718-1400x800.jpg","Dwayne","Johnson","45","Male","233-4343","Pasig City");
INSERT INTO rescuer VALUES("8","nayeon.jpg","Nayeon","Lim","25","Female","233-4343","Makati City");
INSERT INTO rescuer VALUES("10","sana.jpg","Sanake","Minatozaki","24","Female","233-4343","Taguig City");



DROP TABLE transaction1;

CREATE TABLE `transaction1` (
  `animal_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`,`donation_id`),
  KEY `fk_transaction1_donation1` (`donation_id`),
  CONSTRAINT `fk_transaction1_animal1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction1_donation1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`donation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE transaction2;

CREATE TABLE `transaction2` (
  `animal_id` int(11) NOT NULL,
  `donation1_id` int(11) NOT NULL,
  PRIMARY KEY (`animal_id`,`donation1_id`),
  KEY `fk_transaction2_donation11` (`donation1_id`),
  CONSTRAINT `fk_transaction2_animal1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_transaction2_donation11` FOREIGN KEY (`donation1_id`) REFERENCES `donation1` (`donation1_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE users;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users VALUES("0","Justine","Castaneda","admin","8cb2237d0679ca88db6464eac60da96345513964");



