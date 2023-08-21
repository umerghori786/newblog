<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f79f6e1a7efa759a16c3', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind("Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1> Now send Notification to specific User</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>