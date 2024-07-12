<?php
require_once "../../config.php";
require_once "../../model/Recipe.php";

$db = new PDO(DB_TYPE.":host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME.";charset=".DB_CHARSET,
DB_LOGIN, DB_PWD);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

$recipe = Recipe::getRecipeById($db, ID_RECIPE_CHOCO_POMME);

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST["username"], $_POST["comment"], $_POST["subject"], $_POST["stars"])){
    $insert_result = Comment::insertComment($db, ID_RECIPE_CHOCO_POMME, $_POST["username"], $_POST["comment"], $_POST["subject"], $_POST["stars"]);
    if (gettype($insert_result) == "array"){
        $datas = [
        "id"=> $insert_result[0]->getId(),
        "comment"=> $insert_result[0]->getComment(),
        "subject"=> $insert_result[0]->getSubject(),
        "created_date"=> $insert_result[0]->getCreatedDate(),
        "stars"=> $insert_result[0]->getStars(),
        "username"=> $insert_result[0]->getUsername(),
        ];
        echo json_encode($datas);
    }else {
        echo json_encode(["error" => $insert_result]);
    }
    die;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>🍫 Délicieuse recette de glace au chocolat 🍫</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer/style.css">
    <link rel="stylesheet" href="css/footer/bootstrap.min.css">
    <link rel="stylesheet" href="css/recipes/glace-recipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/footer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <div id="place-holder-nav" style="display: none;">
    </div>
    <nav>
        <div id="nav-links">
            <a href="#" id="logo"><img src="img/logo.png" alt="" width="50"></a>
            <div id="container-burger">
                <img src="img/nav-img/chocolat.png" alt="">
            </div>
            <div id="links">
                <a href="#">Accueil</a>
                <a href="javascript:void(0)" id="nav-recipes-link">Recettes<i class="fa-solid fa-arrow-down" style="margin-left: 10px;"></i></a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div id="nav-recipes-container">
            <ul id="nav-recipes" style="display: none;">
                <a href="#"><li>Mousse au chocolat</li></a>
                <a href="#"><li>Cake au chocolat</li></a>
                <a href="#"><li>Fondant au chocolat</li></a>
                <a href="#"><li>Tarte au chocolat</li></a>
                <a href="#"><li>Cookies au chocolat</li></a>
                <a href="#"><li>Glace au chocolat</li></a>
                <a href="#"><li>Bûche de Noël au chocolat</li></a>
                <a href="#"><li>Moelleux au chocolat</li></a>
                <a href="#"><li>Truffes au chocolat</li></a>
                <a href="#"><li>Macarons au chocolat</li></a>
            </ul>
            <div id="previews">
            </div>
        </div>
        <div id="nav-choco-open-menu">
            <img src="img/nav-img/openmenu.png" alt="">
        </div>
    </nav>
    <div id="nav-choco">
        <img src="img/nav-img/banner_top.png" alt="">
    </div>
   
    <header class="header-text glace-banner" style="background-image: url('./img/recipes/chocopomme.jpg');">
        <p><?=$recipe->getName();?></p>
    </header>

    <main>
        <header class="general-infos">
            <h1 style="margin: 50px 0 30px 0;">Avant de commencer, voici ce dont vous devez savoir :</h1>
            <div class="informations" style="margin-bottom: 30px;">
                <div class="information" style="background-color: rgb(166 62 4);border-radius: 30px;color: #e4e4e4;margin: 20px;">
                    <h3 style="background-color: rgb(90, 35, 20);width: 100%;margin-top: 0;padding: 16px 0 16px 0;border-radius: 30px 30px 0 0;color: #e4e4e4;text-decoration: none;text-align: center;">Informations utiles</h3>
                    <p style="margin: 30px;">&nbsp;<i class="fa-solid fa-person" style="color: #e4e4e4;"></i> Servis pour: <?=$recipe->getNbPeople();?> personnes</p>
                    <p style="margin: 30px;"><i class="fa-solid fa-clock" style="color: #e4e4e4;"></i> Préparation: <?=$recipe->getPreparationTime();?> minutes</p>
                    <p style="margin: 30px;"><i class="fa-solid fa-clock" style="color: #e4e4e4;"></i> cuisson: <?=$recipe->getCookingTime();?> minutes</p>
                    <p style="margin: 30px;"><i class="fa-solid fa-clock" style="color: #e4e4e4;"></i> Repos: <?=$recipe->getRestTime();?> minutes</p>
                    <p style="margin: 30px;"><i class="fa-solid fa-clock" style="color: #e4e4e4;"></i> Avis (<?=sizeof($recipe->getComments())?>):
                        <?php for($i=0;$i<floor($recipe->getStarAverage()/2);$i++):?>
                            <i class="fa-solid fa-star aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="1000"></i>
                        <?php endfor; ?>
                        <?php if($recipe->getStarAverage() % 2 == 1): ?>
                            <i class="fa-solid fa-star-half aos-init aos-animate" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="2500"></i>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="information" style="background-color: rgb(166 62 4);border-radius: 30px;color: #e4e4e4;margin: 20px;">
                    <h3 style="background-color: rgb(90, 35, 20);width: 100%;margin-top: 0;padding: 16px 0 16px 0;border-radius: 30px 30px 0 0;color: #e4e4e4;text-decoration: none;text-align: center;">Ingrédients</h3>
                    <ul style="margin: 30px;">
                        <?php foreach($recipe->getIngredients() as $ingredient): ?>
                        <li>
                            <i class="fa-solid fa-receipt" style="color: #e4e4e4;"></i>
                            <?= $ingredient->getQuantity(); ?><?= $ingredient->getUnity()!="null" ? " ".$ingredient->getUnity()." de" : ""; ?> <?= $ingredient->getName(); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </header>
        <?php foreach($recipe->getSubRecipes() as $sub_recipe): ?>
        <div class="sub-recipe" style="background-color: rgb(166 62 4);border-radius: 30px;color: #e4e4e4;margin: 50px auto;width: 80%;">
            <h2 style="background-color: rgb(90, 35, 20);width: 100%;margin-top: 0;padding: 16px 0 16px 0;border-radius: 30px 30px 0 0;color: #e4e4e4;text-decoration: none;text-align: center;"><?=$sub_recipe->gettitle()?><br>( <i class="fa-solid fa-clock"></i> 5 min )</h2>
            <?php foreach($sub_recipe->getInstructions() as $key => $instruction): ?>
            <div class="step" style="margin: 10px 0 10px 0">
                <p style="margin-left: 2em;"><input type="radio"></input><strike></strike><span><?=$key + 1?>     <?=$instruction->getText()?></span></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

        <section class="spad mt-5" id="comments" style="padding: 0;width: 80%; margin: auto;margin-top: 100px;">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="error-message" style="background-color: rgb(166 62 4 / 77%);height: 4em;border: 2px solid brown;border-radius: 1em;text-align: center;display: none;flex-direction: column;justify-content: center;">
                            <p style="margin: 0;color: rgb(90, 35, 20);">Une erreur est survenue lors de l'insertion</p>
                        </div>
                        <h3 id="comments-form-button">Laissez un commentaire <img src="./img/recipes/arrow.svg" height="50"></h3>
                        <form action="./" class="contact-form" method="post" id="comment-form" style="display: none;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" id="name" placeholder="Votre nom" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="subject" placeholder="Sujet">
                                </div>
                                <div class="col-lg-12">
                                    <textarea id="comment" placeholder="Commentaire" required></textarea>
                                    <div class="star-rating">
                                        <i class="fa fa-star" data-rating="1"></i>
                                        <i class="fa fa-star" data-rating="2"></i>
                                        <i class="fa fa-star" data-rating="3"></i>
                                        <i class="fa fa-star" data-rating="4"></i>
                                        <i class="fa fa-star" data-rating="5"></i>
                                    </div>
                                    <input type="hidden" id="rating" value="0">
                                </div>
                            </div>
                            <button type="submit">Envoyez votre commentaire</button>
                        </form>
                        <div class="comments-section">
                            <div class="comments-list" id="comments-list">
                                <!-- Commentaires affichés ici -->
                                <?php foreach($recipe->getComments() as $comment): ?>
                                <div class="comment">
                                    <div>
                                        <strong><?=$comment->getUsername()?></strong>
                                        <span class="comment-date"><?=$comment->getCreatedDate()?></span>
                                    </div>
                                    <div class="comment-rating">
                                        <?php for($i=0;$i<$comment->getStars();$i++): ?>
                                        <i class="fa fa-star checked"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <div style="margin-bottom: 0.5em;">
                                        <strong><?=$comment->getSubject()?>:</strong>
                                    </div>
                                    <div>
                                        <?=$comment->getComment()?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer set-bg mt-5" data-setbg="img/imgfooter/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                       <h6>Recette ...</h6>
                       <ul class="servi">
                          <li class="text-white"><a class="text-white" href="Javascript:void(0)"> recette1</a></li>
                          <li class="text-white"><a class="text-white" href="Javascript:void(0)"> recette2</a></li>
                          <li class="text-white"><a class="text-white" href="Javascript:void(0)"> recette3</a></li>
                          <li class="text-white"><a class="text-white" href="Javascript:void(0)"> recette4</a></li>
                          <li class="text-white"><a class="text-white" href="Javascript:void(0)"> recette5</a></li>
                       </ul>
                    </div>
                 </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/imgfooter/logo 2.png" style="width: 150px;" alt=""></a>
                        </div>
                        <p> +32 123 890 <br>
                            chocomousse@gmail.com <br>
                            Rue de chocolat 15
                            1060 Saint Gilles Belgique.</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Newsletter</h6>
                        <p>Vous voulez nos derniere recette? </p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white">
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">sebastien</a>
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="copyright__widget">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Home</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/nav.js"></script>
    <script src="js/jsfooter/main.js"></script>
    <script src="js/recipes/glace-recipe.js"></script>
    <script src="./js/main.js"></script>
    <script>
        //query selectors of the elements to reveal with animation
        const reveal_query = [
            ".sub-recipe",
            ".information",
            ".comment",
            "footer > .container",
        ]
        const options = {
            reset: true,
            delay: 100,
            duration: 1000,
            origin: "bottom",
            distance: "50px"
        }
        ScrollReveal().reveal(reveal_query.join(", "), options);
        options.origin = "right";
        options.distance = "200px";
        ScrollReveal().reveal(".copyright", options);
    </script>
</body>

</html>