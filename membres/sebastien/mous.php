<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=">
    <link rel="icon" type="image/x-icon" href="img/nav-img/logo.png">
    <title>🍫 Délicieuse recette de mousse au chocolat 🍫</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/recipes/mousse.css">
    <link rel="stylesheet" href="css/commentaire/stylecommentaire.css">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/footer/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/footer/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/footer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/footer/style.css" type="text/css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
    <link rel="stylesheet" href="css/carousel/carou.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .choco {
  outline:none;
  cursor:pointer;
  display:block;
  background-color:#54341A;
  text-shadow:0px 1px 0px rgba(255,255,255,0.1);
  text-decoration:none;
  font:normal 20px 'Monotype Corsiva','Book Antiqua',Georgia,Serif;
  color:#ffffff;
  width:320px;
  text-align:center;
  margin:auto;
  padding:0px 0px;
  line-height:40px;
  border-top:9px solid #6A4021;
  border-right:10px solid #39210D;
  border-bottom:10px solid #241505;
  border-left:10px solid #402712;
  -webkit-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.15),
    0px 1px 2px black;
  -moz-box-shadow:inset 0px 1px 0px rgba(255,255,255,0.15),
    0px 1px 2px black;
  box-shadow:inset 0px 1px 0px rgba(255,255,255,0.15),
    0px 1px 2px black;
}

.choco:hover {
  background-color:#4B2E17;
  border-color:#5F391F #311F0D #170D03 #341F0F;
}

.choco:active {
  border-color:#170D03 #341F0F #5F391F #311F0D;
  -webkit-box-shadow:none;
  -moz-box-shadow:none;
  box-shadow:none;
}

</style>
</head>
<body>
    <!--------------navbar--------------------->
    <div id="place-holder-nav" style="display: none;">
    </div>
    <nav>
        <div id="nav-links">
            <a href="mous.html" id="logo"><img src="img/nav-img/logo.png" alt="" width="50"></a>
            <div id="container-burger">
                <img src="img/nav-img/chocolat.png" alt="">
            </div>
            <div id="links">
                <a href="#">Accueil</a>
                <a href="javascript:void(0)" id="nav-recipes-link">Recettes<i class="fa-solid fa-arrow-down" style="margin-left: 10px;"></i></a>
                <a href="#coms">Contact</a>
            </div>
        </div>
        <div id="nav-recipes-container">
            <ul id="nav-recipes" style="display: none;">
                <a href="#"><li>Mousse au chocolat</li></a>
                <a href="../julian/"><li>Polish cake</li></a>
                <a href="../maxim/"><li>Fondant au chocolat</li></a>
                <a href="../laura/"><li>Cake aux amandes</li></a>
                <a href="../charly/"><li>Cookies au chocolat</li></a>
                <a href="../kevin/"><li>Glace au chocolat</li></a>
                <a href="../pomme/"><li>Choco Pomme</li></a>
                <a href="../simona/"><li>Brownie framboise</li></a>
                <a href="../simona/"><li>Amandina Cake</li></a>
                <a href="../enez/"><li>cupavci</li></a>
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
   
    <header class="header-text glace-banner">
        <h1><?= $recipe->getName() ?></h1>
    </header>
