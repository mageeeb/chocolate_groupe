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

function handleResponse(response){
    if(Array.isArray(response)){
        response = response[0];
        // Personnel Kevin
        const commentHtml = `
            <div class="comment">
                <div class="d-flex flex-column flex-md-row gap-2 gap-md-0 justify-content-between pe-md-5 pb-3 border-bottom"><div>De : <strong>${response.username}</strong></div> <div>Posté le : <span class="comment-date">${response.created_date}</span></div></div>
                <div class="d-flex flex-column-reverse justify-content-md-between pe-md-5 flex-md-row my-3 gap-4 gap-md-5">
                    <div class="fw-bold" style="color: rgb(var(--main-color))">
                        Sujet : ${response.subject}
                    </div>
                    <div class="comment-rating">
                        <span>Note : </span>
                        ${getStars(+response.stars)}
                    </div>
                </div>
                <div>${response.comment}</div>
            </div>
        `;
        /*const commentHtml = `
            <div class="comment"> 
                <div class="d-flex justify-content-between"><div><strong>Nom : </strong>  ${response.username}  </strong></div> <span class="comment-date">  ${response.created_date}  </span></div> 
                <div><strong>sujet : </strong> ${response.subject}  </div> 
                <div><strong> Message : </strong> ${response.comment}  </div> 
                <div class="comment-rating">  ${getStars(+response.stars)}  </div> 
            </div>
        `;*/
        $('#comments-list h2:first').after($(commentHtml).hide().fadeIn(1000));
    }else{
        for(const error in response)
            $('.'+error).text(response[error]).show();
    }
    console.log(response);
}

function resetForm(){
    $('#comment-form')[0].reset();
    $('#rating').val(0);
    //$('.star-rating .fa-star').removeClass('checked');

    // Personnel Kevin
    $('#comment .ql-editor').html('');
    $('.star-rating .fa-star').removeClass('checked', 'fa').addClass('fa-regular');
}

function handleError(error){
    console.log(error)
    $('.error-form').text(error);
}

// Fonction pour générer les étoiles
function getStars(rating) {
    let starsHtml = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            starsHtml += '<i class="fa fa-star checked"></i>';
        } else {
            starsHtml += '<i class="fa-regular fa-star"></i>';
        }
    }
    return starsHtml;
}

// Personnel Kevin
function commentForm(){
    $('textarea[name=comment]').html($('#comment .ql-editor').html());
}