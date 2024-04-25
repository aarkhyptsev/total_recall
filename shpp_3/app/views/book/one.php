<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!--<script id="pattern" type="text/template">
                <div data-book-id="{id}" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="/book/{id}"><img src="img/books/{id}.jpg" alt="{title}">
                            <div data-title="{title}" class="blockI">
                                <div data-book-title="{title}" class="title size_text">{title}</div>
                                <div data-book-author="{author}" class="author">{author}</div>
                            </div>
                        </a>
                        <a href="/book/{id}">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            </script>-->
            <div id="id" book-id="<?= $book_id ?>">
                <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="
    margin:;
"><img src="/public/images/<?= $book_img ?>" alt="Responsive image" class="img-responsive">

                    <hr>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                    <div class="bookInfo col-md-12">
                        <div id="title" class="titleBook"><?= $book_name ?></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bookLastInfo">
                            <div class="bookRow"><span class="properties">автор:</span><span
                                        id="author"><?= $author_names ?></span></div>
                            <div class="bookRow"><span class="properties">год:</span><span
                                        id="year"><?= $book_year ?></span></div>
                            <div class="bookRow"><span class="properties">страниц:</span><span id="pages">351</span>
                            </div>
                            <div class="bookRow"><span class="properties">isbn:</span><span id="isbn"></span></div>
                        </div>
                    </div>
                    <div class="btnBlock col-xs-12 col-sm-12 col-md-12">
                        <button type="button" class="btnBookID btn-lg btn btn-success" data-book-id="<?= $book_id ?>">
                            Хочу читать!
                        </button>
                    </div>
                    <!-- Popup -->
                    <div id="myModal" class="modal"
                         style="background-color: rgba(0, 0, 0, 0.5);">
                        <div class="modal-dialog">
                            <div class="modal-content" style="text-align: center;">
                                <div class="modal-header">
                                    <div style="margin: 15px;">
                                        <img src="/public/images/check-icon.png" width="50" height="50">
                                    </div>
                                    <h2 class="modal-title">Отлично!</h2>
                                </div>
                                <div class="modal-body">
                                    <p>Книга свободна и ты можешь прийти за ней. Наш адрес: г. Кропивницкий,
                                        переулок Васильевский 10, 5 этаж. Лучше предварительно прозвонить и предупредить
                                        нас, чтоб не попасть в неловкую ситуацию.<br> Тел. 099 196 24 69</p>
                                </div>
                                <div class="modal-footer" style="text-align: center;">
                                    <button type="button" class="btn btn-lg btn-success" id="closeModalBtn">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Popup end -->
                    <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                        <h4>О книге</h4>
                        <hr>
                        <p id="description"><?= $data['book_name'] ?></p>
                    </div>
                </div>
                <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-md hidden-lg">
                    <h4>О книге</h4>
                    <hr>
                    <p class="description"><?= $data['book_name'] ?></p>
                </div>
            </div>
            <script src="/public/js/click.js" defer=""></script>
        </div>
    </div>
</section>
