SELECT * FROM articles;
SELECT * FROM users;

/*
Accueil.php
Tous les articles par ordre de thedate descendant, 300
caractère de thetexte ainsi que le users.thename
*/
SELECT a.idarticles, a.thetitle, LEFT(a.thetext,300) AS thetext,
	a.thedate, u.thename
	FROM articles a
    INNER JOIN users u
		ON a.users_idusers = u.idusers
	ORDER BY a.thedate DESC;


SELECT idusers, thelogin, thename FROM users where idusers=1;

SELECT idarticles, thetitle, LEFT(thetext,300) AS thetext, thedate
	FROM articles WHERE users_idusers=1
    ;
