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
