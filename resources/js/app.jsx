import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import Welcome from './components/Welcome';

document.addEventListener('DOMContentLoaded', () => {
    const appElement = document.getElementById('react');
    
    if (appElement) {
        ReactDOM.createRoot(appElement).render(
            <React.StrictMode>
                <Welcome />
            </React.StrictMode>
        );
        console.log("React root element #react found and rendered!");
    } else {
        console.error("React root element #react not found!");
    }
});