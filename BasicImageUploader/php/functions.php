<?php

function sanitizeString($_db, $str)
{
    $str = strip_tags($str);
    $str = htmlentities($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($_db, $str);
}


function SavePostToDB($_db, $_user, $_filter, $_title, $_text, $_time, $_file_name)
{
	/* Prepared statement, stage 1: prepare query */
	if (!($stmt = $_db->prepare("INSERT INTO WALL(USER_USERNAME, STATUS_TITLE, STATUS_TEXT, TIME_STAMP, IMAGE_NAME, IMG_FILT ) VALUES (?, ?, ?, ?, ?,?)")))
	{
		echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
	}

	/* Prepared statement, stage 2: bind parameters*/
	if (!$stmt->bind_param('ssssss', $_user, $_title, $_text, $_time, $_file_name, $_filter))
	{
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	/* Prepared statement, stage 3: execute*/
	if (!$stmt->execute())
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}

function getPostcards($_db)
{
    $query = "SELECT USER_USERNAME, STATUS_TITLE, STATUS_TEXT, TIME_STAMP, IMAGE_NAME, IMG_FILT FROM WALL ORDER BY TIME_STAMP DESC";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {
		if($row['IMG_FILT']== 'myNostalgia')
		{
			$filter = 'myNostalgia';
		}
        $output = $output . '<div class="panel panel-default"><div class="panel-heading">"' . $row['STATUS_TITLE']
        . '" posted by ' . $row['USER_USERNAME'] . '    filter:'.$filter
        . '</div><div class="body"><img src="' . $server_root . 'users/' . $row['IMAGE_NAME'] . '" width="300px" onload="applyMyNostalgiaFilter();">' . $row['STATUS_TEXT'] . '</div></div>' ;
    }
    
    return $output;
}
?>