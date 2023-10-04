<div class="container">
    <div class="row d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
      <div class="col-4">
        <!-- Filter by Style -->
        <form class="p2" action="filter_paintings.php" method="post">
          <label for="style">Filter by Style</label>
          <select name="style" id="style">
            <option value="Impressionism">Impressionism</option>
            <option value="Mannerism">Mannerism</option>
            <option value="Still-life">Still-life</option>
            <option value="Portrait">Portrait</option>
            <option value="Realism">Realism</option>
            <option value="Cubism">Cubism</option>
            <option value="Surrealism">Surrealism</option>
          </select>
          <button type="submit">Filter</button>
        </form>
      </div>
      <div class="col-4">
        <!-- Filter by Artist -->
        <form class="p2" action="filter_paintings.php" method="post">
          <label for="artist">Filter by Artist</label>
          <select name="artist" id="artist">
            <option value="August Renoir">August Renoir</option>
            <option value="Michelangelo">Michelangelo</option>
            <option value="Vincent Van Gogh">Vincent Van Gogh</option>
            <option value="Leonardo da Vinci">Leonardo da Vinci</option>
            <option value="Claude Monet">Claude Monet</option>
            <option value="Pablo Picasso">Pablo Picasso</option>
            <option value="Salvador Dali">Salvador Dali</option>
            <option value="Paul Cezanne">Paul Cezanne</option>
          </select>
          <button type="submit">Filter</button>
        </form>
      </div>
      <div class="col-4">
        <!-- Search -->
        <form role="search" action="search_painting.php" method="POST">
          <input class="form-control" name="search_text" id="search_text" type="text" placeholder="Search Paintings" aria-label="Search">
        </form>
      </div>
    </div>
