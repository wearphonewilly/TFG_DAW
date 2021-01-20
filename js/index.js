/* eslint-disable no-console */
/* eslint-disable no-alert */

document.getElementById('save').addEventListener('click', () => {
    const emailUser = document.getElementById('emailUser').value;
    console.log(emailUser);

    const date = new Date();
    const day = date.getDate();
    const newDay = day + 2;
    const month = date.getMonth();
    const year = date.getFullYear();
    const hour = date.getHours();
    const minute = date.getMinutes();

    if (emailUser.length == 0) {
        Swal.fire({
            title: 'Error!',
            text: 'Error, el valor de dados no es un numero o está vacio',
            icon: 'error',
            confirmButtonText: 'Cancelar'
        });
    } else {
        const expiresDate = new Date(year, month, newDay, hour, minute);
        document.cookie = `name=${emailUser}; expires=${expiresDate}`; // Si ponemos ; entre el name y el expires solamente nos printará el nombre
        console.log(document.cookie);
        document.getElementById('cookieResult').innerHTML = document.cookie.slice(5, document.cookie.length);
    }
});