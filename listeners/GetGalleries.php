<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use Zttp\Zttp;

class GetGalleries
{
    public function handle(Jigsaw $jigsaw) {
        $api_key = "333747127437729";
        $api_secret = "azsD1P_hff-C-15au0CGN4SlQTw";
        $cloud = "dy6grlu8z";
        $base = "https://{$api_key}:{$api_secret}@api.cloudinary.com/v1_1/{$cloud}";
        $params = ["prefix" => "Chilling in Tapei", "type" => "upload", "context" => true];
        $query = http_build_query($params);

        // $response = Zttp::get($base . "/resources/image?" . $query);
        $response = Zttp::get($base . "/folders");

        $folders = json_decode($response->body(), true);
        collect($folders['folders'])->each(function($folder) use ($base, $jigsaw) {
            $path = $folder['path'];
            $params = ["prefix" => $path, "type" => "upload", "context" => true];
            $query = http_build_query($params);
            $response = Zttp::get($base . "/resources/image?" . $query);
            $images = json_decode($response->body(), true)['resources'];
            $jigsaw->setConfig("galls." . $this->slugName($folder['name']), $images);
        });


    }

    private function slugName($name) {
        $lower = strtolower($name);
        return str_replace(" ", "_", $lower);
    }
}