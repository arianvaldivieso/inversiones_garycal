@extends('layout')

@section('content')


<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Inicio</a></li>
        <li><a href="{{url('propiedades')}}">Propiedades</a></li>
        <li class="active">{{$property->address}}</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<div class="container">
    <div class="row">
        <!-- Results -->
        <div class="col-md-9 col-sm-12">

            <section id="property-detail">
                <header class="property-title">
                    <h1>{{$property->address}}</h1>
                    <figure>{{$property->referral_point}}</figure>
                </header>
                <section id="property-gallery">
                    <div class="owl-carousel property-carousel">
                        @foreach ($property->photos()->get() as $image)
                            @php
                                $image = $image->route;
                                $image = (strpos($image, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas/'.$image : url('storage').'/'.$image ;

                            @endphp
                            <div class="property-slide">
                                <a href="{{$image}}" class="image-popup">
                                    <div class="overlay"><h3>Front View</h3></div>
                                    <img alt="" src="{{$image}}">
                                </a>
                            </div>
                        @endforeach

                    </div><!-- /.property-carousel -->
                </section>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <section id="quick-summary" class="clearfix">
                            <header><h2>Resumen rapido</h2></header>
                            <dl>
                                <dt>Ciudad</dt>
                                    <dd>{{$property->city}}</dd>
                                <dt>Precio</dt>
                                    <dd><span class="tag price">Precio a consultar</span></dd>
                                <dt>Tipo de propiedad:</dt>
                                    <dd>{{$property->type}}</dd>
                                <dt>Estado:</dt>
                                    <dd>{{$property->status}}</dd>
                                <dt>Area:</dt>
                                    <dd>{{$property->surface}} m<sup>2</sup></dd>
                                <dt>Cuartos:</dt>
                                    <dd>{{$property->rooms}}</dd>
                                <dt>Baños:</dt>
                                    <dd>{{$property->baths}}</dd>
                                <dt>Garages:</dt>
                                    <dd>{{$property->garages}}</dd>
                            </dl>
                        </section><!-- /#quick-summary -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-12">
                        <section id="description">
                            <header><h2>Descripcion de la propiedad</h2></header>
                            <p>
                                {{$property->description}}
                            </p>
                        </section><!-- /#description -->
                        <section id="property-features">
                            <header><h2>Caracteristicas</h2></header>
                            <ul class="list-unstyled property-features-list">
                                @foreach ($property->feactures as $feacture)
                                    <li>{{$feacture}}</li>
                                @endforeach
                            </ul>
                        </section><!-- /#property-features -->
                    </div><!-- /.col-md-8 -->
                    <div class="col-md-12 col-sm-12">
                        <section id="contact-agent">
                            <header><h2>Contacta a uno de nuestros agentes</h2></header>
                            <div class="row">
                                <section class="agent-form">
                                    <div class="col-md-12 col-sm-12">
                                        <aside class="agent-info clearfix" style="padding-left: 0px !important;">
                                            {{-- <figure><a href="agent-detail.html"><img alt="" src="assets/img/agent-01.jpg"></a></figure> --}}
                                            <div class="agent-contact-info">
                                                <h3>Inversiones Garycal C.A</h3>
                                                <p>
                                                    Somos una empresa capaz de crear soluciones modernas, funcionales y sostenibles, satisfaciendo todos los aspectos de la arquitectura e ingeniería de la manera más eficiente y práctica, proporcionando propuestas innovadoras y vanguardistas, manteniendo los mejores estándares de calidad en nuestros procesos constructivos de la mano a ofrecer las mejores opciones en el mercado inmobiliario con el mejor respaldo funcional y legal que certifiquen la "Garantía y Calidad" que se requiere.
                                                </p>
                                                <dl>
                                                    <dt>Telefono:</dt>
                                                    <dd>0416-391-2651</dd>
                                                    <dt>Email:</dt>
                                                    <dd><a href="mailto:#">inversionesgarycal@gmail.com</a></dd>
                                                </dl>
                                                <hr>
                                            </div>
                                        </aside><!-- /.agent-info -->
                                    </div><!-- /.col-md-7 -->

                                </section><!-- /.agent-form -->
                            </div><!-- /.row -->
                        </section><!-- /#contact-agent -->
                        <hr class="thick">
                        <section id="similar-properties">
                            <header><h2 class="no-border">Propiedades similares</h2></header>
                            <div class="row">

                                @foreach ($similars as $property)
                                @php
                                    $image = collect($property->photos->where('principal',1)->all())->first()->route;
                                    $image = (strpos($image, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas/'.$image : url('storage').'/'.$image ;

                                @endphp
                                    <div class="col-md-4 col-sm-6">
                                        @include('components/properties/mini',compact('property','image'))
                                    </div><!-- /.col-md-3 -->
                                @endforeach

                            </div><!-- /.row-->
                        </section><!-- /#similar-properties -->
                        <hr class="thick">

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </section>

        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3 col-sm-12">
            <div id="contact">
                <div class="form-group">
                    @php
                        $url_encode = urlencode('Me gustaria tener informacion de la propiedad '.$property->id.' - '.$property->address.' - Contacto desde la pagina web')
                    @endphp
                    <a href="https://wa.me/584163912651?text={{$url_encode}}" target="_blank" class="btn btn-default">Pedir información de este producto</a>
                </div>
            </div>
        </div>


    </div>
    <!-- /.row -->
</div>

@endsection
