<?php

function sweetalert2()
{
    echo "<script>         
    Swal.fire({
        title: 'Error!',
        text: 'Error, algún campo es incorrecto',
        icon: 'error',
        confirmButtonText: 'Cancelar'
    }); 
    </script>";
}


function notyfQuieroSerie()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .success({
        message: 'Guardado en Series que quiero ver!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
      </script>";
}

function notyfVistoSerie()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
        .success({
            message: 'Guardado en Series que he visto ver!.',
            dismissible: true
        })
        .on('dismiss', ({
            target,
            event
        }) => foobar.retry());      
    
          </script>";
}

function notyfQuieroPeli()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .success({
        message: 'Guardado en Películas para ver!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
    
      </script>";
}

function notyfVistoPeli()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
        .success({
            message: 'Guardado en Películas vistas!.',
            dismissible: true
        })
        .on('dismiss', ({
            target,
            event
        }) => foobar.retry());      
    
          </script>";
}

function notyfErrorGuardarBBDD()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .error({
        message: 'Error al guardar en la base de datos!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
      </script>";
}

function notyfErrorEliminarBBDD()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .error({
        message: 'Error al eliminar de la base de datos, no tienes esta serie agreada!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
      </script>";
}

function notyfGuardado()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
        .success({
            message: 'Guardado correctamente en la base de datos!',
            dismissible: true
        })
        .on('dismiss', ({
            target,
            event
        }) => foobar.retry());      
    
          </script>";
}

function notyfEliminadaSerie()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
        .success({
            message: 'Eliminado correctamente en la base de datos!',
            dismissible: true
        })
        .on('dismiss', ({
            target,
            event
        }) => foobar.retry());      
    
          </script>";
}

function notyfErrorBBDD()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .error({
        message: 'Error no se puede valorar una serie que no has visto!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
      </script>";
}

function notyfSerieActualizada()
{
    echo  "<script> 
    const notyf = new Notyf();
    notyf
      .success({
        message: 'Serie actualizada en la base de datos!',
        dismissible: true
      })
      .on('dismiss', ({target, event}) => foobar.retry());          
      </script>";
}