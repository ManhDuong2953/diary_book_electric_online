CREATE TABLE USER (
USER_ID INT NOT NULL AUTO_INCREMENT primary key,
USER_NAME VARCHAR(50) NOT NULL unique,
USER_PASSWORD VARCHAR(50) NOT NULL,
INDEX (USER_id),
foreign key (user_ID) references user(user_id)
);

CREATE TABLE LIST_BOOK (  
 BOOK_ID INT NOT NULL auto_increment primary key,
USER_ID VARCHAR(50) NOT NULL,
DATE_PUSH DATE NOT NULL,
TITLE_BOOK VARCHAR(100) NOT NULL,
CONTENT_BOOK TEXT NOT NULL
);

select \* from list_book
where user_id = (
select USER_ID from user where user_name = 'Mark'
);

-- INSERT INTO list_book (USER_ID, DATE_PUSH, TITLE_BOOK, CONTENT_BOOK)
-- SELECT user.user_id,'2023-03-26', 'Buổi sáng của tôi', 'Ngày mới hôm nay thật tuyệt!!'
-- FROM user
-- WHERE user_id = (
-- select user_id from user where user_name = 'congcuong'
-- )
