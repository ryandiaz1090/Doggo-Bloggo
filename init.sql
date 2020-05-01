USE doggoregistration;
SHOW TABLES;



CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  };