<!-----------------contenu--------------------------->
<main>
    <header class="general-infos">
        <h2 class="display-5 mt-5"><?= $recipe->getName() ?></h2>
        <h2 class="mt-5 mb-5"><?= $recipe->getDescription() ?></h2>
        <div class="informations border rounded-2 border-5 border-dark">
            <div>
                <h3>Évaluation :</h3>
                <?php for($i = 2; $i <= $recipeAverage; $i+=2): ?>
                        <i class="fa-solid fa-star" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                    <?php endfor ?>
                    <?php if($recipeAverage % 2 !== 0): ?>
                        <i class="fa-solid fa-star-half" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                    <?php endif ?>
                <p><i class="fa-solid fa-message"></i> <a href="#coms"><?= sizeof($recipe->getComments()) ?> commentaire<?= sizeof($recipe->getComments()) > 1 ? 's' : '' ?></a></p>
                <button class="btn" style="background-color: #4B2E17;color: white;" onclick="printDiv('page')" value="print a div!">Imprimer la recette</button>
            </div>
            <div>
                <h3>Informations utiles :</h3>
                <p>&nbsp;<i class="fa-solid fa-person"></i> Servis pour:  <?= $recipe->getNbPeople() ?> personne<?= $recipe->getNbPeople() > 1 ? 's' : '' ?></p>
                <p><i class="fa-solid fa-clock"></i> Préparation: <?= $recipe->getPreparationTimeToString() ?></p>
                <p><i class="fa-solid fa-clock"></i> Repos: <?= $recipe->getRestTimeToString() ?></p>
            </div>
            <div>
                <h3>Ingrédients :</h3>
                <ul>
                <?php foreach($recipe->getIngredients() as $ingredient): ?>
                            <li><i data-aos="flip-right" data-aos-delay="500" class="fa-solid fa-receipt"></i> <?= $ingredient ?></li>
                        <?php endforeach ?>
                </ul>
            </div>
        </div>
    </header>
    <section id="page">
        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
            <img id="img3" src="img/recipes/Mousse/plouf2.png" style="width: 300px;" class="me-5"  data-aos="fade-down"
            data-aos-offset="300"
            data-aos-easing="ease-in-sine" alt="Image 1">
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
            <img id="img5" src="img/recipes/Mousse/plouf4.png" style="width: 300px;" class="me-5"  data-aos="fade-down"
            data-aos-offset="300"
            data-aos-easing="ease-in-sine" alt="Image 1">
        </div>
        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
            <img id="img4" src="img/recipes/Mousse/plouf1.png" style="width: 300px;" class="me-5"  data-aos="zoom-in">
        </div>
        <?php foreach($recipe->getSubRecipes() as $subRecipe): ?>
            <div class="steps mt-5">
                <h2 class="text-center mb-4"><?= $subRecipe->getTitle() ?> <br><i class="fa-solid fa-clock"></i> <?= $subRecipe->getPreparationTimeToString() ?></h2>
                <div class="row border rounded-2 border-5 border-dark">
                <?php foreach($subRecipe->getInstructions() as $key => $instruction): ?>
                    <div class="col-md-6 mb-4">
                        <div class="step">
                            <input type="checkbox" class="step-checkbox me-3">
                            <p class="step-desc"><?= ++$key ?>: <?= $instruction ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        <?php endforeach ?>
    </section>
</main>
<script>
    $(document).ready(function(){
        $(".step-checkbox").change(function(){
            var $stepDesc = $(this).siblings(".step-desc");
            if($(this).is(":checked")){
                $stepDesc.html('<del>' + $stepDesc.text() + '</del>');
            } else {
                var text = $stepDesc.find("del").text();
                $stepDesc.html(text);
            }
        });
    });
    </script>

    
<!------------------video------------------->
    <section id="backvid" class="container-fluid text-white mt-5 py-5">
        <div class="container">
            <h2 class="text-center text-white">Vidéo de la recette</h2>
            <div class="row mt-4">
                <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                    <img id="img1" src="img/recipes/Mousse/—Pngtree—healthy vegan raw glass dark_15569265.png" style="width: 300px;" class="me-5"  data-aos="fade-right"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine" alt="Image 1">
                </div>
                <div class="col-md-8">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/OqB6joRdmBk?si=Wr6oCgHamDE32z5F" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                    <img id="img2" src="img/recipes/Mousse/—Pngtree—healthy vegan raw glass dark_15569265.png" style="width: 300px;" class="ms-5" data-aos="fade-left"
                    data-aos-offset="300"
                    data-aos-easing="ease-in-sine" alt="Image 2"> 
                </div>
            </div>
        </div>
    </section>
    <!------------------start commentaire----------------------------->
    <button class="choco mt-5">laissez nous un commentaire</button>
    <section id="coms" class="contact-section mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" class="contact-form" id="comment-form" style="display: none;">
                        <h2 class="mb-4" style="color: white;">Laissez un commentaire</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" id="name" placeholder="Votre nom" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" id="email" placeholder="Votre email" required>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" id="subject" placeholder="Sujet">
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
                        <h2>Les Commentaires</h2>
                        <div class="comments-list" id="comments-list">
                         <?php foreach($recipe->getComments() as $comment): ?>
                                <div class="comment">
                                    <div class="d-flex justify-content-between"><div><strong>Nom : </strong><?= $comment->getUsername() ?></strong></div> <span class="comment-date"><?= $comment->getCreatedDate() ?></span></div> 
                                    <div><strong>sujet : </strong><?= $comment->getSubject() ?></div> 
                                    <div><strong> Message : </strong><?= $comment->getComment() ?></div> 
                                    <div class="comment-rating">
                                        <span>Note : </span>
                                        <?php $stars = $comment->getStars(); ?>
                                        <?php for($i = 0; $i < $stars; ++$i): ?>
                                            <i class="fa fa-star "></i>
                                        <?php endfor ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $(".choco").click(function(){
                $("#comment-form").fadeToggle();
            });
        });
    </script>


   
