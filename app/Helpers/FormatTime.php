<?php
use Carbon\Carbon;

if (!function_exists('formatTime')) {
    function formatTime($dateString)
    {
        $date = Carbon::parse($dateString);
        $now = Carbon::now();

        $diffInMinutes = $date->diffInMinutes($now);
        $diffInHours = $date->diffInHours($now);
        $diffInDays = $date->diffInDays($now);
        $diffInWeeks = $date->diffInWeeks($now);
        $diffInMonths = $date->diffInMonths($now);
        $diffInYears = $date->diffInYears($now);

        if ($diffInDays === 0) {
            if ($diffInMinutes < 60) {
                return $diffInMinutes . ' menit yang lalu';
            } elseif ($diffInHours < 24) {
                return $diffInHours . ' jam yang lalu';
            }
            return 'Baru Update';
        } elseif ($diffInDays <= 7) {
            return $diffInDays . ' hari yang lalu';
        } elseif ($diffInWeeks <= 4) {
            return $diffInWeeks . ' Minggu yang lalu';
        } elseif ($diffInMonths <= 12) {
            return $diffInMonths . ' Bulan yang lalu';
        } else {
            return $diffInYears . ' Tahun yang lalu';
        }
    }
}