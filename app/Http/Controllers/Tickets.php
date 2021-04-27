<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
class Tickets extends Controller
{
    public function index(){
        $nombre_impresora = "F4400"; 
 
        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        
        /*
            Imprimimos un mensaje. Podemos usar
            el salto de línea o llamar muchas
            veces a $printer->text()
        */
        $printer->text("Prueba");
        
        /*
            Hacemos que el papel salga. Es como 
            dejar muchos saltos de línea sin escribir nada
        */
        $printer->feed();
        
        /*
            Cortamos el papel. Si nuestra impresora
            no tiene soporte para ello, no generará
            ningún error
        */
        $printer->cut();
        
        /*
            Por medio de la impresora mandamos un pulso.
            Esto es útil cuando la tenemos conectada
            por ejemplo a un cajón
        */
        $printer->pulse();
        
        /*
            Para imprimir realmente, tenemos que "cerrar"
            la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
        */
        $printer->close();
    }
}
