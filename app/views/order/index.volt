<div class="ui container">
    {{ partial('layouts/partial/order-partial') }}
</div>

<!-- LIST -->
<div class="ui container">
    <div class="ui top attached compact menu inside pointing inverted">
        <div class="ui item header">Riwayat Pesanan</div>
        <div class="right menu">
            <div class="item hoverable">
                {{ link_to('/order/new', '<i class="icon add"></i>Pesanan Baru', 'class': 'ui green compact icon button') }}
            </div>
        </div>
    </div>
    <div class="ui bottom attached segment">

        <div class="ui grid two column equal width divided">
            <div class="row">
                <div class="three wide column">
                    <div class="ui vertical fluid menu">
                        <div class="header item">Urutkan Berdasarkan</div>
                        <a class="disabled item">
                            Closest
                        </a>
                        <a class="disabled item">
                            Most Comments
                        </a>
                        <a class="disabled item">
                            Most Popular
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="ui pagination menu small blue">
                        {{ link_to( '/order?page=' ~ page.previous, "Sebelum", "class": "item" ) }}
                        {{ link_to( '/order?page=' ~ page.next, "Selanjutnya", "class": "item" ) }}
                    </div>
                    <table class="ui selectable compact celled table">
                        <thead class="ui inverted">
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Jenis Layanan</th>
                                <th>Biaya</th>
                                <th>Tanggal Pesanan</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for item in page.items %}
                            <tr>
                                <td>
                                    {{ link_to("/order/detail/" ~ item['order_id'], 
                                        item['service_code'] ~ item['order_id']) }}
                                </td>
                                <td>{{ item['service_name'] }}</td>

                                {% if item['order_total'] == null %}
                                    <td class="disabled">Belum Tersedia</td>
                                {% else %}
                                    <td>{{ item['order_total'] }}</td>
                                {% endif %}

                                <td>{{ date('D, d M Y', strtotime(item['order_date'])) }}</td>
                                
                                {% if item['finish_date'] == null %}
                                    <td class="disabled">Belum Tersedia</td>
                                {% else %}
                                    <td>{{ date('D, d M Y', strtotime(item['finish_date'])) }}</td>
                                {% endif %}

                                <td>
                                    {{ item['order_status'] }}
                                </td>
                            </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- LIST // -->