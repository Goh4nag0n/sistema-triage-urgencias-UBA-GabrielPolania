# Sistema de Triage Hospitalario - Clasificación Manchester 🏥

## Descripción del Proyecto
Proyecto desarrollado para la Sumativa 1 (UBA), implementando un sistema de triage y despacho de recursos críticos en urgencias hospitalarias utilizando el estándar internacional de Clasificación Manchester.

## Arquitectura y Tecnologías
- **Framework:** Laravel 11 / PHP 8.3
- **Patrones:** Arquitectura desacoplada, Thin Controllers, Form Requests.
- **Modelado:** Uso de Backed Enums estandarizados para la máquina de estados.
- **Frontend:** Blade Templates y Bootstrap 5.3.

## Instalación (Para revisión docente)
1. Clonar el repositorio.
2. Ejecutar `composer install`.
3. Configurar el archivo `.env` y generar la key con `php artisan key:generate`.
4. Ejecutar las migraciones con `php artisan migrate`.
5. Levantar el servidor con `php artisan serve`.
