<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Portal</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row h-100 justify-content-center align-content-center">
            <div class="col-sm-6">
                <form class="row g-3 needs-validation" method="post" novalidate>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" autocomplete="off" class="form-control" id="email" name="email" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const form = document.querySelector("form");
        const email = document.getElementById("email")
        const password = document.getElementById("password")
        let xhr;
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            fetch("login.php", {
                method: "POST",
                body: JSON.stringify({
                    email: email.value,
                    password: password.value
                })
            }).then(res=>res.json()).then(data => {
                console.log(data.role);

                switch(data.role){
                    case "student":
                        window.location.href = "../auth/"
                }
            }).catch(error => {
                console.log(error);
            })
        })
    </script>
</body>

</html>