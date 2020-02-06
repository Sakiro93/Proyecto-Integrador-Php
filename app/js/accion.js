$(function () {
    $('#model-frm').on({
        submit: function (e) {
            e.preventDefault();
            // validar
            var model = new FormData($(this)[0]);
            $.ajax({
                url: 'accion.php',
                type: 'POST',
                data: model,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false
            }).done(function (data) {
                //console.log(data);
                if (data.resp == true) {
                    alert('Registro se Guardo..');                  
                    window.location = model.get('model') + '.php';
                    return;
                }
                alert(data.error);

            }).fail(function (jqXHR, textStatus) {
                
                alert("Request failed: " + textStatus);
            });
            return false;
        }
    });
    
    $('#tdatos #tdetalle').on('click', 'a[rel="action"]', function (e) {
        e.preventDefault();
        var model = $(this).data('json');

        if (model.action == 'eliminar') {
            if (confirm('Desea Eliminar el Registro')) {
                $.ajax({
                    url: 'eliminar.php',
                    type: 'POST',
                    data: {
                        id: model.id,
                        action: model.action,
                        model: model.entidad
                    },
                    dataType: 'json'
                }).done(function (data) {
                    if (data.resp == true) {
                        window.location.reload();
                        return;
                    }
                    alert(data.error);
                }).fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            }
            return;
        }
        
        window.location = model.entidad + '.php?action=' + model.action + '&id=' + model.id;
    });
});