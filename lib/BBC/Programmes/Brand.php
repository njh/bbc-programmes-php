<?php

require_once 'BBC/Programmes/Programme.php';

class BBC_Programmes_Brand extends BBC_Programmes_Programme
{

}

EasyRdf_TypeMapper::set('po:Brand', 'BBC_Programmes_Brand');
