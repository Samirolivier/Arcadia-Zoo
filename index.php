<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="accueil/globals.css" />
        <link rel="stylesheet" href="accueil/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accueil-Bienvenue au Zoo Arcadia</title>
        <style>
            /* Style de base pour toutes les images dans des liens*/
            a img {
                transition: transform 0.3s ease, filter 0.3s ease;
            }

            /* Lorsqu'on survole une image dans un lien */
            a img:hover {
                transform: scale(1.1); /* Zoom de 110% */
                filter: brightness(0.5); /* Assombrir légèrement */
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

        <title>Carrousel Automatique</title>
        <style>
.carousel-container {
      width: 100%;
      max-width: 600px;
      margin: auto;
      position: relative;
      overflow: hidden; 
    }

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
      width: 100%;
    }

    .slides img {
      width: 10%; /* Chaque image prend toute la largeur du conteneur */
      flex-shrink: 0; /* Empêche les images de rétrécir */
      max-height: 455px; /* Limite la hauteur des images si nécessaire */
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      display: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .carousel-container:hover .prev,
    .carousel-container:hover .next {
      display: block;
    }
    @keyframes blink {
    100% { opacity: 1; }
    70% { opacity: 0; }
    100% { opacity: 1; }
    }

        </style>

    </head>
    <body>
        <div class="accueil-web">
            <header class="header">
                <a href="index.php">
                    <div class="logo-arcadia-zoo"><img class="img" src="accueil/img/logo-arcadia-zoo-3-1.png" /></div>
                </a>
                <div class="menu-accueil"><div class="text-wrapper"><a href="index.php">ACCUEIL</a></div></div>
                <div class="div-wrapper"><div class="div"><a href="services.php">SERVICES</a></div></div>
                <div class="div-wrapper"><div class="div"><a href="habitats.php">HABITAS</a></div></div>
                <div class="div-wrapper"><div class="div"><a href="contact.php">CONTACT</a></div></div>
                <div class="div-wrapper"><div class="div"><a href="Connexion.php">CONNEXION</a></div></div>
            </header>
            <div class="slide">
                <div class="photo-slide">
                    <div class="overlap">
                        <div class="overlap-group">
                            <div class="ellipse"></div>
                            <img class="ellipse-2" src="accueil/img/ellipse-3.png" />
                            <div class="ellipse-3"></div>
                            <img class="ellipse-4" src="accueil/img/ellipse-2.png" />
                            <div class="bienvenue-au-zoo">
                                <div class="overlap-group-2">
                                    <p class="p">
                                        Notre zoo vous invite à découvrir la beauté et la diversité du monde animal dans un cadre naturel et
                                        préservé..
                                    </p>
                                    <a href="presentation_arcadia_zoo.php">
                                        <img class="LLS" src="accueil/img/lls-5.svg" alt="LLS" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="overlap-2">
                            <div class="ellipse-5"></div>
                            <img class="ellipse-6" src="accueil/img/ellipse-1.png" />
                        </div>
                        <div class="bienvenue-arcadia"><div class="text-wrapper-2"><a href="presentation_arcadia_zoo.php">Bienvenue à Arcadia ZOO</a></div></div>
                    </div>
                </div>
            </div>
            <!-- les services -->
            <div class="div-wrapper-2">
    <div class="text-wrapper-3">
        <a href="services.php" style="animation: blink 1s infinite;">Nos Services</a>
    </div>
</div>
            <!-- les differents services -->
            <?php
include 'config/config.php';

// Récupérer les services
$stmt_services = $pdo->query("SELECT * FROM services");
$services = $stmt_services->fetchAll();
?>
<div class="services">
<ul style="display: flex; list-style: none; padding: 80px; width:1250px; margin: 5px;">
    <?php foreach ($services as $service): ?>
        <li style="margin-right: 20px;">
            <img src="<?php echo $service['image']; ?>" alt="<?php echo htmlspecialchars($service['name']); ?>" width="315" height="260" style="border-radius: 15px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);">
            <br></br>
            <strong style="display: block; text-align: center; font-weight: bold; font-size: 24px;">
                <?php echo htmlspecialchars($service['name']); ?>
            </strong><br></br>
        </li>
    <?php endforeach; ?>
</ul>
</div>
<!-- les habitats -->
<div class="div-wrapper-2">
    <div class="text-wrapper-3">
        <a href="habitats.php" style="animation: blink 1s infinite;">Nos Habitats</a>
    </div>
</div>
<!-- les differents habitats -->
<?php
include 'config/config.php';

try {
    $stmt_habitats = $pdo->query("SELECT * FROM habitats");
    $habitats = $stmt_habitats->fetchAll();
} catch (Exception $e) {
    echo 'Erreur lors de la récupération des données : ' . $e->getMessage();
}
?>
    <div class="habitas">
    <ul style="display: flex; list-style: none; padding: 0; margin: 0;">
    <?php foreach ($habitats as $habitat): ?>
        <li style="margin-right: 20px;">
            <img src="<?php echo $habitat['image']; ?>" alt="<?php echo htmlspecialchars($habitat['name']); ?>" width="315" height="260" style="border-radius: 15px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);">
            <br></br>
            <strong style="display: block; text-align: center; font-weight: bold; font-size: 24px;">
                <?php echo htmlspecialchars($habitat['name']); ?>
            </strong>
        </li>
    <?php endforeach; ?>
</ul>

    </div>
            <div class="avis-galerie">

                <div class="avis">
                    <div class="avis-des-gens">

                        <?php
                        include 'config/config.php';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $visitor_name = $_POST['visitor_name'];
                            $review = $_POST['review'];

                            // Insérer l'avis dans la base de données
                            $stmt = $pdo->prepare("INSERT INTO reviews (visitor_name, review, is_validated) VALUES (?, ?, 0)");
                            $stmt->execute([$visitor_name, $review]);

                            echo '<div style="text-align: center; color: red; font-size: 24px;">Merci pour votre avis ! Il sera validé sous peu.</div>';
                        }
                        ?>
                        <div class="carousel-container">
                            <div class="carousel" id="review-carousel">
                                <?php
                                include 'config/config.php';

                                try {
                                    // Récupérer les avis validés triés par pseudo (visitor_name)
                                    $stmt = $pdo->query("SELECT visitor_name, review FROM reviews WHERE is_validated = 1 ORDER BY visitor_name ASC");

                                    // Vérifiez si des résultats sont renvoyés
                                    if ($stmt !== false) {
                                        $reviews = $stmt->fetchAll(); // Récupère tous les avis
                                    } else {
                                        $reviews = []; // Si aucune donnée n'est retournée, initialiser un tableau vide
                                    }
                                } catch (PDOException $e) {
                                    echo "Erreur lors de la récupération des avis : " . $e->getMessage();
                                    $reviews = [];
                                }
                                ?>

                                <div class="avis-des-gens">
                                    <?php if (!empty($reviews)): ?>
                                        <div class="review-box" id="review-box">
                                            <p class="text-wrapper-16" id="visitor-name"><?php echo htmlspecialchars($reviews[0]['visitor_name']); ?></p>
                                            <p class="text-wrapper-15" id="review-text"><?php echo htmlspecialchars($reviews[0]['review']); ?></p>
                                        </div>
                                        <div class="chevron-left">
                                            <button id="chevron-left" onclick="showPreviousReview()">&#9664;</button>
                                            <div class="chevron-right">
                                                <button id="chevron-right" onclick="showNextReview()">&#9654;</button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p>Aucun avis disponible pour le moment.</p>
                                    <?php endif; ?>
                                </div>


                                <script>
                                    let currentInde = 0;
                                    const reviews = <?php echo json_encode($reviews); ?>; // Passer les avis PHP à JavaScript

                                    function showReview(index) {
                                        const visitorName = document.getElementById("visitor-name");
                                        const reviewText = document.getElementById("review-text");

                                        if (reviews.length > 0) {
                                            visitorName.textContent = reviews[index].visitor_name;
                                            reviewText.textContent = reviews[index].review;
                                        }
                                    }

                                    function showNextReview() {
                                        currentInde = (currentInde + 1) % reviews.length;
                                        showReview(currentInde);
                                    }

                                    function showPreviousReview() {
                                        currentInde = (currentInde - 1 + reviews.length) % reviews.length;
                                        showReview(currentInde);
                                    }
                                </script>

                            </div>
                        </div>

                        <form action="" method="POST" >
                            <div class="text-wrapper-14">Votre avis</div>
                            <div class="text-wrapper-13">Pseudo:<input type="text" name="visitor_name" required="" style="width: 350px;"><br></div>
                            <div class="text-wrapper-12">Texte: <textarea name="review" required="" style="width: 366px; height: 89px;"></textarea><br></div>
                            <div class="overlap-11"><input type="submit" value="Envoyer"></div>       
                        </form>

                    </div>
                </div>

                <div class="caroussel">
                    <div class="carousel-container">
                        <div class="slides" id="carousel-slides">
                            <!-- Les images seront insérées ici dynamiquement par le script -->
                        </div>

                        <!-- boutons Prev/Next -->
                         <a class="next" onclick="moveSlides(1)">&#10095;</a>
                        <a class="prev" onclick="moveSlides(-1)">&#10094;</a>
                       

                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="pied-de-page">
                    <div class="overlap-12">
                        <div class="overlap-13">
                            <div class="copyright">
                                <div class="copyrignt">
                                    <div class="overlap-group-6">
                                        <p class="arcadia-zoo-tous">
                                            <span class="span">©</span>
                                            <span class="text-wrapper-17"> Arcadia Zoo Tous Droits Réservés&nbsp;&nbsp;</span>
                                            <span class="span">2024</span>
                                            <span class="text-wrapper-17">. Développé Par</span>
                                        </p>
                                        <div class="dev-soft">
                                            <p class="dev-soft-2">
                                                <span class="text-wrapper-17">&nbsp;</span> <span class="span"><a href="#">DevSoft</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nous-suivre">
                                <div class="overlap-14">
                                    <a href="https://www.facebook.com" target="#">
                                        <img class="facebook" src="accueil/img/facebook-1.svg"/>
                                    </a>
                                    <a href="https://www.twitter.com" target="#">                                
                                        <img class="twitter" src="accueil/img/twitter-1.svg"/>
                                    </a>
                                    <a href="https://www.youtube.com" target="#">
                                        <img class="youtube" src="accueil/img/youtube-1.svg"/>
                                    </a>
                                    <div class="nous-suivre-2">NOUS SUIVRE :</div>
                                </div>
                            </div>
                            <div class="menu-bas">
                                <div class="overlap-16">
                                    <div class="connexion-bas"><div class="connexion-bas-2"><a href="connexion.php">Connexion</a></div></div>
                                    <div class="contacts-bas"><div class="text-wrapper-18"><a href="contact.php">Contact</a></div></div>
                                </div>
                                <div class="habitats-bas">
                                    <div class="habitats-bas-2">
                                        <a href="habitats.php">Habitats</a>
                                    </div>
                                </div>
                                <div class="services-bas"><div class="services-bas-2"><a href="services.php">Services</a></div></div>
                                <div class="accueil-bas"><div class="text-wrapper-18"><a href="index.php">Accueil</a></div></div>
                            </div>
                        </div>
                        <div class="adresse">
                            <p class="adresse-2">Adresse :&nbsp;&nbsp;12 Rue Forêt Broceliande<br />351000 Bretage- France</p>
                        </div>
                        <div class="logo-arcadia-zoo-wrapper">
                            <a href="index.php">
                                <img class="logo-arcadia-zoo-2" src="accueil/img/logo-arcadia-zoo-blanc-1.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script>
