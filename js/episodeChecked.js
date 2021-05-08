function checked(idEpisodio, idTemporada, user_id, idSerie) {
    document.getElementById(idEpisodio).style.display = "none"; 
    console.log('click', idEpisodio, idTemporada);
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    request.open("GET", "../php/episodeChecked.php?ide="+idEpisodio +"&idt="+idTemporada +"&id=" +user_id +"&ids=" +idSerie, true);
    request.send();
}