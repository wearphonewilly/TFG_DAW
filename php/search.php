
<pre>
<?php

$callApi = file_get_contents('https://api.themoviedb.org/3/search/tv?api_key=f269df40fe8fe735f1ed701a4bfba1df');
$callApi = json_decode($callApi, true)['episodes'];
print_r($callApi);

?>
</pre>
