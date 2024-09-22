<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Contact Zoo Arcadia</title>
    <link rel="stylesheet" href="contact/global.css" />
    <link rel="stylesheet" href="contact/index.css" />
    <style>
        /* Style de base pour toutes les images dans des liens */
        a img {
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        /* Lorsqu'on survole une image dans un lien */
        a img:hover {
            transform: scale(1.1); /* Zoom de 110% */
            filter: brightness(0.7); /* Assombrir légèrement */
        }

        /* Style de base pour tous les liens */
        a {
            text-decoration: none; /* Supprimer le soulignement par défaut */
            color: #070000; /* Couleur de lien par défaut (noir) */
            transition: color 0.3s ease, text-shadow 0.3s ease; /* Transition douce */
        }

        /* Lorsqu'on survole un lien */
        a:hover {
            color: #FFFFFF; /* Changer la couleur du texte lors du survol */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Ajouter une ombre au texte */
        }
    </style>
  </head>
  <body>

    <div class="contact">
      <div class="header-wrapper">
        <header class="header">
        <a href="index.php">
          <img
            class="logo-arcadia-zoo-7"
            loading="lazy"
            alt=""
            src="Contact/public/logo-arcadia-zoo-7@2x.png"
            id="logoArcadiaZoo7"
          /></a>

          <div class="menu-accueil-wrapper">
            <div class="menu-accueil" id="menuAccueilContainer">
              <div class="menu-accueil1"></div>
              <span class="accueil"><a href="index.php">ACCUEIL</a></span>
            </div>
          </div>
          <div class="menu-services-wrapper">
            <div class="menu-services" id="menuServicesContainer">
              <div class="menu-services1"></div>
              <span class="services"><a href="services.php">SERVICES</a></span>
            </div>
          </div>
          <div class="menu-habitats-wrapper">
            <div class="menu-habitats" id="menuHabitatsContainer">
              <div class="menu-habitats1"></div>
              <span class="services"><a href="habitats.php">HABITATS</a></span>
            </div>
          </div>
          <div class="menu-contact-wrapper">
            <div class="menu-contact" id="menuContactContainer">
              <div class="menu-contact1"></div>
              <span class="services"><a href="contact.php">CONTACT</a></span>
            </div>
          </div>
          <div class="menu-connexion-wrapper">
            <div class="menu-connexion" id="menuConnexionContainer">
              <div class="menu-connexion1"></div>
              <span class="connexion"><a href="connexion.php">CONNEXION</a></span>
            </div>
          </div>
        </header>
      </div>
      <main class="arriere-plan">
      <div class="contact2">
      <?php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insertion du message dans la base de données
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    echo '<span style="font-weight: bold; color: red; font-size: 24px;">Votre message a bien été envoyé. Merci de nous avoir contacté !</span>';
}
?>
      <h1 class="nous-contactez">Nous contactez</h1>
      <h3>Si vous avez des questions ou des suggestions, n'hésitez pas à nous envoyer un message via ce formulaire.</h3>
      <form action="contact.php" method="POST">
      <div class="nom-et-prenoms1">
        <label for="name">Votre nom :</label>
        <input type="text" id="name" name="name" required style="width: 300px; height: 40px;"><br><br>
      </div>
      <div class="email1">
        <label for="email">Votre E-mail :</label>
        <input type="email" id="email" name="email" required style="width: 300px; height: 40px;"><br><br>
      </div>
      <div class="texte">
        <label for="message">Votre message :</label><br>
        <textarea id="message" name="message" rows="80" cols="80" required></textarea><br><br>
      </div>
      <div class="envoyer1">
        <input type="submit" value="Envoyer" style="width: 150px; height: 50px; font-size: 18px;">
      </div>
      </form>
      </div>
      </main>
      
        </div>
      </div>
      <footer class="pied-de-page">
        <div class="copyrignt">
          <div class="arcadia-zoo-tous-droits-rserv-wrapper">
            <div class="arcadia-zoo-tous-container">
              <span>©</span>             
              <span class="dvelopp-par">Arcadia Zoo tous droits réservés</span>
              <span class="years">2024</span>
              <span class="dvelopp-par">.Développé par</span>
            </div>
          </div>
          <div class="devsoft">
            <div class="devsoft1">
              <span> </span>
              <span class="devsoft2"><a href="#">DevSoft</a></span>
            </div>
          </div>
        </div>
        <div class="nous-suivre">Nous Suivre :</div>
        <a href="https://www.facebook.com" target="_blank">
        <img
          class="facebook-icon"
          loading="lazy"
          alt="Facebook"
          src="contact/public/facebook.svg"
        />
        </a>
        <a href="https://www.twitter.com" target="_blank">
        <img
          class="twitter-icon"
          loading="lazy"
          alt="Twitter"
          src="contact/public/twitter.svg"
        />
        </a>
        <a href="https://www.youtube.com" target="_blank">
        <img
          class="youtube-icon"
          loading="lazy"
          alt="Youtube"
          src="contact/public/youtube.svg"
        />
        </a>     
        
        <div class="adresse">
          <div class="adresse1">
            <p class="adresse2">adresse : 12 rue forêt Broceliande</p>
            <p class="bretage-france">351000 Bretage- France</p>
          </div>
        </div>
        <div class="menu-bas">
          <div class="accueil-bas">
            <div class="accueil-bas1"><a href="index.php">Accueil</a></div>
          </div>
          <div class="services-bas">
            <div class="services-bas1"><a href="services.php">Services</a></div>
          </div>
          <div class="habitats-bas-wrapper">
            <div class="habitats-bas">
              <div class="habitats-bas1"><a href="habitats.php">Habitats</a></div>
            </div>
          </div>
          <div class="connexion-bas-parent">
            <div class="connexion-bas">
              <div class="connexion-bas1"><a href="connexion.php">Connexion</a></div>
            </div>
            <div class="contacts-bas">
              <div class="contacts-bas1"><a href="contact.php">Contact</a></div>
            </div>
          </div>
        </div>
        <div class="logo-arcadia-zoo-blanc" id="logoArcadiaZooBlanc">
        <a href="index.php">
          <img
            class="logo-arcadia-zoo-blanc-1"
            loading="lazy"
            alt=""
            src="contact/public/logo-arcadia-zoo-blanc-1@2x.png"
          />
        </a>
        </div>
      </footer>
    </div>
  </body>
</html>
