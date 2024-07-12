<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <title>Site de recette</title>



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

    <!-- ===============================================-->
    <!--    Google Fonts-->
    <!-- ===============================================--> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Hind+Madurai:wght@300;400;500;600;700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/footer/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/footer/flaticon.css" type="text/css">
    <link rel="stylesheet" href="assets/css/footer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/footer/style.css" type="text/css">
  </head>

  <body>
    <div id="place-holder-nav" style="display: none;">
    </div>
    <nav>
        <div id="nav-links">
            <a href="#" id="logo"><img src="assets/img/logo.png" alt="" width="50"></a>
            <div id="container-burger">
                <img src="assets/img/nav-img/chocolat.png" alt="">
            </div>
            <div id="links">
                <a href="#">Accueil</a>
                <a href="javascript:void(0)" id="nav-recipes-link">Recettes<i class="fa-solid fa-arrow-down" style="margin-left: 10px;"></i></a>
                <a href="#">Contact</a>
            </div>
        </div>
        <div id="nav-recipes-container">
            <ul id="nav-recipes" style="display: none;">
                <a href="../membres/sebastien/"><li>Mousse au chocolat</li></a>
                <a href="../membres/julian/"><li>Polish cake</li></a>
                <a href="../membres/maxim/"><li>Fondant au Chocolat</li></a>
                <a href="../membres/laura"><li>Éclat Choco Amande</li></a>
                <a href="../membres/charly/"><li>Cookies au chocolat</li></a>
                <a href="../membres/kevin/"><li>Glace au chocolat</li></a>
                <a href="../membres/pomme/"><li>Choco Pomme</li></a>
                <a href="../membres/simona/pageSimona2.html"><li>Brownie framboise</li></a>
                <a href="../membres/simona/pageSimona.html"><li>Amandina Cake</li></a>
                <a href="../membres/enez/"><li>Cupavci Cake</li></a>
            </ul>
            <div id="previews"></div>
        </div>
        <div id="nav-choco-open-menu" style="display: none;">
            <img src="assets/img/nav-img/openmenu.png" alt="">
        </div>
    </nav>
    <div id="nav-choco">
        <img src="assets/img/nav-img/banner_top.png" alt="">
    </div>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      

      <section class="py-5 overflow-hidden header-text" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="ms-5 img-landing-banner" href="#!"><img class="img-fluid" src="assets/nouvelles img/browni2.jpg" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <h1 class="display-1 ms-5 fontBanner">Coeur Fondant</h1>
              <h2 class="fontBanner2 ms-5">"Cœur de Chocolat : Laissez-vous envoûter par l'harmonie parfaite de saveurs exquises, soigneusement élaborées pour faire battre votre cœur de plaisir et vous offrir des moments de pure gourmandise."</h2>
            </div>
          </div>
        </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-2 pb-5 mt-5" style="background-color: #392313;">
        <div class="container">
          <div class="col-lg-7 mx-auto text-center">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-white mt-5 fontBanner">Recettes populaire</h5>
          </div>
          <div class="row h-100 gx-2 mt-5">
            <?php foreach($bestRecipes as $recipe): ?>
              <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4">
              <div class="card card-span h-100 rounded-3">
                <div class="position-relative">
                  <img
                    class="img-fluid rounded-3 w-100"
                    src="<?= $recipe['image_url'] ?>" alt="..." style="height: 250px;"/>
                </div>
                <div class="card-body px-0">
                  <h5 class="fw-bold text-1000 text-truncate ps-3">
                    <?= $recipe['name'] ?>
                  </h5>
                  <div class="star-rating ps-3">
                    <?php $stars = 5; ?>
                    <?php for($i = 2; $i <= $recipe['average_stars']; $i += 2): ?>
                      <?php --$stars; ?>
                      <i class="fa fa-star <?= $i <= $recipe['average_stars'] ? 'text-warning' : '' ?>"></i>
                    <?php endfor ?>
                    <?php if($recipe['average_stars'] % 2 !== 0): ?>
                      <?php --$stars; ?>
                      <span class="position-relative">
                        <i class="fa fa-star-half text-warning"></i>
                        <i class="fa fa-star-half position-absolute" style="transform: scaleX(-1); left: 0px; top: 0.2rem;"></i>
                      </span>
                    <?php endif ?>
                    <?php for($i = 0; $i < $stars; $i++): ?>
                      <i class="fa fa-star"></i>
                    <?php endfor ?>
                </div>
                </div>
                <a class="stretched-link" href="../membres/<?= $recipe['membre'] ?>"></a>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        <!-- end of .container-->
      </section>
 
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card card-span mb-3 shadow-lg mt-5 mb-3">
                <div class="card-body px-0 py-0">
                  <div class="row justify-content-center">
                    <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="./img/4.jpg" alt="..." /></div>
                    <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                      <h1 class="card-title mt-xl-5 mb-4">Top 1 <span class="color">Macaron au chocolat fourée au marrons </span></h1>
                      <p class="fs-1">Comment faire les macarons au chocolat avec une délicieuse ganache au marrons. Cette recette est très facile à la maison et inrratable pour avoir des beaux macarons croquants et au bon goût de chocolat</p>
                      <div class="d-grid bottom-0"><a class="btn btn-lg mt-xl-6 text-white" style="background-color: #392313;" href="#!">En savoir plus<i class="fas fa-chevron-right ms-2"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5" style="background-color: #392313;">

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card card-span shadow-lg">
                <div class="card-body px-0 py-0">
                  <div class="row justify-content-center">
                    <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-0 order-md-1"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-end rounded-md-top-0" src="./img/2.jpg" alt="..." /></div>
                    <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                      <h1 class="mt-xl-5 mb-4">Top 2 <span  class="color">Truffes au chocolat</span></h1>
                      <p class="fs-1">Les truffes au chocolat sont des parfaits petits cadeaux à offrir à Noël. Et si vous les faisiez maison? Rien de plus facile grâce à notre recette.</p>
                      <div class="d-grid bottom-0"><a class="btn btn-lg mt-xl-6 text-white" style="background-color: #392313;" href="#!">En savoir<i class="fas fa-chevron-right ms-2 text-white"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-0">

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card card-span mb-3 shadow-lg mt-5">
                <div class="card-body px-0 py-0">
                  <div class="row justify-content-center">
                    <div class="col-md-5 col-xl-7 col-xxl-8 g-0 order-md-0"><img class="img-fluid w-100 fit-cover h-100 rounded-top rounded-md-start rounded-md-top-0" src="./img/1.jpg" alt="..." /></div>
                    <div class="col-md-7 col-xl-5 col-xxl-4 p-4 p-lg-5">
                      <h1 class="card-title mt-xl-5 mb-4">Top 3 <span class="color">Cake au chocolat et au amandes grillée</span></h1>
                      <p class="fs-1">Facile à préparer, le cake aux amandes fait partie des grands classiques du goûter. Cette recette de gâteau facile peut aussi s'adapter à un petit-déjeuner, un brunch ou même être servi pour le dessert, accompagné d'une salade de fruits par exemple.</p>
                      <div class="d-grid bottom-0"><a class="btn btn-lg text-white  mt-xl-6" style="background-color: #392313;" href="#!">En savoir plus<i class="fas fa-chevron-right ms-2"></i></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section>


      <section class="py-0" style="background-color: #392313;">
        <div class="bg-holder">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
              <h1 class="fw-bold mb-4 text-white fs-6 fontBanner">Cœur de Chocolat : <br> Prêt à ajouter une nouvelle recette et à faire battre votre cœur encore plus fort ? </h1><a class="btn btn-danger" href="#">RETOUR VERS LE HAUT<i class="fas fa-chevron-right ms-2"></i></a>
            </div>
          </div>
        </div>
      </section>
    </main>
      <!-- Footer Section Begin -->
    <footer class="footer set-bg mt-5" data-setbg="assets/img/imgfooter/footer-bg.jpg"style="background-repeat: no-repeat;background-size: cover;">
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
                          <a href="#"><img src="assets/img/imgfooter/logo 2.png" style="width: 150px;" alt=""></a>
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
                    <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Sebastien & Kevin</a>
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
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
   
    <script src="assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/jsfooter/main.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap"
      rel="stylesheet"
    />
  </body>
</html>
