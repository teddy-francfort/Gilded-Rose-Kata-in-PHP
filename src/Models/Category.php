<?php

namespace App\Models;

use App\Enums\CategoryEnum;

class Category
{
    public function __construct(protected ?string $name = null)
    {
        $this->name = $this->name ?? CategoryEnum::NORMAL->value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}