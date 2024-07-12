// Soumission du formulaire
$('#comment-form').on('submit', function(e) {    
    e.preventDefault();
    const username = $('input[name=username]').val().trim();
    const subject = $('input[name=subject]').val().trim();
    const comment = $('textarea[name=comment]').val().trim();
    const stars = parseInt($('input[name=stars]').val());

  $(".error-username").hide();
  $(".error-subject").hide();
  $(".error-comment").hide();
  $(".error-stars").hide();
  $(".error-form").hide();

  if (!username.length) {
    $(".error-username").text("* Le nom ne doit pas être vide.").show();
    return;
  }
  if (!subject.length) {
    $(".error-subject").text("* Le sujet ne doit pas être vide.").show();
    return;
  }
  if (!comment.length) {
    $(".error-comment").text("* Le message ne doit pas être vide.").show();
    return;
  }
  if (stars < 1 || stars > 5) {
    $(".error-stars")
      .text("* Merci de mettre une note a votre commentaire.")
      .show();
    return;
  }

  fetch("index.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: new URLSearchParams({
      api: true,
      username,
      subject,
      comment,
      stars,
    }),
  })
    .then((data) => data.json())
    .then(handleResponse)
    .catch(handleError)
    .finally(resetForm);
});
