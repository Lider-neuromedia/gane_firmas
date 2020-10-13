@extends('admin.layout')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Auditoría</h1>
         </div>
       </div>
     </div>
   </div>
   <section class="content">
     <div class="container-fluid">
       <!-- /.row -->
       <!-- Main row -->
       <div class="row">
         <!-- Left col -->
         <section class="col-lg-12 connectedSortable">
           <div class="card direct-chat direct-chat-primary">
             <div class="card-header">
                <h3 class="card-title">
                 <i class="fas fa-eye"></i>
                 Acciones de usuarios del sistema
                </h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
               </div>
             </div>
             <div class="card-body p-2">
               <table id="myTable6" class="table table-striped table-bordered pb-3" style="width:100%">
                 <thead>
                      <tr>
                          <th width="10px">id</th>
                          <th width="10px">Usuario</th>
                          <th width="10px">Usuario auditado</th>
                          <th width="10px">Acción</th>
                          <th width="10px">Resumen</th>
                          <th width="10px">Fecha</th>
                      </tr>
                 </thead>
              </table>
             </div>
           </div>
         </section>
       </div>
     </div>
   </section>
@endsection