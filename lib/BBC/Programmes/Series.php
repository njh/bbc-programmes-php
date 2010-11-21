<?php

require_once 'BBC/Programmes/Programme.php';

class BBC_Programmes_Series extends BBC_Programmes_Programme
{

}

EasyRdf_TypeMapper::set('po:Series', 'BBC_Programmes_Series');
