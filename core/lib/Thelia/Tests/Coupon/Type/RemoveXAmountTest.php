<?php
namespace Thelia\Coupon;

use PHPUnit_Framework_TestCase;
use Thelia\Coupon\Type\RemoveXAmount;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-08-19 at 18:26:01.
 */
class RemoveXAmountTest extends PHPUnit_Framework_TestCase
{

    CONST VALID_COUPON_CODE = 'XMAS';
    CONST VALID_COUPON_TITLE = 'XMAS Coupon';
    CONST VALID_COUPON_SHORT_DESCRIPTION = 'Coupon for christmas';
    CONST VALID_COUPON_DESCRIPTION = '<h1>Lorem</h1><span>ipsum</span>';
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }


    protected function generateValidCumulativeRemovingPostageCoupon()
    {
        $coupon = new RemoveXAmount(
            self::VALID_COUPON_CODE,
            self::VALID_COUPON_TITLE,
            self::VALID_COUPON_SHORT_DESCRIPTION,
            self::VALID_COUPON_DESCRIPTION,
            30.00,
            true,
            true
        );

        return $coupon;
    }

    protected function generateValidNonCumulativeNonRemovingPostageCoupon()
    {
        $coupon = new RemoveXAmount(
            self::VALID_COUPON_CODE,
            self::VALID_COUPON_TITLE,
            self::VALID_COUPON_SHORT_DESCRIPTION,
            self::VALID_COUPON_DESCRIPTION,
            30.00,
            false,
            false
        );

        return $coupon;
    }

    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::getCode
     * @covers Thelia\Coupon\type\RemoveXAmount::getTitle
     * @covers Thelia\Coupon\type\RemoveXAmount::getShortDescription
     * @covers Thelia\Coupon\type\RemoveXAmount::getDescription
     *
     */
    public function testDisplay()
    {

        $coupon = $this->generateValidCumulativeRemovingPostageCoupon();

        $expected = self::VALID_COUPON_CODE;
        $actual = $coupon->getCode();
        $this->assertEquals($expected, $actual);

        $expected = self::VALID_COUPON_TITLE;
        $actual = $coupon->getTitle();
        $this->assertEquals($expected, $actual);

        $expected = self::VALID_COUPON_SHORT_DESCRIPTION;
        $actual = $coupon->getShortDescription();
        $this->assertEquals($expected, $actual);

        $expected = self::VALID_COUPON_DESCRIPTION;
        $actual = $coupon->getDescription();
        $this->assertEquals($expected, $actual);

    }


    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::isCumulative
     *
     */
    public function testIsCumulative()
    {

        $coupon = $this->generateValidCumulativeRemovingPostageCoupon();

        $actual = $coupon->isCumulative();
        $this->assertTrue($actual);
    }

    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::isCumulative
     *
     */
    public function testIsNotCumulative()
    {

        $coupon = $this->generateValidNonCumulativeNonRemovingPostageCoupon();

        $actual = $coupon->isCumulative();
        $this->assertFalse($actual);
    }


    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::isRemovingPostage
     *
     */
    public function testIsRemovingPostage()
    {

        $coupon = $this->generateValidCumulativeRemovingPostageCoupon();

        $actual = $coupon->isRemovingPostage();
        $this->assertTrue($actual);
    }

    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::isRemovingPostage
     *
     */
    public function testIsNotRemovingPostage()
    {

        $coupon = $this->generateValidNonCumulativeNonRemovingPostageCoupon();

        $actual = $coupon->isRemovingPostage();
        $this->assertFalse($actual);
    }


    /**
     *
     * @covers Thelia\Coupon\type\RemoveXAmount::getEffect
     *
     */
    public function testGetEffect()
    {

        $coupon = $this->generateValidNonCumulativeNonRemovingPostageCoupon();

        $expected = -30.00;
        $actual = $coupon->getEffect();
        $this->assertEquals($expected, $actual);
    }


    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

}