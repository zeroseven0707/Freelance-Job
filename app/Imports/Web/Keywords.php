<?php

namespace App\Imports\Web;

use App\Models\Keyword;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Keywords implements ToModel, WithHeadingRow
{
    protected $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function model(array $row)
    {
        \Log::info('CSV Row: ' . json_encode($row));

        return new Keyword([
            'kata_kunci' => $row['kata_kunci'] ?? 'default', // Default value jika tidak ada
            'volume' => $row['search_volume'] ?? 0,
            'cpc' => $row['cpc'] ?? 0,
            'ads' => $row['ads'] ?? 0,
            'seo' => $row['seo'] ?? 0,
            'bahasa' => $this->language,
            'freelance_id' => Auth::user()->id,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Baris pertama adalah header
    }
    }
