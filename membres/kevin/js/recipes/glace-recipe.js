/** Comment */

$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive:{
            0:{
                items:1,
                stagePadding: 0, // Supprime le padding pour les petits écrans
                margin: 0, // Supprime la marge pour les petits écrans
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    AOS.init({
        offset: 100,
        duration: 2000,
        once: true,
    });

    /** img-steps */
    addEventListener('resize', function(){
        $('.container-img-steps').each(function(){
            $(this).css('height', window.innerWidth > 900 ? $(this).parent().prop('scrollHeight') + 'px' : '400px');
        });
    })
    $('.container-img-steps').each(function(){
        $(this).css('height', window.innerWidth > 900 ? $(this).parent().prop('scrollHeight') + 'px' : '400px');
    });
    /** end img-steps */

    /** Corner Chocolat */
    const $cream1 = $('#ice-cream1');
    const $cream2 = $('#ice-cream2');
    const $corner = $('#corner');

    function checkCornerIceCream(){
        let posY = window.scrollY - 500;
        posY = posY < 0 ? 0 : posY;

        let posYCream = posY <= 600 ? posY : 600;
        $cream1.css({
            'top': posYCream
        })

        const actualTopCream2 = +$cream2.css('top').replace('px', '');
        if(actualTopCream2 >= 540 && actualTopCream2 <= 640){
            $cream2.css({
                'top': posYCream + 40
            })
        }else{
            let pos = 1200 - posYCream + 40;
            if(posYCream >= 500){
                pos = pos < 540 ? posYCream + 40 : pos;
            }
            
            $cream2.css({
                'top': pos + 'px'
            })
        }
        
        let posYCorner = posY <= 700 ? posY : 700;
        $corner.css({
            'top': 1400 - posYCorner + 20 + 'px'
        })
    }

    addEventListener('scroll', checkCornerIceCream);
    checkCornerIceCream();

    /** end Corner Chocolat */
    
    /** Comment */
    let commentBtnIsVisible = false;
    $('#comment-btn').click(function(){
        const $commentBtn = $(this);
        const $commentForm = $('#comment-form');
        commentBtnIsVisible = !commentBtnIsVisible;
        $commentForm.slideToggle(function(){
            if(!commentBtnIsVisible) $commentBtn.css('margin-bottom', '0px');
        });
        if(commentBtnIsVisible)
            $commentBtn.css('margin-bottom', '50px');
    });

    // Fonctionnalité de notation par étoiles
    $('.star-rating .fa-star').on('click', function() {
        var rating = $(this).data('rating');
        $('#rating').val(rating);
        $('.star-rating.position-relative > .fa-star').each(function() {
            if ($(this).data('rating') <= rating) {
                $(this).removeClass('fa-regular').addClass('fa').addClass('checked');
            } else {
                $(this).removeClass('fa').addClass('fa-regular').removeClass('checked');
            }
        });
    });

    // Fonction pour échapper les caractères HTML dans les commentaires
    function escapeHtml(text) {
        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;'
        };
        return text.replace(/[&<>"'`=\/]/g, function(m) { return map[m]; });
    }
    /** end comment */

    /** Quill editor */
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],             // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction
             // dropdown with defaults from theme
        [{ 'align': [] }],
      
        ['clean']                                         // remove formatting button
      ];
      
      
      var options = {
        modules: {
          toolbar: toolbarOptions,
        },
        theme: 'snow'
      };
    new Quill('#comment', options);
    /** end Quill editor */

});

function commentForm(){
    $('input[name=comment]').val($('#comment .ql-editor').html());
}