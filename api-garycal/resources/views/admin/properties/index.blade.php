@extends('admin.partial.layout')

@section('title', 'Propiedades')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Propiedades</h5>
                    <div class="heading-elements">
                        <a href="{{url('admin/propiedades/crear')}}" class="btn btn-primary heading-btn">Crear propiedades</a>
                    </div>
                </div>

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dirección</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Cuartos</th>
                            <th>Baños</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($properties as $property)
                            <tr>
                                <td><a href="{{url('admin/propiedades/'.$property->id)}}">{{$property->id}}</a></td>
                                <td>{{($property->address) ? $property->address : 'Sin dirección'}}</td>
                                <td>
                                    @if ($property->type == 'casas')
                                        <span class="label label-success">Casa</span>
                                    @elseif($property->type == 'apartamento')
                                        <span class="label label-primary">Apartamento</span>
                                    @elseif($property->type == 'thown-house')
                                        <span class="label bg-purple">Thown-house</span>
                                    @elseif($property->type == 'locales')
                                        <span class="label label-warning">Local</span>

                                    @elseif($property->type == 'terrenos')
                                        <span class="label label-default">Terrenos</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($property->status == 'espera')
                                        <span class="label label-success">En espera</span>
                                    @elseif($property->status == 'vendido')
                                        <span class="label label-danger">Vendido</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($property->rooms)
                                        {{$property->rooms}}
                                    @else
                                        <span class="label label-danger">Información faltante</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($property->baths)
                                        {{$property->baths}}
                                    @else
                                        <span class="label label-danger">Información faltante</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{url('admin/propiedades/'.$property->id)}}"><i class="icon-pencil"></i> Editar</a></li>
                                                <li><a href="{{url('admin/propiedades/delete/'.$property->id)}}"><i class="icon-trash"></i> Eliminar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript" src="{{url('template')}}/assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="{{url('template')}}/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="{{url('template')}}/assets/js/pages/datatables_basic.js"></script>

@endsection
