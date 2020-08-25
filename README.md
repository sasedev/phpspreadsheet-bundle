# Sasedev - PhpSpreadsheetBundle Bundle

Spreadsheet generator for Symfony.

## What is it?

This is a Symfony Spreadsheet Factory for use inside a controller to generate or to read from a Spreadsheet file using phpoffice/phpspreadsheet.

## Installation

### Step 1: Download PhpSpreadsheetBundle using composer
```bash
$ composer require sasedev/phpspreadsheet-bundle
```
Composer will install the bundle to your project's vendor directory.

### Step 2: Enable the bundle
Enable the bundle in the config if flex it did´nt do it for you:
```php
<?php
// config/bundles.php

return [
    // ...
    Sasedev\PhpSpreadsheetBundle\SasedevPhpSpreadsheetBundle::class => ['all' => true],
    // ...
];
```

## Usage

### Writing:
You can use the type in your forms just like this:
```php
<?php

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Sasedev\PhpSpreadsheetBundle\Factory\WriterType;
use Sasedev\PhpSpreadsheetBundle\Factory\PhpSpreadsheetFactory;

// ...
public function writeExcel($id, Request $request, PhpSpreadsheetFactory $factory) {
$Spreadsheet = $factory->createSpreadsheet();
$Spreadsheet->getProperties()
->setCreator('Salah Abdelkader Seif Eddine')
->setTitle('My Excel file')
->setSubject('the subject')
->setDescription('description of the file')
->setKeywords('key1, key2, key3')
->setCategory('classification');

$Spreadsheet->setActiveSheetIndex(0);

$Worksheet = $Spreadsheet->getActiveSheet();
$Worksheet->setTitle('Sheet 1');
$rowNum = 1;
$colNum = 1;
$Worksheet->getCellByColumnAndRow($colNum, $rowNum)->setValue('Col 1');
$colNum ++;
$Worksheet->getCellByColumnAndRow($colNum, $rowNum)->setValue('Col 2');
$Worksheet->getStyle(Coordinate::stringFromColumnIndex(1) . $rowNum . ':' . Coordinate::stringFromColumnIndex($colNum) . $rowNum)
->applyFromArray(['font' => ['bold' => true], 'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => [ 'rgb' => '94ccdf']]]);
$em = $this->getEntityManager();
$Entities = $em->getRepository(MyEntity::class)->findAll();
foreach ($Entities as $Entity) {
$rowNum ++;
$colNum = 1;
$Worksheet->getCellByColumnAndRow($colNum, $rowNum)->setValueExplicit($Entity->getCol1(), DataType::TYPE_STRING);

$colNum ++;
$Worksheet->getCellByColumnAndRow($colNum, $rowNum)->setValueExplicit($Entity->getCol2(), DataType::TYPE_STRING);
if ($rowNum % 2 == 1) {
$Worksheet->getStyle(Coordinate::stringFromColumnIndex(1) . $rowNum . ':' . Coordinate::stringFromColumnIndex($colNum) . $rowNum)
->applyFromArray(['fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'd8f1f5']]]);
} else {
$Worksheet->getStyle(Coordinate::stringFromColumnIndex(1) . $rowNum . ':' . Coordinate::stringFromColumnIndex($colNum) . $rowNum)
->applyFromArray(['fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['rgb' => 'bfbfbf']]]);
}
}
for ($currentColNum = 1; $currentColNum <= $colNum; $currentColNum ++) {
$Worksheet->getColumnDimension(Coordinate::stringFromColumnIndex($currentColNum))->setAutoSize(true);
}
$writer = $factory->createWriter($Spreadsheet, WriterType::XLSX());
$response = $factory->createStreamedResponse($writer);
$response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // application/vnd.ms-excel
$response->headers->set('Content-Disposition', 'attachment;filename="myfile.xlsx"');
return $response;
}
```

### Reading:
```php
<?php

use Sasedev\PhpSpreadsheetBundle\Factory\ReaderType;
use Sasedev\PhpSpreadsheetBundle\Factory\PhpSpreadsheetFactory;

// ...
public function readExcel(Request $request, PhpSpreadsheetFactory $factory) {
// ...
$ExcelReader = $factory->createReader(ReaderType::XLSX());
$ExcelReader->load('myfile.xlsx');
// ...
}
// ...
```


## Reporting an issue or a feature request
Feel free to report any issues. If you have an idea to make it better go ahead and modify and submit pull requests.
