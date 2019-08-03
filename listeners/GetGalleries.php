<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use Zttp\Zttp;

class GetGalleries
{
    public function handle(Jigsaw $jigsaw) {
        

        if($jigsaw->getConfig("production")) {
            try {
                $galleries = $this->fetchGalleries();
                $this->cacheGalleries($galleries);
            } catch (\Exception $e) {
                $galleries = $this->fetchedCachedGalleries();    
            }
        } else {
            $galleries = $this->fetchedCachedGalleries();
        }
        $jigsaw->setConfig("galls", $galleries);
    }

    private function fetchGalleries() {
        return $this->listFolders()->flatMap(function($folder) {
            $params = ["prefix" => $folder['path'], "type" => "upload", "context" => true, "max_results" => 50];
            $response = Zttp::get($this->makeUrl("resources/image", $params));
            return [$this->slugName($folder['name']) => json_decode($response->body(), true)['resources']];
        })->all();
    }

    private function cacheGalleries($galleries) {
        file_put_contents("galleries_cache.json", json_encode($galleries));
    }

    private function fetchedCachedGalleries() {
        return json_decode(file_get_contents("galleries_cache.json"), true);
    }

    private function listFolders() {
        $body = Zttp::get($this->makeUrl("folders"))->body();
        return collect(json_decode($body, true)['folders'])->reject(function($folder) {
            return $folder['name'] === 'samples';
        });
    }

    private function makeUrl($uri, $params = []) {
        $api_key = "333747127437729";
        $api_secret = "azsD1P_hff-C-15au0CGN4SlQTw";
        $cloud = "dy6grlu8z";

        $base = "https://{$api_key}:{$api_secret}@api.cloudinary.com/v1_1/{$cloud}/";

        if(count($params)) {
            $query = http_build_query($params);
            $uri = $uri . "?" . $query;
        }

        return $base . $uri;
    }

    private function slugName($name) {
        $lower = strtolower($name);
        return str_replace(" ", "_", $lower);
    }
}