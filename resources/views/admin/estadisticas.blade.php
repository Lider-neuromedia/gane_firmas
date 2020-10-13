 @extends('admin.layout')

 @section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Estadistica</h1>
          </div><!-- /.col -->
        
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $count }}</h3>
                <p>Usuarios registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $masters }}</h3>
                <p>Masters registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-cog"></i>             
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $admins }}</h3>
                <p>Administradores registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-shield"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $colaboradores }}</h3>
                <p>Colaboradores registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i> 
              </div>
            </div>
          </div>
          <div class="col">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{ $bloqueados }}</h3>
                <p>Usuarios bloqueados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-lock"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-cloud-download-alt"></i>
                  Descargas de firma
                </h3>
                <div class="card-tools">
                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">{{ $download_total }} descargas en total</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> --}}
                </div>
              </div>
              <div class="card-body p-2">
                <table id="myTable2" class="table table-striped table-bordered pb-3" style="width:100%">
                  <thead>
                       <tr>
                           <th width="10px">Nombre</th>
                           <th width="10px">Descargas</th>
                       </tr>
                  </thead>
               </table>
              </div>
            </div>
          </section>
          <section class="col-lg-6 connectedSortable">
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-eye mr-1"></i>
                  Auditoría
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item mr-1 ml-1">
                      <a class="nav-link btn btn-blue active" href="#iniciado" data-toggle="tab">Inicio de sesión</a>
                    </li>
                    <li class="nav-item mr-1 ml-1">
                      <a class="nav-link btn btn-blue" href="#cerrado" data-toggle="tab">Cerrada la sesión</a>
                    </li>
                    <li class="nav-item mr-1 ml-1">
                      <a class="nav-link btn btn-blue" href="#actualizado" data-toggle="tab">Actualizado sus datos</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="tab-pane active" id="iniciado" style="position: relative; height: 300px;">
                    <table id="myTable3" class="table table-striped table-bordered pb-3" style="width:100%">
                      <thead>
                           <tr>
                               <th width="10px">Nombre</th>
                               <th width="10px">Inicio de sesión</th>
                           </tr>
                      </thead>
                   </table>
                  </div>
                  <div class="tab-pane" id="cerrado" style="position: relative; height: 300px;">
                    <table id="myTable4" class="table table-striped table-bordered pb-3" style="width:100%">
                      <thead>
                           <tr>
                               <th width="10px">Nombre</th>
                               <th width="10px">Cerrada la sesión</th>
                           </tr>
                      </thead>
                   </table>
                  </div>
                  <div class="tab-pane" id="actualizado" style="position: relative; height: 300px;">
                    <table id="myTable5" class="table table-striped table-bordered pb-3" style="width:100%">
                      <thead>
                           <tr>
                               <th width="10px">Nombre</th>
                               <th width="10px">Datos actualizados</th>
                           </tr>
                      </thead>
                   </table>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @endsection