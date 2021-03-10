<div id="slider" class="loading">
    <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
    <div class="owl-carousel homepage-slider carousel-full-width">
        @foreach ($sliders as $slide)
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">{{$slide['type']}}</div>
                            <h3 class="text-capitalize" style="text-transform: capitalize;">{{$slide['address']}}</h3>
                        </div>
                        <hr>
                        <a href="{{url('propiedades/'.$slide['property_id'])}}" class="link-arrow">Leer mas</a>
                    </div>
                </div>
                <img alt="" src="{{(strpos($slide['image']->route, 'properties') === false) ? $slide['image']->route : url('storage').'/'.$slide['image']->route }}">
            </div>
        @endforeach

        @if (count($sliders) <=1)
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <div class="tag price">{{$slide['type']}}</div>
                            <h3>{{$slide['address']}}</h3>
                        </div>
                        <hr>
                        <a href="{{url('propiedades/'.$slide['property_id'])}}" class="link-arrow">Leer mas</a>
                    </div>
                </div>
                <img alt="" src="{{(strpos($slide['image']->route, 'properties') === false) ? $slide['image']->route : url('storage').'/'.$slide['image']->route }}">
            </div>
        @endif

    </div>
</div>
