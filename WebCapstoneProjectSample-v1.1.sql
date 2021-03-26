USE webcapstone;

-- SET FOREIGN_KEY_CHECKS = 0;
-- TRUNCATE users;
-- SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO users
(username, password, type, first_name, last_name, email, phone, card_no)
VALUES
('admin', 'admin', 1, 'Admin', 'User', 'admincapstone@gmail.com', '123456789', '987654321');

INSERT INTO products 
(name, price, description, quantity)
VALUES
('Javascript', 30.00, 'JavaScript (also known as NodeJS) is a popular language among developers who need to work on server-side and client-side programming. 
It is compatible with several other programming languages, allowing you to create animations, set up buttons, and manage multimedia.', 10),
('Python', 25.00, 'Python continues to be one of the best programming languages every developer should learn this year. 
The language is easy-to-learn and offers a clean and well-structured code, making it powerful enough to build a decent web application. 
\nPython can be used for web and desktop applications, GUI-based desktop applications, machine learning, data science, and network servers. 
The programming language enjoys immense community support and offers several open-source libraries, frameworks, and modules that make application development a cakewalk.', 10),
('Java', 20.00, 'Java is used to develop enterprise-level applications for video games and mobile apps, as well as to create web-based applications with JSP (Java Server Pages). 
When used online, Java allows applets to be downloaded and used through a browser, which can then perform a function not normally available.', 10),
('Ruby', 40.00, 'Ruby is used for simulations, 3D modeling, and to manage and track information.', 10),
('HTML (HyperText Markup Language)', 15.00, 'HTML is the standard markup language used to create web pages; it ensures proper formatting of text and images (using tags) so that Internet browsers can display them in the ways they were intended to look.', 10),
('C Language', 25.00, 'C Language is used to develop systems applications that are integrated into operating systems such as Windows, UNIX and Linux, as well as embedded softwares. 
Applications include graphics packages, word processors, spreadsheets, operating system development, database systems, compilers and assemblers, network drivers and interpreters.', 10),
('C#', 32.00, 'C# helps developers create XML web services and Microsoft .NET-connected applications for Windows operating systems and the internet.', 10),
('PHP (Hypertext Preprocessor)', 33.00, 'PHP is an open-source scripting language designed for creating dynamic web pages that effectively work with databases. It is also used as a general-purpose programming language.', 10),
('SQL (Structured Query Language)', 30.00, 'SQL is a database query language (not a development language) that allows for adding, accessing and managing content in a database. 
It is the language that allows programmers to perform the common acronym CRUD (Create; Read; Update; Delete) within a database.', 10);


