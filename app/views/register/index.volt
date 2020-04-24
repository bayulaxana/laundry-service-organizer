<div class="ui column two grid stackable equal width container">
    <div class="seven wide column">
        <div class="ui attached message">
            <div class="header">
                <h2>Belum punya akun? Daftar sekarang</h2>
            </div>
            <p>Isi form berikut untuk mendaftarkan akun baru</p>
        </div>
        <form action="/register" method="post" class="ui form attached fluid segment">
            {{ flash.output() }}
            <div class="field">
                {{ form.label('name') }}
                {{ form.render('name', ['placeholder': 'Nama']) }}
            </div>
            <div class="field">
                {{ form.label('username') }}
                {{ form.render('username', ['placeholder': 'Username']) }}
            </div>
            <div class="field">
                {{ form.label('password') }}
                {{ form.render('password', ['placeholder': 'Password']) }}
            </div>
            <div class="field">
                {{ form.label('email') }}
                {{ form.render('email', ['placeholder': 'Email']) }}
            </div>
            <div class="field">
                {{ form.label('phone') }}
                {{ form.render('phone', ['placeholder': 'Nomor Telepon']) }}
            </div>
            <div class="field">
                {{ form.label('gender') }}
                {{ form.render('gender') }}
            </div>
            <div class="field">
                <div class="field">
                    {{ form.label('address') }}
                    {{ form.render('address', ['rows': '2', 'placeholder': 'Alamat']) }}
                </div>
            </div>
            <button type="submit" class="ui blue submit button">Submit</button>
        </form>

        <div class="ui bottom attached warning message">
            <i class="icon help"></i>
            Sudah punya akun? <a href="#">Masuk disini</a>
        </div>
    </div>
    <div class="column">
        <h1>AHAHA</h1>
    </div>
</div>