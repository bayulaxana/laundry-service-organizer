<div class="ui column two grid stackable equal width container">
    <div class="column center aligned">
        <h1 class="ui header">
            Selamat datang di Laundry Service Organizer
        </h1>
        <p class="ui medium-text">Kami siap memudahkan urusan anda</p>
        <img src="https://media.istockphoto.com/vectors/laundry-and-dry-cleaning-clothes-service-steps-illustration-vector-vector-id1160418064"
            alt="" class="ui centered big image">
    </div>
    <div class="five wide column">
        <div class="ui message attached">
            <h2>Masuk ke akun anda</h2>
            Masukkan username dan password akun anda
        </div>
        <!-- FORM -->
        <form method="post" class="ui form attached fluid segment error success">
            <div class="field">
                {{ form.label('username') }}
                {{ form.render('username', ['placeholder': 'Username']) }}
            </div>
            {% if messageList['username'] is defined %}
                <div class="ui inverted message tiny red">
                    <div class="header">Terjadi kesalahan</div>
                    <p>{{ messageList['username'] }}</p>
                </div>
            {% endif %}
            <div class="field">
                {{ form.label('password') }}
                {{ form.render('password', ['placeholder': 'Password']) }}
            </div>
            {% if messageList['password'] is defined %}
                <div class="ui message tiny error">
                    <div class="header">Terjadi kesalahan</div>
                    <p>{{ messageList['password'] }}</p>
                </div>
            {% endif %}
            <input type="submit" value="Masuk" class="ui blue submit button"/>
        </form>
        <!-- FORM // -->
        <div class="ui bottom attached warning message">
            <i class="icon help"></i>
            Tidak punya akun? {{ link_to("/register", "Daftar disini", "class": "") }}
        </div>

        <div class="ui fluid card">
            <div class="content">
                <div class="header">Facebook</div>
                <div class="description">
                    Kunjungi akun facebook kami
                </div>
            </div>
            <div class="ui bottom attached facebook button">
                <i class="facebook icon"></i>
                Tambahkan Teman
            </div>
        </div>
        <div class="ui fluid card">
            <div class="content">
                <div class="header">Twitter</div>
                <div class="description">
                    Follow akun twitter LSO
                </div>
            </div>
            <div class="ui bottom attached twitter button">
                <i class="twitter icon"></i>
                Follow
            </div>
        </div>
    </div>
</div>