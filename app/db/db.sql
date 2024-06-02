---
--- First approach
---

create table questions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(64),
    level TINYINT UNSIGNED
);

create table answers (
  	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(64),
    correct TINYINT UNSIGNED,
    question_id INT UNSIGNED,
    
    CONSTRAINT foreign_key_answer_question FOREIGN KEY (question_id) REFERENCES questions(id) ON DELETE CASCADE
);


---
--- Second approach
---
create table questions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text VARCHAR(256),
    level VARCHAR(16),
    answer1 VARCHAR(128),
    answer1_correct TINYINT UNSIGNED,
    answer2 VARCHAR(128),
    answer2_correct TINYINT UNSIGNED,
    answer3 VARCHAR(128),
    answer3_correct TINYINT UNSIGNED,
    answer4 VARCHAR(128),
    answer4_correct TINYINT UNSIGNED
)

---
--- Third approach (let's use this one as it is the simplest one)
---
CREATE TABLE `questions` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `text` VARCHAR(256),
  `level` VARCHAR(16),
  `answer1` VARCHAR(128),
  `answer2` VARCHAR(128),
  `answer3` VARCHAR(128),
  `answer4` VARCHAR(128),
  `correct` tinyint(3) UNSIGNED DEFAULT 0
)

---
--- Table to store admin users
---
CREATE TABLE admins (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32),
    email VARCHAR(32),
    password VARCHAR(256)
);

---
--- Dummy questions - all questions have 1 as right answer
---

INSERT INTO `questions` (`text`, `level`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
('Easy Question 1', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 2', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 3', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 4', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 5', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 6', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 7', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 8', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 9', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Easy Question 10', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1);

INSERT INTO `questions` (`text`, `level`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
('Medium Question 1', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 2', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 3', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 4', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 5', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 6', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 7', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 8', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 9', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Medium Question 10', '1', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1);

INSERT INTO `questions` (`text`, `level`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
('Hard Question 1', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 2', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 3', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 4', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 5', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 6', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 7', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 8', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 9', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
('Hard Question 10', '2', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1);


-- How it would look like if Answer1 is not always the correct one (last column is changed)
-- INSERT INTO `questions` (`text`, `level`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`) VALUES
-- ('Easy Question 1', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 3),
-- ('Easy Question 2', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
-- ('Easy Question 3', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 2),
-- ('Easy Question 4', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 3),
-- ('Easy Question 5', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 3),
-- ('Easy Question 6', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 4),
-- ('Easy Question 7', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
-- ('Easy Question 8', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 2),
-- ('Easy Question 9', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 1),
-- ('Easy Question 10', '0', 'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 2);