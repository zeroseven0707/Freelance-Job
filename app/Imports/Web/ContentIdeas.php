<?php

namespace App\Imports\Web;

use App\Models\ContentIdea;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContentIdeas implements ToModel, WithHeadingRow
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
            'freelance_id' => Auth::user()->id,
        ]);
    }

    public function headingRow(): int
    {
        return 1; // Baris pertama adalah header
    }
}
