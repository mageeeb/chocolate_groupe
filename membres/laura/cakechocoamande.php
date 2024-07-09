<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=">
    <link rel="icon" type="image/x-icon" href="img/nav-img/th-r.jpeg">
    <title>Éclat choco-Amande</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    
    <link rel="stylesheet" href="css/footer/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/footer/style.css" type="text/css">
    <link rel="stylesheet" href="css/nav.css">
    
    <style>
        body{
  background-color: rgb(247, 220, 194);
        }

    
  

  .recipe{
    box-shadow: black;
  }
    .glace-banner{
    position: relative;
    background-image: url("img/recipes/recipes-img/gateau1.jpg");
    background-size: cover;
    background-position: center;
    }

  @media screen and (width > 1400px){
  .header-text{
    background-position-x: center;
    background-position-y: 45%;
    margin-left: auto;
    margin-right: auto;
    background-size: cover;
    
    
  }
  }
     </style>


</head>
<body>
    <!----navbar---->
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
   
    



    

    


    <header class="header-text glace-banner"style="background-image: url('<?= $recipe->getImgUrl() ?>');">
        <p><?= $recipe->getName() ?></p>
    </header>
    <div class="gateaushadow">
    <div class="recipe">
        <div class="recipe_image">
            <img src="<?= $recipe->getSubRecipes()[0]->getImgUrl() ?>" alt="cakechoco" />
        </div>
        
        <div class="recipe_content">
            <div class="recipe_content_heading">
                <h1 class="usg_text usg_text-heading"><?= $recipe->getName() ?></h1>
            </div>
            
            <div class="recipe_content_left-column">
                <div class="recipe_content_left-column_time">
                    <div class="recipe_content_left-column_time_serves">
                        <p class="usg_text usg_text-times"><span class="usg_text-times--text">Servis:</span> <?= $recipe->getNbPeople() ?> personne<?= $recipe->getNbPeople() > 1 ? 's' : '' ?></p>
                    </div>
                    <div class="recipe_content_left-column_time_prep">
                        <p class="usg_text usg_text-times"><span class="usg_text-times--text">Preparation:</span> <?= $recipe->getPreparationTimeToString() ?></p>
                    </div>
                    <div class="recipe_content_left-column_time_cook">
                        <p class="usg_text usg_text-times"><span class="usg_text-times--text">Cook:</span> <?= $recipe->getCookingTimeToString() ?></p>
                    </div>
                    <div class="recipe_content_left-column_time_cook">
                        <p class="usg_text usg_text-times"><span class="usg_text-times--text">Degré de difficulté:</span>Facile</p>
                    </div>
                    
                </div>
    
                <div class="recipe_content_left-column_ingredients">
                    <div class="recipe_content_left-column_ingredients_title">
                        <h3 class="usg_text usg_text-title">Ingredients</h3>
                        <ul class="usg_list recipe_content_left-column_ingredients_list">
                            <?php foreach($recipe->getIngredients() as $ingredient): ?>
                                <li class="usg_list_item recipe_content_left-column_ingredients_list_item usg_text-regular">
                                    <span class="recipe_content_left-column_ingredients_list_item_main"><?= $ingredient ?></span>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php foreach($recipe->getSubRecipes() as $subRecipe): ?>
                <div class="recipe_content_right-column">
                    <div class="recipe_content_right-column_description">
                        <h3 class="usg_text usg_text-title"><?= $subRecipe->getTitle() ?></h3>
                        <ol class="usg_list recipe_content_right-column_steps_list">
                            <?php foreach($subRecipe->getInstructions() as $key => $instruction): ?>
                                <li class="usg_list_item recipe_content_right-column_steps_list_item"><?= $instruction ?></li>
                            <?php endforeach ?>
                        </ol>
                    </div>
                </div>
                <?php endforeach ?>
                <div class="recipe_content_right-column_features">
                    <ul class="usg_list recipe_content_right-column_features_list">
                        <li class="usg_list_item recipe_content_right-column_features_list_item">Dégustez</li>
                    </ul>
                </div>
        </div>
        
    </div>

</div>


        <div class="feedback-form">
            <h2>Vous avez aimez?</h2>
            <form id="feedbackForm">
                <div class="rating">
                    <!--étoile -->
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1">&#9733;</label>
                </div>
                <div class="comment">
                    <label for="comment">Partagez nous votre avis !</label><br>
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer</button>
            </form>
        </div>



