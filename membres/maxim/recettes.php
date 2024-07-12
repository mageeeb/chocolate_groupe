<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="./css/cssFooter/bootstrap.min.css">
    


    
    <!-- ===============================================-->
    <!--    Google Fonts-->
    <!-- ===============================================--> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Hind+Madurai:wght@300;400;500;600;700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="css/fondant.css">
    <link rel="stylesheet" href="css/nav.css">

    <link rel="stylesheet" href="css/cssFooter/flaticon.css">
    <link rel="stylesheet" href="css/cssFooter/font-awesome.min.css">
    <link rel="stylesheet" href="css/cssFooter/style.css">
    <link rel="shortcut icon" href="img/nav-img/chocolat.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">


    <title>Recettte || Fondant au Chocolat </title>
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
            <div id="nav-choco-open-menu">
                <img src="img/nav-img/openmenu.png" alt="">
            </div>
        </nav>
        <div id="nav-choco">
            <img src="img/nav-img/banner_top.png" alt="">
        </div>

    <header class="bannerImg header-text mb-5" style="background-image: url('../../public/<?= $recipe->getImgUrl() ?>');">
        <h1 class="textBanner"><?= $recipe->getName() ?></h1>
    </header>
    

    <section class="pb-5 pt-6">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card card-span shadow-lg">
                <div class="card-body py-0 cardTitre">
                  <div class="row justify-content-center">
                    <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                      <h1 class="card-title mt-xl-3 mb-4 cardTitreMain">
                        Fondant au 
                        <span class="textTitre"> Chocolat</span>
                      </h1>
                      <p class="fs-1 description">
                      <?= $recipe->getDescription() ?>
                      </p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="cardPreparation">
            <div class="row">
                <div class="col-md-3">
                    <div >
                        <div class="card-body border border-dark colorCard">
                            <h4 class="card-text mb-5 text-center titreIngredients">Ingredients</h4>
                                <ul class="listeIngredients">
                                <?php foreach($recipe->getIngredients() as $ingredient): ?>
                            <li class="text-light"></i> <?= $ingredient ?></li>
                            <?php endforeach ?>                                   
                                </ul>
                              <br><br>

                        <p class="textColor text-center">Temps Total: <?= $recipe->getRestTimeToString() ?></p>    
                        <p class="textColor text-center">Préparation: <?= $recipe->getPreparationTimeToString() ?></p>    
                        <p class="textColor text-center">Cuisson: <?= $recipe->getCookingTimeToString() ?></p>
                        <div class="d-flex justify-content-between align-items-center p-4">
                          <div class="ratings">
                          <?php for($i = 2; $i <= $recipeAverage; $i+=2): ?>
                            <i class="fa-solid fa-star rating-color" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                            <?php endfor ?>
                            <?php if($recipeAverage % 2 !== 0): ?>
                            <i class="fa-solid fa-star-half rating-color" data-aos="zoom-in-right" data-aos-duration="500" data-aos-delay="<?= $i / 2 * 500 ?>"></i>
                            <?php endif ?>
                            <p><i class="fa-solid fa-message text-secondary"></i> <a class="text-light" href="#comment-section"><?= sizeof($recipe->getComments()) ?> commentaire<?= sizeof($recipe->getComments()) > 1 ? 's' : '' ?></a></p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card-body mb-5">
                    <h4 class="card-title text-center titreColorPrepa">Préparation</h4>
                        <ul>
                            <li class="listPrepa">
                                <h5 class="text-center textColorPrepa">Etape 1</h5>
                                <p class="text-center mb-5 textColorPrepa">Faire fondre le chocolat avec le beurre, soit au bain-marie à feu doux, soit au micro-ondes sur programme 'décongélation'.</p>
                            </li>
                            <li class="listPrepa">
                                <h5 class="text-center textColorPrepa">Etape 2</h5>
                                <p  class="text-center mb-5 textColorPrepa">Quand c'est bien fondu, mélanger et ajouter le sucre, les oeufs un par un, la farine, puis les noix de pécan hachées grossièrement.</p>
                            </li>
                            <li class="listPrepa">
                                <h5 class="text-center textColorPrepa">Etape 3</h5>
                                <p class="text-center mb-5 textColorPrepa">Bien mélanger et verser dans un moule carré de 20 cm (ou rectangulaire pas trop grand), chemisé de papier sulfurisé.</p>
                            </li>
                            <li class="listPrepa">
                                <h5 class="text-center textColorPrepa">Etape 4</h5>
                                <p class="text-center mb-5 textColorPrepa">Mettre au four préchauffé à 180°C pendant 25 min.</p>
                            </li>
                            <li class="listPrepa">
                                <h5 class="text-center textColorPrepa">Etape 5</h5>
                                <p class="text-center mb-5 textColorPrepa">Laisser refroidir et couper en carrés.</p>
                            </li>
                        </ul>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card-body">
                    <img src="img/11968609-Fondant-au-chocolat-dusted-with-cocoa-powder.jpg" alt="fondant" class="imgFondantRecette">
                </div>
            </div>            
    </section>

