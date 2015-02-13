<div>
<audio controls="controls">
  Your browser does not support the <code>audio</code> element.
  <source src="/audio/Come on and Stomp, Stomp, Stomp - Johnny Dodds.mp3" type="audio/wav">
<!--   <source src="foo.wav" type="audio/wav"> -->
</audio>

</div>

<div id="xml">
	<?php
	
// 		echo count($xmlDom->childNodes);
// 		echo "<br>";
		
// 		echo print_r($xmlDom);
		
// 		echo "name => ".$xmlDom->nodeName;	// MecabResult
		
// 		echo "<br>";
		
// 		echo "class => ".get_class($xmlDom->childNodes);	// DOMNodeList
		
// 		echo "<br>";
		
// 		echo "item(0) => ".get_class($xmlDom->childNodes->item(0));	// DOMText
		
// 		echo "<br>";
		
// 		echo print_r($xmlDom->childNodes->item(0));
		
// 		echo "<br>";
		
// 		echo "item(0).name => ".$xmlDom->childNodes->item(0)->nodeName;
		
// 		echo "<br>";
		
// 		echo "item(0).Value => ".$xmlDom->childNodes->item(0)->nodeValue;
		
// 		echo "name => ".$xmlDom->childNodes->nodeName;
	
// 		foreach ($xmlDom->childNodes as $child) {
			
// 			echo $child->surface->__toString();
	
// 			echo "<br>";
// 			echo "<br>";

// 		}
		
// 		unset($child);

// 		$children = $xml->children();
		
// 		foreach ($children as $child):
			
// 			echo $child->surface->__toString();
			
// 			echo "<br>";
// 			echo "<br>";
		
// 		endforeach;
// 		unset($child);

// 		echo print_r($xml);
// 		$children = $xml->children();
		
// 		echo count($children);
		
// 		echo "<br>";
// 		echo "<br>";
		
		$children = $xml->children();
		
		//REF http://blog.teamtreehouse.com/how-to-parse-xml-with-php5  echo $mysongs->song[0]->artist"
		$child = $children->word[0];
		
		echo get_class($child);		// SimpleXMLElement
		
		$surface = $child->surface;
		
		echo count($child);
		
		echo "<br>";
		echo "<br>";
		
		$message = $surface;
		echo get_class($message);		// SimpleXMLElement
		
		echo "<br>";
		echo "<br>";
		
// 		$message = $surface."=====";
// 		echo get_class($message);		// string
		
// 		echo $message;
		
// 		echo "<br>";
		echo "<br>";
		
// 		echo $surface[0]."-----";
// 		echo $surface[0]."-----";
// 		echo get_class($surface);
// 		echo print_r($surface);
// 		echo print_r($child);
		
// 	?>
	<?php //echo get_class($xml); ?>
</div>