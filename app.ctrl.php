<?php
//StAuth10065: I Neel Thakkar, 000743545 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else.

// Auto-discover the photos, thumbnails and description files
$photoData = [];
$numGal = 0;
$index = 0;
$photoData[$index]["thumbs"] = false;
$photoData[$index]["dThumbs"] = true;
$photoData[$index]["dSingles"] = false;

// open the photos folder
$fp = opendir("photos");
while( false !== ( $DIR = readdir($fp) ) ) {
 
  // read any directory that isn't . or ..
  if (($DIR !== (".")) && ($DIR !== (".."))) {

  	// get the description.txt file contents
    $photoData[$numGal]["description"] = 
      file_get_contents("photos/" . $DIR . "/description.txt");

	// gallery directory
    $photoData[$numGal]["directory"] = $DIR;
	  
    // open the gallery folder, get the photo names and sort them
    $fpdir = opendir("photos/" . $DIR);
    while ($file = readdir($fpdir)) {
      if (($file !== (".")) && ($file !== ("..")) && 
      	  ($file !== "thumbs") && ($file !== "description.txt")) {
        $photoData[$numGal]["photos"][] = $file;        
      }
    }
    sort($photoData[$numGal]["photos"]);
  }

  $numGal++;
}

if(isset($_REQUEST['act'])) {
	switch($_REQUEST['act']) {
		case 'home':
			$index = $_REQUEST["index"];
			$photoData[$index]["thumbs"] = true;
			$photoData[$index]["dThumbs"] = false;
			$photoData[$index]["dSingles"] = false;
			break;
		case 'single':
			$index = $_REQUEST["index"];
			$photoData[$index]["thumbs"] = false;
			$photoData[$index]["dThumbs"] = false;
			$photoData[$index]["dSingles"] = true;
			$id = $_REQUEST['id'];
			break;
	}
}
include 'app.view.php';

?>

<!-- Let's look at the contents of $photoData...  -->




