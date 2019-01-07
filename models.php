<?php 
// Array Simula tabla Marcas
$v_Marcas = [
    1 => "Toyota",
    2 => "Honda",
    3 => "Nissan",
    4 => "Renault"
];

//Array simula tabla Modelos
$v_Modelo = [
    1 => 
    [
        [
            "id" => 1,
            "nombre" => "Tercel"
        ],
        [
            "id" => 2,
            "nombre" => "Camry"
        ],
        [
            "id" => 3,
            "nombre" => "Rav4"
        ],
        [
            "id" => 4,
            "nombre" => "Hilux"
        ]
    ],
    2 => 
    [
        [
            "id" => 1,
            "nombre" => "Acord"
        ],
        [
            "id" => 1,
            "nombre" => "Civic"
        ]
    ],
    3 => [

    ],
    4 => [

    ]

];


// Habilitar Peticion tipo GET
// var $_GET["req"] == "json" | no se habilita si no viene la variable
// var $_GET["idMarcar"] == idMarca que quiere obtener los modelos

// Verificar el resultado como JSON 
// URL: models.php?req=json&idMarca=1

if(isset($_GET["req"]) && isset($_GET["idMarca"])){ // verifica si la peticion es la correcta y se recibe un idpara devolver resultado
    $id_marca = $_GET["idMarca"]; // Recoge el id de la peticion
    if($_GET["req"] == "json"){ // Verifica que la peticion sea json
        $res = [
            "data" =>$v_Modelo[$id_marca]
        ];
        //var_dump($res);
        echo json_encode($res); //codifica para que sea enviado como json el array
    }
}
?>