<!-- commentaire Principal -->
<div class="comments-container">
    <h1>Commentaire<a href="http://creaticode.com"></a></h1>

    <ul id="comments-list" class="comments-list">
        <li>
            <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Bruno Jemenfou</a></h6>
                        <span>il y a 20 minute</span>
                        <i class="fa fa-reply"></i>
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">
                        Vraiment très bon. Mon mari est intolérant à la caséine (produits laitiers), on a remplacé le beurre par de l’huile de coco et ça va super bien
                    </div>
                </div>
            </div>
            <!-- 2em commantaire -->
            <ul class="comments-list reply-list">
                <li>
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                    
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name"><a href="http://creaticode.com/blog">Lena Batlesreins</a></h6>
                            <span>il y a 10 minute</span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                            J'ai beaucoup aimé le faire seul et avec mes enfants
                            La plupart du temps j'en fait est je me régale
                            Parfait , merci beaucoup
                        </div>
                    </div>
                </li>

                <li>
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
                    
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">Bruno Jemenfou</a></h6>
                            <span>Il y a 9 minute</span>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                            Recette parfaite !
                            A mi-chemin entre le moelleux et le fondant, nous l'avons dégusté avec de la crème anglaise.
                            C'est un régal
                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <div class="comment-main-level">
                <!-- Avatar -->
                <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name"><a href="http://creaticode.com/blog">Lena Batlesreins</a></h6>
                        <span>il y a 7 minute</span>
                        <i class="fa fa-reply"></i>
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">
                        Trop bon! Je le fais met dans un moule à cake et je laisse cuire 5 à 10 minutes de plus en surveillant la cuisson pour ne pas qu'il soit brulé.
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

    
        <script src="./script.js"></script>
    </body>

<script>document
	.getElementById("feedbackForm")
	.addEventListener("submit", function (event) {
		event.preventDefault();
		var rating = document.querySelector('input[name="rating"]:checked').value;
		var comment = document.getElementById("comment").value;

		
		console.log("Rating: ", rating);
		console.log("Comment: ", comment);

				
	});
</script>

<!--formulaire -->
    <section class="formulaire">
        <div class="container">
          <div class="contact_box">
            <h3>Informations</h3>
            <div class="content_box">
              <ul>
                
                <li><i class="fas fa-phone-square"></i>
                  <p>04 07 05 08 06</p>
                </li>
                <li><i class="fas fa-envelope-square"></i>
                  <p>CoeurFondant.hotmail.com</p>
                </li>
                <li><i class="fas fa-map-marker-alt"></i>
                  <p>Avenue du parc 89<br>1060 Saint-Gilles</p>
                </li>
              </ul>
            </div>
          </div>
          <form id="form">
            <h3>Nous Contacter</h3>
            <div class="form_container">
              <div class="input_container">
                <div class="input_bloc">
                  <div class="input_box">
                    <input type="text" placeholder="Nom" required>
                  </div>
                  <div class="input_box">
                    <input type="text" placeholder="Prénom" required>
                  </div>
                </div>
                <div class="input_bloc">
                  <div class="input_box">
                    <input type="text" placeholder="Pays">
                  </div>
                  <div class="input_box">
                    <input type="text" placeholder="Ville">
                  </div>
                </div>
                <div class="input_bloc">
                  <div class="input_box">
                    <input type="email" placeholder="Email" required>
                  </div>
                  <div class="input_box">
                    <input type="text" placeholder="Téléphone">
                  </div>
                </div>
              </div>
            
              <div class="button">
                <input type="submit" value="Envoyer">
              </div>
            </div>
          </form>
        </div>
      </section>

      
    <!-- Footer -->
    
    
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
    <footer class="footer set-bg mt-5" data-setbg="footer/imgfooter/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                       <h6>Recette ...</h6>
                       <ul class="servi">
                          <li><a href="Javascript:void(0)"> recette1</a></li>
                          <li><a href="Javascript:void(0)"> Éclat choco-Amande</a></li>
                          <li><a href="Javascript:void(0)"> recette3</a></li>
                          <li><a href="Javascript:void(0)"> recette4</a></li>
                          <li><a href="Javascript:void(0)"> recette5</a></li>
                       </ul>
                    </div>
                 </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="footer/imgfooter/logo 2.png" style="width: 150px;" alt=""></a>
                        </div>
                        <p> +32 123 890 <br>
                            Éclat choco-Amande@gmail.com <br>
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
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Éclat choco-Amande de Laura</a>
                          
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

    <script src="footer/js/jsfooter/jquery-3.3.1.min.js"></script>
    <script src="footer/js/jsfooter/bootstrap.min.js"></script>
    <script src="footer/js/main.js"></script>
</body>

</html>