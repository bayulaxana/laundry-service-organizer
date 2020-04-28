<div class="ui container">
    {{ partial('layouts/partial/item-partial') }}
</div>

<div class="ui container">
    <div class="ui top attached compact menu stackable inside pointing inverted small blue">
        <div class="ui item header">Daftar Item</div>
        <div class="right menu">
            <div class="item">
                <form method="GET" class="ui icon input">
                    <input type="text" name="search" placeholder="Cari item...">
                    <i class="icon search"></i>
                </form>
            </div>
            <div class="item hoverable">
                {{ link_to('/myitem/new', '<i class="icon add"></i>Tambah Item Baru', 'class': 'ui black compact icon button') }}
            </div>
        </div>
    </div>
    <div class="ui attached segment" id="item-list-segment">
        {{ flashSession.output() }}
        <div class="ui pagination menu small blue">
            {{ link_to( pageUrl ~ page.previous, "Sebelum", "class": "item" ) }}
            {{ link_to( pageUrl ~ page.next, "Selanjutnya", "class": "item" ) }}
        </div>
        <div class="ui divider hidden"></div>
        <div class="ui five cards stackable">
        {% for row in page.items %}
            <div class="card">
                <div class="ui image">
                    <div class="ui placeholder">
                        <div class="square image"></div>
                    </div>
                    <img src="{{ row['item_image'] }}" class="placeholder-show"/>
                </div>
                <div class="content">
                    <div class="ui placeholder">
                        <div class="header">
                            <div class="very short line"></div>
                            <div class="medium line"></div>
                        </div>
                        <div class="paragraph">
                            <div class="short line"></div>
                        </div>
                    </div>
                    <div class="placeholder-show">
                        <div class="header">{{ row['item_details'] }}</div>
                        <div class="meta">{{ row['item_type'] }}</div>
                    </div>
                </div>
                <div class="extra content placeholder-show">
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