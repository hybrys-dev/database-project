function login() {
    var username = document.getElementById('username').innerText;
    var password = document.getElementById('password').innerText;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert("Login successful!");
            } else {
                alert("Invalid username or password.");
            }
        }
    };

    var data = JSON.stringify({username: username, password: password});
    xhr.send(data);
}
