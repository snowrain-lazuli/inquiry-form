<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{

    public function admin()
    {
        $contacts = Contact::query()->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }


    public function find()
    {
        $contacts = Contact::query()->Paginate(7);
        $categories = Category::all();
        return view('admin', ['input' => '', 'categories' => $categories, 'contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::query();

        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $contacts->where('last_name', 'LIKE', "%{$keyword}%")
                ->orwhereHas('category', function ($query) use ($keyword) {
                    $query->where('first_name', 'LIKE', "%{$keyword}%");
                })->orwhereHas('category', function ($query) use ($keyword) {
                    $query->where('email', 'LIKE', "%{$keyword}%");
                })->get();
        }


        $gender = $request->input('gender');
        if (!empty($gender)) {
            if (!($gender == 0)) {
                $contacts->where('gender', $gender)->get();
            }
        }

        $contact_category = $request->input('categories');
        if (!empty($category)) {
            foreach ($categories as $category) {
                if ($contact_category == $category['content']) {
                    $category_id = $category['id'];
                }
            }
            $contacts->where('category_id', $category_id)->get();
        }

        $date = $request->input('date');
        if (!empty($date)) {
            $contacts->where('updated_at', $date)->get();
        }

        /* ページネーション */
        $contacts = $contacts->paginate(7);

        return view('admin', compact('contacts', 'categories'));
    }


    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin');
    }

    public function store()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}