<x-homepage-layout>


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="#"><i class="fa fa-home"></i> Home</a>

                        <span>INVOICE</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Invoice Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>Daftar Wisata KAMU</h4>
                    </div>
                </div>

            </div>
            <div class="row property__gallery">

                @foreach ($orders as $order)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="data:image/jpeg;base64,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">
                                <div class="label new">{{ $order->tarifMasuk }}</div>
                            </div>
                            <div class="product__item__text ">
                                <div class="product__price">
                                    <a href="{{ route('homepage.invoice.show', $order) }}">{{ $order->id }}
                                    </a>
                                </div>
                                <h6 class="text-bold"> <i class="me-3 fa fa-map-pin"></i>{{ $order->lokasiWisata }}
                                </h6>
                                <h6 class="text-bold">{{ $order->deskripsiWisata }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- Invoice Section End -->


</x-homepage-layout>
