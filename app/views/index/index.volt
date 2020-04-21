<div class="">
  <div class="carousel">
    <div class="carousel-prev"></div>
    <div class="carousel-next"></div>
    <ul class="carousel-pagination">
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
      <li class="carousel-bullet"></li>
    </ul>
    <ul class="carousel-container">
      <li class="carousel-item">
        <div class="item-1">

        </div>
      </li>
      <li class="carousel-item">
        <div class="item-2"></div>
      </li>
      <li class="carousel-item">
        <div class="item-3"></div>
      </li>
      <li class="carousel-item">
        <div class="item-4"></div>
      </li>
      <li class="carousel-item">
        <div class="item-5"></div>
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
            Donec sed odio dui. Etiam porta sem malesuada magna mollis
            euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
            Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
            Praesent commodo cursus magna.
          </p>
          <!-- <div class="ui green button">Jadwalkan Penjemputan &raquo;</div> -->
        </div>
        <div class="column">
          <img class="ui centered small circular image"
            src="https://image.freepik.com/free-vector/laundry-cleaning-illustration-with-washing-machine_24908-59523.jpg" />
          <h1 class="ui header">Cuci Setrika</h1>
          <p>
            Donec sed odio dui. Etiam porta sem malesuada magna mollis
            euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
            Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
            Praesent commodo cursus magna.
          </p>
          <!-- <div class="ui green button">Jadwalkan Penjemputan &raquo;</div> -->
        </div>
        <div class="column">
          <img class="ui centered small circular image"
            src="https://image.freepik.com/free-vector/laundry-cleaning-illustration-with-washing-machine_24908-59523.jpg" />
          <h1 class="ui header">Cuci Sepatu</h1>
          <p>
            Donec sed odio dui. Etiam porta sem malesuada magna mollis
            euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.
            Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
            Praesent commodo cursus magna.
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
            <i class="truck icon"></i>
            <div class="content">
              <div class="title">
                <h3>Penjemputan</h3>
              </div>
              <div class="description">Jadwalkan penjemputan terhadap barang anda</div>
            </div>
          </div>
          <div class="step">
            <i class="dollar icon"></i>
            <div class="content">
              <div class="title">
                <h3>Pesan Layanan</h3>
              </div>
              <div class="description">Pilih layanan yang ingin anda gunakan</div>
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
            <i class="truck icon"></i>
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
              <div class="description">Setelah pesanan anda selesai, kami akan mengirimkannya ke anda</div>
            </div>
          </div>
        </div>
      </div>
      <div class="segment ui attached right aligned">
        {{ link_to("/login", 
            'Masuk untuk memulai <i class="right arrow icon"></i>',
            "class":"ui right labeled icon button green large")
        }}
      </div>
    </div>

    <div class="six wide column">
      <div class="ui container">

        <div class="ui attached message">
          <div class="header">
            <h2>Belum punya akun? Daftar sekarang</h2>
          </div>
          <p>Isi form berikut untuk mendaftarkan akun baru</p>
        </div>

        <form class="ui form attached fluid segment">
          <div class="two fields">
            <div class="field">
              <label>First Name</label>
              <input placeholder="First Name" type="text">
            </div>
            <div class="field">
              <label>Last Name</label>
              <input placeholder="Last Name" type="text">
            </div>
          </div>
          <div class="field">
            <label>Username</label>
            <input placeholder="Username" type="text">
          </div>
          <div class="field">
            <label>Password</label>
            <input placeholder="Password" type="password">
          </div>
          <div class="field">
            <label>Email</label>
            <input placeholder="Email" type="text">
          </div>
          <div class="field">
            <label>Telepon</label>
            <input placeholder="Telepon" type="text">
          </div>
          <div class="field">
            <div class="field">
              <label>Alamat</label>
              <textarea rows="2" placeholder="Alamat"></textarea>
            </div>
          </div>
          <div class="inline field">
            <div class="ui checkbox">
              <input type="checkbox" id="terms">
              <label for="terms">Saya setuju dengan kebijakan dan ketentuan yang berlaku</label>
            </div>
          </div>
          <div class="ui blue submit button">Submit</div>
        </form>

        <div class="ui bottom attached warning message">
          <i class="icon help"></i>
          Sudah punya akun? <a href="#">Masuk disini</a>
        </div>
      </div>
    </div>
  </div>