-- result table
CREATE TABLE student_result
(
    `res_Id`   INT(255)    NOT NULL UNIQUE,
    `board`    VARCHAR(45) NOT NULL,
    `uni_name` VARCHAR(65) NOT NULL,
    `semester` VARCHAR(44) NOT NULL,
    `roll_num` VARCHAR(45) NOT NULL,
    `class`    VARCHAR(65) NOT NULL,
    PRIMARY KEY (`res_Id`)

);
-- student table
CREATE TABLE students
(
    `s_Id`       INT(255)    NOT NULL UNIQUE AUTO_INCREMENT,
    `first_name` VARCHAR(65) NOT NULL,
    `last_name`  VARCHAR(65) NOT NULL,
    `email`      VARCHAR(32) NOT NULL UNIQUE,
    `password`   VARCHAR(32) NOT NULL,
    `results`    INT(255)    NOT NULL,
    FOREIGN KEY (`results`) REFERENCES student_result (`res_Id`)
);
INSERT INTO students
(
 `first_name`,
 `last_name`,
 `email`,
 `password`,
 `results`)
VALUES ('Ali Hasan' , 'Mubarak Ali ' ,'royalihasan@gmail.com','test123','1');
SELECT * FROM students s INNER JOIN student_result sr on s.`s_Id` = sr.`res_Id`;