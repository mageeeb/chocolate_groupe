<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>🍫 Délicieuse recette de glace au chocolat 🍫</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer/style.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl-carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/recipes/glace-recipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                <a href="../sebastien/mous.html"><li>Mousse au chocolat</li></a>
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
            <div id="previews"></div>
        </div>
        <div id="nav-choco-open-menu" style="display: none;">
            <img src="img/nav-img/openmenu.png" alt="">
        </div>
    </nav>
    <div id="nav-choco">
        <img src="img/nav-img/banner_top.png" alt="">
    </div>
   
    <header class="header-text glace-banner">
        <p data-aos="flip-down"><?= $recipe->getName() ?></p>
    </header>

    <div id="description" data-aos="fade-in">
        <h1><?= $recipe->getName() ?></h1>
        <p><?= $recipe->getDescription() ?></p>
    </div>

    <main class="position-relative">
        <div id="ice-cream1">
            <img src="img/recipes/glace/ice-cream.png" width="250" alt="">
        </div>
        <div id="ice-cream2">
            <img src="img/recipes/glace/ice-cream.png" width="250" alt="">
        </div>
        <div id="corner">
            <img src="img/recipes/glace/corner.png" alt="">
        </div>
        <header class="general-infos">
            <h2>Avant de commencer, voici ce dont vous devez savoir :</h2>
            <div class="informations">
                <div data-aos="zoom-in-right">
                    <h3>Évaluation :</h3>
                    <?php for($i = 2; $i <= $recipeAverage; $i+=2): ?>
                        <i class="fa-solid fa-star" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                    <?php endfor ?>
                    <?php if($recipeAverage % 2 !== 0): ?>
                        <i class="fa-solid fa-star-half" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                    <?php endif ?>
                    <p><i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-message"></i> <a href="#comments"><?= sizeof($recipe->getComments()) ?> commentaire<?= sizeof($recipe->getComments()) > 1 ? 's' : '' ?></a></p>
                </div>
                <div data-aos="zoom-in-down">
                    <h3>Informations utiles :</h3>
                    <p>&nbsp;<i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-person"></i> Servis pour: <?= $recipe->getNbPeople() ?> personne<?= $recipe->getNbPeople() > 1 ? 's' : '' ?></p>
                    <p><i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-clock"></i> Préparation: <?= $recipe->getPreparationTimeToString() ?></p>
                    <p><i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-clock"></i> Repos: <?= $recipe->getRestTimeToString() ?></p>
                </div>
                <div data-aos="zoom-in-left">
                    <h3>Ingrédients :</h3>
                    <ul>
                        <?php foreach($recipe->getIngredients() as $ingredient): ?>
                            <li><i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-receipt"></i> <?= $ingredient ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </header>
        <?php foreach($recipe->getSubRecipes() as $subRecipe): ?>
            <div class="steps">
                <div>
                    <h2><?= $subRecipe->getTitle() ?> <br>( <i data-aos="flip-right" class="fa-solid fa-clock"></i> <?= $subRecipe->getPreparationTimeToString() ?> )</h2>
                    <?php foreach($subRecipe->getInstructions() as $key => $instruction): ?>
                        <div class="step">
                            <p data-aos="flip-right" class="number"><span><?= ++$key ?></span></p>
                            <p data-aos="fade-left" class="step-desc"><?= $instruction ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="container-img-steps">
                    <div data-aos="fade-down" class="img-steps" style="background-image: url('<?= $subRecipe->getImgUrl() ?>');"></div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="owl-carousel owl-theme">
            <div class="item"><img src="img/recipes/glace/bonappetit1.webp" alt=""></div>
            <div class="item"><img src="img/recipes/glace/bonappetit2.webp" alt=""></div>
            <div class="item"><img src="img/recipes/glace/bonappetit3.webp" alt=""></div>
            <div class="item"><img src="img/recipes/glace/bonappetit4.webp" alt=""></div>
            <div class="item"><img src="img/recipes/glace/bonappetit5.webp" alt=""></div>
        </div>
        <section class="contact-section spad mt-5" id="comments">
            <div class="text-center">
                <button id="comment-btn">Donnez-votre avis.</button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <form action="#" class="contact-form" id="comment-form" style="display: none;">
                            <h3>Laissez-nous un commentaire <span>😊</span></h3>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="text" id="name" placeholder="Votre nom" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" id="email" placeholder="Votre email" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" id="subject" placeholder="Sujet">
                                    <div id="comment" placeholder="Commentaire" required></div>
                                    <div class="star-rating position-relative">
                                        <div class="star-rating position-absolute">
                                            <i class="fa-regular fa-star" data-rating="1"></i>
                                            <i class="fa-regular fa-star" data-rating="2"></i>
                                            <i class="fa-regular fa-star" data-rating="3"></i>
                                            <i class="fa-regular fa-star" data-rating="4"></i>
                                            <i class="fa-regular fa-star" data-rating="5"></i>
                                        </div>
                                        <i class="fa-regular fa-star" data-rating="1"></i>
                                        <i class="fa-regular fa-star" data-rating="2"></i>
                                        <i class="fa-regular fa-star" data-rating="3"></i>
                                        <i class="fa-regular fa-star" data-rating="4"></i>
                                        <i class="fa-regular fa-star" data-rating="5"></i>
                                    </div>
                                    <input type="hidden" id="rating" value="0">
                                </div>
                            </div>
                            <button type="submit">Envoyez votre commentaire</button>
                        </form>
                        <div class="comments-section">
                            <div class="comments-list" id="comments-list">
                            <h2><?= sizeof($recipe->getComments()) > 0 ? 'Les commentaires' : 'Pas encore de commentaires' ?></h2>
                            <?php foreach($recipe->getComments() as $comment): ?>
                                <div class="comment">
                                    <div class="d-flex justify-content-between pe-5 pb-3 border-bottom"><div>De : <strong><?= $comment->getUsername() ?></strong></div> <div>Posté le : <span class="comment-date"><?= $comment->getCreatedDate() ?></span></div></div>
                                    <div class="d-flex my-3 gap-5">
                                        <div class="fw-bold" style="color: rgb(var(--main-color))">
                                            Sujet : <?= $comment->getSubject() ?>
                                        </div>
                                        <div class="comment-rating">
                                            <span>Note : </span>
                                            <?php $stars = $comment->getStars(); ?>
                                            <?php for($i = 0; $i < $stars; ++$i): ?>
                                                <i class="fa fa-star"></i>
                                            <?php endfor ?>
                                        </div>
                                    </div>
                                    <div><?= $comment->getComment() ?></div>
                                </div>
                                   
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer set-bg mt-5" data-setbg="img/imgfooter/footer-bg.jpg"style="background-repeat: no-repeat;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                       <h6>Recette ...</h6>
                       <ul class="servi">
                          <li><a class="text-white" href="Javascript:void(0)"> recette1</a></li>
                          <li><a class="text-white" href="Javascript:void(0)"> recette2</a></li>
                          <li><a class="text-white" href="Javascript:void(0)"> recette3</a></li>
                          <li><a class="text-white" href="Javascript:void(0)"> recette4</a></li>
                          <li><a class="text-white" href="Javascript:void(0)"> recette5</a></li>
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
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Newsletter</h6>
                        <p>Vous voulez nos derniere recette? </p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Kevin</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul class="mb-0">
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
    <script src="vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="js/recipes/glace-recipe.js"></script>
    <script src="js/footer.js"></script>
</body>

</html>