<?php
include("header.html");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Archive Province</title>
  <style>
    /* Styles CSS */
    body {
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
    }
    
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }
    
    input[type="submit"], input[type="button"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    #loginForm input[type="submit"],
  #loginForm input[type="button"] {
    margin-bottom: 10px;
  }

  /* Ajouter de l'espace entre les boutons "Envoyer un e-mail de récupération" et "Annuler" */
  #forgotPasswordForm input[type="submit"],
  #forgotPasswordForm input[type="button"] {
    margin-bottom: 10px;
  }
  </style>
</head>
<body>
  <div class="container">
    <h2>Archive Province</h2>
    <form id="loginForm">
      <div>
        <label>Nom de l'utilisateur :</label>
        <input type="text" id="username" name="nom_complet" placeholder="Salma" required>
      </div>
      <div>
        <label>Choix de division :</label>
        <input type="text" id="serviceChoice" name="choix_de_service" placeholder="SCE" required>
      </div>
      <div>
        <label>Mot de passe :</label>
        <input type="password" id="password" name="mot_de_passe" required>
      </div>
      <div>
        <input type="submit" value="Se connecter">
      </div>
      <div>
        <input type="button" value="Forgot Password" onclick="showForgotPasswordForm()">
      </div>
    </form>

    <!-- Formulaire pour récupérer le mot de passe -->
    <!-- Formulaire pour récupérer le mot de passe -->
    <form id="forgotPasswordForm" style="display: none;" method="post">
      <div>
        <label>Nom complet de l'utilisateur :</label>
        <input type="text" id="fullName" name="fullName" placeholder="Salma" required>
      </div>
      <div>
        <label>Adresse e-mail :</label>
        <input type="text" id="email" name="email" placeholder="example@example.com" required>
      </div>
      <div>
        <label>Choix de division :</label>
        <input type="text" id="division" name="division" placeholder="SCE" required>
      </div>
      <div>
        <input type="button" value="Envoyer un e-mail de récupération" onclick="retrievePassword()">
        <input type="button" value="Annuler" onclick="cancelRecovery()">
      </div>
    </form>

    <!-- Espace pour afficher les messages de statut -->
    <div id="statusMessage"></div>
  </div>
  <script>
    // Script JavaScript pour la gestion du formulaire de connexion
    var loginForm = document.getElementById("loginForm");
    
    loginForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Empêche le rechargement de la page
      
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var serviceChoice = document.getElementById("serviceChoice").value; // Récupère le choix de service

      // Vérification des identifiants de connexion
      if (username === "khaoula" && serviceChoice === "asa" && password === "asa") {
        // Redirection vers la page admin après une connexion réussie
        window.location.href = "admin.html";
      } else if (username !== "" && serviceChoice === "SSIC" && password === "SSIC1") {
        // Redirection vers la page du service SSIC après une connexion réussie
        window.location.href = "SSIC.html";
      } else if (username !== "" && serviceChoice === "SPS" && password === "SPS2") {
        // Redirection vers la page du service SPS après une connexion réussie
        window.location.href = "SPS.html";
      } else if (username !== "" && serviceChoice === "DCL" && password === "DCL3") {
        // Redirection vers la page du service DCL après une connexion réussie
        window.location.href = "DCL.html";
      } else if (username !== "" && serviceChoice === "DRH" && password === "DRH4") {
        // Redirection vers la page du service DRH après une connexion réussie
        window.location.href = "DRH.html";
      } else if (username !== "" && serviceChoice === "DBM" && password === "DBM5") {
        // Redirection vers la page du service DBM après une connexion réussie
        window.location.href = "DBM.html";
      } else if (username !== "" && serviceChoice === "DAEC" && password === "DAEC6") {
        // Redirection vers la page du service DAEC après une connexion réussie
        window.location.href = "DAEC.html";
      } else if (username !== "" && serviceChoice === "DAS" && password === "DAS7") {
        // Redirection vers la page du service DAS après une connexion réussie
        window.location.href = "DAS.html";
      } else if (username !== "" && serviceChoice === "DPE" && password === "DPE8") {
        // Redirection vers la page du service DPE après une connexion réussie
        window.location.href = "DPE.html";
      } else if (username !== "" && serviceChoice === "DUE" && password === "DUE9") {
        // Redirection vers la page du service DUE après une connexion réussie
        window.location.href = "DUE.html";
      } else if (username !== "" && serviceChoice === "DAK" && password === "DAK10") {
        // Redirection vers la page du service DAK après une connexion réussie
        window.location.href = "DAK.html";
      } else if (username !== "" && serviceChoice === "DAI" && password === "DAI11") {
        // Redirection vers la page du service DAK après une connexion réussie
        window.location.href = "DAI.html";
      } else {
        alert("Nom d'utilisateur ou mot de passe incorrect !");
      }
    });

    // Fonction pour afficher le formulaire de récupération de mot de passe
    // Fonction pour afficher le formulaire de récupération de mot de passe
    function showForgotPasswordForm() {
      // Masquer le formulaire de connexion
      document.getElementById("loginForm").style.display = "none";

      // Afficher le formulaire de récupération de mot de passe
      document.getElementById("forgotPasswordForm").style.display = "block";
    }

    // Fonction pour annuler le processus de récupération de mot de passe
    function cancelRecovery() {
      // Masquer le formulaire de récupération de mot de passe
      document.getElementById("forgotPasswordForm").style.display = "none";

      // Afficher le formulaire de connexion
      document.getElementById("loginForm").style.display = "block";
    }

    // Fonction pour récupérer le mot de passe
     // Fonction pour récupérer le mot de passe associé à une division donnée
  function getPasswordByDivision(division) {
    // Définir un objet contenant les paires division-mot de passe
    var divisionPasswords = {
      "SSIC": "SSIC1",
      "SPS": "SPS2",
      "DCL": "DCL3",
      "DRH": "DRH4",
      "DBM": "DBM5",
      "DAEC": "DAEC6",
      "DAS": "DAS7",
      "DPE": "DPE8",
      "DUE": "DUE9",
      "DAK": "DAK10",
      "DAI": "DAI11",
      "asa": "asa"
      
      // Ajoutez ici d'autres paires division-mot de passe si nécessaire
    };

    // Rechercher le mot de passe correspondant à la division spécifiée
    var password = divisionPasswords[division];

    // Retourner le mot de passe trouvé
    return password;
  }

  // ... Votre code JavaScript existant ...

  // Fonction pour récupérer le mot de passe
  function retrievePassword() {
    var fullName = document.getElementById("fullName").value;
    var email = document.getElementById("email").value;
    var division = document.getElementById("division").value;

    // Rechercher le mot de passe associé à la division spécifiée
    var password = getPasswordByDivision(division);

    if (password) {
      // Si la division est "ASA" (admin), afficher le mot de passe directement
      if (division === "asa") {
        alert('Mot de passe de l\'admin est  : ' + password);
      } else {
        // Afficher le mot de passe dans une boîte de dialogue pour les autres divisions
        alert('Bonjour ' + fullName + ', votre mot de passe est : ' + password);
      }

      // Envoyer le mot de passe par e-mail à l'utilisateur
      // Vous pouvez appeler la fonction sendRecoveryEmail() ici pour envoyer l'e-mail contenant le mot de passe à l'utilisateur.
      // Vous pouvez également appeler un script PHP pour gérer l'envoi de l'e-mail de récupération.
    } else {
      alert("Division invalide !");
    }
  }
</script>
</body>
</html>
<?php
include("footer.html");
?>

