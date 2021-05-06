function hola (claseTagA) {
    console.log(claseTagA);
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    request.open("GET", "query.php?val="+claseTagA, true);
    request.send();
}

