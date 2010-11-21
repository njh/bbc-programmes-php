<?php

require_once 'BBC/Programmes/Programme.php';

class BBC_Programmes_Clip extends BBC_Programmes_Programme
{

}

EasyRdf_TypeMapper::set('po:Clip', 'BBC_Programmes_Clip');
