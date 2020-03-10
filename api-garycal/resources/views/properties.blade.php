@extends('layout') @section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li class="active">Propiedades</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<div class="container">
    <div class="row">
        <!-- Results -->
        <div class="col-md-9 col-sm-12">
            <section id="results">
                <header>
                    <h1>Lista de propiedades</h1></header>

                <section id="properties" class="display-lines">

                    @foreach ($properties as $index =>  $property)
                    @php
                        $image = collect($property->photos->where('principal',1)->all())->first()->route;
                        $image = (strpos($image, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas/'.$image : url('storage').'/'.$image ;

                    @endphp
                    <div class="property" style="margin-bottom: 30px;">
                        {{-- <figure class="type" title="Apartment"><img src="{{$image}}" alt=""></figure> --}}
                        <div class="property-image">
                            @if ($property->status == 'vendida')
                            <figure class="ribbon">Vendida</figure>
                            @endif

                            <a href="{{url('propiedades/'.$property->id)}}">
                                <img alt="" src="{{$image}}">
                            </a>
                        </div>
                        <div class="info">
                            <header>
                                <a href="{{url('propiedades/'.$property->id)}}"><h3>{{$property->address}}</h3></a>
                                {{-- <figure>Worthington, OH 43085</figure> --}}
                            </header>
                            <div class="tag price">{{$property->type}}</div>
                            <aside>
                                <p>{{substr($property->description, 0, 200).'...'}}
                                </p>
                                <dl>
                                    <dt>Estado:</dt>
                                    <dd>{{$property->status}}</dd>
                                    <dt>Area:</dt>
                                    <dd>{{$property->surface}} m<sup>2</sup></dd>
                                    <dt>Cuartos:</dt>
                                    <dd>{{$property->rooms}}</dd>
                                    <dt>Baños:</dt>
                                    <dd>{{$property->baths}}</dd>
                                </dl>
                            </aside>
                            <a href="{{url('propiedades/'.$property->id)}}" class="link-arrow">Leer mas</a>
                        </div>
                    </div>

                    @if ($index == 3)
                        <section id="advertising">
                            <a href="submit.html">
                                <div class="banner">
                                    <div class="wrapper">
                                        <span class="title">Contacta a un agente de Invesiones Garycal</span>
                                        <a class="submit" href="https://wa.me/584163912651?text=Me gustaria tener informacion de sus servicios - Contacto desde la pagina web">0416-391-2651 <i class="fa fa-plus-square"></i></a>
                                    </div>
                                </div><!-- /.banner-->
                            </a>
                        </section>
                    @endif
                    <!-- /.property -->
                    @endforeach

                    <div class="center">
                        {{ $properties->links() }}
                    </div>

                </section>
                <!-- /#properties-->
            </section>
            <!-- /#results -->
        </div>
        <!-- /.col-md-9 -->
        <!-- end Results -->

        <!-- sidebar -->

        <!-- /.col-md-3 -->
        <!-- end Sidebar -->
    </div>
    <!-- /.row -->
</div>

@endsection