/// Tableau des noms d'images du dossier 'slide'
  const images = ['image1.jpg', 'image2.jpg', 'image3.jpg', 'image4.jpg', 'image5.jpg', 'image6.jpg', 'image7.jpg', 'image8.jpg', 'image9.jpg', 'image10.jpg', 'image11.jpg', 'image12.jpg'];  // Ajoute ici tes images
  const slideContainer = document.getElementById('carousel-slides');
  let currentIndex = 0; // Utilise "let" ici pour une seule déclaration.

  // Charger les images automatiquement dans le conteneur
  images.forEach(image => {
    const imgElement = document.createElement('img');
    imgElement.src = `accueil/slide/${image}`;
    slideContainer.appendChild(imgElement);
  });

  // Ajuster la largeur totale du conteneur des slides
  slideContainer.style.width = `${images.length * 100}%`;

  // Fonction pour déplacer les diapositives
function moveSlides(n) {
  const totalSlides = images.length;
  currentIndex = (currentIndex + n + totalSlides) % totalSlides;
  const slideWidth = 120 / totalSlides;  // Calcul de la largeur de chaque slide en pourcentage
  slideContainer.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
}

  // Défilement automatique toutes les 3 secondes
  setInterval(() => {
    moveSlides(1);  // Défile vers la droite
  }, 3000);
        </script>
    </body>
</html>
