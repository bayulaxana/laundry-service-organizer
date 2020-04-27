<div class="ui grid equal width stackable container">
    <div class="four wide column">
        <div class="ui fluid card">
            <div class="image">
                <img src="{{ user['profile_img'] }}">
            </div>
            <div class="content">
                <div class="header">{{ user['name'] }}</div>
                <div class="meta">
                    <span class="date">Bergabung tahun {{ date('Y', strtotime( user['register_date'] )) }}</span>
                </div>
                <div class="description">
                    {{ user['address'] }}
                </div>
            </div>
        </div>
        <div class="ui vertical fluid menu">
            <div class="item">
                <i class="grid layout icon"></i> Dashboard
                <div class="menu">
                    <a class="item" href="/dashboard/activity">Aktivitas Pesanan</a>
                    <a class="item" href="/dashboard/latest">Riwayat Pesanan Terakhir</a>
                </div>
            </div>
            <a class="item" href="/order">
                <i class="grid layout icon"></i> Pesanan
            </a>
            <a class="item" href="/myitem">
                <i class="grid layout icon"></i> Item
            </a>
        </div>
    </div>
    <div class="column" id="profile-details">
        <!-- PROFILE -->
        <div class="ui attached message profile-detail-element">
            <div class="ui compact buttons small">
                <button class="ui button labeled icon compact green" id="edit-profile-button">
                    <i class="edit icon"></i>
                    Edit Profil
                </button>
            </div>
        </div>
        <!-- EDIT -->
        <div class="ui attached message edit-detail-element">
            <div class="ui compact buttons small">
                <button class="ui button labeled icon compact black" id="cancel-edit-button">
                    <i class="left arrow icon"></i>
                    Kembali
                </button>
            </div>
        </div>

        <div class="ui attached segment padded">
            {{ flashSession.output() }}
            <!-- Profile Segment-->
            <div class="ui vertical segment profile-detail-element" id="profile-segment">
                <div class="ui grid equal width">
                    <div class="column">
                        <h2>Profil</h2>
                    </div>
                </div>
            </div>
            <div class="ui segment profile-detail-element">
                <div class="ui list very relaxed animated">
                    {% for field, value in userInfo %}
                    <div class="item">
                        <i class="large middle aligned {{ value['icon'] }} icon"></i>
                        <div class="content">
                            <div class="description"><span>{{ value['label'] }}</span></div>
                            <div class="header list-header">{{ value['val'] }}</div>
                        </div>
                    </div>
                    {% endfor %}
                </div>
            </div>
            <!-- Profile Segment //-->

            <!-- Edit Segment -->
            <form action="/account/edit" method="POST" class="ui form edit-detail-element" enctype="multipart/form-data">
                <div class="ui vertical segment vertical-segment">
                    <h2>Biodata Dasar</h2>
                    Ubah biodata data dasar anda pada form berikut
                </div>
                <div class="ui divider hidden"></div>
                <div class="field">
                    <div class="two fields">
                        <div class="field">
                            {{ form.label('name') }}
                            {{ form.render('name') }}
                        </div>
                        <div class="field">
                            {{ form.label('email') }}
                            {{ form.render('email') }}
                        </div>
                    </div>
                </div>
                <div class="field">
                    {{ form.label('phone') }}
                    {{ form.render('phone') }}
                </div>
                <div class="field">
                    {{ form.label('address') }}
                    {{ form.render('address', ['rows': "2"]) }}
                </div>

                <div class="ui vertical segment vertical-segment">
                    <div class="ui grid equal width">
                        <div class="column">
                            <h2>Ubah password</h2>
                            Lengkapi form berikut jika anda ingin mengubah password
                        </div>
                    </div>
                </div>
                <div class="ui divider hidden"></div>
                <div class="field">
                    <label for="password">Ubah Password</label>
                    <input type="password" name="password" id="">
                </div>

                <div class="ui vertical segment vertical-segment">
                    <div class="ui grid equal width">
                        <div class="column">
                            <h2>Ubah Foto Profil</h2>
                            Unggah foto jika anda ingin mengubah foto profil anda
                        </div>
                    </div>
                </div>
                <div class="ui divider hidden"></div>
                <div class="field">
                    <label>Unggah foto</label>
                    <input type="file" name="profile_img" id="">
                </div>

                <div class="field">
                    {{ form.render('Simpan', ['class': 'ui button blue']) }}
                </div>
            </form>
            <!-- Edit Segment //-->

            <!-- Item List -->
            <div class="ui vertical segment profile-detail-element" id="item-segment">
                <div class="ui grid equal width">
                    <div class="column">
                        <h2>Daftar Item</h2>
                    </div>
                    <div class="column right aligned">
                        <a href="/myitem" class="ui button compact black">Kelola Item</a>
                    </div>
                </div>
            </div>
            <div class="ui four stackable cards profile-detail-element">
                {% for item in items %}

                <div class="card">
                    <div class="image">
                        <img src="{{ item['item_image'] }}">
                    </div>
                    <div class="content">
                        <div class="header small">{{ item['item_details'] }}</div>
                        <div class="meta">{{ item['item_type'] }}</div>
                    </div>
                </div>

                {% endfor %}
            </div>
            <!-- Item List // -->
        </div>
    </div>
</div>