<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * creates mock object
     *
     * @param $class
     * @param null $definition
     * @return \Mockery\MockInterface
     */
    protected function setMock($class, $definition = null)
    {
        if ($definition === null) {
            $definition = $class;
        }
        $mock = \Mockery::mock($definition);
        $this->app->instance($class, $mock);

        return $mock;
    }


    /**
     * creates mock object
     *
     * @param $class
     * @param null $definition
     * @return \Mockery\MockInterface
     */
    protected function setPartialMock($class)
    {
        $mock = \Mockery::mock($class)->makePartial();
        $this->app->instance($class, $mock);

        return $mock;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     * @throws \Exception
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }

}
