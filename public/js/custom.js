$(document).ready(function() {

    var table = $('#myTable').DataTable({
        "serverSide": true,
        "ajax": '/api/users',
        "columns": [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'cedula' },
            { data: 'cargo' },
            { data: 'area' },
            { data: 'email' },
            { data: 'roles', name: 'roles.name' },
            { data: 'state', name: 'estados.name' },
            { data: 'btn', orderable: false, searchable: false },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });
    var table2 = $('#myTable2').DataTable({
        "serverSide": true,
        "ajax": '/api/usersMetric',
        "columns": [
            { data: 'nombre' },
            { data: 'download' },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });

    var table3 = $('#myTable3').DataTable({
        "serverSide": true,
        "ajax": '/api/auditsInicio',
        "columns": [
            { data: 'nombre' },
            { data: 'acciones' },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });

    var table4 = $('#myTable4').DataTable({
        "serverSide": true,
        "ajax": '/api/auditsCerrada',
        "columns": [
            { data: 'nombre' },
            { data: 'acciones' },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });

    var table5 = $('#myTable5').DataTable({
        "serverSide": true,
        "ajax": '/api/auditsActualizada',
        "columns": [
            { data: 'nombre' },
            { data: 'acciones' },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });

    var table6 = $('#myTable6').DataTable({
        "serverSide": true,
        "ajax": '/api/audits',
        "columns": [
            { data: 'id' },
            { data: 'nombre' },
            { data: 'nombre_auditado' },
            { data: 'accion' },
            { data: 'resumen' },
            { data: 'fecha' },
        ],
        "language": {
            "info": "Mostrando <b>_TOTAL_</b> registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "lengthMenu": 'Mostrar <select>' +
                '<option value="10">10</option>' +
                '<option value="25">25</option>' +
                '<option value="50">50</option>' +
                '<option value="100">100</option>' +
                '<option value="-1">Todos</option>' +
                '</select> registros',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
        }
    });

    table.on('click', '#modal-ver', function() {
        $tr = $(this).closest('tr');
        var data = (table.row($tr).data());
        $('.usuarioModal').text(data.nombre);

        $('.cargo').text(data.cargo);
        $('.area').text(data.area);
        $('.email').text(data.email);
        $('.cedula').text(data.cedula);
        $('.indicativo1').text('( +' + data.indicativo1 + ' )');
        $('.indicativo2').text(data.indicativo2);
        $('.telefono').text(data.telefono);
        if (data.extension != null || data.extension == '') {
            $('.extension').text('Ext. ' + data.extension);
        }
        if (data.celular == '' || data.celular == null) {
            $('.celular').text('Sin registro');
            $('.celular').addClass('font-italic');
        } else {
            $('.celular').removeClass('font-italic');
            $('.celular').text(data.celular);
        }
        $('.direccion').text(data.direccion);
        $('.lugar').text(data.lugar);
        $('.ciudad').text(data.ciudad);
        $('.departamento').text(data.departamento);
    });

    $('#departamentos2').on('change', function() {
        var proyect_id = $(this).val();
        if (proyect_id == 0) {
            $('#ciudades2').html('<option value="0">Seleccione una ciudad</option>');
        }
        $.get('/ciudades/' + proyect_id, function(data) {
            var select_ciudad = '<option value="">Seleccione una ciudad</option>';
            for (var i = 0; i < data.length; ++i) {
                select_ciudad += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';
                $('#ciudades2').html(select_ciudad);
            }
        });
    });

    table.on('click', '#modal-editar', function() {
        $tr = $(this).closest('tr');
        var data = (table.row($tr).data());
        $('.usuarioModal').text(data.nombre);

        $('input[name="id"]').val(data.id);
        $('input[name="nombre"]').val(data.nombre);
        $('select[name="roles_id"]').val(data.roles_id).attr('selected', 'selected');
        // $('select[name="roles_id"] option:first-child').text(data.roles);
        $('select[name="estados_id"]').val(data.estados_id).attr('selected', 'selected');
        // $('select[name="estados_id"]').text(data.estados);
        $('input[name="cargo"]').val(data.cargo);
        $('input[name="area"]').val(data.area);
        $('input[name="email"]').val(data.email);
        $('input[name="cedula"]').val(data.cedula);
        $('.indicativo1').val(data.indicativo1);
        $('select[name="indicativo2"]').val(data.indicativo2);
        $('input[name="telefono"]').val(data.telefono);
        $('input[name="extension"]').val(data.extension);
        $('input[name="celular"]').val(data.celular);
        $('input[name="direccion"]').val(data.direccion);
        $('input[name="lugar"]').val(data.lugar);
        $('select[name="departamento_id"]').val(data.departamento_id).attr('selected', 'selected');
        // $('select[name="departamento_id"] option:first-child').text(data.departamento);
        $('select[name="ciudad_id"] option:first-child').val(data.ciudades_id).attr('selected', 'selected');
        $('select[name="ciudad_id"] option:first-child').text(data.ciudad);

    });

    $("#formCrear, #updateForm").submit(function(e) {
        e.preventDefault();
        // $('#excel').modal('hide')
        var method = $(this).attr('method');
        var form = $(this).serialize();
        var url = $(this).attr('action');
        $.ajax({
            url: url,
            type: method,
            data: form,
            cache: false,
            // contentType: false,
            processData: false,
            dataType: "JSON",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(data) {
                Swal.fire(
                    'Usuario actualizado!',
                    'Datos actualizados correctamente!',
                    'success'
                );
                $("#crear, #editar").modal('hide');
                $("#formCrear, #updateForm")[0].reset();
                table.ajax.reload();
            },
            error: function(data) {
                if (data.status === 422) {
                    var errors = data.responseJSON.errors;
                    $.each(errors, function(key, val) {
                        var error = JSON.stringify(val[0]);
                        Swal.fire(
                            'Error!',
                            error,
                            'error'
                        );
                    });
                }
            }
        });
    });
    $("#change_state").on('click', function(e) {
        e.preventDefault();
        console.log();
        var method = $(this).attr('method');
        var form = $(this).serialize();
        // console.log(form);
        var url = $(this).attr('action');
        // $.ajax
        // ({
        //     url: url,
        //     type: method,
        //     data: form,
        //     cache: false,
        //     // contentType: false,
        //     processData: false,
        //     dataType: "JSON",
        //     headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        //     success: function(data) {
        //         Swal.fire(
        //             'Usuario actualizado!',
        //             'Datos actualizados correctamente!',
        //             'success'
        //         );
        //         $("#crear").modal('hide');
        //         $("#formCrear")[0].reset();
        //     },
        //     error: function(data) {
        //         if (data.status === 422) {
        //             var errors = data.responseJSON.errors;
        //             $.each(errors, function(key, val) {
        //                 var error = JSON.stringify(val[0]);
        //                 Swal.fire(
        //                     'Error!',
        //                     error,
        //                     'error'
        //                 );
        //             });
        //         }
        //     }
        // });
    });
});