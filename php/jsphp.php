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


function notyfQuiero()
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

function notyfVisto()
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
