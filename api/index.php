<?php
// http://localhost/web/2proy3/api/?ruta=oso
header("Content-Type: application/json");                    // define json
//if(isset($_GET["ruta"])) { $ruta=$_GET["ruta"];} else {$ruta="";} //variable de recepion  // metodo get 

// ruta
$tam=strlen(dirname($_SERVER["SCRIPT_NAME"]));             //extrae la ruta
if($tam==1) { $inc=0;} else { $inc=1;}
$ruta=explode("/", substr($_SERVER["REQUEST_URI"],$tam+$inc));


$BDD=new mysqli("localhost","root","","libreria");           //conexion con la base de datos
$data=array("res"=>false,"msg"=>"hola mundo","ruta"=>$ruta); //formato json 

switch($ruta[0] )
{  case"oso": 
      $data =array("resp"=>true,"msg"=>"soy oso");
   break;
   case"librosave":
      $titu=$_POST["titu"];
      $autor=$_POST["autor"];
      $tipo=$_POST["tipo"];
      if( $_POST["prec"]=='') {$prec=0;} else {$prec=$_POST["prec"];}          
      if($BDD->query("insert into libro (titu,autor,tipo,prec,std)
                                 values('$titu','$autor','$tipo','$prec','act') "))
         { $resp =true;}
      else { $resp =false;} 
        $data=array("resp"=>$resp,"msg"=>"Registro libro");  
   break;
   case"librolist":
      // if(isset($_POST["busq"])){$busq=$_POST["busq"];} else {$busq="";}
       if(isset($ruta[1])) {$busq=$ruta[1];} else {$busq="";}

      $list=array();
      $M=$BDD->query("select numl,titu,autor,tipo,prec from libro where titu like '%$busq%'  ");
      foreach($M as $V)
      {  array_push($list,array("numl"=>$V["numl"],
                                "titu"=>$V["titu"],
                                "autor"=>$V["autor"],
                                "prec"=>$V["prec"]      )   );
      }
      $data=array("resp"=>true,"list"=>$list);  
   break;
   //eliminar
   case "librodel":
      if(isset ($ruta[1])) {  $numl=$ruta[1];} else {$numl=0;}
      if($BDD->query("delete from libro where numl=$numl"))
      {$resp=true;}
      else {$resp=false;}
      $data=array("resp"=>$resp,"msg"=>"eliminar registro del libro");
   break;
   case "libroinfo":
      if(isset ($ruta[1])) {$numl=$ruta[1];} else {$numl=0;}
      $M=$BDD->query("select * from libro where numl=$numl");
      foreach($M as $V)
      { $data=array("resp"=>true,"numl"=>$V["numl"],
                                 "titu"=>$V["titu"],
                                 "autor"=>$V["autor"],
                                 "tipo"=>$V["tipo"],
                                 "prec"=>$V["prec"]   );

      } 
   break;
   case"libroup":
      $titu=$_POST["titu"];
      $autor=$_POST["autor"];
      $tipo=$_POST["tipo"];
      if( $_POST["prec"]=='') {$prec=0;} else {$prec=$_POST["prec"];}
      $numl=$_POST["numl"];
      if($BDD->query("update libro set titu='$titu',autor='$autor',tipo='$tipo',prec=$prec where numl=$numl "))
           { $resp =true; }
      else { $resp =false;} 
        $data=array("resp"=>$resp,"msg"=>" se Actualizo el libro");  
   break;







}
echo json_encode($data);
?>