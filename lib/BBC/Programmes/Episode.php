<?php

require_once 'BBC/Programmes/Programme.php';

class BBC_Programmes_Episode extends BBC_Programmes_Programme
{
    public function broadcasts()
    {
        $broadcasts = array();
        foreach($this->all('po:version') as $version) {
            $broadcasts = array_merge(
                self::getGraph()->resourcesMatching(
                    'po:broadcast_of', $version),
                $broadcasts
            );
        }
        return $broadcasts;
    }
}

EasyRdf_TypeMapper::set('po:Episode', 'BBC_Programmes_Episode');
