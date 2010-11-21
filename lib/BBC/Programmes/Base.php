<?php

require_once 'EasyRdf/Graph.php';
require_once 'EasyRdf/Resource.php';
require_once 'EasyRdf/Namespace.php';

## Add namespaces
EasyRdf_Namespace::set('mo', 'http://purl.org/ontology/mo/');
EasyRdf_Namespace::set('po', 'http://purl.org/ontology/po/');
EasyRdf_Namespace::set('time', 'http://www.w3.org/2006/time#');
EasyRdf_Namespace::set('timeline', 'http://purl.org/NET/c4dm/timeline.owl#');
EasyRdf_Namespace::set('event', 'http://purl.org/NET/c4dm/event.owl#');

class BBC_Programmes_Base extends EasyRdf_Resource
{
    const PREFIX = 'http://www.bbc.co.uk/programmes';

    private static $_graph = null;
    private static $_endpoint = self::PREFIX;

    public static function getGraph()
    {
        if (!self::$_graph) {
            self::$_graph = new EasyRdf_Graph();
        }
        return self::$_graph;
    }

    public static function getEndpoint()
    {
        return self::$_endpoint;
    }

    public static function setEndpoint($endpoint)
    {
        return self::$_endpoint = $endpoint;
    }
}
