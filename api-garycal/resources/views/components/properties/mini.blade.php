<div class="property" style="margin-bottom: 15px;">
  <a href="{{url('propiedades/'.$property->id)}}">
      <div class="property-image" style="height: 195px !important;">
        @if (isset($image))
        <img alt="" src="{{$image}}" style="height: 100% !important;">
        @else
        <img alt="" src="{{$property->image}}" style="height: 100% !important;">
        @endif

      </div>
      <div class="overlay">
          <div class="info">
              <div class="tag price">{{$property->type}}</div>
              <h3>{{$property->address}}</h3>
              {{-- <figure>Golden Valley, MN 55427</figure> --}}
          </div>
          <ul class="additional-info">
              <li>
                  <header>Area:</header>
                  <figure>{{$property->surface}}<sup>2</sup></figure>
              </li>
              <li>
                  <header>Cuartos:</header>
                  <figure>{{$property->rooms}}</figure>
              </li>
              <li>
                  <header>Baños:</header>
                  <figure>{{$property->baths}}</figure>
              </li>
              <li>
                  <header>Garages:</header>
                  <figure>{{$property->garages}}</figure>
              </li>
          </ul>
      </div>
  </a>
</div>
