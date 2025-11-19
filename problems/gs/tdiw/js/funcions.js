function confirmaRegistre(){
    alert("registrant estudiant");
    document.getElementById("formDiv").innerHTML = "<p class='important'>T'has registrat amb èxit!</p>";
    console.log("registrant estudiant");
    return false;
}

async function carregaMencions(){
    //completa
    let grau = document.getElementById("graus").value
    let response = await fetch("https://tdiw-h4.deic-docencia.uab.cat/problems/mc/p3/tdiw/mencions.php?grau="+grau);
    let options = await response.text()
    document.getElementById("mencions").innerHTML = options;
    
}