<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title></title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <button onclick="startFCM()"
                    class="btn btn-danger btn-flat">Allow notification
                </button>
            <div class="card mt-3">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('send.web-notification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Message Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Message Body</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The core Firebase JS SDK is always required and must be listed first -->


<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
<script>
    var firebaseConfig = {
          apiKey: "AIzaSyCbMb72OJbNy1hAd2Nh_fprguJQt2iM1V4",
          authDomain: "notification-e0fd9.firebaseapp.com",
          projectId: "notification-e0fd9",
          storageBucket: "notification-e0fd9.appspot.com",
          messagingSenderId: "521124468544",
          appId: "1:521124468544:web:be0f097bfc1e0e6b674ca5",
          measurementId: "G-XDV9P9PLGN"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function startFCM() {
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (response) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route("store.token") }}',
                    type: 'POST',
                    data: {
                        token: response
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token stored.');
                    },
                    error: function (error) {
                        alert(error);
                    },
                });
            }).catch(function (error) {
                alert(error);
            });
    }
    initFirebaseMessagingRegistration();
  
    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });
</script>

</body>
</html>