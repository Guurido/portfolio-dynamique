<?php
require_once 'admin/configPDO.php';

$req = 'SELECT * FROM about, skills, location';
$stmt = $pdo->query('SELECT * FROM projects');

try{
	$resultat = $pdo->query($req);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	while($rows = $resultat->fetch()){
?>



<div id="wrapper">

<!-- Intro -->
	<section id="intro" class="wrapper style1 fullscreen fade-up">
		<div class="inner">
			<h1>CHATELET Yanis</h1>
			<p>Étudiant en développement web</p>
			<ul class="actions">
				<li><a href="#one" class="button scrolly">En savoir plus</a></li>
			</ul>
		</div>
	</section>

<!-- One -->
	<section id="one" class="wrapper style2 spotlights">
		<section>
			<?php echo "<a href='#' class='image'><img src='images/".$rows['photo']."' alt='' data-position='center center' /></a>"; ?>

			<div class="content">
				<div class="inner">
					<h2><?php echo $rows['nom']?></h2>
					<p>
						<?php echo $rows['texte']?>
					</p>
					<ul class="actions">
						<li><a href="assets/medias/CHATELET-Yanis.pdf" class="button">Télécharger mon CV</a></li>
					</ul>
				</div>
			</div>
		</section>
	</section>

<!-- Two -->
	<section id="two" class="wrapper style3 fade-up">
		<div class="inner">
			<h2>Mes compétences</h2>
			<div class="features">
				<section>
					<span class="icon solid major fa-code"></span>
					<h3>Projets</h3>
					<p>
						<?php echo $rows['projets']?>
					</p>
				</section>
				<section>
					<span class="icon solid major fa-lock"></span>
					<h3>Front end</h3>
					<p><?php echo $rows['frontend']?></p>
				</section>
				<section>
					<span class="icon solid major fa-cog"></span>
					<h3>Back end</h3>
					<p><?php echo $rows['backend']?></p>
				</section>
				<section>
					<span class="icon solid major fa-desktop"></span>
					<h3>Technologie utlisées</h3>
					<p><?php echo $rows['techno']?></p>
				</section>
				<section>
					<span class="icon solid major fa-link"></span>
					<h3>Liens vers mes projets</h3>
					<p><a href="https://chatelet-yanis.fr/" target="_blank">Portfolio</a><br><a href="https://guurido.github.io/Projet-map-interactive/" target="_blank">Map interactif</a></p>
				</section>
				<section>
					<span class="icon major fa-gem"></span>
					<h3>Logistique</h3>
					<p><?php echo $rows['logistique']?></p>
				</section>
			</div>
			<h2>Mes projets</h2>
			<?php 
				foreach ($stmt as $row) {
			?>
				<div class="features">
					<section>
							<span class="icon solid major fa-code"></span>
							<h3><?php echo $row['titre']?></h3>
							<p>
								<?php echo $row['descr']?>
							</p>
					</section>
				</div>
			<?php
				}
			?>
	</section>

<!-- Three -->
	<section id="three" class="wrapper style1 fade-up">
		<div class="inner">
			<h2>Contact</h2>
			<p>Si mon profil vous a plu n'hésitez pas à me contacter !</p>
			<div class="split style1">
				<section>
					<form method="POST" action="admin/traitementContact.php">
						<div class="fields">
							<div class="field">
								<label for="nom">Nom</label>
								<input type="text" name="nom" id="nom" />
							</div>
							<div class="field">
								<label for="mail">Email</label>
								<input type="text" name="mail" id="mail" />
							</div>
							<div class="field">
								<label for="msg">Message</label>
								<textarea name="msg" id="msg" rows="5"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><a type="submit" class="button submit">Envoyer</a></li>
						</ul>
					</form>
				</section>
				<section>
					<ul class="contact">
						<li>
							<h3>Adresse</h3>
							<span><?php echo $rows['rue']?><br />
							<?php echo $rows['ville']?>, <?php echo $rows['postal']?><br />
							<?php echo $rows['pays']?></span>
						</li>
						<li>
							<h3>Email</h3>
							<a href="mailto:"><?php echo $rows['email']?></a>
						</li>
						<li>
							<h3>Téléphone</h3>
							<span><?php echo $rows['tel']?></span>
						</li>
						<li>
							<h3>Réseaux</h3>
							<ul class="icons">
								<li><a href="https://github.com/Guurido" class="icon brands fa-github" target="_blank"><span class="label">GitHub</span></a></li>
								<li><a href="https://www.linkedin.com/in/yanis-chatelet-73953a221/" class="icon brands fa-linkedin-in" target="_blank"><span class="label">LinkedIn</span></a></li>
							</ul>
						</li>
					</ul>
				</section>
			</div>
		</div>
	</section>
</div>
<?php 
                        }
                    }
                    catch (Exception $e) {
                        echo "<br /> erreur sur la requête SELECT ";
                    }
?>