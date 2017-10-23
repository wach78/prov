<?php

// Denna fil tar i mot get och post anrop från ajax 

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	$who = isset($_GET['who']) ? $_GET['who'] : 'error';
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$who = isset($_POST['who']) ? $_POST['who'] : 'error';
}
else 
{
	$who = 'error';
}


//$who avgör vilka instruktioner som ska göras för ett anrop

switch($who)
{
	case 'TA':
				echo isset($_GET['text']) ? $_GET['text'] : 'error';
					
		break;
		
	case 'TB':
				echo isset($_GET['text']) ? $_GET['text'] : 'error';
				 	 
		break;
		
	case 'frmtest':
		
		$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
		$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
		$os = isset($_POST['os']) ? $_POST['os'] : "";
		
		echo $firstname .'::'. $lastname .'::'.$os;
		
		break;
		
	case 'loadbook':
		
		$bookID = isset($_GET['BID']) ? $_GET['BID'] : -1;
		
		$xmlDoc = new DOMDocument();
		$xmlDoc->load('books.xml');
		
		$books = $xmlDoc->getElementsByTagName('book');
		
		
		$titleData = $authorData = $ISBNData = "";
		
		foreach ($books as $book)
		{
			$id = $book->getAttribute('id');
			
			if ($id == $bookID)
			{
				$xmltitle = $book->getElementsByTagName('title');
				$titleData = '<b>Title: </b>' .$xmltitle->item(0)->nodeValue;
				
				$xmlauthor = $book->getElementsByTagName('author');
				$authorData = '<b>Författare: </b>'. $xmlauthor->item(0)->nodeValue;
				
				$xmlISBN = $book->getElementsByTagName('ISBN');
				$ISBNData = '<b>ISBN: </b>'. $xmlISBN->item(0)->nodeValue;
			}
		}
		
		echo $titleData .'<br />';
		echo $authorData .'<br />';
		echo $ISBNData  .'<br />';
		
		
		break;
		
	case 'error':
		
			echo 'något gick fel';
		break;
	
}

?>