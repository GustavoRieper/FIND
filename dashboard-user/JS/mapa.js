var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];

function initialize() {	
	var latlng = new google.maps.LatLng(-18.8800397, -47.05878999999999);
	
    var options = {
        zoom: 5,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
}

initialize();

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'number' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}

	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos(profissaoParametro) {
	if(profissaoParametro == null){
		var profissaoParametro = "";
	}else{
		var profissaoParametro = "?" + profissaoParametro;
	}
	var dados;
	var latitude = [];
	var longitude = [];
	var vir = ", ";
	var latlngbounds = new google.maps.LatLngBounds();

	if(localStorage.getItem('pro')){
        
//            Localiza o Usuário
            var id = "Meu";        
            var userLat = sessionStorage.getItem('UserLat');
            var userLong = sessionStorage.getItem('UserLong');
						  
            var marker = new google.maps.Marker({
                //position: new google.maps.LatLng(latitude.push($(this)[0].lat), longitude.push($(this)[0].long),
                position: new google.maps.LatLng(userLat, userLong),
                //title: "Meu ponto personalizado! :-D",
                icon: 'img/Minha_localizacao.png'
            });
            var myOptions = {
                content: "<p><b>" + "Sua localização",
                pixelOffset: new google.maps.Size(-150, 0)
            };

            infoBox[id] = new InfoBox(myOptions);
            infoBox[id].marker = marker;

            infoBox[id].listener = google.maps.event.addListener(marker, 'click', function (e) {
                abrirInfoBox([id], marker);
            });

            markers.push(marker);

            latlngbounds.extend(marker.position);

            var markerCluster = new MarkerClusterer(map, markers);

            map.fitBounds(latlngbounds);
        
        
//        Localiza os profissionais
		$.ajax({
			url : "function/request-pontos-filter.php" + profissaoParametro,
				type : 'post',
				data : {
					//nome : "Maria Fernanda",
					content:"all"
				},
				success:function(obj){
					dados = JSON.parse(obj);
					$(dados).each(function(){
						var id = latitude.push($(this)[0].id);
                        var nota = $(this)[0].nota;
  
                        
                        
                        if(nota<="1.0"){
                            var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>";
                           }
                        else if(nota>"1.0" && nota< "1.6"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star-half-alt' style='color:yellow;text-shadow: 0px 1px 2px #000;'></i>";
                                }
                        else if(nota>"1.6" && nota< "2.1"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>";
                                }
                        else if(nota>"2.1" && nota< "2.6"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star-half-alt' style='color:yellow;text-shadow: 0px 1px 2px #000;'></i>";
                                }
                        else if(nota>"2.5" && nota< "3.1"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>";
                                }
                        else if(nota>"3.1" && nota< "3.6"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star-half-alt' style='color:yellow;text-shadow: 0px 1px 2px #000;'></i>";
                                }
                        else if(nota>"3.5" && nota< "4.1"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>";
                                }
                        else if(nota>"4.1" && nota< "4.6"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star-half-alt' style='color:yellow;text-shadow: 0px 1px 2px #000;'></i>";
                                }
                        else if(nota>"4.5" && nota< "5.1"){
                                 var totalnota="<i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'><i class='fas fa-star' style='color:yellow;text-shadow: 0px 1px 2px #000;'>";
                                }
						//longitude.push($(this)[0].long);
		
						  
						var marker = new google.maps.Marker({
							position: new google.maps.LatLng($(this)[0].lat, $(this)[0].long),
							title: "Meu ponto personalizado! :-D",
							icon: 'img/' + $(this)[0].profissao + '.png'
						});
                        
                       
                        
                        
                        
                        
                        
						var myOptions = {
                            

                                content: "<p><b>" + $(this)[0].profissao + ": </b>" + $(this)[0].name + " " + $(this)[0].last_name + "</p><br>Avaliação: " + totalnota,
							     pixelOffset: new google.maps.Size(-150, 0),
						};
			
						infoBox[id] = new InfoBox(myOptions);
						infoBox[id].marker = marker;
						
						infoBox[id].listener = google.maps.event.addListener(marker, 'click', function (e) {
							abrirInfoBox([id], marker);
						});
						//alert($(this)[0].lat + vir + $(this)[0].long);
		
						markers.push(marker);
					
						latlngbounds.extend(marker.position);
		
						var markerCluster = new MarkerClusterer(map, markers);
				
						map.fitBounds(latlngbounds);
					})
					
					
				}
				
			})
	   
	  }else{
            var id = "Meu";        
            var userLat = sessionStorage.getItem('UserLat');
            var userLong = sessionStorage.getItem('UserLong');
						  
            var marker = new google.maps.Marker({
                //position: new google.maps.LatLng(latitude.push($(this)[0].lat), longitude.push($(this)[0].long),
                position: new google.maps.LatLng(userLat, userLong),
                //title: "Meu ponto personalizado! :-D",
                icon: 'img/Minha_localizacao.png'
            });
            var myOptions = {
                content: "<p><b>" + "Sua localização",
                pixelOffset: new google.maps.Size(-150, 0)
            };

            infoBox[id] = new InfoBox(myOptions);
            infoBox[id].marker = marker;

            infoBox[id].listener = google.maps.event.addListener(marker, 'click', function (e) {
                abrirInfoBox([id], marker);
            });

            markers.push(marker);

            latlngbounds.extend(marker.position);

            var markerCluster = new MarkerClusterer(map, markers);

            map.fitBounds(latlngbounds);
        
		
		
	  }
	
	
}




carregarPontos();