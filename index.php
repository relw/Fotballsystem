<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fotballsystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
  </head>
<body>
  <div id="toppseksjon">
    <div id="pall">
      <p class="topscorerTekst">Topscorer</p>
      <img id="trofe" src="/bilder/trofe.png">
      <h4> på laget er</h4><h2 id="toppscorer" class="topscorerTekst"></h2><p><h4>med</h4><h2 id="topscorer-maal"></h2><h2>MÅL!</h2></p>  
    </div>
    <div id="spillerListe">
      <p class="lagTekst">Grimstad FK</p>
    <table class="table table-borderless" id="tabell">
        <thead>
            <tr>
            <th>Spillernavn</th>
            <th>Alder</th>
            <th>Draktnr</th>
            <th>Antall Mål</th>
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
  </div>
</div>
<div id="bunnseksjonen">
  <div id="redigerSkjema">
    <form class="spillerRedigering">
          <h3>Rediger spiller</h3>
          <p></p><input type="text" class="form-control" id="redspillerid" disabled="disabled" placeholder="Spillernavn" >
          <p>Spillernavn</p><input type="text" class="form-control" id="redspillernavn" placeholder="Spillernavn" >
          <p>Alder</p><input type="number" class="form-control" id="redalder" placeholder="Alder" >
          <p>Draktnr</p><input type="number" class="form-control" id="reddraktnr" placeholder="Draktnr" >
          <p>Antall mål</p> <input type="number" class="form-control" id="redantallMaal" placeholder="Antall mål" >
          <button type="button" id="redigerSpillerBtn" class="btn">Rediger spiller</button>
    </form>
</div> 
<div id="registreringSkjema">
    <form class="spillerRegistrering">
          <h3>Registrer ny spiller</h3>
          <input type="text" class="form-control" id="spillernavn" placeholder="Spillernavn" >
          <input type="number" class="form-control" id="alder" placeholder="Alder" >
          <input type="number" class="form-control" id="draktnr" placeholder="Draktnr" >
          <input type="number" class="form-control" id="antallMaal" placeholder="Antall mål" >
          <button type="button" id="registrerSpillerBtn" class="btn">Registrer spiller</button>
    </form>
