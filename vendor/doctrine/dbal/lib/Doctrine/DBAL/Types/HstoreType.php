<?php

namespace Doctrine\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class HstoreType extends Type
{
    const HSTORE = 'hstore';

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'hstore';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return array();
        }
        $attributes = json_decode('{' . str_replace('"=>"', '":"', $value) . '}', true);
        $array      = array();
        foreach ($attributes as $k => $v) {
            if (is_numeric($v)) {
                if (false === strpos($v, '.')) {
                    $v = (int) $v;
                } else {
                    $v = (float) $v;
                }
            } elseif (in_array($v, array('true', 'false'))) {
                $v = $v == 'true';
            }
            $array[$k] = $v;
        }
        return $array;
    }
    /**
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return '';
        }
        if ($value instanceof \stdClass) {
            $value = get_object_vars($value);
        }
        if (!is_array($value)) {
            throw new \InvalidArgumentException("Hstore value must be off array or \stdClass.");
        }
        $hstoreString = '';
        foreach ($value as $k => $v) {
            if (!is_string($v) && !is_numeric($v) && !is_bool($v)) {
                throw new \InvalidArgumentException("Cannot save 'nested arrays' into hstore.");
            }
            $v = trim($v);
            if (!is_numeric($v) && false !== strpos($v, ' ')) {
                $v = sprintf('"%s"', $v);
            }
            $hstoreString .= "$k => $v," . "\n";
        }
        $hstoreString = substr(trim($hstoreString), 0, -1) . "\n";
        return $hstoreString;
    }
    public function getName()
    {
        return self::HSTORE;
    }
}
