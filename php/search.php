<pre>
<?php
$busquedaQuery = $_POST["busqueda"];
echo "<script> console.log('" . $busquedaQuery . "'); </script>";

$callApi = file_get_contents('https://api.themoviedb.org/3/search/tv?api_key=f269df40fe8fe735f1ed701a4bfba1df&language=en-US&page=1&query=' . $busquedaQuery . '&include_adult=false');
$callApi = json_decode($callApi, true);
print_r($callApi);

?>
</pre>
