// Nom du cache statique
var staticCacheName = "pwa-v" + new Date().getTime();

// Fichiers à mettre en cache
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache lors de l'installation
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    );
});

// Nettoyer le cache lors de l'activation
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Intercepter les requêtes réseau et les servir depuis le cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Si la ressource est dans le cache, la renvoyer
                if (response) {
                    return response;
                }

                // Sinon, effectuer une requête réseau
                return fetch(event.request).then(fetchResponse => {
                    // Mettre la réponse en cache et la renvoyer
                    return caches.open(staticCacheName).then(cache => {
                        cache.put(event.request, fetchResponse.clone());
                        return fetchResponse;
                    });
                });
            })
            .catch(() => {
                // En cas d'échec, renvoyer une page de secours
                return caches.match('/offline');
            })
    );
});

// Gérer les notifications push
self.addEventListener('push', function (event) {
    const payload = event.data ? event.data.text() : 'New notification';

    event.waitUntil(
        self.registration.showNotification('CantineApp', {
            body: payload,
        })
    );
});

// Gérer les clics sur les notifications
self.addEventListener('notificationclick', function (event) {
    event.notification.close();

    clients.openWindow('/menus');
});
