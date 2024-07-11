function handleResponse(response){
    if(Array.isArray(response)){
        response = response[0];
        var commentHtml = '<div class="comment">' +
        '<div class="d-flex justify-content-between"><div><strong>Nom : </strong>' + response.username + '</strong></div> <span class="comment-date">' + response.created_date + '</span></div>' +
        '<div><strong>sujet : </strong>'+ response.subject + '</div>' +
        '<div><strong> Message : </strong>' + response.comment + '</div>' +
        '<div class="comment-rating">' + getStars(response.stars) + '</div>' +
      '</div>';

        $('#comments-list').prepend($(commentHtml).hide().fadeIn(1000));
    }else{
        for(const error in response)
            $('.'+error).text(response[error]).show();
    }
    console.log(response);
}

function resetForm(){
    $('#comment-form')[0].reset();
    $('#rating').val(0);
    $('.star-rating .fa-star').removeClass('checked');
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