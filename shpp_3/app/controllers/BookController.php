<?php

namespace App\controllers;

use core\Controller;
use app\models\Book;
use Core\ResponseHandler;

class BookController extends Controller
{

    public function showById($id)
    {
        // Get book details by ID
        $book = (new Book())->getById($id);
        if (!$book) {
            // Send an error response if offset exceeds the maximum allowed value
            header("Location: /");
        }
        // Set the title for the page
        $this->title = $book['book_name'];

        // Render the view for displaying a single book
        $this->render('book/one', $book);
    }

    /**
     * Show a collection of books starting from the specified offset.
     *
     * @param int $offset The offset from which to start displaying books.
     * @return void
     */
    public function showOffset($offset)
    {
        // Create a new instance of the Book model
        $model = (new Book());

        // Get the maximum offset value
        $offset_max = $model->getOffsetMax();

        // Check if the provided offset is greater than the maximum offset
        if ($offset > $offset_max) {
            // Define limit for $offset
            $offset = 0;
        }

        // Get books starting from the specified offset
        $books = $model->getByOffset($offset);

        // Define pagination information
        $pagination = ['offset' => $offset, 'offset_max' => $offset_max];

        // Set the title for the page
        $this->title = 'Books collection';

        // Render the view for displaying multiple books
        $this->render('book/many_books', ['books' => $books, 'pagination' => $pagination]);
    }

    /**
     * Increase the click count for a book.
     *
     * @param int $id The ID of the book.
     * @return void
     */
    public function clickUp($id)
    {
        // Increase the click count for the book
        (new Book())->clickUp($id);
    }
}
