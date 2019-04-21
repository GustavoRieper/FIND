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

	/*
	$.getJSON('js/pontos.json', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(ponto.Latitude, ponto.Longitude),
				title: "Meu ponto personalizado! :-D",
				icon: 'img/marcador.png'
			});
			
			var myOptions = {
				content: "<p>" + ponto.Descricao + "</p>",
				pixelOffset: new google.maps.Size(-150, 0)
        	};

			infoBox[ponto.Id] = new InfoBox(myOptions);
			infoBox[ponto.Id].marker = marker;
			
			infoBox[ponto.Id].listener = google.maps.event.addListener(marker, 'click', function (e) {
				abrirInfoBox(ponto.Id, marker);
			});
			
			markers.push(marker);
			
			latlngbounds.extend(marker.position);
			
		});
		
		var markerCluster = new MarkerClusterer(map, markers);
		
		map.fitBounds(latlngbounds);
		
	});*/

	/* ---------------------------Código do Roger----------------------------------------------------------
		var dados;
	var latitude = [];
	var longitude = [];
	$.ajax({
	url : "function/request-pontos.php",
		type : 'post',
		data : {
			//nome : "Maria Fernanda",
			content:"all"
		},
		success:function(obj){
			dados = JSON.parse(obj);
			$(dados).each(function(){
				alert($(this)[0].lat);
				latitude.push($(this)[0].lat);
				longitude.push($(this)[0].long);
			})
		}
		
	})

	console.log(latitude);

	*/



	//Vou colocar uma função AJAX aqui ------------------------------------ 
	var dados;
	var latitude = [];
	var longitude = [];
	var vir = ", ";
	var latlngbounds = new google.maps.LatLngBounds();
	if(localStorage.getItem('pro')){
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
						//alert($(this)[0].lat);
						var id = latitude.push($(this)[0].id);
						//longitude.push($(this)[0].long);
		
						  
						var marker = new google.maps.Marker({
							//position: new google.maps.LatLng(latitude.push($(this)[0].lat), longitude.push($(this)[0].long),
							position: new google.maps.LatLng($(this)[0].lat, $(this)[0].long),
							//title: "Meu ponto personalizado! :-D",
							icon: 'img/' + $(this)[0].profissao + '.png'
						});
						var myOptions = {
							content: "<p><b>" + $(this)[0].profissao + ": </b>" + $(this)[0].name + " " + $(this)[0].last_name + "</p>",
							pixelOffset: new google.maps.Size(-150, 0)
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
		$.ajax({
			url : "function/request-pontos.php" + profissaoParametro,
				type : 'post',
				data : {
					//nome : "Maria Fernanda",
					content:"all"
				},
				success:function(obj){
					dados = JSON.parse(obj);
					$(dados).each(function(){
						//alert($(this)[0].lat);
						var id = latitude.push($(this)[0].id);
						//longitude.push($(this)[0].long);
		
						  
						var marker = new google.maps.Marker({
							//position: new google.maps.LatLng(latitude.push($(this)[0].lat), longitude.push($(this)[0].long),
							position: new google.maps.LatLng($(this)[0].lat, $(this)[0].long),
							//title: "Meu ponto personalizado! :-D",
							icon: 'img/marcador.png'
						});
						var myOptions = {
							content: "<p><b>" + $(this)[0].profissao + ": </b>" + $(this)[0].name + " " + $(this)[0].last_name + "</p>",
							pixelOffset: new google.maps.Size(-150, 0)
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
		
	  }
	

	console.log(latitude);
	console.log(longitude);
	
}

$("#profissaoForm").submit(function( e ) {
	var profissao = $(this).serialize();
	carregarPontos(profissao);
});





carregarPontos();