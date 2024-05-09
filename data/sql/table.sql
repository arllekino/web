CREATE DATABASE blog;
USE blog;
CREATE TABLE post (
	post_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    featured TINYINT(1) DEFAULT 0,
    modifier VARCHAR(255) DEFAULT 'none',
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255),
    content TEXT,
    img_url VARCHAR(255),
    author VARCHAR(255),
    img_author_url VARCHAR(255),
    publish_date TIMESTAMP
);