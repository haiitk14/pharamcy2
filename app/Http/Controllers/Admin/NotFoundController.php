<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use Validator;

class CommentController
{
	/**
     * @var string $pageName
     */
    protected $pageName;
    

	/**
     * Show index page
     *
     * @return View
     */
    public function index404()
    {
        return view('errors.404');
    }
}
