<x-homepage-layout>

    <!-- Banner Section End -->
    <section class="banner set-bg" data-setbg="" style="background: rgb(124, 104, 104)">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span class="text-white">E-TIKET</span>
                                <h1 class="text-white">Website wisata timur</h1>
                                <a href="#" class="text-white">Pembelian tiket wisata </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- WISAT Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Daftar Wisata</h4>
                    </div>
                </div>

            </div>
            <div class="row property__gallery">

                @foreach ($wisatas as $wisata)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $wisata->foto }}">
                                <div class="label new">{{ $wisata->tarifMasuk }}</div>
                            </div>
                            <div class="product__item__text ">
                                <div class="product__price">
                                    <a href="{{ route('homepage.show', $wisata) }}">{{ $wisata->namaWisata }}
                                    </a>
                                </div>
                                <h6 class="text-bold"> <i class="me-3 fa fa-map-pin"></i>{{ $wisata->lokasiWisata }}
                                </h6>
                                <h6 class="text-bold">{{ $wisata->deskripsiWisata }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Product Section End -->

</x-homepage-layout>
