<?php

require_once 'BBC/Programmes/Base.php';

class BBC_Programmes_Broadcast extends BBC_Programmes_Base
{

}

EasyRdf_TypeMapper::set('po:FirstBroadcast', 'BBC_Programmes_Broadcast');
EasyRdf_TypeMapper::set('po:RepeatBroadcast', 'BBC_Programmes_Broadcast');
