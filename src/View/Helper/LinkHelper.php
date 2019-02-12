<?php

namespace App\View\Helper;

use Cake\View\Helper;

class LinkHelper extends Helper
{
    public function urlEncode($url) {
        
        $out = trim($url);
        $out = str_replace(["ą","ć","ę","ł","ń","ó","ś","ź","ż"], ["a","c","e","l","n","o","s","z","z"], $url);
        $out = str_replace(['!','@','#','$','%','^','&','*','(',')','+','=','"','\'','?','.',',','-','–',':',';','„','”'], '', $out);
        $out = str_replace(['   ', '  '], ' ', $out);
        $out = str_replace(' ', '-', $out);
        $out = strtolower($out);

        return $out;
    }
}