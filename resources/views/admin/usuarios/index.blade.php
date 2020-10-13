@extends('admin.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios <a class="btn btn-blue letter-space-1 text-white p-1" href="#" data-toggle="modal" data-target="#crear">Crear usuario</a></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('usuarios') }}">usuarios</a></li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>   
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <small class="mb-0">{{ session('success') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <small class="mb-0">{{ session('error') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                        <tr>
                            <th width="10px">ID</th>
                            <th width="10px">Nombre</th>
                            <th width="10px">Cédula</th>
                            <th width="10px">Cargo</th>
                            <th width="10px">Área</th>
                            <th width="10px">Email</th>
                            <th width="10px">Roles</th>
                            <th width="10px">Estado</th>
                            <th width="120px">Acciones</th>
                        </tr>
                   </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="ver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header headerModal">
          <b><h5 class="modal-title usuarioModal" id="exampleModalLabel"></h5></b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body verModal">
            <ul>
                <li><span class="cargo"></span></li>
                <li><span class="area"></span></li>
            </ul>
            <hr>
            <ul>
                <li><i class="far fa-address-card pr-2"></i><span class="cedula"></span></li>
                <li><i class="far fa-envelope pr-2"></i><span class="email"></span></li>
                <li><i class="far fas fa-phone-square pr-2"></i><span class="indicativo1 pr-2"></span><span class="indicativo2 pr-2"></span><span class="telefono pr-2"></span><span class="extension"></span></li>
                <li><i class="fas fa-mobile-alt pr-2"></i><span class="celular"></span></li>
                <li><i class="fas fa-map-marker-alt pr-2"></i><span class="direccion"></span></li>
                <li><i class="far fa-building pr-2"></i><span class="lugar"></span></li>
                <li><i class="fas fa-map-marker-alt pr-2"></i><span class="ciudad"></span></li>
                <li><i class="fas fa-map-marker-alt pr-2"></i><span class="departamento"></span></li>
            </ul>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header headerModal">
          <b><h5 class="usuarioModal m-0" id="exampleModalLabel">Crear usuario</h5></b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body verModal">
            <form action="{{ route('admin.store') }}" method="POST" class="col pb-5" enctype="multipart/form-data" id="formCrear">
                <div class="row">
                {{ csrf_field() }}
                <div class="overflow w-100">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="">
                        {!! $errors->first('nombre', '<div class="row"><div class="col mt-2"><small class="alert alert-danger p-1">:message</small></div></div>') !!}
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="roles_id" class="form-control">
                            <option value="">Seleccione un rol</option>
                            @if(Auth::user()->roles_id == 1)
                                <option value="1">Master</option>
                            @endif
                            <option value="2">Administrador</option>
                            <option value="3">Colaborador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estados_id" class="form-control">
                            <option value="">Seleccione un estado</option>
                            <option value="0">Bloqueado</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Área</label>
                        <input type="text" name="area" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Cédula</label>
                        <input type="number" name="cedula" class="form-control" value="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Indicativos</label>
                            <div class="d-flex">
                                <input type="number" name="indicativo1" class="form-control mr-1" value="57" placeholder="+57" readonly>
                                <select name="indicativo2" class="form-control mr-1" style="padding-left: 1px;padding-right: 1px;">
                                    <option value="">Seleccione un indicativo</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label>Teléfono fijo</label>
                            <input name="telefono" type="number" class="form-control" value="">
                        </div>
                        <div class="form-group col">
                            <label>Extensión</label>
                            <input name="extension" type="number" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="number" name="celular" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Lugar</label>
                        <input type="text" name="lugar" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
                        <select name="departamento_id" id="departamentos" class="form-control">
                            <option value="0">Seleccione un departamento</option>
                            @foreach($deptos as $depto)
                                <option value="{{ $depto->id }}"> {{ $depto->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Ciudad</label>
                        <select name="ciudad_id" id="ciudades" class="form-control">
                            <option value="0" >Seleccione una ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" {{ $ciudad->id }}> {{ $ciudad->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label>Fotografía</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" name="imagen" class="custom-file-input" id="customFile" disabled>
                            <label  class="custom-file-label" for="customFile">Subir archivo</label>
                        </div>
                    </div> --}}
                </div>
            </div>
                <button type="submit" class="btn btn-yellow btn-block mt-5 btn-crear">Actualizar</button>
            </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header headerModal">
          <b><h5 class="modal-title usuarioModal" id="exampleModalLabel"></h5></b>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body verModal">
            <form id="updateForm" action="{{ route('update.usuario') }}" method="POST" class="col pb-5" enctype="multipart/form-data">
                <div class="row">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="">
                <div class="overflow w-100">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="roles_id" class="form-control">
                            <option value="">Seleccione un rol</option>
                            @if(Auth::user()->roles_id == 1)
                                <option value="1">Master</option>
                            @endif
                            <option value="2">Administrador</option>
                            <option value="3">Colaborador</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="estados_id" class="form-control">
                            <option value="">Seleccione un estado</option>
                            <option value="0">Bloqueado</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Área</label>
                        <input type="text" name="area" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Cédula</label>
                        <input type="number" name="cedula" class="form-control" value="">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Indicativos</label>
                            <div class="d-flex">
                                <input type="number" name="indicativo1" class="form-control mr-1" value="57" placeholder="+57" readonly>
                                <select name="indicativo2" class="form-control mr-1" style="padding-left: 1px;padding-right: 1px;">
                                    <option value=""></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                                <!--<input type="number" name="indicativo2" class="form-control" value="{{ auth()->user()->indicativo2 }}">-->
                            </div>
                        </div>
                        <div class="form-group col">
                            <label>Teléfono fijo</label>
                            <input name="telefono" type="number" class="form-control" value="">
                        </div>
                        <div class="form-group col">
                            <label>Extensión</label>
                            <input name="extension" type="number" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="number" name="celular" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Lugar</label>
                        <input type="text" name="lugar" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
                        <select name="departamento_id" id="departamentos2" class="form-control">
                            <option value="0">Seleccione un departamento</option>
                            @foreach($deptos as $depto)
                                <option value="{{ $depto->id }}"> {{ $depto->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Ciudad</label>
                        <select name="ciudad_id" id="ciudades2" class="form-control">
                            <option value="0" >Seleccione una ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}"> {{ $ciudad->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label>Fotografía</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" name="imagen" class="custom-file-input" id="customFile" disabled>
                            <label  class="custom-file-label" for="customFile">Subir archivo</label>
                        </div>
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-yellow btn-block mt-5 btn btn-secondary">Actualizar</button>
            </div>
            </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>

@endsection
