<?php
namespace Sasedev\PhpSpreadsheetBundle\Factory;

use MyCLabs\Enum\Enum;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Ods;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\Factory\WriterType
 *
 * @method static self XLS()
 * @method static self XLSX()
 * @method static self ODS()
 * @method static self CSV()
 * @method static self TCPDF()
 * @method static self DOMPDF()
 * @method static self MPDF()
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:45:15
 */
class WriterType extends Enum
{

    private const XLS = Xls::class;

    private const XLSX = Xlsx::class;

    private const ODS = Ods::class;

    private const CSV = Csv::class;

    private const TCPDF = Tcpdf::class;

    private const DOMPDF = Dompdf::class;

    private const MPDF = Mpdf::class;

}

