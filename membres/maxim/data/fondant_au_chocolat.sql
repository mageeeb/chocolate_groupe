START TRANSACTION;
use choco;
INSERT INTO `user`(`name`, `password`, `is_admin`)
VALUES('Maxi', 'Maxi123', 1);

SET @user_id = LAST_INSERT_ID();

INSERT INTO `recipe`(`membre`, `name`, `description`, `nb_people`, `image_url`, `preparation_time`, `cooking_time`, `rest_time`)
VALUES("maxim", "Fondant au Chocolat", "Découvrez la recette de Fondants au chocolat en ramequins. Une recette facile à faire qui peut être préparée plusieurs jours avant l'arrivée de vos invités !", 4, "assets/img/recipe/fondant-au-chocolat.png", 20, 15, 35);

SET @recipe_id = LAST_INSERT_ID();



INSERT INTO `instruction`(`sub_recipe_id`, `text_content`, `image_url`, `instruction_number`)
VALUES 
(@sub_recipe_id1, "Faire fondre le chocolat avec le beurre, soit au bain-marie à feu doux, soit au micro-ondes sur programme 'décongélation", NULL, 1),
(@sub_recipe_id1, "Quand c'est bien fondu, mélanger et ajouter le sucre, les oeufs un par un, la farine, puis les noix de pécan hachées", NULL, 2),
(@sub_recipe_id1, "Bien mélanger et verser dans un moule carré de 20 cm (ou rectangulaire pas trop grand), chemisé de papier sulfurisé.", NULL, 3),
(@sub_recipe_id1, "Mettre au four préchauffé à 180°C pendant 25 min.", NULL, 4),
(@sub_recipe_id1, "Laisser refroidir et couper en carrés.", NULL, 5);

INSERT INTO `ingredient_has_recipe`(`recipe_id`, `ingredient_id`, `ingredient_unity_id`, `quantity`)
VALUES(@recipe_id , 17, 8, 4),
(@recipe_id , 7, 1, 100),
(@recipe_id , 33, 1, 100),
(@recipe_id , 30, 1, 200),
(@recipe_id , 15, NULL, 5);

INSERT INTO `comment`(`recipe_id`, `user_name`, `subject`, `comment`, `stars`)
VALUES(@recipe_id, "Maxi", "Délicieux !!!", "Cette glace était tellement onctueuse ! Je dirais même savoureuse !! L'image de la crème anglaise au chocolat est vraiment fidèle a la réalité, j'ai eu exactement la même chose ! Continuez comme ça je vous aime 😊", 1),
(@recipe_id, "Maxi", "Sublime !!!", "Je n'y croyais pas lorsque j'ai commencé la recette, mais une fois terminé et goûté je suis en extase... Je ne sais plus quoi faire, j'ai envie de tout manger TOUT MANGER JE BEGAILLE ACTUELLEMENT AAIIIDDEZZZ MOOIII J AI FAIIIMMM JJJJJ AAAIIII FFAIIIIMMMM !!!", 5);

INSERT INTO `recipe_has_category`(`recipe_id`, `category_id`)
VALUES(@recipe_id, 3);

COMMIT;