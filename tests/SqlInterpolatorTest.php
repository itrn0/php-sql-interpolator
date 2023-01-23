<?php

namespace Itrn0\Tests\SqlInterpolator;

use Itrn0\SqlInterpolator\SqlInterpolator;
use PHPUnit\Framework\TestCase;

class SqlInterpolatorTest extends TestCase
{
    public function testInvoke()
    {
        $interpolator = new SqlInterpolator();
        $placeholders = $interpolator('value1', 2, 'value3');

        $this->assertEquals(':param_1,:param_2,:param_3', $placeholders);
    }

    public function testGetParams()
    {
        $interpolator = new SqlInterpolator();
        $interpolator('value1', 2, 'value3');

        $params = $interpolator->getParams();
        $this->assertEquals([':param_1' => 'value1', ':param_2' => 2, ':param_3' => 'value3'], $params);
    }

    public function testSetPrefix()
    {
        $interpolator = new SqlInterpolator();
        $interpolator->setPrefix('test_');
        $placeholders = $interpolator('value1', 'value2', 'value3');

        $this->assertEquals('test_1,test_2,test_3', $placeholders);
    }
}