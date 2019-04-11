<?php
$page = "Solicitar Profissional";
include "../admin/connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/request-pro.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    </head>
    
    <body>
        <?php include 'default/menu.php';?>

    
    <div class="content" onclick="closeUser()">
        <div class="filter">
            <form name="profissaoForm" id="profissaoForm">
                <labe>Selecione o tipo de profissional:</labe>
                <div class="custom-select" style="width:200px;">
                    <select id="select" name="profissao" required>
                        <option value="0">Selecione</option>
                        <?php
                            mysqli_set_charset($connect,'utf8'); 
                            $sql = "SELECT DISTINCT profissao FROM professional ORDER BY profissao ASC";
                            $resultado = mysqli_query($connect,$sql);
                            $numero_linhas = mysqli_num_rows($resultado);
                            while ($linha = mysqli_fetch_array($resultado)){
                                $profissao = $linha["profissao"];
                                echo("<option>$profissao</option>");
                            }
                        ?>
                    </select>
                    
                </div>
                <script>
                    var x, i, j, selElmnt, a, b, c;
                    /*look for any elements with the class "custom-select":*/
                    x = document.getElementsByClassName("custom-select");
                    for (i = 0; i < x.length; i++) {
                      selElmnt = x[i].getElementsByTagName("select")[0];
                      /*for each element, create a new DIV that will act as the selected item:*/
                      a = document.createElement("DIV");
                      a.setAttribute("class", "select-selected");
                      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                      x[i].appendChild(a);
                      /*for each element, create a new DIV that will contain the option list:*/
                      b = document.createElement("DIV");
                      b.setAttribute("class", "select-items select-hide");
                      for (j = 1; j < selElmnt.length; j++) {
                        /*for each option in the original select element,
                        create a new DIV that will act as an option item:*/
                        c = document.createElement("DIV");
                        c.innerHTML = selElmnt.options[j].innerHTML;
                        c.addEventListener("click", function(e) {
                            /*when an item is clicked, update the original select box,
                            and the selected item:*/
                            var y, i, k, s, h;
                            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                            h = this.parentNode.previousSibling;
                            for (i = 0; i < s.length; i++) {
                              if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y = this.parentNode.getElementsByClassName("same-as-selected");
                                for (k = 0; k < y.length; k++) {
                                  y[k].removeAttribute("class");
                                }
                                this.setAttribute("class", "same-as-selected");
                                break;
                              }
                            }
                            h.click();
                        });
                        b.appendChild(c);
                      }
                      x[i].appendChild(b);
                      a.addEventListener("click", function(e) {
                          /*when the select box is clicked, close any other select boxes,
                          and open/close the current select box:*/
                          e.stopPropagation();
                          closeAllSelect(this);
                          this.nextSibling.classList.toggle("select-hide");
                          this.classList.toggle("select-arrow-active");
                        });
                    }
                    function closeAllSelect(elmnt) {
                      /*a function that will close all select boxes in the document,
                      except the current select box:*/
                      var x, y, i, arrNo = [];
                      x = document.getElementsByClassName("select-items");
                      y = document.getElementsByClassName("select-selected");
                      for (i = 0; i < y.length; i++) {
                        if (elmnt == y[i]) {
                          arrNo.push(i)
                        } else {
                          y[i].classList.remove("select-arrow-active");
                        }
                      }
                      for (i = 0; i < x.length; i++) {
                        if (arrNo.indexOf(i)) {
                          x[i].classList.add("select-hide");
                        }
                      }
                    }
                    /*if the user clicks anywhere outside the select box,
                    then close all select boxes:*/
                    document.addEventListener("click", closeAllSelect);
                    </script>
                <div class="slidecontainer">
                  <input type="range" min="1" max="50" value="25" class="slider" id="myRange">
                    <p>Distância <span id="demo"></span> Km</p>
                </div>
                <script>
                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("demo");
                    output.innerHTML = slider.value;

                    slider.oninput = function() {
                      output.innerHTML = this.value;
                    }
                </script>
                
                <input type="submit" id="filtrar" value="Filtrar">
                
                
            </form>
            
        </div>
           
        <div id="mapa" style="height: 70%; width: 100%">
    
    
		<script src="js/jquery.min.js"></script>
 
        <!-- Maps API Javascript -->
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBJwO9baL-pMt1EN4PWu5LHw6KJu0lXGc4&amp;sensor=false"></script>
        
        <!-- Caixa de informação -->
        <script src="js/infobox.js"></script>
		
        <!-- Agrupamento dos marcadores -->
		<script src="js/markerclusterer.js"></script>
 
        <!-- Arquivo de inicialização do mapa -->
		<script src="js/mapa.js"></script>
            
            
   </div>   
    <div class="professional">
      <?php
        echo($_SESSION['name-pro']);
      ?>
    </div>  
            

    </body>
</html>