</div> 
</div>
<script>
$(document).ready(function(){

     $("#redigerSkjema").hide();
     
     $("#redspillerid").hide();
  
      hentAlleSpillere();
    
  $("#registrerSpillerBtn").click(function() {
    
    var godkjent=0;
    
    if($('#spillernavn').val().length == 0){
        $("#spillernavn").css("border", "2px solid red");
    }
    else{
        $("#spillernavn").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#alder').val().length == 0){
        $("#alder").css("border", "2px solid red");
    }
    else{
        $("#alder").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#draktnr').val().length == 0){
        $("#draktnr").css("border", "2px solid red");
    }
    else{
        $("#draktnr").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#antallMaal').val().length == 0){
        $("#antallMaal").css("border", "2px solid red");
    }
    else{
        $("#antallMaal").css("border", "2px solid green");
        godkjent++;
    }
    
    if(godkjent==4){
        var spillernavn = $('#spillernavn').val();
        var alder = $('#alder').val();
        var draktnr = $('#draktnr').val();
        var antallMaal = $('#antallMaal').val();
      
        $.ajax({
            type: "POST",
            url: "https://fotballsystem.000webhostapp.com/db/registrerSpiller.php",
            dataType:"json",
            data: {spillernavn:spillernavn, alder:alder, draktnr:draktnr, antallMaal:antallMaal},
            success: function(data){
                if(data=="ok"){
                    swal({
                      text: "Spiller registrert!",
                      icon: "success",
                    });
                    location.reload();
                }
              }
        });
      }
    });

//Rediger spiller
 $("#redigerSpillerBtn").click(function() {
    
    var godkjent=0;
    
    if($('#redspillernavn').val().length == 0){
        $("#redspillernavn").css("border", "2px solid red");
    }
    else{
        $("#redspillernavn").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#redalder').val().length == 0){
        $("#redalder").css("border", "2px solid red");
    }
    else{
        $("#redalder").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#reddraktnr').val().length == 0){
        $("#reddraktnr").css("border", "2px solid red");
    }
    else{
        $("#reddraktnr").css("border", "2px solid green");
        godkjent++;
    }
    
    if($('#redantallMaal').val().length == 0){
        $("#redantallMaal").css("border", "2px solid red");
    }
    else{
        $("#redantallMaal").css("border", "2px solid green");
        godkjent++;
    }
    
    if(godkjent==4){
        var spillernavn = $('#redspillernavn').val();
        var alder = $('#redalder').val();
        var draktnr = $('#reddraktnr').val();
        var antallMaal = $('#redantallMaal').val();
        var spillerid = $('#redspillerid').val(); 
        
        $.ajax({
            type: "POST",
            url: "https://fotballsystem.000webhostapp.com/db/redigerSpiller.php",
            dataType:"json",
            data: {spillerid:spillerid, spillernavn:spillernavn, alder:alder, draktnr:draktnr, antallMaal:antallMaal},
            success: function(data){
                if(data=="ok"){
                    swal({
                      text: "Spiller redigert!",
                      icon: "success",
                    });
                    location.reload();
                }
            }
        });
      }
  });

function tomSpillerTabell(){
    $('#spillerListe tbody').remove();
};
function hentAlleSpillere(){
    $.ajax({
            type: "POST",
            url: "https://fotballsystem.000webhostapp.com/db/hentAlleSpillere.php",
            dataType:"json",
            success: function(data){
                console.log(data);
                var arrayLengde = data.length;
                    for (var i = 0; i < arrayLengde; i++) {
                    console.log(data[i].spillernavn);
                    $('#spillerListe tbody').append("<tr><td>"+data[i].spillernavn+"</td><td>"+data[i].alder+"</td><td>"+data[i].draktnr+"</td><td>"+data[i].antallMaal+"</td><td><button class='redigerSpiller' value="+data[i].id+">Rediger</button></td><td><button class='slettSpiller' value="+data[i].id+">Slett</button></td></tr>");
                    }
            //Setter topscorer
             $('#toppscorer').html(data[0].spillernavn);
             $('#topscorer-maal').html(data[0].antallMaal);
          }
        });
    }
    $("#tabell").on('click', '.redigerSpiller', function () {
    var spillerid = $(this).val();
        hentSpillerInfo(spillerid);
         $("#redigerSkjema").show();
         $('html, body').animate({
        scrollTop: $("#redigerSkjema").offset().top
    }, 100);
       
});

$("#tabell").on('click', '.slettSpiller', function () {
    var spillerid = $(this).val();
        slettspiller(spillerid);
        
});
function hentSpillerInfo(spillerid){
     $.ajax({
            type: "POST",
            url: "https://fotballsystem.000webhostapp.com/db/hentSpillerInfo.php",
            dataType:"json",
            data: {spillerid:spillerid},
            success: function(data){
                console.log(data);
                $('#redspillerid').val(data[0].id);
                $('#redspillernavn').val(data[0].spillernavn);
                $('#redalder').val(data[0].alder);
                $('#reddraktnr').val(data[0].draktnr);
                $('#redantallMaal').val(data[0].antallMaal);       
             }
        });
    }
 function slettspiller(spillerid){
    $.ajax({
            type: "POST",
            url: "https://fotballsystem.000webhostapp.com/db/slettSpiller.php",
            dataType:"json",
            data: {spillerid:spillerid},
            success: function(data){
                if(data=="ok"){
                    swal({
                      text: "Spiller slettet!",
                      icon: "success",
                    });
                    location.reload();
                }        
            }
      });
  }
});
</script>
</body>
</html>
