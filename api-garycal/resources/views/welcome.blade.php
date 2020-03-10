@extends('layout')

@section('slider')
    @includeIf('partials/slider',compact('sliders'))
@endsection

@section('content')

    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
          <div class="container">
              <h1 class="no-bottom-margin no-border">Contacta a un agente de Invesiones Garycal <a href="https://wa.me/584163912651?text=Me gustaria tener informacion de sus servicios - Contacto desde la pagina web"><strong>Telefono:</strong> 0416-391-2651</a>!</h1>
          </div>
        </div>
    </section>

    <section id="our-services" class="block">
      <div class="container">
          <header class="section-title"><h2>Conocenos</h2></header>
          <div class="row">
              <div class="col-md-4 col-sm-4">
                  <div class="feature-box equal-height">
                      <figure class="icon"><i class="fa fa-folder"></i></figure>
                      <aside class="description">
                          <header><h3>Quienes somos</h3></header>
                          <!-- <p>Somos una empresa capaz de crear soluciones modernas, funcionales y sostenibles, satisfaciendo todos los aspectos de la arquitectura e ingeniería de la manera más eficiente y práctica, proporcionando propuestas innovadoras y vanguardistas, manteniendo los mejores estándares de calidad en nuestros procesos constructivos de la mano a ofrecer las mejores opciones en el mercado inmobiliario con el mejor respaldo funcional y legal que certifiquen la "Garantía y Calidad" que se requiere. </p> -->
                          <a href="properties-listing.html" class="link-arrow">Leer mas</a>
                      </aside>
                  </div><!-- /.feature-box -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4 col-sm-4">
                  <div class="feature-box equal-height">
                      <figure class="icon"><i class="fa fa-users"></i></figure>
                      <aside class="description">
                          <header><h3>Mision y Vision.</h3></header>
                          <!-- <p>Mision: Desarrollar y ofrecer espacios de vida con garantía y calidad para las familias, en las diferentes y mejores ubicaciones del Estado Bolívar y el Estado Anzoátegui.</p>
                          <p>Vision: Ser una constructora e inmobiliaria líder, innovadora en sus obras y servicios brindando a sus clientes la mayor confiabilidad.</p> -->
                          <a href="agents-listing.html" class="link-arrow">Leer mas</a>
                      </aside>
                  </div><!-- /.feature-box -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4 col-sm-4">
                  <div class="feature-box equal-height">
                      <figure class="icon"><i class="fa fa-money"></i></figure>
                      <aside class="description">
                          <header><h3>Valores Corporativos.</h3></header>
                          <!-- <p>
                           <li> Compromiso de satisfaccián con nuestros clientes que nos brindan la confianza de alternativa Inmobiliaria.</li>
                           <li>Innovación en nuestros procesos.</li>
                           <li>Excelencia en el trabajo.</li>
                           <li>Transparencia en nuestra relación.</li>
                           <li>Respeto por la comunidad y el medio ambiente</li>
                          </p> -->
                          <a href="#" class="link-arrow">Leer mas</a>
                      </aside>
                  </div><!-- /.feature-box -->
              </div><!-- /.col-md-4 -->
          </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

    <section id="price-drop" class="block">
      <div class="container">
          <header class="section-title">
              <h2>Ultimas propiedades</h2>
              <a href="{{url('propiedades')}}" class="link-arrow">Todas Las propiedades</a>
          </header>
          <div class="row">
            @foreach ($last_properties as $property)
                <div class="col-md-3 col-sm-6">
                    @include('components/properties/mini',compact('property'))
                </div><!-- /.col-md-3 -->
            @endforeach

          </div><!-- /.row-->
      </div><!-- /.container -->
    </section>

    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section id="agent-detail">

                        <header><h1>Contactanos</h1></header>
                        <section id="contact-information">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <section id="address">

                                        <a style="text-decoration: none;" href="https://wa.me/584163912651?text=Me gustaria tener informacion de sus servicios - Contacto desde la pagina web" target="_blank"><strong>Telefono: </strong>0416-391-2651 </a>
                                        <br>
                                        <a href="#">Correo: inversionesgarycal@gmail.com</a><br>
                                    </section><!-- /#address -->
                                    <section id="social">
                                        <header><h3>Nuestras redes sociales</h3></header>
                                        <div class="agent-social">
                                            {{-- <a href="#" class="fa fa-twitter btn btn-grey-dark"></a> --}}
                                            <a href="https://www.facebook.com/pages/category/Real-Estate/Inversiones-Garycal-CA-319564968778176/" target="_blank" class="fa fa-facebook btn btn-grey-dark"></a>
                                            <a href="https://www.instagram.com/inversionesgarycal/?hl=es-la" target="_blank" class="fa fa-linkedin btn btn-grey-dark"></a>
                                        </div>
                                    </section><!-- /#social -->
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">

                    </section>

                </div>
            </div>
        </div>
    </div>




@endsection
