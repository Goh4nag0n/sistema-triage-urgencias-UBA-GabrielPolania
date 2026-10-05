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

    public static function resolvePriority(string $color): string {
        $enum = self::tryFrom($color);

        if (!$enum) {
            throw new \App\Exceptions\InvalidTriageLevelException("Transición prohibida: El nivel de triage '{$color}' no es válido.");
        }

        return match($enum) {
            self::ROJO => 'Crítico - Pase a Resucitación',
            self::NARANJA => 'Emergencia - Box de Críticos',
            self::AMARILLO => 'Urgencia - Sala de Espera Interna',
            self::VERDE => 'Menor - Sala de Espera Externa',
            self::AZUL => 'No Urgente - Consultorio Externo',
        };
    }
}
