# on sélectionne tous les étudiants de la section actuelle grâce à l'id de la section
SELECT thestudent.*
	FROM thestudent
    INNER JOIN thesection_has_thestudent
		ON thesection_has_thestudent.thestudent_idthestudent= thestudent.idthestudent
    WHERE  thesection_has_thestudent.thesection_idthesection=1;
    
# on vérifie la validité d'une connexion logon/password
SELECT idtheuser, thelogin FROM theuser
		WHERE thelogin = 'lulu' AND thepwd = 'd2435e88f3575be3ee762a3183629548165f9ed6a81a6ab13725967e3c72ef36';