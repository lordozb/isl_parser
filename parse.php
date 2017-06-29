<?php

	include("/var/www/html/isl_parser/PHP-Stanford-NLP/autoload.php");
	

	$parser = new \StanfordNLP\Parser(
  '/var/www/html/isl_parser/stanford-parser-full-2017-06-09/stanford-parser.jar',
  '/var/www/html/isl_parser/stanford-parser-full-2017-06-09/stanford-parser-3.8.0-models.jar'
);	
	if($_POST["bool"] == "english"){
		$result = $parser->parseSentence($_POST["key"]);
		echo json_encode($result["wordsAndTags"]);
	}

	else{
		$comm = "shallow_parser_hin infile.txt   outfile.txt";
		exec($comm);		
	}
?>
