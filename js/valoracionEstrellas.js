/*// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtnVista");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} */


function puntuacionEstrellas (claseTagA, serieValorar) {
    let request = new XMLHttpRequest();
    let notyf = new Notyf();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            notyf.success('Guardado correctamente en la base de datos!');
            location.replace("../php/main.php");
        }
    };
    request.open("GET", "../php/bbddValoracion.php?val="+claseTagA +"&serie=" +serieValorar, true);
    request.send();
}

