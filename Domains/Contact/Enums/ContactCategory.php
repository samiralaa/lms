<?php

namespace Domains\Contact\Enums;

enum ContactCategory: string
{
    case GENERAL_INQUIRY = 'General Inquiry';
    case TECHNICAL_SUPPORT = 'Technical Support';
    case BILLING = 'Billing';
    case FEEDBACK = 'feedback';
    case OTHER = 'Other';

    /**
     * Get all category values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get all category cases as an array
     */
    public static function allCases(): array
    {
        return self::cases();
    }

    /**
     * Get category by value
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