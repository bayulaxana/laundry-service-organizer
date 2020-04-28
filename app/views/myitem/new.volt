<div class="ui container">
    <div class="ui divider hidden"></div>
    <div class="ui attached message">
        <h2>Tambah Item Baru</h2>
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
                Unggah foto dari item anda. Jika tidak unggah foto, maka akan ditampilkan foto default
                <div class="ui divider"></div>
                {{ form.render('item_image') }}
            </div>
            <input type="submit" value="Simpan" class="ui button blue"/>
            <a href="/myitem" class="ui button black">Kembali</a>
        </form>
    </div>
</div>