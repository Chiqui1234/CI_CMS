function responsiveHeight(x) {
    if(x.matches){
        document.getElementById("root").style.height = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        document.getElementByClass("portrait").style.gridTemplateRows = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        document.getElementByClass("video").style.height = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        //alert("Esta pantalla es de móvil | max-width: 1025px")
    } else {
        document.getElementById("root").style.height = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        document.getElementByClass("portrait").style.gridTemplateRows = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        document.getElementByClass("video").style.gridTemplateRows = (window.innerHeight-85) + "px 1fr 1fr 1fr";
        //alert("Pantalla grande");
    }
}
var x = window.matchMedia("(max-width: 601px)");
responsiveHeight(x);
x.addListener(responsiveHeight);