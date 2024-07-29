<?php

namespace App\Imports;

use App\Models\ContentIdea;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContentIdeasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $language;

    public function __construct($language)
    {
        $this->language = $language;
    }

    public function model(array $row)
    {
        // Log header dan row untuk debugging
        \Log::info('CSV Header: ' . json_encode($row));


        return new ContentIdea([
            'judul' => $row['judul'],
            'url' => $row['url'],
            'est_visit' => $row['est_visit'],
            'backlink' => $row['backlink'],
            'facebook' => $row['facebook'],
            'bahasa' => $this->language,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Baris pertama adalah header
    }
}
