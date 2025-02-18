import React from 'react';

function Welcome() {
    return (
        <div className="welcome-container">
            <div className="welcome-content">
                <h1>Welcome to Your Laravel and React.js App!</h1>
                <p>This is a sample React component integrated with Laravel.</p>
                <div className="features">
                    <h2>Key Features:</h2>
                    <ul>
                        <li>Laravel Backend</li>
                        <li>React Frontend</li>
                        <li>Seamless Integration</li>
                    </ul>
                </div>
            </div>
        </div>
    );
}

export default Welcome;