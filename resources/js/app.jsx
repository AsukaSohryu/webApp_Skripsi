import React from 'react';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import 'bootstrap/dist/css/bootstrap.min.css';

InertiaProgress.init();

createInertiaApp({
    resolve: name => import(`./Pages/${name}.jsx`),
    setup({ el, App, props }) {
        import('react-dom').then(({ createRoot }) => {
        createRoot(el).render(<App {...props} />);
        });
    },
});