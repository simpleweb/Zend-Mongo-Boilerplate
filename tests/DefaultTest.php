<?php
class DefaultTest extends PHPUnit_Framework_TestCase
{

    public function setUp() {
    }

    public function testMyTest()
    {
        //Add an object
        $contact = new Model_Mongo_Object();
        $contact->name = "Object name";
        $result = $contact->save();
        $this->assertEquals(true, (isset($result['ok']) && $result['ok'] == 1));
        
        // Find an object
        $id = $result['upserted']->{'$id'};
        $contact = Model_Mongo_Object::find($id);
        $this->assertEquals($contact->name, 'Object name');
        
        // Delete an object
        $result = $contact->delete();
        $this->assertEquals(true, (isset($result['ok']) && $result['ok'] == 1));
        
        // Confirm deletion
        $contact = Model_Mongo_Object::find($id);
        $this->assertEquals(NULL, $contact);
    }
}