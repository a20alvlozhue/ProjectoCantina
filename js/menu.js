
            var tot;
            document.getElementById("menu").addEventListener("click", function(e){
                if(e.target.classList.contains("añadir")){
                    var idProd = e.target.parentElement.childNodes[6].value;
                    var nomProd = e.target.parentElement.childNodes[3].innerHTML;
                    var preuProd = e.target.parentElement.childNodes[4].innerHTML; 
                    element = document.getElementById("prod"+idProd);
                    if(typeof(element) != 'undefined' && element != null){
                        document.getElementById("preu"+idProd).innerHTML++;
                    }else{
                        document.getElementById("carrito").insertAdjacentHTML("beforeend", "<p id=prod"+idProd+">"+nomProd+ " <span id=preu"+idProd+">1</span></p>");
                    }
                    document.getElementById("total").innerHTML = (parseFloat(preuProd) + parseFloat(document.getElementById("total").innerHTML));
                }
                else if(e.target.classList.contains("quitar")){
                    var idProd = e.target.parentElement.childNodes[6].value;
                    var nomProd = e.target.parentElement.childNodes[3].innerHTML;
                    var preuProd = e.target.parentElement.childNodes[4].innerHTML;
                    element = document.getElementById("prod"+idProd);
                    if(typeof(element) != 'undefined' && element != null){
                        document.getElementById("preu"+idProd).innerHTML--;
                        document.getElementById("total").innerHTML = parseFloat(document.getElementById("total").innerHTML) - (parseFloat(preuProd) );
                        if(document.getElementById("preu"+idProd).innerHTML == 0){
                            element.remove()
                        }
                    }
                }
            });
        