importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyDwJ-WJ9q3o_tNeCRaJgVE8u5ecEGtVFbQ",
    projectId: "eshop-31cf0",
    messagingSenderId: "880618526792",
    appId: "1:880618526792:web:33b35b755ffba8c85fa07d"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
