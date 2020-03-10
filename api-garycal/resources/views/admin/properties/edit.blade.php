@extends('admin.partial.layout')

@section('title', 'Propiedades')

@section('content')

    @if ($property->status == 'vendida')
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-warning no-border">

                    <span class="text-semibold">Alerta!</span> la propiedad <a href="#" class="alert-link">{{$property->address}}</a>, Esta marcada como vendida.
                </div>
            </div>
        </div>
    @endif

     @if ($property->status == 'pausada')
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-warning no-border">

                    <span class="text-semibold">Alerta!</span> la propiedad <a href="#" class="alert-link">{{$property->address}}</a>, Esta marcada como pausada.
                </div>
            </div>
        </div>
    @endif

    @if (Session::has('status'))
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success no-border">

                    <span class="text-semibold">Exito!</span> {{Session::get('status')}}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-danger no-border">
                Se han encontrado {{$errors->count()}} errores.
            </div>
        </div>
    </div>

    @endif


    <div class="row">
        <div class="col-md-8">
            <form action="{{url("admin/propiedades/".$property->id)}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$property->id}}">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{$property->address}}</h5>

                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset class="text-semibold">
                                    <legend><i class="icon-office position-left"></i> Detalles de la propiedad</legend>

                                    <div class="form-group @error('surface') has-error @enderror">
                                        <label class="control-label">Superficie cuadrada:</label>
                                        <input type="text" class="form-control" name="surface" value="{{old('surface',$property->surface)}}" placeholder="">
                                        @error('surface')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group @error('rooms') has-error @enderror">
                                        <label class="control-label">Número de habitaciones:</label>
                                        <input type="text" class="form-control" name="rooms" value="{{old('rooms',$property->rooms)}}" placeholder="">

                                        @error('rooms')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group @error('baths') has-error @enderror">
                                        <label class="control-label">Número de baños:</label>
                                        <input type="text" class="form-control" name="baths" value="{{old('baths',$property->baths)}}" placeholder="">
                                        @error('baths')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group @error('garages') has-error @enderror">
                                        <label class="control-label">Número de Garages:</label>
                                        <input type="text" class="form-control" name="garages" value="{{old('garages',$property->garages)}}" placeholder="">
                                        @error('garages')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group" @error('address') has-error @enderror>
                                        <label class="control-label">Dirección de la propiedad:</label>
                                        <textarea rows="5" cols="5" name="address" class="form-control" placeholder="Dirección de la propiedad">{{old('address',$property->address)}}</textarea>
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group" @error('referral_point') has-error @enderror>
                                        <label class="control-label">Punto de referencia:</label>
                                        <textarea rows="5" cols="5" name="referral_point" class="form-control" placeholder="Punto de referencia">{{old('referral_point',$property->referral_point)}}</textarea>@error('referral_point')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <legend class="text-semibold"><i class="icon-truck position-left"></i> Caracteristicas</legend>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Estado de la propiedad:</label>

                                                <select data-placeholder="Estado de la propiedad" name="status" class="select">
                                                    @foreach (['espera','vendida','pausada'] as $type)
                                                        <option value="{{$type}}" class="text-capitalize" {{($type == $property->status) ? 'selected' : ''}} >{{$type}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Tipo de propiedad:</label>

                                                <select data-placeholder="Selecciona tu propiedad" name="type" class="select">
                                                    @foreach ($types as $type)
                                                        <option value="{{$type}}" class="text-capitalize" {{($type == $property->type) ? 'selected' : ''}} >{{$type}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Caracteristicas:</label>
                                                @foreach ($feactures as $feacture)
                                                    <div class="checkbox">
                                                        <label class="control-label">
                                                            <input type="checkbox" value="{{$feacture->id}}" name="feactures[]" {{$property->feactures->where('id',$feacture->id)->count() ? 'checked' : ''}}>
                                                            {{$feacture->name}}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Guardar información <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-4">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Imagen principal</h5>

                </div>

                <div class="panel-body">
                    <p class="text-semibold">Sube aqui tu imagen principal:</p>
                    <form action="#" class="dropzone" id="dropzone_single">@csrf</form>
                </div>
            </div>


        </div>

        <div class="col-xs-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Imagenes para la galeria</h5>
                </div>

                <div class="panel-body">

                    <p class="text-semibold">Galeria de imagenes:</p>
                    <form action="#" class="dropzone" id="dropzone_multiple">@csrf</form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript" src="{{url('template')}}/assets/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="{{url('template')}}/assets/js/plugins/forms/styling/uniform.min.js"></script>

<script type="text/javascript" src="{{url('template')}}/assets/js/pages/form_layouts.js"></script>
<script type="text/javascript" src="{{url('template')}}/assets/js/plugins/uploaders/dropzone.min.js"></script>

<script type="text/javascript" src="{{url('template')}}/assets/js/pages/uploader_dropzone.js"></script>

<script>

    (() => {
        $("#dropzone_single").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
            maxFiles: 1,
            url:'{{url("admin/files/upload")}}',
            dictDefaultMessage: 'Arrastra tu imagen o has <span>or CLICK</span>',
            autoProcessQueue: true,
            addRemoveLinks:true,
            dictRemoveFile:'Eliminar Imagen',
            dictUploadCanceled:'Cancelar subida',
            headers: {
                'dropzone-property_id' : {{$property->id}},
                'dropzone-principal': '1'
            },
            init: function () {

                @if ($property->imagePrincipal)

                    let url = "{{(strpos($property->imagePrincipal->route, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas' : url('storage') }}"

                    var mockFile = { name: "",size:0, type: 'image/jpeg' , id: {{$property->imagePrincipal->id}} };
                    this.options.addedfile.call(this, mockFile);
                    this.options.thumbnail.call(this, mockFile, url+"/{{$property->imagePrincipal->route}}");
                    mockFile.previewElement.classList.add('dz-success');
                    mockFile.previewElement.classList.add('dz-complete');

                @endif



                this.on('success', function(file){
                    let photo = JSON.parse(file.xhr.response).photo;
                    file.id = photo.id;
                });

                this.on('removedfile', function(file){

                    $.ajax({
                        url: '{{url("admin/files/delete")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {id: file.id},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:(res) => {
                            console.log(res)
                        }
                    });

                });



            }
        });

        $("#dropzone_multiple").dropzone({
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
            url:'{{url("admin/files/upload")}}',
            dictDefaultMessage: 'Arrastra tu imagen o has <span>or CLICK</span>',
            autoProcessQueue: true,
            addRemoveLinks:true,
            dictRemoveFile:'Eliminar Imagen',
            dictUploadCanceled:'Cancelar subida',
            headers: {
                'dropzone-property_id' : {{$property->id}},
                'dropzone-principal': '0'
            },
            init: function () {

                url = '';

                @foreach ($property->photos as $photo)
                    url = "{{(strpos($photo->route, 'properties') === false) ? 'https://www.inversionesgarycal.com.ve/imagenes/casas' : url('storage') }}"

                    var mockFile = { name: "",size:0, type: 'image/jpeg' , id: {{$photo->id}} };
                    this.options.addedfile.call(this, mockFile);
                    this.options.thumbnail.call(this, mockFile, url+"/{{$photo->route}}");
                    mockFile.previewElement.classList.add('dz-success');
                    mockFile.previewElement.classList.add('dz-complete');
                @endforeach

                this.on('success', function(file){
                    let photo = JSON.parse(file.xhr.response).photo;
                    file.id = photo.id;
                });

                this.on('removedfile', function(file){

                    $.ajax({
                        url: '{{url("admin/files/delete")}}',
                        type: 'post',
                        dataType: 'json',
                        data: {id: file.id},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:(res) => {
                            console.log(res)
                        }
                    });

                });


            }
        });
    })()

</script>






@endsection
