<div>You have been logged out. Redirecting to home...</div>
<script>
    var XHR = new XMLHttpRequest();
    XHR.open("GET", "/admin", true, "no user", "no password");
    XHR.send();
    setTimeout(function () {
        window.location.href = "/";
    }, 3000);
</script>