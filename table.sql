CREATE TABLE `users` (
  `uid` int NOT NULL PRIMARY KEY AUTO_INCRMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL
);
