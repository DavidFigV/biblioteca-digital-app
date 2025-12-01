# Biblioteca Digital (ADA 7)

Sistema web para gestión de biblioteca digital con autenticación, roles y CRUD de usuarios, categorías y ebooks. Basado en Laravel 12, Jetstream (Livewire), Spatie Permission, WireUI y Livewire Tables.

## Requisitos
- PHP 8.2+
- Composer
- Node.js + npm
- MySQL

## Instalación
1. Clonar el repositorio y entrar al proyecto.
2. Copiar `.env.example` a `.env` y ajustar:
   - DB_DATABASE, DB_USERNAME, DB_PASSWORD
   - APP_NAME, APP_LOCALE=es, APP_TIMEZONE=America/Merida
3. Instalar dependencias:
   ```
   composer install
   npm install
   ```
4. Generar key y migrar con seeds:
   ```
   php artisan key:generate
   php artisan migrate --seed
   ```
5. Compilar assets (dev):
   ```
   npm run dev
   ```

## Credenciales de prueba
- Admin: `admin@biblioteca.com` / `password`
- Staff: `staff@biblioteca.com` / `password`
- Cliente: `client@biblioteca.com` / `password`

## Roles y acceso
- Admin: gestiona usuarios, roles, categorías y ebooks.
- Staff: gestiona categorías y ebooks.
- Cliente: acceso al dashboard público y visualización de ebooks.

## Funcionalidades
- Login/register (Jetstream + Livewire).
- Gestión de roles (Spatie Permission).
- Gestión de usuarios con campos: nombre, email, member_number (autogenerado, solo lectura), teléfono, dirección, estado.
- CRUD de categorías y ebooks, con datatables (Livewire Tables) para búsqueda y ordenamiento.
- Panel admin con cards y listados recientes; dashboard cliente tipo catálogo.

## Comandos útiles
- Limpiar cachés: `php artisan optimize:clear`
- Ejecutar seeds individuales:
  ```
  php artisan db:seed --class=CategorySeeder
  php artisan db:seed --class=UserSeeder
  php artisan db:seed --class=EbookSeeder
  ```

## Notas
- El número de miembro se genera automáticamente al crear usuarios y no es editable desde el perfil ni por el admin.
