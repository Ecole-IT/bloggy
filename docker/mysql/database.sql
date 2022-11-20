DROP TABLE  IF EXISTS `users`;
CREATE TABLE `users`
(
    id int primary key not null auto_increment,
    full_name varchar(64)
);

INSERT INTO `users` (full_name) VALUES ("Walter White");
INSERT INTO `users` (full_name) VALUES ("Jessie Pinkman");
INSERT INTO `users` (full_name) VALUES ("Saul Goodman");
INSERT INTO `users` (full_name) VALUES ("Kim Wexler");
INSERT INTO `users` (full_name) VALUES ("Nacho Varga");

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`
(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title varchar(64) NOT NULL,
    resume varchar(255),
    content text,
    author_id int NOT NULL,
    image_url varchar(2048) NOT NULL,
    created_at datetime NOT NULL default current_time,
    student_id int NOT NULL,
    FOREIGN KEY (author_id) references `users` (id)
);
