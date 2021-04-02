<html>
    <head>
        <link href="StyleMDPOublie2.css" rel="stylesheet">
        <meta charset ="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Mot-de-passe-oublie</title>
        
    </head>
    <body>
       
        <form action="php_mdpoublie2.php">
        <div class="container">
            <label for="motdepasse"> Mot de passe </label>
            <input type="password" id="psw" name="psw" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit y contenir au moins un caractère spéciale , une lettre en capital , un nombre et doit faire au minimum 8 caractere de longs" required ><br/>
          
              
            <input type="checkbox" onclick="lookpsw()">voir mdp<br/>
            
            <label for ="confirm"> Confirmation mot de passe</label>
            <input type="password" id="psw2" name="psw" pattern = "le mot de passe doit etre le même" required ><br />

            <input type="submit" value="Envoyer" /><br />
        </div>
        <div id="message">
            <h3>Le mot de passe doit comporter les informations suivantes :</h3>
            <p id="lettre" class='invalid'> Une <b>lettre en minuscule</b></p>
            <p id="capital" class='invalid'> Une <b>lettre en majuscule</b></p>
            <p id="nombre" class='invalid'>Un <b>chiffre</b></p>
            <p id="longueur" class='invalid'> Une <b>longueur d'au mois 8 caractere</b></p>
        </div>

        </form>

      
      
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("lettre");
var capital = document.getElementById("capital");
var number = document.getElementById("nombre");
var length = document.getElementById("longueur");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validation des minuscules
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validation des majuscules
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validation des chiffres
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validation de la longeur
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  //fonction pour affichage de la saisi du mdp 


  function lookpsw()
  {
    var x = document.getElementById("psw");
    if(x.type === "password")
    {
      x.type = "text";
    }
    else
    {
      x.type ="password";
    }
  }
}
</script>
    </body>
</html>