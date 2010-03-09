<?php 
$player->addjs();
// print_r($response);
echo $player->embed($response['Song']['mp3list'], 1, $response['User']['id']);
echo "<a href='/responses/quiz' title=\"".$response['Song']['title']." by ".$response['Song']['composer'].
      ' period='.$response['Response']['period'].' genre='.$response['Response']['genre'].'">Refresh</a>';
?>