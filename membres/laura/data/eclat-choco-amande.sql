START TRANSACTION;
use choco;
INSERT INTO `user`(`name`, `password`, `is_admin`)
VALUES('Laura', 'Laura', 1);

SET @user_id = LAST_INSERT_ID();

INSERT INTO `recipe`(`name`, `description`, `nb_people`, `image_url`, `preparation_time`, `cooking_time`, `rest_time`)
VALUES("Eclat-choco amande", "", 6, "img/img/gateau1.jpg", 55, 40, 0);

SET @recipe_id = LAST_INSERT_ID();

INSERT INTO `sub_recipe`(`recipe_id`, `title`, `image_url`, `preparation_time`, `sub_recipe_number`)
VALUES (@recipe_id , "Préparation du cake :", "img/img/gateau2.jpg", 55, 1);

SET @sub_recipe_id1 = LAST_INSERT_ID();

INSERT INTO `instruction`(`sub_recipe_id`, `text_content`, `image_url`, `instruction_number`)
VALUES
(@sub_recipe_id1, "Beurrez un moule haut et rond : le fond et les bords (vous pouvez aussi choisir un format individuel ou plus large). Versez 6 cuillères à soupe de beurre fondu dans le moule à gâteau et remuez pour en recouvrir le fond et les bords. Saupoudrez de sucre brun partout. Versez le miel sur le sucre et saupoudrez d'éclats d'amandes.", NULL, 1),
(@sub_recipe_id1, "Dans un large moule, faites en sorte de tapisser le moule de façon à ce que ça fasse l'enrobage complet du gâteau au chocolat. Préchauffez le four à 180°C.", NULL, 2),
(@sub_recipe_id1, "Si vous le souhaitez, vous pouvez également faire caraméliser d'autres éclats d'amande dans une casserole en mélangeant le beurre, le miel et le sucre. Une fois le mélange chaud, baissez le feu et versez les éclats d'amande et mélangez bien pour les enrober. Laissez sur feu très doux.", NULL, 3),
(@sub_recipe_id1, "Tamisez la farine, la poudre de cacao, le bicarbonate de soude et le sel ensemble. Placez le beurre dans le bol d'un batteur électrique muni du fouet et fouettez jusqu'à consistance lisse et mousseuse. Ajoutez le sucre et continuez à mélanger.", NULL, 4),
(@sub_recipe_id1, "Ajoutez les oeufs, un à un, en fouettant bien après chaque addition. Continuer de battre jusqu'à consistance légère, environ 3 minutes. Avec le mélangeur fonctionnant à petite vitesse, ajoutez un tiers des ingrédients secs et mélangez. Ajoutez la moitié du babeurre et continuez à mélanger. Ajoutez un autre tiers des ingrédients secs, mélangez et ajoutez le reste du babeurre et la vanille. Ajoutez le reste des ingrédients secs et mélanger jusqu'à consistance lisse. Versez la pâte dans le moule.", NULL, 5),
(@sub_recipe_id1, "Enfournez 45 à 55 minutes. Passez un couteau le long du bord du moule et retournez immédiatement le moule sur un plat de service. Laissez-le reposer avec le plat. Si la garniture est collée au moule, réchauffez le moule pour faire fondre le caramel puis le verser sur le gâteau. Sinon, il vous reste toujours la préparation dans la casserole que vous pourrez déposer sur le gâteau.", NULL, 6);

INSERT INTO `ingredient_has_recipe`(`recipe_id`, `ingredient_id`, `ingredient_unity_id`, `quantity`)
VALUES(@recipe_id , 33, 8, 6),
(@recipe_id , 8, 1, 180),
(@recipe_id , 42, 1, 80),
(@recipe_id , 43, 1, 300),
(@recipe_id , 17, 1, 280),
(@recipe_id , 11, 1, 100),
(@recipe_id , 23, 7, 1),
(@recipe_id , 6, 7, 1),
(@recipe_id , 33, 1, 100),
(@recipe_id , 7, 1, 300),
(@recipe_id , 16, NULL, 3),
(@recipe_id , 44, 1, 200),
(@recipe_id , 24, 8, 1);


INSERT INTO `comment`(`recipe_id`, `user_name`, `subject`, `comment`, `stars`)
VALUES(@recipe_id, "Kevin", "Délicieux !!!", "Cette glace était tellement onctueuse ! Je dirais même savoureuse !! L'image de la crème anglaise au chocolat est vraiment fidèle a la réalité, j'ai eu exactement la même chose ! Continuez comme ça je vous aime 😊", 4),
(@recipe_id, "Kevin", "Sublime !!!", "Je n'y croyais pas lorsque j'ai commencé la recette, mais une fois terminé et goûté je suis en extase... Je ne sais plus quoi faire, j'ai envie de tout manger TOUT MANGER JE BEGAILLE ACTUELLEMENT AAIIIDDEZZZ MOOIII J AI FAIIIMMM JJJJJ AAAIIII FFAIIIIMMMM !!!", 5);

INSERT INTO `recipe_has_category`(`recipe_id`, `category_id`)
VALUES(@recipe_id, 1);

COMMIT;