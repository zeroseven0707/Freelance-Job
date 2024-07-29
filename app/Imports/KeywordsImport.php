<?php

namespace App\Imports;

use App\Models\Keyword;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KeywordsImport implements ToModel, WithHeadingRow

{
    protected $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function model(array $row)
    {
        // Log header dan row untuk debugging
        \Log::info('CSV Header: ' . json_encode($row));


        return new Keyword([
            'kata_kunci' => $row['kata_kunci'] ?? 'default', // Default value jika tidak ada
            'volume' => $row['search_volume'] ?? 0,
            'cpc' => $row['cpc'],
            'ads' => $row['ads'],
            'seo' => $row['seo'],
            'bahasa' => $this->language,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Baris pertama adalah header
    }
}
