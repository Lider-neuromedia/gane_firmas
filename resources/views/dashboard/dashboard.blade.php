@extends('layouts.master')
@section('title','Dashboard de usuarios gane - Firmas de correo')

@section('content')

    <div class="wrapper">
        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-blue-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn bg-blue-dark">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                <p class="m-0 letter-space-1 txt-sidebar">
                    @if (auth()->user()->roles_id == 1 || auth()->user()->roles_id == 2)
                        <a href="{{ route('estadisticas') }}" class="btn btn-yellow letter-space-1 text-white">Volver a las configuraciones</a>
                    @endif
                    Descarga tu firma de correo corporativa</p>
                </div>
            </nav>
            <section class="dashboard">
                 <div class="wrapper">
                    <div id="content" class="col content pt-3">
                        <div class="p-3 no-gutters row align-content-center flex-column justify-content-center h-100 content-items">
                            <div class="">
                                <canvas id="canvas" width="820px" height="270px"></canvas>
                            </div>
                            <div class="container-btn text-center mt-5">
                                <a href="/descargar" type="button" id="download-image-png" class="btn btn-blue-rounded font-size14 pr-5 pl-5 mr-2 ml-2 pt-2 pb-2">Descargar PNG</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <p class="text-center pt-4 pb-2">
                        <img src="{{ asset('./img/gane_small2.png') }}" class="img-fluid pr-2 pl-2" width="110px" height="auto">
                        <img src="{{ asset('./img/supergiros.svg') }}" class="img-fluid pr-2 pl-2" width="110px" height="auto">
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <span class="text-center">
                        <form class="" method="POST" action="{{ route('logout') }}">
                            {{ csrf_field() }}
                            <input type="submit" class="m-0 btn-clear cerrar-sesion letter-space-1 text-white" value="Cerrar sesión">
                        </form>
                    </span>
                </div>
            </div>
            </div>
            <div class="col">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <h4 class="alert-heading">Buen trabajo!</h4>
                        <small class="mb-0">{{ session('success') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Intenta de nuevo!</h4>
                        <small class="mb-0">{{ session('error') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <form action="{{ route('perfil.update') }}" method="POST" class="col pl-4 pr-4 pb-5" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="overflow">
                    <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" name="nombre" class="form-control" value="{{ auth()->user()->nombre }}">
                    </div>
                    <div class="form-group">
                        <label>Cargo</label>
                        <input type="text" name="cargo" class="form-control" value="{{ auth()->user()->cargo }}">
                    </div>
                    <div class="form-group">
                        <label>Área</label>
                        <input type="text" name="area" class="form-control" value="{{ auth()->user()->area }}">
                    </div>
                    <div class="form-group">
                        <label>Cédula</label>
                        <input type="number" name="cedula" class="form-control" value="{{ auth()->user()->cedula }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Indicativos</label>
                            <div class="indicativo">
                                <input type="number" name="indicativo1" class="form-control mr-1" value="57" placeholder="+57" readonly>
                                <select name="indicativo2" class="form-control mr-1" style="padding-left: 1px;padding-right: 1px;">
                                    <option value="{{ auth()->user()->indicativo2 }}">{{ auth()->user()->indicativo2 }}</option>
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
                            <input name="telefono" type="number" class="form-control" value="{{ auth()->user()->telefono }}">
                        </div>
                        <div class="form-group col">
                            <label>Extensión</label>
                            <input name="extension" type="number" class="form-control" value="{{ auth()->user()->extension }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="number" name="celular" class="form-control" value="{{ auth()->user()->celular }}">
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ auth()->user()->direccion }}">
                    </div>
                    <div class="form-group">
                        <label>Lugar</label>
                        <input type="text" name="lugar" class="form-control" value="{{ auth()->user()->lugar }}">
                    </div>
                    <div class="form-group">
                        <label>Departamento</label>
                        <select name="departamento_id" id="departamentos" class="form-control">
                            <option value="0">Seleccione un departamento</option>
                            @foreach($deptos as $depto)
                                <option value="{{ $depto->id }}" {{ ( $depto->id == auth()->user()->departamento_id) ? 'selected' : '' }}> {{ $depto->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Ciudad</label>
                        <select name="ciudad_id" id="ciudades" class="form-control">
                            <option value="0" >Seleccione una ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" {{ ( $ciudad->id == auth()->user()->ciudad_id) ? 'selected' : '' }}> {{ $ciudad->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fotografía</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" name="imagen" class="custom-file-input" id="customFile" disabled>
                            <label  class="custom-file-label" for="customFile">Subir archivo</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-yellow btn-block mt-5">Actualizar</button>
            </form>
        </nav>
    </div>

    

@endsection


