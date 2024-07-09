START TRANSACTION;
use choco;
INSERT INTO `user`(`name`, `password`, `is_admin`)
VALUES('Enez', 'Enez123', 1);

SET @user_id = LAST_INSERT_ID();

INSERT INTO `recipe`(`name`, `description`, `nb_people`, `image_url`, `preparation_time`, `cooking_time`, `rest_time`)
VALUES("Cupavci", " ", 8, "../img/recipes/1.jpeg", 70, 40, 60);

SET @recipe_id = LAST_INSERT_ID();

INSERT INTO `sub_recipe`(`recipe_id`, `title`, `image_url`, `preparation_time`, `sub_recipe_number`)
VALUES (@recipe_id , "Préparons la genoise :", null, 70, 1);

SET @sub_recipe_id1 = LAST_INSERT_ID();

INSERT INTO `sub_recipe`(`recipe_id`, `title`, `image_url`, `preparation_time`, `sub_recipe_number`)
VALUES (@recipe_id , "Maintenant préparez le glaçage :", null, 15, 2);

SET @sub_recipe_id2 = LAST_INSERT_ID();

INSERT INTO `instruction`(`sub_recipe_id`, `text_content`, `image_url`, `instruction_number`)
VALUES 
(@sub_recipe_id1, "Préchauffez le four à 180°C (Th.6).", NULL, 1),
(@sub_recipe_id1, "Dans un saladier, battez les œufs avec le sucre jusqu'à obtenir un mélange mousseux.", NULL, 2),
(@sub_recipe_id1, "Incorporer la farine et le bicarbonate de soude, puis ajoutez le beurre fondu et mélangez à nouveau.", NULL, 3),
(@sub_recipe_id1, "Graissez un grand moule carré. Versez-y le mélange et laissez cuire pendant 40 minutes.", NULL, 4),
(@sub_recipe_id1, "Une fois cuit, laissez refroidir le gâteau à température ambiante, puis placez-le au congélateur pendant 40 minutes.", NULL, 5),
(@sub_recipe_id1, "Dans une casserole à feu doux, versez la poudre de cacao et le sucre en poudre. Ajoutez petit à petit le lait, puis le beurre. Vous devriez obtenir un mélange lisse pour le glaçage.", NULL, 6),
(@sub_recipe_id1, "Retirez chaque carré à l’aide d’une fourchette et enrobez-les du glaçage au chocolat à l’aide d’une cuillère à café.", NULL, 6),
(@sub_recipe_id1, "Recouvrez ensuite chaque carré de noix de coco. Placez-les sur une grille et laissez-les refroidir pendant 45 min. <i data-aos=\"flip-right\" data-aos-delay=\"500\" class=\"fa-solid fa-clock\"></i>.", NULL, 7),
(@sub_recipe_id2, "Préparez le glaçage : faites fondre le chocolat et ajoutez le sucre.", NULL, 2),
(@sub_recipe_id2, "Ajoutez le beurre et mélangez bien. Laissez refroidir.", NULL, 2),
(@sub_recipe_id2, "Coupez-le en carrés de 4 cm de côté.", NULL, 2),
(@sub_recipe_id2, "Trempez chaque carré dans le glaçage au chocolat et roulez-les dans la noix de coco râpée.", NULL, 2),
(@sub_recipe_id2, "Réservez les carrés au frais pendant 1 heure avant de les servir.<i data-aos=\"flip-right\" data-aos-delay=\"500\" class=\"fa-solid fa-clock\"></i>", NULL, 2);



INSERT INTO `ingredient_has_recipe`(`recipe_id`, `ingredient_id`, `ingredient_unity_id`, `quantity`)
VALUES(@recipe_id , 7, 1, 100),
(@recipe_id , 15, NULL, 3),
(@recipe_id , 37, 2, 120),
(@recipe_id , 17, 1, 125),
(@recipe_id , 33, 1, 100),
(@recipe_id , 23, 1, 2);

INSERT INTO `comment`(`recipe_id`, `user_name`, `subject`, `comment`, `stars`)
VALUES(@recipe_id, "Enez", "Magnifique !!!", "Ce gateau est vraiment délicieux je le recommande 😊", 4),
(@recipe_id, "Enez", "Parfait !!!", "Recette simple et savoureuse ! J'ai ajouté des pépites de chocolat noir à la pâte au cacao , un délice !", 5);

INSERT INTO `recipe_has_category`(`recipe_id`, `category_id`)
VALUES(@recipe_id, 1);

COMMIT;

