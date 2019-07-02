const staticCacheName = 'static-cache-v2';
const dynamicCacheName = 'dynamic-cache-v2';

const assets = [
    '/',
    '/index.html',
    '/manifest.json',
    '/pages/404.html',
    '/styles/index.css',
    '/styles/materialize.min.css',
    '/script/index.js',
    '/script/materialize.min.js',
    'https://fonts.googleapis.com/icon?family=Material+Icons',
    'https://use.fontawesome.com/releases/v5.7.0/css/all.css',
    '/script/app.js'
];

// limit the size of the cache function
const cacheSizeLimit = (name, size) => {
    caches.open(name).then((cache) => {
        cache.keys().then((keys) => {
            if(keys.length > size) {
                cache.delete(keys[0]).then(cacheSizeLimit(name, size));
            }
        })
    });
}

// install event listener
self.addEventListener('install', (e) => {
    e.waitUntil(
        caches.open(staticCacheName).then((cache) => {
            cache.addAll(assets);
        })
    );
});

// activate event listerner
self.addEventListener('activate', (e) => {
    e.waitUntil(
        caches.keys().then((keys) => {
            console.log(keys)
            return Promise.all(
                keys.filter((key) => key !== staticCacheName && key !== dynamicCacheName)
                .map((key) => caches.delete(key))
            )
        })
    );
});

// handle fetch and cache
self.addEventListener('fetch', (e) => {
    e.respondWith(
        caches.match(e.request).then((cacheRes) => {
            return cacheRes || fetch(e.request).then((fetchRes) => {
                return caches.open(dynamicCacheName).then((cache) => {
                    cache.put(e.request.url, fetchRes.clone());
                    cacheSizeLimit(dynamicCacheName, 15);
                    return fetchRes;
                })
            })
        }).catch(() => {
            if(e.request.url.indexOf('.html') > -1) {
                return caches.match('/pages/404.html');
            }
        })
    )
});

