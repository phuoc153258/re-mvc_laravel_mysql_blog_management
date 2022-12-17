<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <script src="https://cdn.tiny.cloud/1/47y6cglcm85ezq4xg1q3beejfoa63atjgju6yw1oc3wa1ic3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

</head>

<style>
    p {
        margin: 0px !important;
        padding: 0px !important;
        font-size: 16px !important;
    }

    .content-blog p {
        font-size: 24px !important;
        padding: 18px 0px !important;
    }
</style>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <input type="text" id="user-id-navbar-hidden-js" hidden>
            <div class="hidden fixed top-0 right-0 px-4 py-2 sm:block d-flex" style="gap: 0 20px">
                <div class="dropdown mt-auto mb-auto">
                    <button class="btn btn-info dropdown-toggle" type="button"
                        data-toggle="dropdown">{{ __('view.language') }}
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="cursor: pointer;">
                        <li onclick="changeLanguage('en')">EN</li>
                        <li onclick="changeLanguage('vie')">VIE</li>
                    </ul>
                </div>
                <ul class="navbar-nav ms-auto" id="info-user-navbar-js">
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login">{{ __('view.auth.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register">{{ __('view.auth.register') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url({{ asset('assets/img/post-bg.jpg') }} ); padding: 100px 0px;">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7" style="width: 100% !important;">
                    <div class="post-heading">
                        <h1 id="title-detail-blog-js"></h1>
                        <h2 class="subheading" id="sub_title-detail-blog-js"></h2>
                        <span class="meta" id="post-by-detail-blog-js">

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 p-0 content-blog" style="width: 100% !important;"
                    id="content-detail-blog-js">
                </div>
            </div>

        </div>
    </article>

    <div class="mb-4 border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center mt-4 mb-4">
                <h4 class="p-0 mb-4">Comments</h4>
                <div class="m-0 p-0">
                    <div class="card mt-3 mb-3 d-none" style="padding: 0px;" id="comment-user-success-login-js">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <img class="w-100 rounded-circle"
                                        src="http://127.0.0.1:8000/image/user_avatar_default.jpg" alt="">
                                </div>
                                <div class="col-11">
                                    <textarea style="width: 100%;" id="post-comment-js"></textarea>
                                    <a href="" class="btn btn-primary mt-4">Comment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 mb-3 d-none" style="padding: 0px;" id="comment-user-failed-login-js">
                        <div class="card-body text-center">
                            <a href="/auth/login">Login to comment !!!</a>
                        </div>
                    </div>
                </div>
                <div id="list-comment-js" class="m-0 p-0">

                </div>
            </div>
        </div>
    </div>
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="" {{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/helper/paginate/index.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/notification/index.js') }}"></script>
    <script src="{{ asset('js/helper/index.js') }}"></script>
    <script src="{{ asset('js/cookie/index.js') }}"></script>
    <script src="{{ asset('js/auth/data.js') }}"></script>
    <script src="{{ asset('js/auth/index.js') }}"></script>
    <script src="{{ asset('js/home/index.js') }}"></script>
    <script src="{{ asset('js/home/data.js') }}"></script>
    <script src="{{ asset('js/home/pageViewDetailBlog.js') }}"></script>

    <script>
        tinymce.init({
            selector: 'textarea#post-comment-js',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            height: "300"
        });
    </script>
</body>

</html>
