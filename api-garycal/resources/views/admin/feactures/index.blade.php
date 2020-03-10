@extends('admin.partial.layout')

@section('title', 'Propiedades')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Caracteristicas</h5>
                    <div class="heading-elements">
                        <a href="{{url('admin/propiedades/crear')}}" class="btn btn-primary heading-btn">Crear caracteristicas</a>
                    </div>
                </div>

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Propiedades enlazadas</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($feactures as $feacture)
                            <tr>
                                <td><a href="{{url('admin/caracteristicas/'.$feacture->id)}}">{{$feacture->id}}</a></td>
                                <td>{{$feacture->name}}</td>
                                <td><span class="label label-flat border-primary text-primary-600">{{$feacture->properties()->count()}}</span></td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="{{url('admin/caracteristicas/'.$feacture->id)}}"><i class="icon-pencil"></i> Editar</a></li>
                                                <li><a class="disabled" href="{{url('admin/caracteristicas/delete/'.$feacture->id)}}"><i class="icon-trash"></i> Eliminar</a></li>
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
