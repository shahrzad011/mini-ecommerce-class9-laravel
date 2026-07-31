<?php

namespace App\Enums;

enum ProductStatus: int
{
    case DRAFT = 0;
    case ENABLE = 1;
    case DISABLE = 2;

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'پیش‌نویس',
            self::ENABLE => 'فعال',
            self::DISABLE => 'غیرفعال',
        };
    }

    public function badge(): string
    {
        return match ($this) {
            self::DRAFT => 'warning',
            self::ENABLE => 'success',
            self::DISABLE => 'danger',
        };
    }

}
