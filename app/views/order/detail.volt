{% set progress = [
    'Sedang Dikerjakan': 67,
    'Menunggu Barang': 21,
    'Sudah Selesai': 100
] %}

{% set progressNum = progress[order['order_status']] %}

<div class="ui container">
    {{ partial('layouts/partial/order-partial') }}
</div>

<div class="ui container">
    {{ flashSession.output() }}

    <div class="ui column two grid stackable equal width">
        <div class="column">
            <div class="ui attached message">
                <div class="header large">
                    Nomor Pesanan: {{ order['service_code'] ~ order['order_id'] }}
                </div>
            </div>
            <div class="ui segment attached padded">
                <div class="ui header">Status Pesanan</div>
                <div class="ui indicating small progress" data-value="{{ progressNum }}">
                    <div class="bar"></div>
                    <div class="label">{{ order['order_status'] }}</div>
                </div>
                <div class="ui header">Rincian Pesanan</div>
                <table class="ui basic celled table compact selectable">
                    <tbody>
                        <tr>
                            <td class="ui small header four wide">Jenis Layanan</td>
                            <td id="detail-service">{{ order['service_name'] }}</td>
                        </tr>
                        <tr>
                            <td class="ui small header">Biaya</td>
                            <td id="">Rp{{ number_format(order['service_price'],0,'.','.') }} {{ order['service_unit_scheme'] }}</td>
                        </tr>
                        <tr>
                            <td class="ui small header">Berat/Jumlah</td>
                            <td>{{ order['order_amount'] }}</td>
                        </tr>
                        <tr>
                            <td class="ui small header">Total</td>
                            <td>Rp{{ number_format(order['order_total'],0,'.','.') }}</td>
                        </tr>
                        <tr>
                            <td class="ui small header">Delivery</td>
                            <td>
                            {% if pickupDelivery == null %}
                                <a class="ui button tiny green icon labeled" href="/delivery/new?ordnum={{ order['order_id'] }}">
                                    Ajukan pengiriman
                                    <i class="icon add"></i>
                                </a>
                            {% else %}
                                <div class="ui blue label">
                                    {{ pickupDelivery['pd_status'] }}
                                </div>

                                {% if pickupDelivery['pd_time_est'] != null %}
                                    Estimasi waktu tiba:
                                    {{ date('D, d M Y', strtotime(pickupDelivery['pd_time_est'])) }}
                                {% endif %}

                            {% endif %}
                            </td>
                        </tr>
                        <tr>
                            <td class="ui small header">Daftar Item</td>
                            <td>
                                <ul class="ui list" id="item-selected-list" data-order="{{ order['order_id'] }}">
                                    
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="five wide column">
            <div class="ui segment inverted attached">
                <h3 class="ui header">Catatan Komentar</h3>
            </div>
            <div class="ui segment attached">
                <div class="ui comments">
                    {% for comment in comments %}
                    <div class="comment" id="comment-for-{{ comment['comment_id'] }}" data-comment="{{ comment['comment_id'] }}">
                        <div class="avatar">
                            {{ image(user['profile_img']) }}
                        </div>
                        <div class="content">
                            <a class="author">{{ user['name'] }}</a>
                            <div class="metadata">
                                <span class="date">{{ date('D, d M Y - H:i', strtotime(comment['comment_date'])) }}</span>
                            </div>
                            <div class="text">
                                {{ comment['comment_content'] }}
                            </div>
                            <div class="actions">
                                <a href="#" class="comment-delete-trigger" data-comment="{{ comment['comment_id'] }}">Hapus</a>
                            </div>
                        </div>
                    </div>
                    {% endfor %}
                    <form class="ui reply form" action="/comment/new" method="POST">
                        <div class="field">
                            <input type="hidden" name="order_id" value="{{ order['order_id'] }}">
                        </div>
                        <div class="field">
                            {{ commentForm.render('comment_content', ['rows': '2']) }}
                        </div>
                        {{ commentForm.render('Kirim', ['class': 'ui button']) }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>