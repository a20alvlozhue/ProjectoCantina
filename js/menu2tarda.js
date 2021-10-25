var tot;
document.getElementById("menutarda").addEventListener("click", function(e){
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
        document.getElementById("total").innerHTML = (parseFloat(preuProd) + parseFloat(document.getElementById("total").innerHTML)).toFixed(2);
    }
    else if(e.target.classList.contains("quitar")){
        var idProd = e.target.parentElement.childNodes[6].value;
        var nomProd = e.target.parentElement.childNodes[3].innerHTML;
        var preuProd = e.target.parentElement.childNodes[4].innerHTML;
        element = document.getElementById("prod"+idProd);
        if(typeof(element) != 'undefined' && element != null){
            document.getElementById("preu"+idProd).innerHTML--;
            document.getElementById("total").innerHTML = (parseFloat(document.getElementById("total").innerHTML) - (parseFloat(preuProd) )).toFixed(2);
            if(document.getElementById("preu"+idProd).innerHTML == 0){
                element.remove()
            }
        }
    }
});

