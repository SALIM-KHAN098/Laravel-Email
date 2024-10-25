<!doctype html>
<html lang="en">
<head>
    <title>Contact page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>

        <div class="container">
            <div class="row">
                <div class="card mt-5 w-50 m-auto">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Contact Form</h5>
                        <form class="" action="{{ route('sendContactEmail') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success form submitted !!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Somthing Error</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif


                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="fname" class="form-control" placeholder="First name">
                                    @error('fname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="Last name">
                                    @error('lname')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    @error('subject')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
                                    @error('message')
                                         <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="exampleFormControlFile1">Example file input</label><br>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                                    @error('file')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-auto mt-3" value="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
