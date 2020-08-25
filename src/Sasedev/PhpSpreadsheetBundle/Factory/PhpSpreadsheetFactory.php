<?php
namespace Sasedev\PhpSpreadsheetBundle\Factory;

use PhpOffice\PhpSpreadsheet\Helper\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\Factory\PhpSpreadsheetFactory
 *
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:44:37
 */
class PhpSpreadsheetFactory
{

    /**
     * Creates an empty Spreadsheet Object if the filename is empty, otherwise loads the file into the object.
     *
     * @param string $filename
     *
     * @return Spreadsheet
     */
    public function createSpreadsheet(?string $filename = null)
    {
        return (null === $filename) ? new Spreadsheet() : IOFactory::load($filename);
    }

    /**
     * Create a worksheet drawing
     *
     * @return Drawing
     */
    public function createDrawing()
    {
        return new Drawing();
    }

    /**
     * Create a reader
     *
     * @param ReaderType $type
     *
     * @return IReader
     */
    public function createReader(ReaderType $rt)
    {
        if (! \class_exists($rt->getValue())) {
            throw new \InvalidArgumentException(
                'The class [' . $rt->getValue() . '] does not exist or is not supported by PhpSpreadsheet.');
        }

        $className = $rt->getValue();

        return new $className();
    }

    /**
     * Create a reader
     *
     * @param WriterType $type
     *
     * @return IWriter
     */
    public function createWriter(Spreadsheet $Spreadsheet, WriterType $wt)

    {
        if (! \class_exists($wt->getValue())) {
            throw new \InvalidArgumentException(
                'The class [' . $wt->getValue() . '] does not exist or is not supported by PhpSpreadsheet.');
        }
        $className = $wt->getValue();
        return new $className($Spreadsheet);
    }

    /**
     * Stream the file as Response.
     *
     * @param IWriter $writer
     * @param int $status
     * @param array $headers
     *
     * @return StreamedResponse
     */
    public function createStreamedResponse(IWriter $writer, $status = 200, $headers = [])
    {
        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, $status, $headers);
    }

    /**
     * Create a PHPExcel Helper HTML Object
     *
     * @return Html
     */
    public function createHelperHTML()
    {
        return new Html();
    }
}

