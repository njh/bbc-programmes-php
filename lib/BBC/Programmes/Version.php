<?php

require_once 'BBC/Programmes/Base.php';

class BBC_Programmes_Version extends BBC_Programmes_Base
{
    public function broadcasts()
    {
        return self::getGraph()->resourcesMatching('po:broadcast_of', $this);
    }
}

EasyRdf_TypeMapper::set('po:Version', 'BBC_Programmes_Version');
