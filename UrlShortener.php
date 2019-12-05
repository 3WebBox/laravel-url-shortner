<?php

use App\Models\UrlShortener;

use Carbon\Carbon;

function maskUrl($originalUrl) {
    $maskedUrl = "";
    while(true) {
        $maskedUrl = randomChars();
        $checkRequest = UrlShortener::where('masked_url', 'LIKE', $maskedUrl)
                                    ->first();

        if(!$checkRequest) {
            break;
        }
    }
    $url = new UrlShortener;
    $url->original_url = $originalUrl;
    $url->masked_url = $maskedUrl;
    $url->save();
    return url("api/s/$maskedUrl");
}
function getRealUrl($maskedUrl) {
    $url = UrlShortener::where('masked_url', '=', $maskedUrl)
                        ->first();
                        
    if($url) {
        $end = Carbon::parse($url->created_at);
        $now = Carbon::now();
        $dateDiff = $end->diffInDays($now);
        if( $dateDiff > 30 ){
            return false;
        }
        return $url->original_url;
    }
    else {
        return false;
    }
}
function randomChars() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_-';
    $charsSet = array(); 
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $charsSet[] = $alphabet[$n];
    }
    return implode($charsSet); 
}
