<?php
include 'config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0; // Vérifie la présence de 'id'

if ($id) {
    // Récupérer les détails de l'animal
    $stmt_habitats = $pdo->prepare("SELECT * FROM habitats WHERE id = ?");
    $stmt_habitats->execute([$id]);
    $habitat = $stmt_habitats->fetch(PDO::FETCH_ASSOC);

    if ($habitat) {
      $stmt = $pdo->prepare("SELECT * FROM animals WHERE habitat_id = ?");
      $stmt->execute([$id]);
      $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
    } else {
        echo json_encode(['error' => 'Animal non trouvé']);
    }
} else {
    echo json_encode(['error' => 'ID non fourni']);
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos Habitats Zoo Arcadia</title>
    <link rel="stylesheet" href="habitat/indexx.css" />
        <title>Effet de survol sur toutes les images de lien</title>
    <style>
        /* Style de base pour toutes les images dans des liens */
        a img {
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        a img:hover {
            transform: scale(1.1);
            filter: brightness(0.7);
        }

        a {
            text-decoration: none;
            color: #070000;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        a:hover {
            color: #FFFFFF;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .animal-item {
            margin-bottom: 20px;
            cursor: pointer;
            display: inline-block;
        }

        .animal-item img {
            max-width: 150px;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            display: block;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;  /* Centrage horizontal */
            align-items: center;  /* Centrage vertical */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            z-index: 10000;
            max-width: 600px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
  </head>
  <body>
    <div class="main-container">
      <div class="header">
      <div class="logo-arcadia-zoo">       
        <a href="index.php">
          <div class="logo-arcadia-zoo-1"><img class="img" src="habitat/assets/images/logo1.png" /></div>
        </a>
        </div>
        <button class="menu-accueil">
          <span class="accueil"><a href="index.php">ACCUEIL</a></span>
          <div class="menu-accueil-2"></div></button
        ><button class="menu-services">
          <span class="services"><a href="services.php">SERVICES</a></span>
          <div class="menu-services-3"></div></button
        ><button class="menu-habitats">
          <span class="habitats-4"><a href="habitats.php">HABITAS</a></span>
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
      <button class="button"><span class="habitats-9">Habitats</span></button> 
  
    <h1 style="font-size: 45px; color: #FFFF;">
      <?php echo isset($habitat) ? htmlspecialchars($habitat['name']) : 'Habitat non trouvé'; ?>
    </h1>
<p style="font-size: 32px; color: #000;">  
<?php echo isset($habitat) ? htmlspecialchars($habitat['description']) : 'Description non disponible'; ?>
</p>

<h2>Animaux présents dans cet habitat</h2>
<ul>
    <?php if (isset($animals) && is_array($animals)): ?>
      <?php foreach ($animals as $animal): ?>
        <li class="animal-item" onclick="openModal('<?php echo htmlspecialchars($animal['id']); ?>')">
          <img src="<?php echo htmlspecialchars($animal['image']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>">
          <br>
          <span style="font-size: 20px; color: #000; text-align: center;"> 
            <?php echo htmlspecialchars($animal['name']); ?>
          </span>
        </li>
    <?php endforeach; ?>
  <?php else: ?>
      <p>Aucun animal trouvé dans cet habitat.</p>
  <?php endif; ?>
</ul>
 <!-- Modal -->
<div id="animalModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <img id="modalImage" src="" alt="" style="max-width: 100%; border-radius: 8px;">
    <h2 id="modalName"></h2>
    <p id="modalFood"></p>
    <p id="modalWeight"></p>
    <p id="modalHealthStatus"></p>
    <p id="modalViews"></p>
  </div>
</div>

        <script>
            // Ouvrir le modal avec les informations de l'animal
            function openModal(animalId) {
                fetch('get_animal_details.php?id=' + animalId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            console.error(data.error);
                            return;
                        }
                        document.getElementById('modalImage').src = data.image;
                        document.getElementById('modalName').textContent = data.name;
                        document.getElementById('modalFood').textContent = 'Nourriture donnée : ' + data.food;
                        document.getElementById('modalWeight').textContent = 'Grammage : ' + data.weight + ' g';
                        document.getElementById('modalHealthStatus').textContent = 'État de santé : ' + data.health_status;
                        document.getElementById('modalViews').textContent = 'Nombre de vues : ' + data.views;
                        document.getElementById('animalModal').style.display = 'block';
                    })
                    .catch(error => console.error('Erreur lors de la récupération des détails de l\'animal:', error));
            }

            // Fermer le modal
            function closeModal() {
                document.getElementById('animalModal').style.display = 'none';
            }

            // Fermer le modal si on clique à l'extérieur
            window.onclick = function(event) {
                if (event.target == document.getElementById('animalModal')) {
                    closeModal();
                }
            }
        </script>

      <div class="footer">
        <div class="pied-de-page">
          <div class="flex-row">
            <div class="logo-arcadia-zoo-blanc">
            <a href="index.php">
              <div class="logo-arcadia-zoo-blanc-16"><img class="img" src="habitat/assets/images/logo2.png" /></div>
              </a>
            </div>
            <div class="adresse">
              <span class="adresse-17">
                adresse : 12 rue forêt Broceliande<br />351000 Bretage-France
              </span
              >
            </div>
            <div class="nous-suivre">
              <span class="nous-suivre-18">Nous Suivre :</span>
              <div class="flex-row-add">
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
                <span class="connexion-bas-1e"><a href="connexion.php">Connexion</a></span>
              </div>
              <div class="contacts-bas">
                <span class="contacts-bas-1f"><a href="contact.php">Contact</a></span>
              </div>
              <div class="habitats-bas">
                <span class="habitats-bas-20"><a href="habitats.php">Habitats</a></span>
              </div>
              <div class="services-bas">
                <span class="services-bas-21"><a href="services.php">Services</a></span>
              </div>
              <div class="accueil-bas">
                <span class="accueil-bas-22"><a href="index.php">Accueil</a></span>
              </div>
            </div>
          </div>
          <div class="copyright">
            <div class="copyrignt">
              <div class="devsoft">
                <div class="devsoft-23">
                  <span class="nbsp"> </span
                  ><span class="devsoft-24"><a href="#">DevSoft</a></span>
                </div>
              </div>
              <div class="arcadia-zoo-tous-droits-reserves">
                <span class="copy">©</span
                ><span class="arcadia-zoo-tous-droits-reserves-25">
                  Arcadia Zoo tous droits réservés </span
                ><span class="copy-26">2024</span
                ><span class="developpe-par">. Développé par</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
