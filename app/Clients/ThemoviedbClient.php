<?php
// Copyright
declare(strict_types=1);


namespace App\Clients;

class ThemoviedbClient implements ThemoviedbClientInterface
{
    public function getMovie($id)
    {
        return $this->endpointRequest("movie/" . $id);
    }

    public function getTopMovies($page_num = null)
    {
        $page = '';
        if (null !== $page_num) {
            $page = "&page=$page_num";
        }
        return $this->endpointRequest("movie/top_rated", $page);
    }

    public function getLatestMovie()
    {
        return $this->endpointRequest("movie/latest");
    }

    public function getLanguages()
    {
        return $this->endpointRequest("configuration/languages");
    }

    public function getCategories()
    {
        return $this->endpointRequest("genre/movie/list");
    }

    private function endpointRequest($method_url, $page = null)
    {
        $url = env('Themoviedb_URL_API', 'https://api.themoviedb.org/3/') . $method_url . "?api_key=" . env('Themoviedb_Key', '53345c0b896cbe9c07e717dd647b7b37') . $page;
        $response = null;
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_CONNECTTIMEOUT => 0,
                CURLOPT_TIMEOUT => 600 //timeout in seconds
            ));

            $response = curl_exec($curl);
        } catch (\Exception $e) {
            return [];
        }

        return $this->response_handler($response);
    }

    private function response_handler($response)
    {
        if ($response) {
            return json_decode($response);
        }

        return [];
    }

}
