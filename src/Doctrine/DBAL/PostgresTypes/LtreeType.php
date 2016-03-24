<?php

namespace Doctrine\DBAL\PostgresTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Ltree
 *
 * @author Ivan Molchanov <ivan.molchanov@opensoftdev.ru>
 * @author Sergey Ryabov <sryabov@mhds.ru>
 */
class LtreeType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'ltree';
    }

    /**
     * {@inheritdoc}
     */
    public function canRequireSQLConversion()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'LTREE';
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValueSQL($sqlExpr, AbstractPlatform $platform)
    {
        return sprintf('text2ltree(%s)', $sqlExpr);
    }
}
