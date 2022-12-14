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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

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
    <input type="text" id="user-id-login-js" hidden>
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
                                    <textarea style="width: 100%;" id="post-comment-js0"></textarea>
                                    <a class="btn btn-primary mt-4" onclick="postCommentBlog()">Comment</a>
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

    <div class="modal fade" id="reportCommentModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="    border: none;
                    background-color: white;
                    cursor: pointer;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 14px !important;">
                    <div class="form-group m-2">
                        <label for="exampleFormControlTextarea1">Reason: </label>
                        <select class="custom-select w-25" id="list-report-js">
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="exampleFormControlTextarea1">Content: </label>
                        <textarea class="form-control" id="content-report-js" rows="3"></textarea>
                    </div>
                    <input type="text" id="comment-id-report-js" hidden>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal"
                        style="padding: 6px 12px; font-size: 14px; font-weight: 500;">Close</a>
                    <a class="btn btn-primary" style="padding: 6px 12px; font-size: 14px; font-weight: 500;"
                        onclick="postReportComment()">Save
                        changes</a>
                </div>
            </div>
        </div>
    </div>
    <input type="text" id="blog-id-details-js" hidden>
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
    <script src="{{ asset('js/scripts.js') }}"></script>
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
            selector: 'textarea#post-comment-js0',
            height: "300"
        });

        function copyURL(id) {
            var copyText = document.getElementById("kt_clipboard_" + id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            alert("Copied the text: " + copyText.value);
        }
    </script>
    <script src="https://cdn.socket.io/4.5.4/socket.io.min.js"
        integrity="sha384-/KNQL8Nu5gCHLqwqfQjA689Hhoqgi2S84SNUxC3roTe4EhJ9AfLkp8QiQcU8AMzI" crossorigin="anonymous">
    </script>
    <script>
        const socket = io.connect("http://localhost:3000/");
        socket.on("like-comment-response", (data) => {
            if (window.location.pathname.split("/")[2] == data.data.blog_slug) {
                document.getElementById(`avatar-user-comment-${data.data.id}`).src = '/' + data.data.avatar
                document.getElementById(`fullname-user-comment-${data.data.id}`).innerHTML = data.data.fullname
                document.getElementById(`created_at-user-comment-${data.data.id}`).innerHTML = data.data.created_at
                document.getElementById(`content-user-comment-${data.data.id}`).innerHTML = data.data.content
                document.getElementById(`icon-user-comment-${data.data.id}`).innerHTML =
                    isLikeComment(data.data) ?
                    '<i class="fa-solid fa-heart"></i>' :
                    '<i class="fa-regular fa-heart"></i>'
                document.getElementById(`like-user-comment-${data.data.id}`).innerHTML = data.data.likes.length
            }
        });

        socket.on("post-comment-response", (data) => {
            if (window.location.pathname.split("/")[2] == data.data.blog_slug) {
                if (data.data.parent_id == null) {
                    document.getElementById("list-comment-js").innerHTML += itemComment(
                        data.data
                    );
                } else {
                    document.getElementById("replies-comment-js" + data.data.parent_id).innerHTML +=
                        itemCommentUser(data.data)
                }
            }
        });

        socket.on("rate-comment-response", (data) => {
            const rateItem = document.getElementById(`rate-comment-${data.data[0].comment_id}-js`)
            const reviewItem = document.getElementById(`review-comment-${data.data[0].comment_id}-js`)
            rateItem.innerHTML = ""
            reviewItem.innerHTML = ""
            rateItem.innerHTML = rateComment(data.data, data.data[0].comment_id)
            reviewItem.innerHTML = data.data.length + " reviews"
        });

        socket.on("delete-comment-response", (data) => {
            removeComment(data.data.id)
        });
    </script>

</body>

</html>
