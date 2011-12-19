<?php
class Model_Mongo_Object extends Shanty_Mongo_Document {

    protected static $_collection = 'testing';

    protected static $_requirements = array(
        'name' => array('Required', 'Filter:StringTrim')
    );
    
}