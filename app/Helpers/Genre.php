<?php
use App\Models\Genre;
function genres()
{
    $genres = Genre::all();

    return $genres;
}

function getRandomGenres()
{
    $randomGenres = Genre::inRandomOrder()->limit(7)->get();
    $sortedGenres = $randomGenres->sortBy('name');

    return $sortedGenres;
}