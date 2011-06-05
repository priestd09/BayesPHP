<?php

namespace BayesPHP\Sample;

/**
 * Test class for Result.
 * Generated by PHPUnit on 2011-05-28 at 23:32:26.
 */
class ResultTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Result
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $result = array(
            'the' => array(
                'p' => 0,
                'n' => 0.23
            ),
            'name' => array(
                'p' => 0.3,
                'n' => 0
            ),
        );

        $this->object = new Result($result);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    public function testGetAllProbabilities()
    {
        $result = array(
            'the' => array(
                'p' => 0,
                'n' => 0.23
            ),
            'name' => array(
                'p' => 0.3,
                'n' => 0
            ),
        );


        $this->assertEquals($result, $this->object->getAllProbabilities());
    }

    public function bothProvider()
    {
        return array(
            array('the', array('p'=> 0, 'n'=> 0.23)),
            array('name', array('p' => 0.3, 'n' => 0)),
            array('hello', array('p' => 0, 'n' => 0))
        );
    }

    /**
     * @dataProvider bothProvider
     */
    public function testGetWordProbabilityBoth($word, $expected)
    {
            $this->assertEquals($expected, $this->object->getWordProbability($word));
    }

    public function probProvider()
    {
        return array(
            array('the', 0),
            array('hello', 0),
            array('name', 0.3)
        );
    }

    /**
     * @dataProvider probProvider
     */
    public function testGetWordProbabilityPos($word, $expected)
    {
        $this->assertEquals($expected, $this->object->getWordProbability($word, Result::RESULT_POS));
    }

    public function negProvider()
    {
        return array(
            array('the', 0.23),
            array('hello', 0),
            array('name', 0)
        );
    }

    /**
     * @dataProvider negProvider
     */
    public function testGetWordProbabilityNeg($word, $expected)
    {
        $this->assertEquals($expected, $this->object->getWordProbability($word, Result::RESULT_NEG));
    }

}


