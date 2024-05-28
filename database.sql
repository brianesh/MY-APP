CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `surname` varchar(15) NOT NULL,
 `other_names` varchar(15) NOT NULL,
 `username` varchar(15) NOT NULL,
 `email` varchar(20) NOT NULL,
 `password` varchar(8) NOT NULL,
 `mobile_number` int(10) NOT NULL,
 `security_question` varchar(15) NOT NULL,
 `security_answer` varchar(15) NOT NULL,

 PRIMARY KEY (`id`)
 );