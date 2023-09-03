<nav class="navbar navbar-dark bg-primary">
	<div class="container-fluid">
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="view_paintings.php">Paintings</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="add_painting.php">Add Paintings</a>
			</li>
		</ul>
		<form action="filter_paintings.php" method="post">
        <label id="nav-filter-label" for="style">Filter by Style</label>
        <select name="style" id="style">
            <option value="Impressionism">Impressionism</option>
            <option value="Mannerism">Mannerism</option>
            <option value="Still-life">Still-life</option>
			<option value="Portrait">Portrait</option>
			<option value="Realism">Realism</option>
			<option value="Cubism">Cubism</option>
			<option value="Surrealism">Surrealism</option>
            <!-- Add more style options as needed -->
        </select>
		<button type="submit">Filter</button>
		</form>
		<form action="filter_paintings.php" method="post">
		<label id="nav-filter-label" for="artist">Filter by Artist</label>
        <select name="artist" id="artist">
            <option value="August Renoir">August Renoir</option>
            <option value="Michelangelo">Michelangelo</option>
            <option value="Vincent Van Gogh">Vincent Van Gogh</option>
			<option value="Leonardo da Vinci">Leonardo da Vinci</option>
			<option value="Claude Monet">Claude Monet</option>
			<option value="Pablo Picasso">Pablo Picasso</option>
			<option value="Salvador Dali">Salvador Dali</option>
			<option value="Paul Cezanne">Paul Cezanne</option>
            <!-- Add more style options as needed -->
        </select>
        <button type="submit">Filter</button>
		</form>
		<form role="search" action="search_painting.php" method="POST">
			<input class="form-control" name="search_text" id="search_text" type="text" placeholder="Search Painting" aria-label="Search">
		</form>
	</div>
</nav>