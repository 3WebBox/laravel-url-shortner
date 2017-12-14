<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UrlShortener;
use Webpatser\Uuid\Uuid;

class UrlShortenerController extends Controller
{
    public function maskUrl($originalUrl) {

        $foundUnique = false;
        $charsSet = "";

        while($foundUnique === false) {
            $charsSet = Self::randomChars();
            $checkRequest = UrlShortener::where(
                'masked_url', '=', $charsSet
            )->first();

            if(!$checkRequest) {
                $foundUnique = true;
            }
        }

        $url = new UrlShortener;
        $url->uuid = Uuid::generate(4);
        $url->original_url = $originalUrl;
        $url->masked_url = $charsSet;
        $url->save();

        return 'https://app.cirrb.com/s/'. $charsSet;
    }

    public function goToOriginalUrl($maskedUrl) {
        $url = UrlShortener::where(
            'masked_url', '=', $maskedUrl
        )->first();

        if($url) {
            return redirect($url->original_url);
        }
        else {
            return false;
        }
    }

    private function randomChars() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890_-';
        $charsSet = array(); 
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $charsSet[] = $alphabet[$n];
        }
        return implode($charsSet); 
    }
}
