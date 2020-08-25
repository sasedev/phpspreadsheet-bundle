<?php
namespace Sasedev\PhpSpreadsheetBundle\Factory;

use MyCLabs\Enum\Enum;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xml;
use PhpOffice\PhpSpreadsheet\Reader\Ods;
use PhpOffice\PhpSpreadsheet\Reader\Slk;
use PhpOffice\PhpSpreadsheet\Reader\Gnumeric;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

/**
 *
 * Sasedev\PhpSpreadsheetBundle\Factory\ReaderType
 *
 * @method static self XLSX()
 * @method static self XLS()
 * @method static self XML()
 * @method static self ODS()
 * @method static self SLK()
 * @method static self GNUMERIC()
 * @method static self HTML()
 * @method static self CSV()
 *
 * @author sasedev <sinus@sasedev.net>
 *         Created on: 23 mai 2020 @ 20:34:51
 */
class ReaderType extends Enum
{

    private const XLSX = Xlsx::class;

    private const XLS = Xls::class;

    private const XML = Xml::class;

    private const ODS = Ods::class;

    private const SLK = Slk::class;

    private const GNUMERIC = Gnumeric::class;

    private const HTML = Html::class;

    private const CSV = Csv::class;

}

