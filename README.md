Banco de dados - Informações

Tabelas

recipes

id INT(11) PK NN
title VARCHAR(150) NN
ingredients VARCHAR(250)
preparation VARCHAR(250)
image VARCHAR(225)
created_at TIMESTAMP
userid_fk INT(11) NN 

users

id INT(11) PK NN
user_fullname VARCHAR(180) NN 
email VARCHAR(150) NN
password VARCHAR(225) NN 
created_at TIMESTAMP
profile_image VARCHAR(255)