<?php

function sweetalert2()
{
    echo "<script>         
    Swal.fire({
        title: 'Error!',
        text: 'Error, el valor de dados no es un numero o está vacio',
        icon: 'error',
        confirmButtonText: 'Cancelar'
    }); 
    </script>";
}


function notyf()
{
    echo  "<script> 
          var notyf = new Notyf();
          notyf.success('Your changes have been successfully saved!');
          </script>";
}
