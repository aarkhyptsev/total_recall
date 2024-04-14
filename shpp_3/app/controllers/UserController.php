<?php

namespace app\Controllers;

use app\Controller;
use app\Models\User;

class UserController extends Controller {
public function index() {
$users = [
new User('John Doe', '<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c060304022c09140d011c0009420f0301">[email&nbsp;protected]</a>'),
new User('Jane Doe', '<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0369626d6643667b626e736f662d606c6e">[email&nbsp;protected]</a>')
];

$this->render('user/index', ['users' => $users]);
}
}