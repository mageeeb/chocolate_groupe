// Only God and me know what i'm doing
$(function(){
    const $nav = $('nav');
    const $navChocoOpenMenu = $('#nav-choco-open-menu'); // Image opening recipes list
    const $placeHolderNav = $('#place-holder-nav'); // Debug nav fixed moving all content html
    const $navRecipes = $('#nav-recipes'); // List of recipes
    const $previews = $('#previews'); // Show image of the recipe list when hover the <li>
    const $links = $('#links'); // Only in phone mode. It is the menu of burger mode
    let scrollNav = false;
    let menuNavVisible = false;
    let menuIsOpening = false;
    let linksIsOpening = false;
    let phoneMode;
    checkPhoneMode();
    fixNav();
    addEventListener('scroll', fixNav);
    addEventListener('resize', checkPhoneMode);
    function fixNav(){
        if(!scrollNav && window.scrollY > $('.header-text').height() + 100){
            scrollNav = true;
            $placeHolderNav.show();
            $nav.addClass('nav-fixed');
            hideMenuNav();
        }else if(scrollNav && window.scrollY <= $('.header-text').height() + 100){
            scrollNav = false;
            $placeHolderNav.hide();
            $nav.removeClass('nav-fixed');
        }
    }
    function hideMenuNav(){
        menuNavVisible = false;
        $navChocoOpenMenu.stop().css('top', '-150px').hide();
        $navRecipes.hide();
        if(phoneMode)
            $links.slideUp(function(){
                linksIsOpening = false;
            });
    }
    function checkPhoneMode(){
        phoneMode = window.innerWidth < 1000;
        if(phoneMode){
            if(menuNavVisible){
                $links.show();
                $navChocoOpenMenu.css('top', '153.64px');
            } 
            else{
                $links.hide();
                $navChocoOpenMenu.hide();
            } 
        }else{
            if(menuNavVisible) $navChocoOpenMenu.css('top', '0px');
            else $navChocoOpenMenu.css('top', '-150px');
            $links.show();
        }
        
    }
    function showNavMenu(){
        if(menuIsOpening) return;
        $navChocoOpenMenu.show();
        menuIsOpening = true;
        menuNavVisible = !menuNavVisible;
        if(!menuNavVisible) $previews.css('background-image', `url('')`)
        $navRecipes.slideToggle(2000, function(){
            menuIsOpening = false;
            if(!menuNavVisible)
                $navChocoOpenMenu.hide();
        });
        $navChocoOpenMenu.animate({
            'top': !menuNavVisible ? '-150px' : (phoneMode ? '153.64px' : '0px')
        }, 2000);
    }
    function showLinks(){
        if(linksIsOpening) return;
        linksIsOpening = true;
        if(menuNavVisible){
            hideMenuNav();
        }else $links.slideToggle(function(){
            linksIsOpening = false;
        });
    }
    $('#nav-recipes-link').click(showNavMenu);
    $navRecipes.on('mouseleave', ()=>$previews.hide());
    $('#container-burger img').click(showLinks);
    $('#nav-choco').animate({
        'top': '75px'
    }, 10000);

    $navRecipes.children().each(function(i){
        let url;
        const basePath = "../../public/assets/img/recipe/";
        switch(i){
            case 0:
                url = basePath+'Mousse-au-chocolat.jpg';
                break;
            case 1:
                url = basePath+'murzynekgal1.webp';
                break;
            case 2:
                url = basePath+'fondant-au-chocolat.png';
                break;
            case 3:
                url = basePath+'eclat-au-chocolat.jpg';
                break;
            case 4:
                url = basePath+'cookies.jpeg';
                break;
            case 5:
                url = basePath+'glace-chocolat.jpeg';
                break;
            case 6:
                url = basePath+'chocopomme.jpg';
                break;
            case 7:
                url = basePath+'brownieFramboise.jpg';
                break;
            case 8:
                url = basePath+'amandina.jpg';
                break;
            case 9:
                url = basePath+'Cupavci.jpeg';
                break;
        }
        $(this).on('mouseover', ()=>{
            if(!menuNavVisible || phoneMode) return;
            $previews.show();
            setTimeout(() => {
                $previews.css('background-image', `url('${url}')`);
            }, 1);
        });
    })

});

// Now only God knows.