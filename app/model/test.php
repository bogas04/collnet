<?php

$m = new MongoClient("mongodb://127.0.0.1:27017");
$db = $m->selectDB('collnet');

$userCollection = new MongoCollection($db, 'users'); 

$userCollection->remove();

$userCollection->insert(['name' => 'akanshi sucks ' . rand(). " times"]);
$userCollection->insert(['name' => "chitra"]);

$userCollection->findAndModify(['name' => 'chitra'],['$set' => [
  'age' => 16, 
  'gender' => 'unknown'
]] );

$doc1 = $userCollection->findOne(['name' => 'ayush']);
echo $doc1 === Null ? "NOPE\n\n\n\n\n\n\n\n" : "TRUE";

$doc2 = $userCollection->findOne(['name' => 'chitra'], ['gender' => 0]);
var_dump ($doc2);

$doc3 = $userCollection->remove(['name' => 'chitra'], ['justOne' => true]);

$doc4 = $userCollection->findOne(['name' => 'chitra'], ['gender' => 0]);
echo $doc4 === Null ? "NOPE\n" : "TRUE";
//foreach($userCollection->find() as $doc) {
  //echo "The name is ". $doc['name'] . "\n";
  //if(in_array('age', array_keys($doc)))echo "  The age is ". $doc['age'] . "\n";
//}



