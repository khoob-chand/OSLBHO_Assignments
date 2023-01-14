<?php

// namespace Drupal\apicall\Controller;
// use Drupal\Core\Controller\ControllerBase;
    
// class MyController extends ControllerBase{
//     public function content(){
//         $client = \Drupal::httpClient();
//         $request=$client->request('GET', 'https://newsapi.org/v2/everything?q=tesla&from=2022-09-28&sortBy=publishedAt&apiKey=8cd8fd3702cb4bbbb790f226130b4fc5');
//         $response = json_decode($request->getBody());
        
      
//           $news_result= $response->articles;
//           dd($news_result);
    


         

        
        
       
//     }
// } 
namespace Drupal\apicall\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

use Drupal\Core\Controller\ControllerBase;


class MyController extends ControllerBase{
function content(){
  $client = new Client();
$people = [];
// $store=[];

try {
  $response = $client->get('https://api.openweathermap.org/data/2.5/forecast?id=524901&appid=a291a3063a0784836cd4c8ff03e7281f');
  $result = json_decode($response->getBody(), TRUE);

  // $news_result= $response->articles;

  dd($result);
  
  foreach($result['results'] as $item) {
    $people[] = $item['name']; 
   
  }
}
catch (RequestException $e) {
  // log exception
}
dd($people);



return [
  '#theme'=>'mylists',
  '#data'=>$people,
];


}
}