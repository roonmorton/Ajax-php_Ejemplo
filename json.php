<?php 

if(isset($_GET["peticion"]))
{
    if($_GET["peticion"] == "json")
    {
        //Resulta Objeto
        //$data = (object)json_decode(file_get_contents("php://input"),true);
        //echo json_encode(["data" => "OK","recibido" => $data->prueba]);
        
        //Resulta Array
        $data = json_decode(file_get_contents("php://input"),true);
        echo json_encode(["data" => "OK","recibido" => $data]);
    }
    else
    {
            echo json_encode(["data" => "NO"]);
    }
}else
{
    echo json_encode(["data" => "error"]);
}


?>