



<?php
$server="localhost";
$uzivatel="root";
$heslo="";
$databaze="videostop";
$connection=new mysqli($server,$uzivatel,$heslo,$databaze);
if(!empty($_POST)){
    $jmeno=$_POST["JMENOHRACE"];
    $pocetbodu=$_POST["POCETBODU"];

    $sql="INSERT INTO 'nejlepsi_vysledky'('jmeno','body') VALUES ('$jmeno', '$pocetbodu')";
    $connection->query($sql);
}
?>

<html>
<HEAD>
    <style>
        body{
            background-color:linen;
            font-family: verdana;
        }
        h1{
            font-size:  55px;
            color: maroon;
        }
        h2{
            font-size: 41px;
            color: maroon;
        }
        .tlacitka{
            padding: 20px 40px;
        }
        #table-kostky th,
        td{
            border: none
        }
        table{
            border-collapse: collapse;
        }
        #vysledky th,
        #vysledky td{
            width: 500px;
            border: 1px solid black;
        }
        #JMENOHRACE {
            padding: 12px 20px;
            margin: 8px 0;
        }
        #zivotyabody{
            font-size: 33px;
        }
    </style>

    <title>Videostop</title>

<SCRIPT LANGUAGE="JavaScript">
    <!--
        obr1 = new Image(150,150);
        obr1.src = "./img/kostka1.png";
        obr2 = new Image(150,150);
        obr2.src = "./img/kostka2.png";
        obr3 = new Image(150,150);
        obr3.src = "./img/kostka3.png";   
        obr4 = new Image(150,150);
        obr4.src = "./img/kostka4.png";
        obr5 = new Image(150,150);
        obr5.src = "./img/kostka5.png";  
        obr6 = new Image(150,150);
        obr6.src = "./img/kostka6.png"; 
        
        function tocKostky()
        {
            var i,j;
            
                for (j=0; j<3; j++) {
                    i=Math.random();
                    i=Math.round(i*5);
                    document.images[j].src="./img/kostka"+(i+1)+".png";
                }
                }
                var herniinterval ;
                function Start()
                {herniInterval=
                setInterval("tocKostky()",500);

            
        }
        function Vyhodnoceni()
        {
            with (document) {
                if((images[0].src==images[1].src)&&(images[1].src==images[2].src )){
                    alert ("Bingo !!!!");
                    var
                    bodyy=parselnt(document.getElementByld("POCETBODU").value);
                    bodyy=bodyy+2;
                    document.getElementByld("POCETBODU").value=bodyy;
                    document.getElementByld("body-text").innerHTML=bodyy;

                }else {
                    if((images[0].src==images[1].src || (images[1].src==images[2].src))|| (images[0].src==images[2].src)){
                        alert("Gratuluji, máte bod");
                        var
                        bodyy=parselnt(document.getElementByld("POCETBODU").value);
                        bodyy=bodyy+1;
                        document.getElementByld("POCETBODU").value=bodyy;
                        document.getElementByld("body-text").innerHTML=bodyy;
                        return;
                     }else {alert ("Bohuzel, ztrácíte bod. Zkuste to znovu");
                     var
                     zivoty=parselnt(document.getElementById("POCETZIVOTU").value);
                     if(zivoty<=1){
                        //konec
                        alert('konec hry');
                        document.getElementByld("STOP").style.display = 'none';
                        document.getElementByld("SUBMIT").style.display ='block';
                        document.getElementByld("JMENOHRACE").style.display ='block';
                        document.getElementByld("JMENOTEXT").style.display ='block';
                        //document.getElementByld("POCETBODU").val=;
                        clearInterval(herniInterval);

                     }

                     zivoty=zivoty-1;
                     //alert(zivoty);
                     documentElementByld("POCETZIVOTU").value=zivoty;
                     document.getElementByld("zivoty-text").innerHTML=zivoty;
                    }
                         
                }
                
            } 

            }
        


    -->
</SCRIPT>
</HEAD>
<BODY onLoad="Start()">
    <CENTER>
        <H1>Videostop</H1>
        <div id="zivotyabody">ŽIVOTY<span id='zivoty-text'>10</span><br>
        BODY<span id='body-text'>0</span>
        </div>

        <TABLE id="table-kostky" ALIGN="center">
            <TR>
                <TD><IMG SRC="./img/kostka1.png"></TD>
                <TD><IMG SRC="./img/kostka1.png"></TD>
                <TD><IMG SRC="./img/kostka1.png"></TD>   

            </TR>
        

        </TABLE>
        <BR>
            <FORM NAME= "ovladac" method="POST">
                <INPUT TYPE="HIDDEN"
                ID="POCETZIVOTU"VALUE="10">
                <INPUT TYPE="HIDDEN"
                ID="POCETBODU"NAME="POCETBODU" VALUE="0">
                <LABEL FOR="JMENOHRACE"
                ID="JMENOTEXT"hidden>Jmeno Hráče</LABEL>
                <INPUT TYPE="TEXT" ID="JMENOHRACE"
                NAME="JMENOHRACE"VALUE=""
                hidden>
                <INPUT class="tlacitka"
                TYPE="BUTTON" ID="STOP"
                NAME="STOP" VALUE="STOP"
                onClick="Vyhodnoceni()">
                <INPUT class="tlacitka"
                TYPE="SUBMIT" ID="SUBMIT" hidden
                value="Odeslat  výsledek">
                    
            </FORM>
<?php
$query= "SELECT * From
nejlepsi_vysledky ORDER BY BODY DESC";
$result = mysqli_query($connection,$query);
if (!$result){
    die("dotaz do databaze selhal");
}
if(mysqli_num_rows($result)>0){
   echo" <H2>Nejlepší výsledky</H2>";
    echo"<table id='vysledky'>";
    echo"<thead><tr><th>Jméno</th><th>BODY</th><th>Datum</th></tr><thead>\n";
    while($row =
    mysqli_fetch_object($result)){
        echo
        "<tbody><tr><td>$row->jmeno</td><td>$row->body</td><td>$row->datum</td></tr></tbody>\n";

}
echo "</table>";
}
?>

    </CENTER>
    
</BODY>
</htm>