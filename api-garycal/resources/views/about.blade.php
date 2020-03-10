@extends('layout') @section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Inicio</a></li>
        <li class="active">Nosotros</li>
    </ol>
</div>
<!-- end Breadcrumb -->

<div class="container">
    <div class="row">
        <!-- Results -->
        <div class="col-sm-12">
             <section id="content">
                <header><h1>Conocenos</h1></header>
                <section id="legal">
                    <section>
                        <h3>¿Quienes somos?</h3>
                        <p>Somos una empresa capaz de crear soluciones modernas, funcionales y sostenibles, satisfaciendo todos los aspectos de la arquitectura e ingeniería de la manera más eficiente y práctica, proporcionando propuestas innovadoras y vanguardistas, manteniendo los mejores estándares de calidad en nuestros procesos constructivos de la mano a ofrecer las mejores opciones en el mercado inmobiliario con el mejor respaldo funcional y legal que certifiquen la "Garantía y Calidad" que se requiere.</p>
                    </section>
                    <section>
                        <h3>Mision</h3>
                        <p>Mision: Desarrollar y ofrecer espacios de vida con garantía y calidad para las familias, en las diferentes y mejores ubicaciones del Estado Bolívar y el Estado Anzoátegui.</p>
                    </section>
                    <section>
                        <h3>Vision</h3>
                        <p>Vision: Ser una constructora e inmobiliaria líder, innovadora en sus obras y servicios brindando a sus clientes la mayor confiabilidad. </p>
                    </section>
                    <section>
                        <h3>Valores corporativos</h3>
                        <p>
                            <li> Compromiso de satisfaccián con nuestros clientes que nos brindan la confianza de alternativa Inmobiliaria.</li>
                           <li>Innovación en nuestros procesos.</li>
                           <li>Excelencia en el trabajo.</li>
                           <li>Transparencia en nuestra relación.</li>
                           <li>Respeto por la comunidad y el medio ambiente</li>
                        </p>
                    </section>
                </section>
            </section>
            <section id="fun-facts" class="block counting-numbers">
                <header class="center"><h2 class="no-border">Nuestros datos</h2></header>
                <div class="row">
                    <div class="fun-facts">
                        <div class="col-md-4">
                            <div class="number-wrapper">
                                <div class="number" data-from="1" data-to="{{$data['properties']}}">{{$data['properties']}}</div>
                                <figure>Propiedades publicadas</figure>
                            </div><!-- /.number-wrapper -->
                        </div><!-- /.col-md-4 -->
                        <div class="col-md-4">
                            <div class="number-wrapper">
                                <div class="number" data-from="1" data-to="{{$data['solds']}}">{{$data['solds']}}</div>
                                <figure>Propiedades vendidas</figure>
                            </div><!-- /.number-wrapper -->
                        </div><!-- /.col-md-4 -->

                        <div class="col-md-4">
                            <div class="number-wrapper">
                                <div class="number" data-from="1" data-to="{{$data['days']}}">{{$data['days']}}</div>
                                <figure>Dias Trabajando</figure>
                            </div><!-- /.number-wrapper -->
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.fun-facts -->
                </div><!-- /.row -->
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
