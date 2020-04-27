<!-- SECTION TITLE -->
<div class="ui container">
    <div class="ui divider"></div>
</div>
<div class="ui padded container">
    <div class="ui container">
        <div class="ui segment">
            <h2>Pesanan</h2>
            <div class="ui breadcrumb">
                {{ link_to("/", "Home", "class":"section") }}
                <i class="icon right angle divider"></i>
                <div class="section active">
                    {{ get_title() }}
                    {% if order is defined %}
                        {{ order['service_code'] ~ order['order_id'] }}
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui container">
    <div class="ui divider"></div>
</div>
<!-- SECTION TITLE // -->