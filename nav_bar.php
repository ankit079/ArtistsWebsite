<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid" data-bs-target="navebarmain">
		<div class="navbar-nav" id="navebarmain">
			<ul class="navbar-nav me-auto mb-2 mb-sm-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="index.php">Home</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Paintings</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_paintings.php">All Paintings</a>
						<a class="dropdown-item" href="add_painting.php">Add Painting</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Artists</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_artists.php">All Artists</a>
						<a class="dropdown-item" href="add_artist.php">Add Artist</a>
					</div>
				</li>
			</ul>
			<form class="nav-item" action="add_subscription.php" method="post">
			<button type="submit">Subscribe</button>
		</form>
		<form  class="nav-item" action="login.php" method="post">
			<button type="submit">Login</button>
		</form>
		</div>
	</div>
</nav>