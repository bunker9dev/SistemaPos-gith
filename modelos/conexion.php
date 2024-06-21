<?php





class Conexion {

    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=sistemapos",
                        "root", "");

        $link->exec("set names utf8");

        return $link;

    }
}








// class Conexion {
//     static public function conectar(){
//         $mysql = new mysqli('localhost', 'root', '', 'sistemapos');
//         $mysql->set_charset('utf8');

//         if(mysqli_connect_errno()){
//             echo "Error en la conexion : ".mysqli_connect_errno();
//         }else{
//             echo "conexion exitosa";
//         }

//         return $mysql;

//     }
// }