<? 

/* 
 * Class MAP 
 * 
 * @author Diego Agudo - http://www.agudo.eti.br/ 
 * @description Retorna latitude/longitude a partir do CEP 
 * 
 */ 


$cep = trim($_GET['cep']); 
$numero = trim($_GET['numero']); 

class Map { 
    public $cep = ""; 
    public $numero = ""; 
    public $latitude = ""; 
    public $longitude = ""; 
    
    function __construct($cep,$numero) { 
        $this->cep = $cep; 
        $this->numero = $numero; 
        
        $this->GetLatLongFromCEP($cep); 
    } 
    
    function RemoveAcentos($string) { 
        $a = array( 
                    '/[ÂÀÁÄÃ]/'=>'A', 
                    '/[âãàáä]/'=>'a', 
                    '/[ÊÈÉË]/'=>'E', 
                    '/[êèéë]/'=>'e', 
                    '/[ÎÍÌÏ]/'=>'I', 
                    '/[îíìï]/'=>'i', 
                    '/[ÔÕÒÓÖ]/'=>'O', 
                    '/[ôõòóö]/'=>'o', 
                    '/[ÛÙÚÜ]/'=>'U', 
                    '/[ûúùü]/'=>'u', 
                    '/ç/'=>'c', 
                    '/Ç/'=> 'C' 
                    ); 
        
        // Tira o acento pela chave do array 
        return preg_replace(array_keys($a), array_values($a), $string); 
    } 
    
    function GetLatLongFromCEP($cep) { 
        $url = "http://maps.google.com/maps/geo?q=".$cep."+BRASIL&output=xml&sensor=false&key=abcdefg"; 
        $xml = simplexml_load_file($url); 
        
        foreach($xml->Response as $parse) 
        { 
            foreach($xml->Response as $parse) 
            { 
                $coordinates = explode(",", (string)utf8_decode(strtoupper(trim($parse->Placemark->Point->coordinates)))); 
            } 
        } 
        
        $y = $coordinates[0]; 
        $x = $coordinates[1]; 
        
        #echo "<br>". $x.",".$y ."<br>"; 
        
        return $this->GetAddressFromCoord($x.",".$y); 
    } 
    
    function GetAddressFromCoord($point) { 
        $url = "http://maps.google.com/maps/geo?q=".$point."&output=xml&sensor=true&key=abcdefg"; 
        #echo $url; 
        $xml = simplexml_load_file($url); 
        
        foreach($xml->Response as $parse) 
        { 
            foreach($xml->Response as $parse) 
            { 
                $pais = (string)utf8_decode(strtoupper(trim($parse->Placemark->AddressDetails->Country->CountryName))); 
                $uf = (string)utf8_decode(strtoupper(trim($parse->Placemark->AddressDetails->Country->AdministrativeArea->AdministrativeAreaName))); 
                $cidade = (string)utf8_decode(strtoupper(trim($parse->Placemark->AddressDetails->Country->AdministrativeArea->Locality->LocalityName))); 
                $bairro = (string)utf8_decode(strtoupper(trim($parse->Placemark->AddressDetails->Country->AdministrativeArea->Locality->DependentLocality->DependentLocalityName))); 
                $endereco = (string)utf8_decode(strtoupper(trim($parse->Placemark->AddressDetails->Country->AdministrativeArea->Locality->DependentLocality->Thoroughfare->ThoroughfareName))); 
                
                if((strpos($endereco,",")) === false) { 
                    $endereco = $endereco .",". $this->numero; 
                } else { 
                    $endereco = strrev(strchr(strrev($endereco), ",")); 
                    $endereco = $endereco . $this->numero; 
                } 
                
                $logradouro = $endereco ." - ". $bairro .", ". $cidade ." - ". $uf .",". $pais; 
                
                #echo "<br>-->". $logradouro; 
                
                return $this->GetLatLongFromAddress($this->RemoveAcentos($logradouro)); 
            } 
        } 
        
        return null; 
    } 
    
    function GetLatLongFromAddress($logradouro) { 
        $url = "http://maps.google.com/maps/geo?q=".$logradouro."&output=xml&sensor=true&key=abcdefg"; 
        $xml = simplexml_load_file($url); 
        
        foreach($xml->Response as $parse) 
        { 
            foreach($xml->Response as $parse) 
            { 
                $coordinates = explode(",", (string)utf8_decode(strtoupper(trim($parse->Placemark->Point->coordinates)))); 
            } 
        } 
        
        $this->latitude = $coordinates[1]; 
        $this->longitude = $coordinates[0]; 
        
        echo $this->latitude .",". $this->longitude; 
    } 
    
    function __destruct() { 
        // destruct 
    } 
} 




if(strlen($cep) > 0 AND strlen($numero) > 0) { 
    $map = new map($cep,$numero); 
} 

?> 