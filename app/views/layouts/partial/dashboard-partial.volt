<!-- SECTION TITLE -->
<div class="ui container">
    <div class="ui divider"></div>
</div>
<div class="ui padded container">
    <div class="ui container">
        <div class="ui segment">
            <h2>Dashboard</h2>
            <div class="ui breadcrumb">
                {{ link_to("/", "Home", "class":"section") }}
                <i class="icon right angle divider"></i>
                {{ link_to("/dashboard", "Dashboard", "class":"section") }}
                <i class="icon right angle divider"></i>
                <div class="section active">{{ get_title() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="ui container">
    <div class="ui divider"></div>
</div>
<!-- SECTION TITLE // -->

<!-- Attached Menu -->
<div class="ui top attached compact menu inside pointing inverted">
    <a class="active item">
        Aktivitas Pesanan
    </a>
    <a class="item">
        Riwayat Pesanan
    </a>
    <div class="right menu">
        <!-- NO ITEM -->
    </div>
</div>
<!-- Attached Menu // -->