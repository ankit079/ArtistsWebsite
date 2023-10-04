<div class="container">
    <div class="row d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="col-4">                
                <!-- Filter by Period -->
                  <form class="p2" action="filter_artists.php" method="post">
				<label for="lifespan">Filter by Period</label>
				<select name="lifespan" id="lifespan">
					<option value="1400">1400s</option>
					<option value="1600">1600s</option>
					<option value="1800">1800s</option>
					<option value="1900">1900s</option>
				</select>
				<button type="submit">Filter</button>
			</form>
      </div>
      <div class="col-4">  
			<!-- Filter by Nationality -->
			<form class="p2" action="filter_artists.php" method="post">
				<label for="nationality">Filter by Nationality</label>
				<select name="nationality" id="nationality">
					<option value="French">French</option>
					<option value="Italian">Italian</option>
					<option value="Dutch">Dutch</option>
					<option value="Spanish">Spanish</option>
				</select>
				<button type="submit">Filter</button>
			</form>	
      </div>
	  <div class="col-4">
        <!-- Search -->
        <form role="search" action="search_artist.php" method="POST">
          <input class="form-control" name="search_text" id="search_text" type="text" placeholder="Search Artists" aria-label="Search">
        </form>
      </div>