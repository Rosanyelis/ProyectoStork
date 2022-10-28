$(window).on('load', function() {
    /**
     * Alertas en la vista
     */
    var registry        = localStorage.getItem('registry');
    var update          = localStorage.getItem('update');
    var deleter         = localStorage.getItem('delete');
    var error           = localStorage.getItem('error');
    var aprobacion      = localStorage.getItem('aprobacion');
    var errorFecha      = localStorage.getItem('errorFecha');

    if (registry) {
        setTimeout(function () {
            toastr['success'](
            'Registro Guardado Exitosamente!',
            'Éxito !',
            {
                closeButton: true,
                tapToDismiss: false
            }
            );
        }, 1000);
        localStorage.clear();
    }
    if (aprobacion) {
        setTimeout(function () {
            toastr['success'](
            'Registro Aprobado Exitosamente!',
            'Éxito !',
            {
                closeButton: true,
                tapToDismiss: false
            }
            );
        }, 1000);
        localStorage.clear();
    }
    if (update) {
        setTimeout(function () {
            toastr['success'](
            'Registro Actualizado Exitosamente!',
            'Éxito !',
            {
                closeButton: true,
                tapToDismiss: false
            }
            );
        }, 1000);
        localStorage.clear();
    }
    if (deleter) {
        setTimeout(function () {
            toastr['success'](
            'Registro Eliminado Exitosamente!',
            'Éxito !',
            {
                closeButton: true,
                tapToDismiss: false
            }
            );
        }, 1000);
        localStorage.clear();
    }
    if (error) {
        setTimeout(function () {
            toastr['error'](
                'Oop! Ha ocurrido un error, por favor verifique!',
                'Error !',
                {
                closeButton: true,
                tapToDismiss: false
                }
            );
            }, 1000);
            localStorage.clear();
    }
    if (errorFecha) {
        setTimeout(function () {
            toastr['error'](
                'Oop! Ya posees un registro de actividades en la fecha actual!',
                'Error !',
                {
                closeButton: true,
                tapToDismiss: false
                }
            );
            }, 2500);
            localStorage.clear();
    }
    

});