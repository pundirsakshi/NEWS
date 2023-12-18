<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ApiData;
use App\Models\APIweb;
use App\Models\APITV;
use App\Models\APIgame;

class newsController extends Controller
{

    public function index(Request $request)
    {
        $tech=ApiData::all();
        $game=APIgame::all();
        $tv=APITV:: all();
        $web=APIweb::all();


        return view('index',[
            'tech'=>$tech,
            'game'=>$game,
            'tv'=>$tv,
            'web'=>$web,
        ]);
    }

public function get_data(Request $request)
{
    // Make a request to get the XML response
    $response = Http::get('https://tech.hindustantimes.com/rss/tech');
    // Check if the request was successful
    if ($response->successful()) {
        // Convert XML to JSON
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        $data = $data['channel']['item'];

        $dataImg = $this->getImageUrlsFromRssFeed($response);
        $i=null;      
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['image']= $dataImg[$i]['img']; 
        }

      foreach($data as $d)
      {
        ApiData:: updateOrcreate(['title'=>$d['title']],
           [
            'date'=>$d['pubDate'],
            'description'=>$d['description'],
            'image'=>$d['image'],

        ]);
      }



        // echo "<pre>";
        // print_r($data);
        // die;

        // Now $data is an associative array containing the converted JSON data
        // You can use $data as neede
        return view('table',['data'=>$data]);

        
    } else {
        // Handle the case when the request was not successful
        echo 'Error: ' . $response->status();
    }
}

public function Gaming(Request $request)
{
    // Make a request to get the XML response
    $response = Http::get('https://tech.hindustantimes.com/rss/gaming');
    // Check if the request was successful
    if ($response->successful()) {
        // Convert XML to JSON
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        $data = $data['channel']['item'];

        $dataImg = $this->getImageUrlsFromRssFeed($response);
        $i=null;      
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['image']= $dataImg[$i]['img']; 
        }
       
        foreach($data as $d)
        {
          APIgame:: updateOrcreate(['title'=>$d['title']],
             [
              'date'=>$d['pubDate'],
              'description'=>$d['description'],
              'image'=>$d['image'],
  
          ]);
        }

      
        // echo "<pre>";
        // print_r($data);
        // die;

        // Now $data is an associative array containing the converted JSON data
        // You can use $data as neede
        return view('game',['data'=>$data]);

        
    } else {
        // Handle the case when the request was not successful
        echo 'Error: ' . $response->status();
    }
}

public function TVNews(Request $request)
{
    // Make a request to get the XML response
    $response = Http::get('https://tech.hindustantimes.com/rss/tv/news');
    // Check if the request was successful
    if ($response->successful()) {
        // Convert XML to JSON
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        $data = $data['channel']['item'];
        $dataImg = $this->getImageUrlsFromRssFeed($response);
        $i=null;      
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['image']= $dataImg[$i]['img']; 
        }

        foreach($data as $d)
        {
          APITV:: updateOrcreate(['title'=>$d['title']],
             [
              'date'=>$d['pubDate'],
              'description'=>$d['description'],
              'image'=>$d['image'],
  
          ]);
        }
        // echo "<pre>";
        // print_r($data);
        // die;

        // Now $data is an associative array containing the converted JSON data
        // You can use $data as neede
        return view('tv',['data'=>$data]);

        
    } else {
        // Handle the case when the request was not successful
        echo 'Error: ' . $response->status();
    }
}

public function WebStories(Request $request)
{
    // Make a request to get the XML response
    $response = Http::get('https://tech.hindustantimes.com/rss/web-stories');
    // Check if the request was successful
    if ($response->successful()) {
        // Convert XML to JSON
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
        $json = json_encode($xml);
        $data = json_decode($json, true);
        $data = $data['channel']['item'];
        $dataImg = $this->getImageUrlsFromRssFeed($response);
        $i=null;      
        for($i=0;$i<count($data);$i++)
        {
            $data[$i]['image']= $dataImg[$i]['img']; 
        }
            
        foreach($data as $d)
      {
        APIweb:: updateOrcreate(['title'=>$d['title']],
           [
            'date'=>$d['pubDate'],
            'description'=>$d['description'],
            'image'=>$d['image'],

        ]);
      }


        // echo "<pre>";
        // print_r($data);
        // die;

        // Now $data is an associative array containing the converted JSON data
        // You can use $data as neede
        return view('web',['data'=>$data]);

        
    } else {
        // Handle the case when the request was not successful
        echo 'Error: ' . $response->status();
    }
}

public function getImageUrlsFromRssFeed($response)
{
    
    if ($response->successful()) {

        $xmlData = $response->body();
        // Now, parse the XML data
        $parsedData = simplexml_load_string($xmlData);

        $items = [];

        // Check if the XML has a namespace and register it
        $namespace = $parsedData->getDocNamespaces();
        // dd($namespace);
        $parsedData->registerXPathNamespace('media', $namespace['media']);

        foreach ($parsedData->channel->item as $item) {
            // Accessing media namespace for 'media:content'
           
            $media = $item->xpath('media:content');

            
            if (!empty($media)) {
                $itemAttributes = [
                    'img' => (string)$media[0]['url'],
                ];
                

                $items[] = $itemAttributes;
            }

           
        }
       
        return $items;
    } else {
      
        return response()->json(['error' => 'Failed to fetch data from the API'], 500);
    }
}

}
