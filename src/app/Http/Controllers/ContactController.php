<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'first_tel', 'second_tel', 'three_tel', 'address', 'building', 'categories', 'category_id', 'detail']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $categories = Category::all();
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'categories', 'detail']);


        if ($request->has('submit')) {
            foreach ($categories as $category) {

                if ($category->content == $contact['categories']) {
                    $contact['category_id'] = $category->id;
                }
            }
            unset($contact['categories']);

            if ($contact['gender'] === 'man') {
                $contact['gender'] = '1';
            } elseif ($contact['gender'] === 'woman') {
                $contact['gender'] = '2';
            } else if ($contact['gender'] === 'others') {
                $contact['gender'] = '3';
            }


            Contact::create($contact);
            return view('thanks');
        } else {

            $split1 = substr($contact['tel'], 0, 3);
            if (mb_strlen($contact['tel']) == 10) {
                $split2 = substr($contact['tel'], 3, 3);
            } else if (mb_strlen($contact['tel']) == 11) {
                $split2 = substr($contact['tel'], 3, 4);
            }
            $split3 = substr($contact['tel'], -4);

            $contact['first_tel'] = $split1;
            $contact['second_tel'] = $split2;
            $contact['three_tel'] = $split3;

            return redirect('/')->withInput($contact);
        }
    }
}