<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function read()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load(public_path("file.xlsx"));
        $sheet = $spreadsheet->getActiveSheet();
        $lsValue = $sheet->getCell('A1')->getValue(); //726
        $articles = [];
        for ($i = 2; $i < 726; $i++) {

            $article = [
                'number' => (int)filter_var($sheet->getCell("B{$i}")->getValueString(), FILTER_SANITIZE_NUMBER_INT),
                'title' => trim(explode('.', $sheet->getCell("B{$i}")->getValueString())[1]),
                'description' => $sheet->getCell("C{$i}")->getValueString(),
                'mrp' => $sheet->getCell("D{$i}")->getValueString(),
            ];
            if (mb_strlen($sheet->getCell("D{$i}")->getValueString()) < 10) {
                if (is_numeric($article['mrp'])) {
                    $article['mrp'] = (int)$article['mrp'];
                } else {
                    $article['mrp'] = null;
                }
            } else {
                $article['mrp'] = null;
               // $article['points'] = explode(PHP_EOL, $article['description']);
            }
            $articles[] = $article;
        }

       // DB::connection('paydal')->table('articles')->insert($articles);
    }
}
