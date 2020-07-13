create table  user(
    id int(10) AUTO_INCREMENT PRIMARY key,
  name varchar(191),
  email varchar(191) unique,
  email_verified_at timestamp,
  password varchar(191),
  rememberToken varchar(191),
  timestamps timestamp  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  )