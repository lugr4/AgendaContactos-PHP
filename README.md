# Agenda de Contactos

Proyecto para agenda de contactos.

## Getting Started

### Prerequisites

*   PHP 8.0 or higher
*   Composer
*   A web server (like Apache or Nginx)

### Installation

1.  Clone the repository:
    ```bash
    git clone <repository-url>
    ```
2.  Navigate to the project directory:
    ```bash
    cd agendacontactos
    ```
3.  Install the PHP dependencies:
    ```bash
    composer install
    ```
4.  Configure your web server to point to the project's root directory where `index.php` is located.

## Usage

Once the installation is complete and your web server is configured, you can access the application by navigating to the corresponding URL (e.g., `http://localhost/lua/agendacontactos`).

## Dependencies

This project uses the following libraries:

*   [php-di/php-di](https://php-di.org/): A dependency injection container.
*   [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv): Loads environment variables from `.env` files.
*   [nikic/fast-route](https://github.com/nikic/FastRoute): A fast request router for PHP.
*   [monolog/monolog](https://github.com/Seldaek/monolog): A logging library for PHP.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
