<?php
  $xmldom = new DOMDocument();
  $xmldom->load("products.xml");
  $xmlProducts = $xmldom->getElementsByTagName("Product");
  $searchTerms = explode(" ",trim($_GET["query"]));
  $query = "/(". implode( ")|(",$searchTerms ). ")/i";

  header ("Content-Type:text/xml");
  echo "<Products>";
  for ($i = 0; $i < $xmlProducts->length; $i++) {
    $xmlproduct = $xmlProducts->item($i);
    $title = $xmlproduct->getElementsByTagName("title")->item(0);
    $result = filter_var($title->nodeValue, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>$query))) != null ? $xmlproduct : null ;
    if(isset($result)) {
      echo "<Product>";
      echo "<id>".$xmlproduct->getElementsByTagName("id")->item(0)->nodeValue."</id>";
      echo "<title>".$xmlproduct->getElementsByTagName("title")->item(0)->nodeValue."</title>";
      echo "<brand>".$xmlproduct->getElementsByTagName("brand")->item(0)->nodeValue."</brand>";
      echo "<price>".$xmlproduct->getElementsByTagName("price")->item(0)->nodeValue."</price>";
      echo "<quantity>".$xmlproduct->getElementsByTagName("quantity")->item(0)->nodeValue."</quantity>";
      echo "<description>".$xmlproduct->getElementsByTagName("description")->item(0)->nodeValue."</description>";
      echo "<image>".$xmlproduct->getElementsByTagName("image")->item(0)->nodeValue."</image>";
      echo "<category>".$xmlproduct->getElementsByTagName("category")->item(0)->nodeValue."</category>";
      echo "<type>".$xmlproduct->getElementsByTagName("type")->item(0)->nodeValue."</type>";
      echo "</Product>";
    }
  }
  echo "</Products>";
?>