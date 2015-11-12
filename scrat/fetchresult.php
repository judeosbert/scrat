<?php

// Establish database connection here:
$server="localhost";
$user="root";
$pass="";
$db="google2";

$conn=new mysqli($server,$user,$pass,$db);
if($conn->error)
{
  die("Connection error");
}

# Do the contents here
$found=1;
$query=$_POST["query"];
/*
//Searching for existing query
$searchq=$conn->prepare("SELECT count(*) FROM userqueries WHERE query=?");
$searchq->bind_param("s",$query);
$searchq->execute();
$searchq->bind_result($found);
$searchq->fetch();
$searchq->close();
if($found==0)
{
  //Add to query
  $addq=$conn->prepare("INSERT INTO userqueries(query) VALUES(?)");
  $addq->bind_param("s",$query);
  $addq->execute();
  $addq->close();
}
*/
$results=array();
$resultcount=0;
$query="%".$query."%";

  $getdata=$conn->prepare("SELECT url,title,description FROM spideredurl WHERE title LIKE ? OR description LIKE ? OR url LIKE ? GROUP BY url ORDER BY pagerank DESC");
  $getdata->bind_param("sss",$query,$query,$query);
  $getdata->execute();
  $getdata->bind_result($url,$title,$description);
/*
  while($getdata->fetch())
  {
    $results=$results."<li class='list-item' style='min-width:100%;'>
    <a href='".$url."' style='font-size:28px;'>".$title."</a>
    <br />
    <a href='".$url."' style='font-size:13px;color:green;'>".$url."</a>
    <br />
    <p>".$description."</p>
    <hr />

  </li><br />";
  }
  */

  $i=0;

  while($getdata->fetch())
  {
    $resarray=array(
      "url".($i+1) => $url,
      "title".($i+1) => $title,
      "description".($i+1) => $description,
    );
      $i=$i+1;
      $results=array_merge($results,$resarray);
  }
  /*
  $results=$results."<center><li class='list-item' style='text-align:center;'>End of results</item></center>";
  echo $results;
  */

  $data=array(
    "count" => $i,
    "results" => $results,
  );

  $getdata->close();
  die(json_encode($data));
?>
