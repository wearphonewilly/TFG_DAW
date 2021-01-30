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
