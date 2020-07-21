<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Mon Site</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>


<div id="mainpage" class="container my-4">

    <div id="messages" class="alert" style="display: none; position: relative;"></div>

    <div class="jumbotron">
        <h1>Formulaire de contact</h1>
    </div>

    <form id="sendmail" action="traitement-email.php" method="POST">

        <div class="form-group">
            <label for="name">Votre nom</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Votre adresse email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="_replyto">
            <small id="emailHelp" class="form-text text-muted">Message pour l'utilisateur</small>
        </div>

        <div class="form-group">
            <label for="message">Votre adresse email</label>
            <textarea name="message" id="message" cols="30" rows="5" style="resize:none" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>

    </form>

</div><!-- end of container -->


<script>
      
    document.querySelector('#sendmail').addEventListener('submit', e => {
        e.preventDefault()
        let url = e.target.getAttribute('action')

        if(e.target.name.value != '' && e.target._replyto.value != '' && e.target.message.value != '') {
            const xhr = new XMLHttpRequest()
        
            xhr.open('POST', url)
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = () => {
                if(xhr.readyState === 4) {
                    if(xhr.status === 200) {
                        let div = document.querySelector('#messages')
                        div.classList.add('alert-success')
                        div.innerHTML = xhr.responseText
                        div.style.display = "block"
                    }
                }
            }

            xhr.send(`name=${e.target.name.value}&&email=${e.target._replyto.value}&&message=${e.target.message.value}`)

        } else {

            alert('Veuillez remplir tous les champs!')
        }

    });
        
</script>
  </body>
</html>
