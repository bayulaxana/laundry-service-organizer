<!-- NAVIGATION BAR -->
<div class="ui tablet computer only padded grid">
    <div class="ui blue compact top fixed borderless fluid small menu pointing">
        <div class="ui container">
            <a class="header item">LSO</a>
            {% if session.has('auth') %}
                <div class="ui dropdown item">
                Dashboard <i class="dropdown icon"></i>
                <div class="menu">
                    {{ link_to("/dashboard/activity", "Aktivitas Pesanan", "class": "item") }}
                    {{ link_to("/dashboard/latest", "Riwayat Pesanan Terkini", "class": "item") }}
                </div>
                </div>
                {{ link_to("/order", "<i class='icon home'></i>Pesanan", "class": "item") }}
            {% else %}
                {{ link_to("/", "<i class='icon home'></i>Beranda", "class": "item") }}
            {% endif %}
            <a href="/service" class="item">
                <i class="clipboard list icon"></i>
                Layanan Kami
            </a>
            
            <div class="right menu">
                {% if session.has('auth') %}
				{% set mysession = session.get('auth') %}
				<div class="ui dropdown item">
					<i class="icon user circle"></i>
					{{ mysession['username'] }} <i class="dropdown icon"></i>
					<div class="menu">
						{{ link_to("/account", "Profil", "class":"item") }}
						<div class="ui divider"></div>
						{{ link_to("/logout", "Keluar", "class":"item") }}
					</div>
				</div>
				{% else %}
				<div class="item">
                    {{ link_to("/login", "Masuk", "class":"compact ui primary button") }}
                </div>
                <div class="item">
                    {{ link_to("/register", "Daftar", "class":"compact ui button") }}
                </div>
				{% endif %}
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