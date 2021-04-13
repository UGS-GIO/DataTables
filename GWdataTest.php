<?php
// Include the connect.php file
include ('connect.php');

// Connect to the database
$database = "publications";
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$query = "SELECT pub_year, pub_name, pub_author, pub_sec_author, series_id, pub_url FROM UGSpubs WHERE keywords like '%gwp%' ORDER BY pub_year DESC, pub_month DESC";

$result = $mysqli->prepare($query);


	// If search query, make new sql request

	
	$result->execute();
	/* bind result variables */
	$result->bind_result($PubYear, $PubName, $PubAuthor, $PubSecAuthor, $SeriesID, $PubURL);

	while ($result->fetch())
		{
		
		//add comma between primary and secondary authors if any
		if ( empty($PubSecAuthor) ||  is_null($PubSecAuthor) || $PubSecAuthor === null || $PubSecAuthor === 'undefined' || $PubSecAuthor === ' ' ) {
			$PubSecAuthorString = "";
		//echo "trouble at: ".$SeriesID."AHH!  ";
		} else {
			$PubSecAuthorString = ', '. $PubSecAuthor;
		};
		
		if (stripos($SeriesID, "WCD")!== false) {
			$buy_link =	"";
		} else {
			$buy_link = "<a href='https://utahmapstore.com/products/".$SeriesID."' target='_blank'><img src='https://geology.utah.gov/docs/images/buy.png' width='16'></a>";
		};
		
		// ASIGN SQL DATA TO PHP VARIABLES AND PUT IN ARRAY TO SEND TO HTML PAGE
		$alldata[] = array(
			'pub_year' => $PubYear,
			'pub_name' => $PubName,
			'pub_author' => $PubAuthor . $PubSecAuthorString,
			'series_id' => $SeriesID,
			'pdf_link4AlphList' => "<a href='".$PubURL."' target='_blank'><img src='https://geology.utah.gov/docs/images/pdf16x16.gif'></a>",
			'buy_link4AlphList' => $buy_link
		);

		}
	echo json_encode($alldata);


/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>