<form class="ui form" method="POST" action="/myitem/new" enctype="multipart/form-data">
    <div class="field">
        {{ form.label('item_details') }}
        {{ form.render('item_details') }}
    </div>
    <div class="field">
        {{ form.label('item_type') }}
        {{ form.render('item_type') }}
    </div>
    <div class="field">
        {{ form.label('item_image') }}
        {{ form.render('item_image') }}
    </div>
    <input type="submit" value="SUbmit"/>
</form>