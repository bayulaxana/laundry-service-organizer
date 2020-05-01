{% set menuOptions = [
    'activity': [
        'icon': 'tasks',
        'name': 'Aktivitas Pesanan',
        'uri': '/dashboard/activity'
    ]
] %}

<!-- SECTION TITLE -->
<div class="ui container">
    <div class="ui divider"></div>
</div>
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
<div class="ui container">
    <div class="ui divider"></div>
</div>
<!-- SECTION TITLE // -->

<!-- Attached Menu -->
<div class="ui top attached compact menu inside pointing inverted blue">
    {% for action, menu in menuOptions %}
        <a href="{{ menu['uri'] }}" class="item {% if action == dispatcher.getActionName()|lower %}active{% endif %}">
            <i class="icon {{ menu['icon'] }}"></i>
            {{ menu['name'] }}
        </a>
    {% endfor %}
    <div class="right menu">
        <!-- NO ITEM -->
    </div>
</div>
<!-- Attached Menu // -->