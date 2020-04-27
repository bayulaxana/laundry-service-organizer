<div class="ui container">
    <div class="ui attached segment">
        
    </div>
    <div class="ui attached segment">
        {{ flash.output() }}
        <form class="ui form" method="POST" action="/myitem/new" enctype="multipart/form-data">
            <div class="field">
                {{ form.label('item_details') }}
                {{ form.render('item_details', ['rows': "2"]) }}
            </div>
            <div class="field">
                {{ form.label('item_type') }}
                {{ form.render('item_type') }}
            </div>
            <div class="field">
                {{ form.label('item_image') }}
                {{ form.render('item_image') }}
            </div>
            <input type="submit" value="Simpan" class="ui button blue"/>
            <a href="/myitem" class="ui button black">Kembali</a>
        </form>
    </div>
</div>