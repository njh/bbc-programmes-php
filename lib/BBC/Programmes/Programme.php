<?php

require_once 'BBC/Programmes/Base.php';

class BBC_Programmes_Programme extends BBC_Programmes_Base
{
    public function find($pid)
    {
        $document_uri = self::getEndpoint() . "/$pid.rdf";
        $programme_uri = self::PREFIX . "/$pid#programme";
        self::getGraph()->load($document_uri);
        $programme = self::getGraph()->get($programme_uri);
        foreach($programme->all('po:version') as $version) {
            # FIXME: load from endpoint, not by dereferencing
            self::getGraph()->load($version->getUri());
        }
        return $programme; 
    }
    
    public function getTitle()
    {
        return $this->get('dc:title');
    }
}
