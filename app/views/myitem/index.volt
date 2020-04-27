<div class="ui container">
    {{ partial('layouts/partial/item-partial') }}
</div>

<div class="ui container">
    <div class="ui top attached compact menu inside pointing inverted">
        <div class="ui item header">Daftar Item</div>
        <div class="right menu">
            <div class="item hoverable">
                {{ link_to('/myitem/new', '<i class="icon add"></i>Tambah Item Baru', 'class': 'ui green compact icon button') }}
            </div>
        </div>
    </div>
    <div class="ui attached segment">
        {{ flashSession.output() }}
        <div class="ui five cards stackable">
        {% for row in page.items %}
            <div class="card">
                <div class="ui image">
                    {{ image( row['item_image']) }}
                </div>
                <div class="content">
                    <div class="header">{{ row['item_details'] }}</div>
                    <div class="meta">{{ row['item_type'] }}</div>
                </div>
                <div class="extra content">
                    <button class="ui button small black" onclick="getItemContent({{ row['item_id'] }})">Edit</button>
                    <button class="ui button small red" onclick="getDelete({{ row['item_id'] }})">Hapus</button>
                </div>
            </div>
        {% endfor %}
        </div>

        <div class="ui modal tiny test" id="edit-modal-form">
            <div class="ui header large">Edit Item</div>
            <div class="scrolling content">
                <form class="ui loading form" method="post" id="modal-form" action="/myitem/update">
                    <div class="field">
                        {{ form.render('item_id') }}
                    </div>
                    <div class="field">
                        {{ form.label('item_details') }}
                        {{ form.render('item_details') }}
                    </div>
                    <div class="field">
                        {{ form.label('item_type') }}
                        {{ form.render('item_type') }}
                    </div>
                    <button class="ui button green" id="modal-submit" type="submit">Edit</button>
                    <div class="ui button black" id="edit-modal-close">Batal</div>
                </form>
            </div>
        </div>

        <div class="ui modal mini" id="delete-modal-form">
            <div class="ui header large">Konfirmasi</div>
            <div class="content">
                <p>Anda yakin ingin menghapus item ini?</p>
            </div>
            <div class="actions">
                <form action="" method="POST">
                    <input type="hidden" name="item_id">
                    <button type="submit" class="ui button red">Hapus</button>
                    <div class="ui button black" id="delete-modal-close">Batal</div>
                </form>
            </div>
        </div>
    </div>

</div>