Avant de commencer, assurez-vous d'avoir les éléments suivants :

- Composer
- Node.js & npm

## Modifier ou créer un fichier .env
  ```
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:j8L+ddFKcdPEOi5srnM+ma1yxBmISQ7z/ntcl9Fd7SY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=C:\Users\solty\Desktop\prive\alternance\2emeAnnee\Ecole\PWA\CantinePwa\cantineApp\database\database.sqlite
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1

    VITE_APP_NAME="${APP_NAME}"
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
  ```

  Il faut changer le chemin de la base de donnée 
  DB_DATABASE=C:\Users\solty\Desktop\prive\alternance\2emeAnnee\Ecole\PWA\CantinePwa\cantineApp\database\database.sqlite
  par votre chemin

## Installation et Lancement

Suivez ces étapes pour configurer et lancer l'application :

1. **Cloner le dépôt**

  ```
    git clone https://github.com/SoltysiakClement/CantineApp.git
  ```

2. **Installer les dépendances PHP**
   ```
    Composer update
  ```

2. **Compiler les assets**
  ```
    npm run dev
  ```

3. **Créer les tables de la base de données**
  ```
    php artisan migrate
  ```

4. **Remplir la base de données**
  ```
    php artisan db:seed
  ```

5. **Lancer le serveur de développement Laravel**
  ```
    php artisan serve
  ```