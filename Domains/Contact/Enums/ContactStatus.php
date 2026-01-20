<?php

namespace Domains\Contact\Enums;

enum ContactStatus: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'In Progress';
    case RESOLVED = 'Resolved';
    case CLOSED = 'Closed';

    /**
     * Get all status values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all status cases as an array
     */
    public static function allCases(): array
    {
        return self::cases();
    }

    /**
     * Get status by value
     */
    public static function fromValue(string $value): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return $case;
            }
        }
        return null;
    }
} 