
window.onload = horaMenu(); //





function horaMenu(){
   
    let day = new Date();
    
    let hora = day.getHours();
    let minuts= day.getMinutes() ;

    let mati = document.getElementById("totmati"); //nodo productos mati
    let tarda = document.getElementById("tottarda"); // nodo productos tarde
    console.log(hora);
    console.log(minuts);

    console.log(mati);

    

    if(hora < 11  ){
       
        tarda.style.display = "none";

        return mati;
    }else if(hora== 11 && minuts <30){
        tarda.style.display = "none";

        return mati;
    }else {
        mati.style.display ="none";
        return tarda;
    }
        
    
}


var tot;

// CODIGO PARA GESTIONAR LOS BOTONES MAS Y MENOS DE LA TARDE
document.getElementById("menutarda").addEventListener("click", function(e){
    if(e.target.classList.contains("añadir")){
        var idProd = e.target.parentElement.childNodes[6].id;
        var nomProd = e.target.parentElement.childNodes[3].innerHTML;
        var preuProd = e.target.parentElement.childNodes[4].innerHTML; 
        element = document.getElementById("prod"+idProd);
        
        console.log("IDPROD ES:::"+idProd)
        document.getElementById(idProd).value++;
        if(typeof(element) != 'undefined' && element != null){
            document.getElementById("preu"+idProd).innerHTML++;

        }else{
            document.getElementById("carrito").insertAdjacentHTML("beforeend", "<p id=prod"+idProd+">"+nomProd+ " <span id=preu"+idProd+">1</span></p>");
        }
        document.getElementById("total").innerHTML = (parseFloat(preuProd) + parseFloat(document.getElementById("total").innerHTML)).toFixed(2);
    }
    else if(e.target.classList.contains("quitar")){
        var idProd = e.target.parentElement.childNodes[6].id;
        var nomProd = e.target.parentElement.childNodes[3].innerHTML;
        var preuProd = e.target.parentElement.childNodes[4].innerHTML;
        element = document.getElementById("prod"+idProd);
        document.getElementById(idProd).value--;
        if(typeof(element) != 'undefined' && element != null){
            document.getElementById("preu"+idProd).innerHTML--;
            document.getElementById("total").innerHTML = (parseFloat(document.getElementById("total").innerHTML) - (parseFloat(preuProd) )).toFixed(2);
            if(document.getElementById("preu"+idProd).innerHTML == 0){
                element.remove()
            }
        }
    }
});

// CODIGO PARA GESTIONAR LOS BOTONES MAS Y MENOS DE LA MAÑANA
document.getElementById("menumati").addEventListener("click", function(e){
    if(e.target.classList.contains("añadir")){
        var idProd = e.target.parentElement.childNodes[6].id;
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
        var idProd = e.target.parentElement.childNodes[6].id;
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