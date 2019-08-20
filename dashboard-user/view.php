<?php
// Instancia a classe
$gmaps = new gMaps('https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Am7wIw0Q1zw6wl55YCFGN4EEDWDwxHA&callback=initMap');
// Pega os dados (latitude, longitude e zoom) do endereço:
$endereco = 'Av. Brasil, 1453, Rio de Janeiro, RJ';
$dados = $gmaps->geoLocal($endereco);
// Exibe os dados encontrados:
print_r($dados);