<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Connexion Zoo Arcadia</title>
    <link rel="stylesheet" href="connexion/global.css" />
    <link rel="stylesheet" href="connexion/index.css" />
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
    <div class="connexion">
      <header class="connexion-inner">
        <div class="logo-arcadia-zoo-8-parent">
        <a href="index.php">
          <img
            class="logo-arcadia-zoo-8"
            loading="lazy"
            alt=""
            src="connexion/public/logo-arcadia-zoo-8@2x.png"
            id="logoArcadiaZoo8"
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
              <span class="habitas"><a href="habitats.php">HABITATS</a></span>
            </div>
          </div>
          <div class="menu-contact-wrapper">
            <div class="menu-contact" id="menuContactContainer">
              <div class="menu-contact1"></div>
              <span class="contact"><a href="contact.php">CONTACT</a></span>
            </div>
          </div>
          <div class="menu-connexion-wrapper">
            <div class="menu-connexion" id="menuConnexionContainer">
              <div class="menu-connexion1"></div>
              <span class="connexion1"><a href="connexion.php">CONNEXION</a></span>
          </div>
        </div>
      </header>
      </div>

      <?php
include 'config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer et filtrer les données du formulaire
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Requête pour éviter les injections SQL
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Vérification du mot de passe avec password_verify
        if (password_verify($password, $user['password'])) {
            // Mot de passe correct, initialisation de la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirection selon le rôle de l'utilisateur
            if ($user['role'] == 'admin') {
                header('Location: admin_dashboard.php');
                exit();
            } elseif ($user['role'] == 'employe') {
                header('Location: employe_dashboard.php');
                exit();
            } elseif ($user['role'] == 'veterinaire') {
                header('Location: vet_dashboard.php');
                exit();
            } else {
                echo '<div style="color: red; font-size: 24px; text-align: center;">Rôle inconnu, contactez l\'administrateur.</div>';
            }
        } else {
            // Mot de passe incorrect
            echo '<div style="color: red; font-size: 24px; text-align: center;">Mot de passe incorrect.</div>';
        }
    } else {
        // Aucun utilisateur trouvé avec cet email
        echo '<div style="color: red; font-size: 24px; text-align: center;">Aucun utilisateur trouvé avec cet email.</div>';
    }
}
?>

            <main class="arriere-plan">
          <div class="connexion-child"></div>
          <div class="mot-de-passe-oubli">
           <h2 style="text-align: center;">Identifiez-vous</h2>
          </div>
      <form action="connexion.php" method="POST">
      <div class="identifiez-vous">
      <label>Email :</label>
      <input type="email" name="email" required style="width: 440px; height: 40px;"><br>
      </div>
      <div class="identifiez-vous">
      <label>Mot de passe :</label>
      <input type="password" name="password" required style="width: 300px; height: 40px;"><br>
      </div>
      <div class="identifiez-vous">
      <input type="submit" value="Connexion" style="width: 150px; height: 50px; font-size: 18px;">
      </div>
      </form>
            </main>
      

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
        <a href="https://www.facebook.com" target="_blank">
        <img
          class="facebook-icon"
          loading="lazy"
          alt="Facebook"
          src="connexion/public/facebook.svg"
        />
        </a>
        <a href="https://www.twitter.com" target="_blank">
        <img
          class="twitter-icon"
          loading="lazy"
          alt="Twitter"
          src="connexion/public/twitter.svg"
        />
        </a>
        <a href="https://www.youtube.com" target="_blank">
        <img
          class="youtube-icon"
          loading="lazy"
          alt="Youtube"
          src="connexion/public/youtube.svg"
        />
        </a>

        <div class="nous-suivre">Nous Suivre :</div>
        <div class="adresse">
          <div class="adresse1">
            <p class="adresse2">adresse : 12 rue forêt Broceliande</p>
            <p class="bretage-france">351000 Bretage- France</p>
          </div>
        </div>
        <div class="menu-bas">
          <div class="accueil-bas" id="accueilBasContainer">
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
        <div class="logo-arcadia-zoo-blanc">
        <a href="index.php">
          <img
            class="logo-arcadia-zoo-blanc-1"
            loading="lazy"
            alt=""
            src="connexion/public/logo-arcadia-zoo-blanc-1@2x.png"
          />
          </a>
        </div>
      </footer>
    </div>
  </body>
</html>
