<section id="sidebar">
	<div class="inner">
		<nav>
			<ul>
				<li><a href="#intro">Bienvenue</a></li>
				<li><a href="#one">Qui suis-je ?</a></li>
				<li><a href="#two">Projets</a></li>
				<li><a href="#three">Contact</a></li>
				<?php
				
					if (isset($_SESSION['user'])) {
						echo '<form method="POST" action="deconnexion.php">
								<button type="submit" name="logout">Déconnexion</button>
							</form>';
					}
            	?> 
			</ul>
		</nav>
	</div>
</section>