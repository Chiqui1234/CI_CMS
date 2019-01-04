function responsiveHeight(x) {
    if(x.matches){
        document.getElementById("sidebar").style.height = (window.innerHeight-85) + "px";
        document.getElementById("portada").style.height = (window.innerHeight-85) + "px";
        //alert("Esta pantalla es de móvil | max-width: 1025px")
    } else {
        document.getElementById("sidebar").style.height = (window.innerHeight-55) + "px";
        document.getElementById("portada").style.height = (window.innerHeight-55) + "px";
        //alert("Pantalla grande");
    }
}
var x = window.matchMedia("(max-width: 601px)");
responsiveHeight(x);
x.addListener(responsiveHeight);