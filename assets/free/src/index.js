import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';
import { Provider } from 'react-redux'
import store from './store'

const rootId = document.getElementById('dreamfox-delivery-date-backend');
if (rootId) {
    const root = ReactDOM.createRoot(rootId);
    root.render(
        <Provider store={store}>
            <App />
        </Provider>
    );
}