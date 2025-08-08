import '../css/app.css';
import './bootstrap';
import 'flowbite';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
// 기존 import
import videojs from 'video.js';
import 'video.js/dist/video-js.css';

// HLS(VHS) import (별도 플러그인 설치 시)
// import 'videojs-http-streaming';

// 전역으로 노출(필요 시)
window.videojs = videojs;


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
    progress: {
        color: '#4B5563',
    },
});
