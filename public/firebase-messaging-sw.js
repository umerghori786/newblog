

importScripts(
  'https://www.gstatic.com/firebasejs/9.18.0/firebase-app-compat.js'
);
importScripts(
  'https://www.gstatic.com/firebasejs/9.18.0/firebase-messaging-compat.js'
);

var FIREBASE_CONFIG = {
  apiKey: "AIzaSyCbMb72OJbNy1hAd2Nh_fprguJQt2iM1V4",
  authDomain: "notification-e0fd9.firebaseapp.com",
  projectId: "notification-e0fd9",
  storageBucket: "notification-e0fd9.appspot.com",
  messagingSenderId: "521124468544",
  appId: "1:521124468544:web:be0f097bfc1e0e6b674ca5",
  measurementId: "G-XDV9P9PLGN"
};

// Initialize Firebase
firebase.initializeApp(FIREBASE_CONFIG);
const messaging = firebase.messaging();


if ('serviceWorker' in navigator) {
navigator.serviceWorker.register('../firebase-messaging-sw.js')
  .then(function(registration) {
    console.log('Registration successful, scope is:', registration.scope);
  }).catch(function(err) {
    console.log('Service worker registration failed, error:', err);
  });
}