<div class="">
  <div class="carousel">
    <div class="carousel-prev"></div>
    <div class="carousel-next"></div>
    <ul class="carousel-pagination">
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
    </ul>
    <ul class="carousel-container">
      <li class="carousel-item">
        <div class="item-1" style="background-image: url( 'img/bg-carousel.jpg' );">
        </div>
      </li>
      <li class="carousel-item">
        <div class="item-2" style="background-image: url( 'img/bg-carousel.jpg' );"></div>
      </li>
      <li class="carousel-item">
        <div class="item-3" style="background-image: url( 'img/bg-carousel.jpg' );"></div>
      </li>
    </ul>
  </div>
</div>

<div class="ui container">
  <div class="ui divider"></div>
</div>

<div class="ui container">
  <div class="ui vertical segment">
    <h1 class="ui center aligned header">
      Layanan Kami
    </h1>
    <div class="ui" style="text-align: center;">
      <p class="ui">Donec sed odio dui. Etiam porta sem malesuada magna mollis
        euismod.</p>
    </div>
    <div class="ui segment">
      <div class="ui three column stackable center aligned grid container">
        <div class="column">
          <img class="ui centered small circular image"
            src="https://image.freepik.com/free-vector/laundry-cleaning-illustration-with-washing-machine_24908-59523.jpg" />
          <h1 class="ui header">Cuci Kering</h1>
          <p>
            Pencucian menggunakan mesin cuci higienis hingga kering.
          </p>
          <!-- <div class="ui green button">Jadwalkan Penjemputan &raquo;</div> -->
        </div>
        <div class="column">
          <img class="ui centered small circular image"
            src="https://image.freepik.com/free-vector/laundry-cleaning-illustration-with-washing-machine_24908-59523.jpg" />
          <h1 class="ui header">Cuci Setrika</h1>
          <p>
            Pencucian menggunakan mesin cuci, kemudian disetrika dengan rapi.
          </p>
          <!-- <div class="ui green button">Jadwalkan Penjemputan &raquo;</div> -->
        </div>
        <div class="column">
          <img class="ui centered small circular image"
            src="https://image.freepik.com/free-vector/laundry-cleaning-illustration-with-washing-machine_24908-59523.jpg" />
          <h1 class="ui header">Cuci Sepatu</h1>
          <p>
            Ingin mencuci sepatu, tapi malas. Kami juga menyediakan jasa pencucian sepatu.
          </p>
          <!-- <div class="ui green button">Jadwalkan Penjemputan &raquo;</div> -->
        </div>
      </div>
      <div class="ui grid center aligned">
        <div class="column">
          {{
              link_to("/service", '<i class="right arrow icon"></i> Selengkapnya',
                      "class":"ui right labeled icon button blue huge")
          }}
        </div>
      </div>
    </div>
  </div>
</div>
{# Content() #}
<div class="ui grid two column equal width stackable container">
    <div class="column">
      <div class="ui attached message">
        <div class="ui huge header center aligned">Bagaimana kami melayani anda?</div>
      </div>
      <div class="ui segment attached">
        <div class="ui fluid vertical steps">
          <div class="step">
            <i class="shopping basket icon"></i>
            <div class="content">
              <div class="title">
                <h3>Pesan Layanan</h3>
              </div>
              <div class="description">Pilih layanan yang ingin anda gunakan</div>
            </div>
          </div>
          <div class="step">
            <i class="dolly icon"></i>
            <div class="content">
              <div class="title">
                <h3>Penjemputan</h3>
              </div>
              <div class="description">Ajukan penjemputan terhadap barang anda jika ingin</div>
            </div>
          </div>
          <div class="step">
            <i class="dollar icon"></i>
            <div class="content">
              <div class="title">
                <h3>Pembayaran</h3>
              </div>
              <div class="description">Lakukan pembayaran terhadap layanan yang anda pesan</div>
            </div>
          </div>
          <div class="step">
            <i class="hourglass icon"></i>
            <div class="content">
              <div class="title">
                <h3>Pengerjaan</h3>
              </div>
              <div class="description">Pihak kami akan mengerjakan pesananan anda sesuai dengan waktu</div>
            </div>
          </div>
          <div class="step">
            <i class="truck icon"></i>
            <div class="content">
              <div class="title">
                <h3>Pengiriman</h3>
              </div>
              <div class="description">Setelah pesanan anda selesai, anda dapat mengajukan pengiriman barang anda</div>
            </div>
          </div>
        </div>
      </div>
      <div class="segment ui attached right aligned">
        {% set loggedin = session.has('auth') %}
        {% if loggedin %}
          {{ link_to("/order/new", 'Pesan sekarang <i class="right arrow icon"></i>', "class":"ui right labeled icon button green large") }}
        {% else %}
          {{ link_to("/login", 'Masuk untuk memulai <i class="right arrow icon"></i>', "class":"ui right labeled icon button green large") }}
        {% endif %}
      </div>
    </div>
    {% if session.has('auth') == false %}
    <div class="six wide column">
      <div class="ui container">

        <div class="ui attached message">
          <div class="header">
            <h2>Belum punya akun? Daftar sekarang</h2>
          </div>
          <p>Isi form berikut untuk mendaftarkan akun baru</p>
        </div>
        <form action="/register" method="post" class="ui form attached fluid segment">
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
          <div class="inline field">
            <div class="ui checkbox">
              <input type="checkbox" id="terms" name="terms">
              <label for="terms">Saya setuju dengan kebijakan dan ketentuan yang berlaku</label>
            </div>
          </div>
          <button type="submit" class="ui blue submit button">Submit</button>
        </form>

        <div class="ui bottom attached warning message">
          <i class="icon help"></i>
          Sudah punya akun? <a href="#">Masuk disini</a>
        </div>
      </div>
    </div>
    {% endif %}
  </div>