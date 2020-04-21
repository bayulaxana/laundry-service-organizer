<div class="ui container">
    {{ partial('layouts/partial/dashboard-partial') }}

    {# Content of Activity #}
    <div class="ui bottom attached segment">
        <div class="ui menu secondary">
            <div class="ui item header">Aktivitas</div>
            <div class="right menu">
                <div class="item hoverable">
                    <a href="" class="ui green compact icon button">
                        <i class="icon add"></i>
                        Pesanan Baru
                    </a>
                </div>
            </div>
        </div>

        <div class="ui center aligned inverted blue segment">
            <div class="ui large inverted statistic">
                <div class="value">
                    2,204
                </div>
                <div class="label">
                    Total Pesanan
                </div>
            </div>
        </div>

        <div class="ui three stackable cards">
            <div class="card blue">
                <div class="content">
                    <div class="header">Pesanan Aktif</div>
                    <div class="meta">Pesanan anda yang sedang diproses</div>
                    <div class="description">
                        <h2>40 Pesanan</h2>
                    </div>
                    <div class="ui vertical segment">
                        <div class="ui red tiny progress" data-percent="40" id="active-progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                    <div class="meta">Pesanan anda yang sedang diproses</div>
                </div>
                <div class="ui bottom labeled icon attached button">
                    Lihat Daftar <i class="icon add"></i>
                </div>
            </div>
            <div class="card blue">
                <div class="content">
                    <div class="header">Pesanan Aktif</div>
                    <div class="meta">Pesanan anda yang sedang diproses</div>
                    <div class="description">
                        <h2>36 Pesanan</h2>
                    </div>
                    <div class="ui vertical segment">
                        <div class="ui blue tiny progress" data-percent="40" id="finished-progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                    <div class="meta">Pesanan anda yang sedang diproses</div>
                </div>
                <div class="ui bottom labeled icon attached button">
                    Lihat Daftar <i class="icon add"></i>
                </div>
            </div>
            <div class="card blue">
                <div class="content">
                    <div class="header">Pesanan Aktif</div>
                    <div class="meta">Pesanan anda yang sedang diproses</div>
                    <div class="description">
                        <h2>30 Pesanan</h2>
                    </div>
                </div>
                <div class="ui bottom labeled icon attached button">
                    Lihat Daftar <i class="icon add"></i>
                </div>
            </div>
        </div>
    </div>
</div>