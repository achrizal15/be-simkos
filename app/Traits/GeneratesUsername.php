<?php

namespace App\Traits;

trait GeneratesUsername
{
    public function generateUsername($name)
    {
        $nameSlug = \Illuminate\Support\Str::slug($name, '');
        $dateTimeSuffix = now()->format('YmdHis'); // Get the current date and time as a string
        return $nameSlug . $dateTimeSuffix;
    }
}
