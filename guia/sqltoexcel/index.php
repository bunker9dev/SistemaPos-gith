<?php

//require_once $_SERVER['DOCUMENT_ROOT'] . '/discolnet/includes/conexion.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/POS/modelos/conexion.php';
require_once 'Spout/Autoloader/autoload.php';
require_once 'Spout/Writer/WriterAbstract.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\WriterAbstract;

class Xlsx
{

    public $CNX2;
    public $CNX1;

    public function __construct()
    {
        $this->CNX2 = Conexion::conectar();
        $this->CNX1 =  Conexion::conectar();
    }


    public function CrearXlsx($opt, $sql)
    {
        switch ($opt) {
            case 'sql':
                $sql = $this->CNX2->prepare($sql);
                break;
            case 'mysql':
                $sql = $this->CNX1->prepare($sql);
                break;
        }

        try {
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_NAMED);

            if (empty($data)) {
                return false;
            }

            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToFile('informe.xlsx');
            $headerRow = WriterEntityFactory::createRowFromArray(array_keys($data[0]));

            // Asigna un valor predeterminado para las celdas de encabezado con valor NULL
            foreach ($headerRow->getCells() as $cell) {
                if ($cell->getValue() === null) {
                    $cell->setValue(''); // Puedes cambiar esto a cualquier valor predeterminado
                }
            }

            $writer->addRow($headerRow);

            foreach ($data as $rowData) {
                $row = WriterEntityFactory::createRowFromArray($rowData);

                // Asigna un valor predeterminado para las celdas de datos con valor NULL
                foreach ($row->getCells() as $cell) {
                    if ($cell->getValue() === null) {
                        $cell->setValue(''); // Puedes cambiar esto a cualquier valor predeterminado
                    }
                }

                $writer->addRow($row);
            }

            $writer->close();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //Funcion para descargar el documento con separador pipe "|"
    public function CrearCsvPipe($opt, $sql)
    {
        switch ($opt) {
            case 'sql':
                $sql = $this->CNX2->prepare($sql);
                break;
            case 'mysql':
                $sql = $this->CNX1->prepare($sql);
                break;
        }

        try {
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            if (empty($data)) {
                return false;
            }

            $writer = WriterEntityFactory::createCSVWriter();

            // Abre el escritor para escribir en el archivo
            $csvFilePath = 'informe.csv';
            $writer->openToFile($csvFilePath);

            // Configura el delimitador de campo
            $writer->setFieldDelimiter('|');

            // Inserta los encabezados
            $writer->addRow(WriterEntityFactory::createRowFromArray(array_keys($data[0])));

            // Inserta los datos
            foreach ($data as $rowData) {
                // Crear una nueva instancia de Row y agregarla al escritor
                $row = WriterEntityFactory::createRowFromArray($rowData);
                $writer->addRow($row);
            }

            // Cierra el escritor
            $writer->close();

            // Forzar descarga del archivo CSV
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="' . basename($csvFilePath) . '";');
            readfile($csvFilePath);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //funcion para generar txt
    public function GenerarPipeTxt($opt, $sql)
    {
        switch ($opt) {
            case 'sql':
                $sql = $this->CNX2->prepare($sql);
                break;
            case 'mysql':
                $sql = $this->CNX1->prepare($sql);
                break;
        }

        try {
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);

            if (empty($data)) {
                echo "No hay datos para descargar.";
                return false;
            }

            // Define el nombre del archivo TXT
            $txtFileName = 'informe.txt';

            // Crea una cadena de texto con los datos
            $txtContent = '';
            foreach ($data as $rowData) {
                $txtContent .= implode('|', $rowData) . PHP_EOL;
            }

            // Ruta temporal del archivo TXT
            $txtFilePath = tempnam(sys_get_temp_dir(), 'informe_');
            file_put_contents($txtFilePath, $txtContent);

            if (!file_exists($txtFilePath)) {
                echo "Error: No se pudo crear el archivo temporal.";
                return false;
            }

            // Establece las cabeceras para la descarga del archivo
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="' . $txtFileName . '"');
            header('Content-Length: ' . filesize($txtFilePath));

            // Envía el archivo y finaliza el script
            readfile($txtFilePath);
            unlink($txtFilePath); // Elimina el archivo temporal después de enviarlo

            exit();

            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function CrearXlsx2($opt, $sql)
    {
        switch ($opt) {
            case 'sql':
                $sql = $this->CNX2->prepare($sql);
                break;
            case 'mysql':
                $sql = $this->CNX1->prepare($sql);
                break;
        }
        try {
            $sql->execute();
            if ($sql->rowCount() == 0) {
                return false;
            }
            $data = $sql->fetchall(pdo::FETCH_NAMED);
            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToFile('Info_Reportes.xlsx');
            $row = WriterEntityFactory::createRowFromArray(array_keys($data[0]));
            $writer->addRow($row);
            foreach ($data as $row) :
                $row = WriterEntityFactory::createRowFromArray($row);
                $writer->addRow($row);
            endforeach;
            $writer->close();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function CrearXlsxArray($data)
    {
        try {
            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToFile('informe.xlsx');
            $row = WriterEntityFactory::createRowFromArray(array_keys($data[0]));
            $writer->addRow($row);
            foreach ($data as $row) :
                $row = WriterEntityFactory::createRowFromArray($row);
                $writer->addRow($row);
            endforeach;
            $writer->close();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function CrearXlsxMultiple($arrays)
    {
        try {
            $writer = WriterEntityFactory::createXLSXWriter();
            $writer->openToFile('informe.xlsx');
            for ($i = 0; $i < count($arrays); $i++) {
                if ($i > 0) {
                    $writer->addNewSheetAndMakeItCurrent();
                }
                $writer->getCurrentSheet()->setName($arrays[$i][0]);
                if (count($arrays[$i][1]) > 0) {
                    $row = WriterEntityFactory::createRowFromArray(array_keys($arrays[$i][1][0]));
                    $writer->addRow($row);
                    foreach ($arrays[$i][1] as $row) :
                        $row = WriterEntityFactory::createRowFromArray($row);
                        $writer->addRow($row);
                    endforeach;
                }
            }
            $writer->close();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function GenerarTabla($opt, $sql)
    {
        switch ($opt) {
            case 'sql':
                $sql = $this->CNX2->prepare($sql);
                break;
            case 'mysql':
                $sql = $this->CNX1->prepare($sql);
                break;
        }
        $sql->execute();
        $row = $sql->fetchAll();
        // var_dump($row);
        if ($sql->rowCount() == 0) {
            $response = array("vacio");
        } else {
            $response = $row;
        }
        return $response;
    }

    public function LoadDataIMG($id)
    {
        $sql = "SELECT RelDocArc from RelacionDocumento where RelDoc= '$id' ";
        $sql = $this->CNX2->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll();
        if ($sql->rowCount() == 0) {
            $response = array("vacio");
        } else {
            $response = $row;
        }
        return $response;
    }
}
