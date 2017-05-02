<?php

namespace NotificationChannels\Smsapi\Exceptions;

use InvalidArgumentException;

/**
 * @internal
 */
class ExceptionFactory
{
    /**
     * @param  string $expectedType
     * @param  mixed  $providedArgument
     * @return bool
     */
    public static function checkArgumentType($expectedType, $providedArgument)
    {
        $providedType = gettype($providedArgument);
        if ($providedType === 'object') {
            return is_a($providedArgument, $expectedType);
        } else {
            return $providedType === $expectedType;
        }
    }

    /**
     * @param  string[] $expectedTypes
     * @param  mixed    $providedArgument
     * @return bool
     */
    public static function checkArgumentTypes($expectedTypes, $providedArgument)
    {
        foreach ($expectedTypes as $expectedType) {
            if (self::checkArgumentType($expectedType, $providedArgument)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  int    $argumentPosition
     * @param  string $function
     * @param  string $expectedType
     * @param  mixed  $providedArgument
     * @return void
     * @throws InvalidArgumentException
     */
    public static function assertArgumentType($argumentPosition, $function, $expectedType, $providedArgument)
    {
        $ok = self::checkArgumentType($expectedType, $providedArgument);
        if (! $ok) {
            $providedType = gettype($providedArgument);
            throw self::createInvalidArgumentException($argumentPosition, $function, $expectedType, $providedType);
        }
    }

    /**
     * @param  int      $argumentPosition
     * @param  string   $function
     * @param  string[] $expectedTypes
     * @param  mixed    $providedArgument
     * @return void
     * @throws InvalidArgumentException
     */
    public static function assertArgumentTypes($argumentPosition, $function, $expectedTypes, $providedArgument)
    {
        $ok = self::checkArgumentTypes($expectedTypes, $providedArgument);
        if (! $ok) {
            $providedType = gettype($providedArgument);
            throw self::createInvalidArgumentException($argumentPosition, $function, $expectedTypes, $providedType);
        }
    }

    /**
     * @param  int             $argumentPosition
     * @param  string          $function
     * @param  string|string[] $expectedType
     * @param  string          $providedTypes
     * @return InvalidArgumentException
     */
    public static function createInvalidArgumentException($argumentPosition, $function, $expectedTypes, $providedType)
    {
        if (! is_array($expectedTypes)) {
            $expectedTypes = [$expectedTypes];
        }

        return new InvalidArgumentException(sprintf(
            'Argument %d passed to %s() must be of the type %s, %s given',
            $argumentPosition, $function, implode(' or ', $expectedTypes), $providedType
        ));
    }
}
