
<?php
include 'config/config.php';

// Récupérer les services
$stmt_services = $pdo->query("SELECT * FROM services");
$services = $stmt_services->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos Services Zoo Arcadia</title>
    <link rel="stylesheet" href="service/indexs.css" />
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

            /* Quelques styles de base pour organiser les services */
            ul {
            list-style-type: none;
            font-size: 24px;
        }

        li {
            margin-bottom: 70px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
        }
    </style>
  </head>
  <body>
    <div class="main-container">
      <div class="header">
        <div class="logo-arcadia-zoo">
        <a href="index.php">
          <div class="logo-arcadia-zoo-1"><img class="img" src="service/assets/images/logo1.png" /></div>
        </a>
        </div>
        <button class="menu-accueil">
        <span class="accueil"><a href="index.php">ACCUEIL</a></span>
          <div class="menu-accueil-2"></div></button
        ><button class="menu-services">
          <span class="services-3"><a href="services.php">SERVICES</a></span>
          <div class="menu-services-4"></div></button
        ><button class="menu-habitats">
          <span class="habitats"><a href="habitats.php">HABITAS</a></span>
          <div class="menu-habitats-5"></div></button
        ><button class="menu-contact">
          <span class="contact"><a href="contact.php">CONTACT</a></span>
          <div class="menu-contact-6"></div></button
        ><button class="menu-connexion">
          <span class="connexion"><a href="connexion.php">CONNEXION</a></span>
          <div class="menu-connexion-7"></div>
        </button>
      </div>
      <div class="slide"><div class="habitats-8"></div></div>
      <button class="nos-services">
        <span class="nos-services-9">Nos Services</span>
      </button>
            <ul>
        <?php foreach ($services as $service): ?>
            <li>
                <!-- Affichage de l'image du service -->
                <img src="<?php echo $service['image']; ?>" alt="<?php echo $service['name']; ?>" width="500" height="300" style="border-radius: 15px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);"></br>

                <!-- Affichage du nom et de la description -->
                <strong style="font-size: 40px; color:white;"><?php echo $service['name']; ?></strong></br> 
                <br style="font-size: 18px;"><?php echo $service['description']; ?></br>
                
            </li>
        <?php endforeach; ?>
    </ul>
      <div class="footer">
        <div class="pied-de-page">
          <div class="flex-row-e">
            <div class="logo-arcadia-zoo-blanc">
            <a href="index.php">
              <div class="logo-arcadia-zoo-blanc-18"><img class="img" src="service/assets/images/logo2.png" /></div>
            </a>
            </div>
            <div class="adresse">
              <span class="adresse-19"
                >adresse : 12 rue forêt Broceliande<br />351000 Bretage-
                France</span
              >
            </div>
            <div class="nous-suivre">
              <span class="nous-suivre-1a">Nous Suivre :</span>
              <div class="flex-row-aee">
                <div class="facebook">
                <a href="https://www.facebook.com" target="#">
                    <img class="facebook" src="accueil/img/facebook-1.svg"/>
                </a>
                </div>
                <div class="twitter">
                <a href="https://www.twitter.com" target="#">                                
                    <img class="twitter" src="accueil/img/twitter-1.svg"/>
                </a>
                </div>
                <div class="youtube">
                <a href="https://www.youtube.com" target="#">
                    <img class="youtube" src="accueil/img/youtube-1.svg"/>
                </a>
                </div>
              </div>
            </div>
            <div class="menu-bas">
              <div class="connexion-bas">
                <span class="connexion-bas-20"><a href="connexion.php">Connexion</a></span>
              </div>
              <div class="contacts-bas">
                <span class="contacts-bas-21"><a href="contact.php">Contact</a></span>
              </div>
              <div class="habitats-bas">
                <span class="habitats-bas-22"><a href="habitats.php">Habitats</a></span>
              </div>
              <div class="services-bas">
                <span class="services-bas-23"><a href="services.php">Services</a></span>
              </div>
              <div class="accueil-bas">
                <span class="accueil-bas-24"><a href="index.php">Accueil</a></span>
              </div>
            </div>
          </div>
          <div class="copyright">
            <div class="copyrignt">
              <div class="devsoft">
                <div class="devsoft-25">
                  <span class="nbsp"> </span
                  ><span class="devsoft-26"><a href="#">DevSoft</a></span>
                </div>
              </div>
              <div class="arcadia-zoo-tous-droits-reserves">
                <span class="copy">©</span
                ><span class="arcadia-zoo-tous-droits-reserves-27">
                  Arcadia Zoo tous droits réservés </span
                ><span class="copy-28">2024</span
                ><span class="developpe-par">. Développé par</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
