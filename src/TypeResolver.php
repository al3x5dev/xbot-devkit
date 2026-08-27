<?php

namespace Mk4U\TgApiKit;

class TypeResolver
{
    public static function sanitizeClassName(string $typeName): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $typeName)));
    }

    public static function getPhpType(array $telegramTypes/*, string $fieldName*/): string
    {
        //$type = $telegramTypes[0];

        // Mapear tipos básicos
        $typeMap = [
            'String' => 'string',
            'Integer' => 'int',
            'Int' => 'int',
            'Boolean' => 'bool',
            'Float' => 'float',
            'True' => 'bool',
            'Object' => 'object',
        ];

        $resolved = [];

        foreach ($telegramTypes as $type) {
            // Manejar arrays de entidades (Formato: "Array of <Type>")
            if (str_starts_with($type, 'Array<')) {
                $subType = trim(str_replace('Array<', '', $type), '>');

                if (!isset($typeMap[$subType])) {
                    $subType = self::sanitizeClassName($subType);
                    $resolved[] = "array<$subType>";
                } else {
                    $resolved[] = 'array';
                }

                continue;
            }

            $resolved[] = $typeMap[$type] ?? self::sanitizeClassName($type);
        }

        return implode('|', array_unique($resolved));
    }

    /**
     * Mejora resultado del tipo de dato para metodos de api
     */
    public static function getPhpTypeHint(array $telegramTypes): string
    {
        $type = self::getPhpType($telegramTypes);

        if (str_starts_with($type, 'array<')) {
            return 'array';
        }

        return $type;
    }

    public static function isEntityType(string $type): bool
    {
        // Tipos que NO son entidades
        $basicTypes = [
            'string',
            'int',
            'bool',
            'float',
            'array',
            'object',
            'mixed',
            'callable',
            'iterable',
            'resource'
        ];

        // Union types: evaluar cada parte
        if (str_contains($type, '|')) {
            $parts = explode('|', $type);
            foreach ($parts as $part) {
                if (!in_array(strtolower(trim($part)), $basicTypes)) {
                    return true;
                }
            }
            return false;
        }

        // Array de entidades
        if (preg_match('/^array<(.+)>$/', $type, $matches)) {
            return !in_array(strtolower($matches[1]), $basicTypes);
        }

        return !in_array(strtolower($type), $basicTypes);
    }

    public static function formatPhpDocType(string $type): string
    {
        return str_replace(['array<', '>'], ['', '[]'], $type);
    }

    public static function getReturnType(array $returns): string
    {
        $type = self::getPhpType($returns);

        // Array<Message> → array
        if (str_starts_with($type, 'array<')) {
            return 'array';
        }

        return !empty($type) ? $type: 'mixed';
    }
}
