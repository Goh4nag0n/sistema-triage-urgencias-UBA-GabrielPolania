<?php

declare(strict_types=1);


namespace App\Enums;

enum ManchesterColorEnum: string {
    case ROJO = 'rojo'; // Atención inmediata
    case NARANJA = 'naranja'; // 10 minutos
    case AMARILLO = 'amarillo'; // 60 minutos
    case VERDE = 'verde'; // 120 minutos
    case AZUL = 'azul'; // 240 minutos

    public function maxWaitTimeMinutes(): int {
        return match($this) {
            self::ROJO => 0,
            self::NARANJA => 10,
            self::AMARILLO => 60,
            self::VERDE => 120,

            self::Azul => 240,

        };
    }
}
