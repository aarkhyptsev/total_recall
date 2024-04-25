<?php
$offset = $pagination['offset'];
$offset_max = $pagination['offset_max'];
?>
<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php foreach ($books as $book): extract($book); ?>
                <div data-book-id="<?= $book_id ?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="/book/<?= $book_id ?>"><img src="public/images/<?= $book_img ?>"
                                                             alt="<?= $book_name ?>">
                            <div data-title="<?= $book_name ?>" class="blockI" style="height: 46px;">
                                <div data-book-title="<?= $book_name ?>"
                                     class="title size_text"><?= $book_name ?>
                                </div>
                                <div data-book-author="<?= $author_names ?>" class="author"><?= $author_names ?></div>
                            </div>
                        </a>
                        <a href="/book/<?= $book_id ?>">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="container">
        <div class="btnBlock col-xs-12 col-sm-12 col-md-12 text-center mb-3">
            <?php if ($offset > 0): ?>
                <a href="/?offset=<?= $offset - OFFSET ?>" class="btnBookID btn-lg btn btn-success">Показать
                    предыдущие</a>
            <?php endif; ?>
            <?php if ($offset_max > $offset): ?>
                <a href="/?offset=<?= $offset + OFFSET ?>" class="btnBookID btn-lg btn btn-success">Показать
                    следующие</a>

            <?php endif; ?>
        </div>
    </div>
</section>