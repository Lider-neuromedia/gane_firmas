@extends('admin.layout')

@section('content')
<div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Plantillas de firmas corporativas</h1>
         </div>
       
       </div>
     </div>
   </div>

   <section class="content">
     <div class="container-fluid">
       <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header bg-blue">
                      <h3 class="card-title">Deseas cambiar la plantilla de firma corporativa?</h3>
                    </div>
                    <table class="table table-striped table-bordered" style="width:100%">
                      <thead>
                           <tr>
                               <th width="10px">ID</th>
                               <th width="10px">Nombre</th>
                               <th width="10px">Estado</th>
                           </tr>
                      </thead>
                      <tbody>
                        @foreach($templates as $template)
                          <tr>
                            <th scope="row">{{ $template->id }}</th>
                            <td>{{ $template->name }}</td>
                            <td>
                              @if($template->estado == 0)
                                <button type="button" onclick="active({{ $template->id }});" class="activeOff btn btn-sm btn-danger">Inactivo</button>
                              @elseif($template->estado == 1)
                                <button type="button" onclick="active({{ $template->id }});" class="activeOn btn btn-sm btn-success">Activo</button>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                   </table>
                    {{-- <form action="{{ route('admin.template') }}" role="form" method="POST">
                      {{ csrf_field() }}
                      <div class="card-body">
                        <div class="form-check form-check-inline">
                          <input type="hidden" name="id" value="{{ $template->id }}">
                          <input class="form-check-input" type="radio" name="estado" value="{{ $template->estado }}" {{ ($template->estado == 1) ? 'checked = checked' : '' }}>
                          <label class="form-check-label"> {{ $template->name }}</label>
                        </div>
                      </div>
                      @endforeach
                      <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Cambiar plantilla</button>
                      </div>
                    </form> --}}
                </div>
            </div>
        </div>
     </div>
   </section>

   @endsection