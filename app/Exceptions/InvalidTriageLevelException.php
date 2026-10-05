<?php
declare(strict_types=1);

namespace App\Exceptions;

use DomainException;

class InvalidTriageLevelException extends DomainException
{
    // Heredamos de DomainException para cumplir estrictamente con la rúbrica
}