<article class="ps-container photoContainer">
    <section class="ps-photoset swiper-container hidden" id="carousel">
      <img class="ps-photo" src="img/front-view-delicious-chocolate-cake.jpg" />
      <img class="ps-photo" src="img/pexels-any-lane-5946037(1).jpg" />
      <img class="ps-photo" src="img/pexels-jose-prada-1063299555-20522414(1).jpg" /></section>
</article>

<div class="mainContainerForm formBg">
    <div class="container px-5 my-5">
        <p class="mb-5 text text-center titreForm">Si vous souhaitez partager votre commentaire, vous pouvez le faire ici :</p>
        <div class="d-grid">
        <button class="btn btn-md showForm" type="submit">Cliquez ici</button>
        </div>

        <form class="contact-form" id="comment-form" data-sb-form-api-token="API_TOKEN">
        <div class="form-floating mb-3 ">
          <input class="form-control" id="nom" name="username" type="text" placeholder="Nom" data-sb-validations="required" />
          <div class="invalid-feedback" data-sb-feedback="nom:required">Vueillez introuduir votre nom.</div>
      </div>
      <div class="form-floating mb-3">
          <input class="form-control" id="subjet" name="subjet" type="text" placeholder="Sujet" data-sb-validations="required" />
          <div class="invalid-feedback" data-sb-feedback="email:required">Veuillez introuduir votre sujet.</div>
      </div>
      <div class="form-floating mb-3">
          <textarea class="form-control" id="message" name="comment" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
          <div class="invalid-feedback" data-sb-feedback="message:required">Vueillez introuduiter votre message.</div>
      </div>
      
      
    <div class="star-rating mt-5 mb-2">
        <i class="fa fa-star " data-rating="1"></i>
        <i class="fa fa-star " data-rating="2"></i>
        <i class="fa fa-star " data-rating="3"></i>
        <i class="fa fa-star " data-rating="4"></i>
        <i class="fa fa-star " data-rating="5"></i>
      </div>
    <input type="hidden" id="rating" name="stars" value="0">
      <h5 class="etoiles mb-5">Que pensez vous de cette recette ?</h5>
      <div class="d-none" id="submitErrorMessage">
      <div class="text-center text-danger mb-3">Error sending message!</div>
    </div>
    <div class="d-grid">
        <button class="btn btn-sm disabled submitButton" id="submitButton" type="submit">Envoyez votre message</button>
    </div>
    </form>

        
    <section id="comment-section" style="background-color: #5A2314;">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="card text-body" style="background-color: #FDEBD5;">
                        <div class="card-body p-4">
                            <h4 class="mb-4 titreForm">Commentaires recents</h4>
                                <?php foreach ($recipe->getComments() as $comment): ?>
                                    <div class="d-flex flex-start">
                                        <img class="rounded-circle shadow-1-strong m-3"
                                            src="img/9440461.jpg" alt="avatar" width="60"
                                            height="60" />
                                    </div>
                                            <h6 class="fw-bold mb-1 textMsg"><?= $comment->getUsername() ?></h6>
                                    <div class="d-flex align-items-center mb-3">
                                                <p class="mb-2 ms-4 textMsg">
                                                    <?= $comment->getCreatedDate() ?>
                                                </p>
                                    </div>
                                    <div>
                                            <p class="mb-0 ms-4 textMsg">
                                                <?= $comment->getComment() ?>
                                            </p>
                                    <?php for ($i=0; $i<$comment->getStars(); $i++): ?>
                                        <i class="fa fa-star rating-color"></i>
                                <?php endfor ?>
                            <?php endforeach; ?>
                                    </div>
                        </div>  
                    </div>       
          
                        <hr class="my-0" /> 
                </div>
            </div>
        </div>
    </section>
            
            

</div>
</div>
<!-- Footer Section Begin -->
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="js/nav.js"></script>
<script src="js/recetteMaxi.js"></script>
<script src="js/commentaire.js"></script>
<script src="js/jsFooter/jquery-3.3.1.min.js"></script>
<script src="js/jsFooter/bootstrap.min.js"></script>
<script src="js/jsFooter/main.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>


</body>
</html>