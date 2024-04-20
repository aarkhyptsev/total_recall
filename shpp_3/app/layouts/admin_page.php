<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row mb-5 mt-3">
        <div class="col">
            <h1>test.library</h1>
        </div>
        <div class="col text-end align-self-end">
            <a href="/logout"><h4>Exit</h4></a>
        </div>
    </div>
    <div class=" row">
        <div class="col-8">
            <?= $content ?>
        </div>
        <div class="col-4">
            <div class="card text-bg-light mb-3">
                <div class="card-body">
                    <h5 class="card-title">Add a new book</h5>
                    <script>
                        function validateForm() {
                            var bookName = document.forms["myForm"]["book_name"].value;
                            var author1 = document.forms["myForm"]["book_author_1"].value;
                            var year = document.forms["myForm"]["year"].value;
                            var file = document.forms["myForm"]["file"].value;

                            if (bookName == "" || author1 == "" || year == "" || file == "") {
                                alert("Please fill in all required fields.");
                                return false;
                            }
                        }
                    </script>
                    <form action="/admin/add" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="row g-3 mb-3 mt-3">
                            <div class="col">
                                <input type="text" class="form-control" name="book_name" placeholder="Books name"
                                       aria-label="Books name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="book_author_1" placeholder="Author 1"
                                       aria-label="Author 1" required>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <input type="text" class="form-control" name="year" placeholder="Year"
                                       aria-label="Year" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="author_2"
                                       placeholder="Author 2 (you can skip)" aria-label="Author 2">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <input class="form-control" type="file" name="file" id="formFile" accept="image/*" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="author_3"
                                       placeholder="Author 3 (you can skip)" aria-label="Author 3">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Leave a comment here"
                                          id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description:</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>
