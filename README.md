# Comments

In file bd.php change mysqli_connect ("127.0.0.1","user","1234",bd);

CREATE Table comments
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_parrent INT NOT NULL,
comment VARCHAR(500) NOT NULL
user INT NOT NULL
)

CREATE Table users
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
login VARCHAR(35) NOT NULL
password VARCHAR(35) NOT NULL
email VARCHAR(35) NOT NULL
name VARCHAR(35) NOT NULL
surname VARCHAR(35) NOT NULL
)
