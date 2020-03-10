<div id="slider" class="loading">
    <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
    <div class="owl-carousel homepage-slider carousel-full-width">

        @foreach ($sliders as $slide)
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">{{$slide['type']}}</div>
                            <h3>{{$slide['address']}}</h3>
                        </div>
                        <hr>
                        <a href="property-detail.html" class="link-arrow">Leer mas</a>
                    </div>
                </div>
                <img alt="" src="{{(strpos($slide['image']->route, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas/'.$slide['image']->route : url('storage').'/'.$slide['image']->route }}">
            </div>
        @endforeach

        {{-- <div class="slide"></div> --}}

    </div>
</div>
