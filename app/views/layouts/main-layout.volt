  <!-- NAVIGATION BAR -->
  <div class="ui tablet computer only padded grid">
    <div class="ui blue compact top fixed borderless fluid small menu pointing">
      <div class="ui container">
        <a class="header item">LSO</a>
        {{ link_to("/", "<i class='icon home'></i>Home", "class": "active item") }}
        <a class="item">
          <i class="video camera icon"></i>
          Channels
        </a>
        <a class="ui dropdown item">
          Dropdown <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item">Action</div>
            <div class="item">Another action</div>
            <div class="item">Something else here</div>
            <div class="ui divider"></div>
            <div class="header">Navbar header</div>
            <div class="item">Seperated link</div>
            <div class="item">One more seperated link</div>
          </div>
        </a>
        <div class="right menu">
          <div class="item">
            {{ link_to("/login", "Masuk", "class":"compact ui primary button") }}
          </div>
          <div class="item">
            {{ link_to("/register", "Daftar", "class":"compact ui button") }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- NAVIGATION BAR // -->

  {{ content() }}

  <!-- FOOTER -->
  <div class="ui inverted vertical footer segment">
    <div class="ui center aligned container">
      <div class="ui stackable inverted divided grid">
        <div class="three wide column">
          <h4 class="ui inverted header">Group 1</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link One</a>
            <a href="#" class="item">Link Two</a>
            <a href="#" class="item">Link Three</a>
            <a href="#" class="item">Link Four</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Group 2</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link One</a>
            <a href="#" class="item">Link Two</a>
            <a href="#" class="item">Link Three</a>
            <a href="#" class="item">Link Four</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Group 3</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Link One</a>
            <a href="#" class="item">Link Two</a>
            <a href="#" class="item">Link Three</a>
            <a href="#" class="item">Link Four</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Footer Header</h4>
          <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
        </div>
      </div>
      <div class="ui inverted section divider"></div>
      <img src="" class="ui centered mini image">
      <div class="ui horizontal inverted small divided link list">
        <a class="item" href="#">Site Map</a>
        <a class="item" href="#">Contact Us</a>
        <a class="item" href="#">Terms and Conditions</a>
        <a class="item" href="#">Privacy Policy</a>
      </div>
    </div>
  </div>
  <!-- FOOTER // -->