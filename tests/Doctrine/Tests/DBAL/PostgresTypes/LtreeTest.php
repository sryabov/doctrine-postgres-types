<?php

namespace Doctrine\Tests\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\PostgreSqlPlatform;

/**
 * LtreeTest
 *
 * Unit tests for the Ltree type
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 * @author Sergey Ryabov <sryabov@mhds.ru>
 */
class LtreeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Doctrine\DBAL\PostgresTypes\LtreeType
     */
    protected $type;

    /**
     * @var PostgreSqlPlatform
     */
    protected $platform;

    /**
     * Pre-instantiation setup.
     */
    public static function setUpBeforeClass()
    {
        Type::addType('ltree', 'Doctrine\\DBAL\\PostgresTypes\\LtreeType');
    }

    /**
     * Pre-execution setup.
     */
    protected function setUp()
    {
        $this->platform = new PostgreSqlPlatform();
        $this->type = Type::getType('ltree');
    }

    /**
     * Test conversion to database value.
     */
    public function testConvertToDatabaseValueSQL()
    {
        $this->assertEquals('text2ltree(test)', $this->type->convertToDatabaseValueSQL('test', $this->platform));
    }
}
