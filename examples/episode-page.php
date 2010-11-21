<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . '../lib/');
    require_once "BBC/Programmes.php";
    require_once "html_tag_helpers.php";

    ## Configure the RDF parser to use
    require_once "EasyRdf/Parser/Arc.php";
    EasyRdf_Graph::setRdfParser( new EasyRdf_Parser_Arc() );
    
    # Configure the HTTP client to use
    require_once "EasyRdf/Http/Client.php";
    EasyRdf_Graph::setHttpClient( new EasyRdf_Http_Client() );
?>
<html>
<head><title>Episode Page</title></head>
<body>

<?= form_tag() ?>
<?= text_field_tag('pid', 'b00p4h42', array('size'=>12)) ?>
<?= submit_tag() ?>
<?= form_end_tag() ?>

<?php
    if (isset($_REQUEST['pid'])) {
        $episode = BBC_Programmes_Programme::find( $_REQUEST['pid'] );
        echo content_tag('h1', $episode->getTitle());
        if ($episode->get('foaf:depiction')) {
            echo image_tag($episode->get('foaf:depiction'));
        }
        echo content_tag('p', $episode->get('po:long_synopsis'));
        
        if ($episode->get('po:clip')) {
            echo "<h3>Clips</h3>\n";
            echo "<ul>\n";
            foreach($episode->all('po:clip') as $clip) {
                echo "  <li>".link_to($clip)."</li>\n";
            }
            echo "</ul>\n";
        }

        echo "<h3>Broadcasts</h3>\n";
        echo "<ul>\n";
        foreach($episode->broadcasts() as $broadcast) {
            $time = $broadcast->get('event:time');
            echo "  <li>";
            echo $time->get('timeline:start').' on ';
            echo $broadcast->get('po:broadcast_on');
            echo "</li>\n";
        }
        echo "</ul>\n";

    }
  
    echo "<hr />";
    echo BBC_Programmes_Base::getGraph()->dump();
?>
</body>
</html>
