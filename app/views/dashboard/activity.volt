{% if orderDetail['orderCount'] > 0 %}
    {% set activeRatio = 100 * (orderDetail['activeOrder'] / orderDetail['orderCount']) %}
    {% set finishedRatio = 100 * (orderDetail['finishedOrder'] / orderDetail['orderCount']) %}
    {% set waitingRatio = 100 * (orderDetail['waitingOrder'] / orderDetail['orderCount']) %}
{% else %}
    {% set activeRatio = 0 %}
    {% set finishedRatio = 0 %}
    {% set waitingRatio = 0 %}
{% endif %}

<div class="ui container">
    {{ partial('layouts/partial/dashboard-partial') }}

    {# Content of Activity #}
    <div class="ui bottom attached segment">
        <div class="ui menu secondary">
            <div class="ui item header">Aktivitas</div>
            <div class="right menu">
                <div class="item hoverable">
                    {{ link_to('/order/new', '<i class="icon add"></i>Pesanan Baru', 
                        'class': 'ui green compact icon button') }}
                </div>
            </div>
        </div>

        <div class="ui center aligned inverted blue segment">
            <div class="ui large inverted statistic">
                <div class="value">
                    {{ orderDetail['orderCount'] }}
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
                        <h2>{{ orderDetail['activeOrder'] }} Pesanan</h2>
                    </div>
                    <div class="ui vertical segment">
                        <div class="ui blue tiny progress" data-percent="{{ activeRatio }}" id="active-progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
                {{ link_to('/order', 'Lihat Daftar <i class="icon add"></i>', 'class': 'ui bottom labeled icon attached button') }}
            </div>
            <div class="card blue">
                <div class="content">
                    <div class="header">Pesanan Selesai</div>
                    <div class="meta">Pesanan anda yang sudah selesai diproses</div>
                    <div class="description">
                        <h2>{{ orderDetail['finishedOrder'] }} Pesanan</h2>
                    </div>
                    <div class="ui vertical segment">
                        <div class="ui green tiny progress" data-percent="{{ finishedRatio }}" id="finished-progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
                {{ link_to('/order', 'Lihat Daftar <i class="icon add"></i>', 'class': 'ui bottom labeled icon attached button') }}
            </div>
            <div class="card blue">
                <div class="content">
                    <div class="header">Pesanan Menunggu</div>
                    <div class="meta">Pesanan sedang menunggu barang anda</div>
                    <div class="description">
                        <h2>{{ orderDetail['waitingOrder'] }} Pesanan</h2>
                    </div>
                    <div class="ui vertical segment">
                        <div class="ui yellow tiny progress" data-percent="{{ waitingRatio }}" id="finished-progress">
                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
                {{ link_to('/order', 'Lihat Daftar <i class="icon add"></i>', 'class': 'ui bottom labeled icon attached button') }}
            </div>
        </div>
    </div>
</div>