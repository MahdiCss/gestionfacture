

function prarticle (id,nom,priu,tva,qte,remmax){

document.getElementById("codeart").value= id;
document.getElementById("libart").value= nom;
document.getElementById("prixuht").value= priu;
document.getElementById("tva").value= tva;
quant=qte*1;
rem=remmax*1;
document.getElementById('p1').innerHTML="La quantité en stock est:  "+quant;
document.getElementById('p2').innerHTML="La remise max est:  "+rem;






}


function prclient (id,nom,adr,tel){

document.getElementById("codeclt").value= id;
document.getElementById("libclt").value= nom;
document.getElementById("ville").value= adr;


if (tel==0){
  document.getElementById("tel").value="Pas de numero de télephone!"
}else {
document.getElementById("tel").value= tel;
}


}

function tauxchange(tauxx,lib,iddev){

document.getElementById("libdev").value= lib;
document.getElementById("tauxdevis").value= tauxx;
document.getElementById("hide").value= iddev;


}






function verifqte(){



var prixu=document.getElementById("prixuht").value;
var qte=document.getElementById("qte").value;
var tva = document.getElementById("tva").value;

var remise=document.getElementById("remise").value;

var totrem= Number(prixu)*qte;



document.getElementById("totnetht").value=totrem;


var remis= Number(totrem*remise)/100;

var totnetnet=totrem-remis;

document.getElementById("totnet").value=totnetnet;


var tottva=(totrem*tva)/100;

document.getElementById("tottva").value=tottva;

totttc=(Number(totrem) + Number(tottva))-Number(remis);

document.getElementById("totttc").value=totttc;

}







$(document).ready(function(){
  $("#codeart").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#libdev").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#libart").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#codeclt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#libclt").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});