<!-- carousel-->
<h2 class="display-5 mb-5">Autre Recette</h2>
<section id="sectioncar">
    <div class="swiper">
        <div class="swiper-wrapper">
        <div class="swiper-slide swiper-slide--one">
            <a href="../kevin/glace-au-chocolat.html"><span>Glace au chocolat</span></a>
            <div>
              <h2>"Fondez de plaisir avec notre glace au chocolat"</h2>
            </div>
        </div>
        <div class="swiper-slide swiper-slide--two">
            <a href="mous.html"><span>Éclat Choco-Amande</span></a>
        <div>
            <h2>"Éclat Choco-Amande: La Fusion Gourmande de la Douceur et du Croquant"</h2>
        </div>
        </div>
  
        <div class="swiper-slide swiper-slide--three">
          <span>Cookies au chocolat</span>
          <div>
            <h2>"Craquez pour nos cookies au chocolat, un plaisir à chaque bouchée."</h2>
          </div>
        </div>
  
        <div class="swiper-slide swiper-slide--four">
          <span>murzynek</span>
          <div>
            <h2>"Délice Noir au Chocolat"</h2>
          </div>
        </div>
  
        <div class="swiper-slide swiper-slide--five">
          <a href="mous.html"><span>fondant au chocolat</span></a>
          <div>
            <h2>"fondant au chocolat : fondant à souhait, bonheur à chaque bouchée."</h2>
          </div>
        </div>
        <div class="swiper-slide swiper-slide--six">
          <a href="mous.html"><span> Amandina Cake </span></a>
          <div>
            <h2>"Amandina Cake: L'Exquise Harmonie de l'Amande et du Gâteau"</h2>
          </div>
        </div>
        <div class="swiper-slide swiper-slide--seven">
          <a href="mous.html"><span>cupavci</span></a>
          <div>
            <h2>"Cupavci: Le Plaisir Enveloppé de Douceur"</h2>
          </div>
        </div>
        <div class="swiper-slide swiper-slide--eight">
          <a href="mous.html"><span>chocopomme</span></a>
          <div>
            <h2>"ChocoPomme: Le Duo Délicieux qui Croque de Plaisir"</h2>
          </div>
        </div>
        <div class="swiper-slide swiper-slide--nine">
            <a href="mous.html"><span>brownie framboise</span></a>
            <div>
              <h2>"brownie framboise: Le Plaisir Enveloppé de Douceur"</h2>
            </div>
          </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </section>


      <!-- Page Preloder -->
      <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Footer Section Begin -->
    <footer class="footer set-bg mt-5" data-setbg="img/imgfooter/footer-bg.jpg" style="background-repeat: no-repeat;background-size: cover;">
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
<script src="js/carousel.js"></script>
<script src="" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/commentaire.js"></script>
    <script src="js/nav.js"></script>

    <script src="js/jsfooter/jquery-3.3.1.min.js"></script>
    <script src="js/jsfooter/bootstrap.min.js"></script>
    <script src="js/jsfooter/main.js"></script>
</body>
</html>