$(document).ready(function() {
    $('#departamentos').on('change', function() {
        var proyect_id = $(this).val();
        if (proyect_id == 0) {
            $('#ciudades').html('<option value="0">Seleccione una ciudad</option>');
        }
        $.get('/ciudades/' + proyect_id, function(data) {
            var select_ciudad = '<option value="">Seleccione una ciudad</option>';
            for (var i = 0; i < data.length; ++i) {
                select_ciudad += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';
                $('#ciudades').html(select_ciudad);
            }
        });
    });
    $('.customFile').disabled = true;

});

function active(id) {
    var path = window.location.hostname;
    var url = 'http://' + path + ':8000/' + 'administrador/changeTemplates/' + id;
    $.ajax({
        url: url,
        success: function(data) {
            location.reload(true);
        }
    });
}