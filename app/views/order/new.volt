<div class="ui container">
    {{ partial('layouts/partial/order-partial') }}
</div>

<div action="" class="ui grid container">
    <div class="ten wide column">
        <div class="ui message top attached">
            
        </div>
        <div class="segment ui attached">

            <!-- LOADER -->
            <div id="loader" class="ui segment">
                <p></p>
                <div class="ui inverted active dimmer">
                    <div class="ui loader"></div>
                </div>
            </div>
            <!-- LOADER // -->

            {{ link_to(url('order'), "Batalkan", "class": "ui button small red") }}

            <!-- STEP BAR -->
            <div class="ui ordered three steps" style="width: 100%;">
                <div id="stepbar-one" class="active step">
                    <div class="content">
                        <div class="title">Pilih Layanan</div>
                        <div class="description">Pilih layanan yang ingin anda pesan</div>
                    </div>
                </div>
                <div id="stepbar-two" class="step disabled">
                    <div class="content">
                        <div class="title">Pilih Item Anda</div>
                        <div class="description">Pilih item-item milik anda</div>
                    </div>
                </div>
                <div id="stepbar-three" class="step disabled">
                    <div class="content">
                        <div class="title">Konfirmasi Pesanan</div>
                        <div class="description">Lakukan konfirmasi terhadap pesanan anda</div>
                    </div>
                </div>
            </div>
            <!-- STEP BAR // -->

            <!-- FORM -->
            <form action="" method="post" class="ui form loading" id="order-form">
                <!-- STEP #1 -->
                <div id="step-one">
                    <div class="field">
                        {{ form.label('service') }}
                        {{ form.render('service') }}
                    </div>
                    <button id="next-one" onclick="executeStepOne()" type="button"
                        class="ui green disabled right labeled icon button">
                        <i class="right arrow icon"></i>
                        Selanjutnya
                    </button>
                </div>
                <!-- STEP #1 // -->

                <!-- STEP #2 -->
                <div id="step-two">
                    <div class="field">
                        {{ form.label('item') }}
                        {{ form.render('item') }}
                    </div>
                    <button onclick="backToStepOne()" type="button" class="ui black left labeled icon button">
                        <i class="left arrow icon"></i>
                        Kembali
                    </button>
                    <button onclick="executeStepTwo()" type="button" class="ui green right labeled icon button">
                        <i class="right arrow icon"></i>
                        Selanjutnya
                    </button>
                </div>
                <!-- STEP #2 // -->

                <!-- STEP #3 -->
                <div id="step-three">
                    <div class="ui segment">
                        <div class="ui header">Berikut adalah rincian pesanan anda</div>
                        <table class="ui very basic celled table compact selectable">
                            <tbody>
                                <tr>
                                    <td>Jenis Layanan</td>
                                    <td id="detail-service"></td>
                                </tr>
                                <tr>
                                    <td>Biaya</td>
                                    <td id="">Rp4.500,00 per Kg</td>
                                </tr>
                                <tr class="disabled">
                                    <td>Berat/Jumlah</td>
                                    <td>Menunggu Pesanan Anda</td>
                                </tr>
                                <tr class="disabled">
                                    <td>Total</td>
                                    <td>Menunggu Pesanan Anda</td>
                                </tr>
                                <tr>
                                    <td>Daftar Item</td>
                                    <td>
                                        <ul class="ui list" id="item-selected-list">
                                            
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui grid padded">
                        <button onclick="backToStepTwo()" type="button" class="ui black left labeled icon button">
                            <i class="left arrow icon"></i>
                            Kembali
                        </button>
                        <button type="submit" class="ui green left labeled icon button">
                            <i class="check icon"></i>
                            Konfirmasi
                        </button>
                    </div>
                </div>
                <!-- STEP #3 // -->

            </form>
            <!-- FORM // -->

        </div>
    </div>
</div>