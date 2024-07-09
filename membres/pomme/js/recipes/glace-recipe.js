/** Comment */

$(document).ready(function() {
    // Fonctionnalité de notation par étoiles
    $('.star-rating .fa-star').on('click', function() {
        var rating = $(this).data('rating');
        $('#rating').val(rating);
        $('.star-rating .fa-star').each(function() {
            if ($(this).data('rating') <= rating) {
                $(this).addClass('checked');
            } else {
                $(this).removeClass('checked');
            }
        });
    });

    // Soumission du formulaire
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();
        
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var comment = $('#comment').val();
        var rating = parseInt($('#rating').val()); // Asigurăm că rating-ul este un număr întreg


        if (rating===0){
            $("#error-message p").text("Veuillez insérer un nombre d'étoiles");
            $("#error-message").slideDown(1000).css("display", "flex");
            return;
        }
        // Réinitialiser le formulaire
        $('#comment-form')[0].reset();
        $('#rating').val(0);
        $('.star-rating .fa-star').removeClass('checked');
        fetch("./index.php", {
            method: "POST",
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify({
                "username": name,
                "subject": subject,
                "comment": comment,
                "stars": rating
            })
        }).then(res => {
            res.json().then((res)=>{
                if (res.error){
                    $("#error-message p").text(res.error);
                    $("#error-message").slideDown(1000).css("display", "flex");
                }else{
                    let stars = "";
                    for(let i=0;i<res.stars;i++){
                        stars+='<i class="fa fa-star checked"></i>';
                    }
                    const commentHtml = `
                                <div class="comment">
                                    <div>
                                        <strong>${res.username}</strong>
                                        <span class="comment-date">${res.created_date}</span>
                                    </div>
                                    <div class="comment-rating">
                                        ${stars}
                                    </div>
                                    <div style="margin-bottom: 0.5em;">
                                        <strong>${res.subject}:</strong>
                                    </div>
                                    <div>
                                        ${res.comment}
                                    </div>
                                </div>
                    `
                    $("#error-message").slideUp(1000);
                    $('#comments-list').prepend($(commentHtml).hide())
                    $(".comment").eq(0).fadeIn(1000);
                    //$(".comment .comment-date").eq(0).text(res.created_date);
                }
            })
        });
    });

    // Fonction pour générer les étoiles
    function getStars(rating) {
        var starsHtml = '';
        for (var i = 1; i <= rating; i++) {
            if (i <= rating) {
                starsHtml += '<i class="fa fa-star checked"></i>';
            } else {
                starsHtml += '<i class="fa fa-star"></i>';
            }
        }
        return starsHtml;
    }

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
});