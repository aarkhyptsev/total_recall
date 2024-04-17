<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php foreach ($data as $book): extract($book); ?>
                <div data-book-id="<?= $book_id ?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="http://test.library/book/<?= $book_id ?>"><img src="public/images/<?= $book_img ?>"
                                                                                alt="<?= $book_name ?>">
                            <div data-title="<?= $book_name ?>" class="blockI" style="height: 46px;">
                                <div data-book-title="<?= $book_name ?>"
                                     class="title size_text"><?= $book_name ?>
                                </div>
                                <div data-book-author="<?= $book_author_1 ?>" class="author"><?= $book_author_1 ?></div>
                            </div>
                        </a>
                        <a href="http://test.library/book/<?= $book_id ?>">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="container">
        <div class="btnBlock col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="button" class="btnBookID btn-lg btn btn-success">Показать предыдущие</button>
            <button type="button" class="btnBookID btn-lg btn btn-success">ПоказатьсСледующие</button>
        </div>
    </div>
    <center>оопс... в этом хтмл не реализованы кнопки "вперед" и "назад", а книг на странице должно быть не больше 20
    </center>

</section>