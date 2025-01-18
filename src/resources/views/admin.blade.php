@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection @section('content')
<div class="contents__alert">
    @if (session('message'))
    <div class="contents__alert--success">{{ session('message') }}</div>
    @endif @if ($errors->any())
    <div class="contents__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="contents__content">
    <div class="contents__heading">
        <h2>admin</h2>
    </div>
    <div class="search-form--content">
        <form class="search-form" action="find" method="POST">
            @csrf
            <div class="search-form__item">
                <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                <select class="search-form__item-select" name="gender">
                    <option value="" hidden selected disabled>性別</option>
                    <option value="0">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="search-form__item-select" name="categories">
                    <option value="" hidden selected disabled>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->content}}"
                        {{ old('categories','') === $category->content ? 'selected' : '' }}>
                        {{$category->content}}
                    </option>
                    @endforeach
                </select>
                <input type="date" name="date" placeholder="年/月/日">
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </div>
        </form>
        <form class="reset-form" action="admin" method="POST">
            @csrf
            <div class="reset-form__button">
                <button class="reset-form__button-submit" type="submit">リセット</button>
            </div>
        </form>
    </div>
    <div class="pagination">
        {{ $contacts->links('vendor.pagination.user') }}
    </div>
    <div class="contents-table">
        <table class="contents-table__inner">
            <tr class="contents-table__row">
                <th class="contents-table__header">お名前</th>
                <th class="contents-table__header">性別</th>
                <th class="contents-table__header">メールアドレス</th>
                <th class="contents-table__header">お問い合わせの種類</th>
                <th class="contents-table__header"></th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="contents-table__row">
                <td class="contents-table__item">
                    <div class="contents-form__item">
                        <input class="contents-form__item-input" type="text" name="name"
                            value="{{ $contact['last_name'] }}　{{ $contact['first_name'] }}" readonly />
                    </div>
                </td>
                <td class="contents-table__item">
                    <div class="contents-form__item">
                        <input class="contents-form__item-input" type="text"
                            value="@if ($contact['gender'] === 1)男性@elseif ($contact['gender'] === 2)女性 @elseif($contact['gender'] === 3)その他@endif"
                            readonly />
                        <input class=" contents-form__item-input" type="hidden" name="gender"
                            value="{{$contact['gender']}}" readonly />
                    </div>
                </td>
                <td class="contents-table__item">
                    <div class="contents-form__item">
                        <input class="contents-form__item-input" type="text" name="email"
                            value="{{ $contact['email'] }}" readonly />
                    </div>
                </td>
                <td class="contents-table__item">
                    <div class="contents-form__item">
                        <input class="contents-form__item-input" type="text" name="categories"
                            value="@foreach ($categories as $category){{ $contact->id === $category->id ? $category->content : '' }}@endforeach"
                            readonly />
                    </div>
                </td>
                <td class="contents-table__item">
                    <button class="Open" popovertarget="Modal" popovertargetaction="show">詳細</button>
                    <div id="Modal" popover="auto">
                        <div class="inner-modal">
                            <button class="Close" popovertarget="Modal" popovertargetaction="hidden">×</button>
                        </div>
                        <div class="delete-table">
                            <table class="delete-table__inner">
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">お名前</th>
                                    <td class="delete-table__text">
                                        <input class="delete-form__item-input" type="text" name="name"
                                            value="{{ $contact['last_name'] }}　{{ $contact['first_name'] }}" readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">性別</th>
                                    <td class="delete-table__text">
                                        <input class="delete-form__item-input" type="text"
                                            value="@if ($contact['gender'] === 1)男性@elseif ($contact['gender'] === 2)女性 @elseif($contact['gender'] === 3)その他@endif"
                                            readonly />
                                        <input type="hidden" name="gender" value="{{$contact['gender']}}" readonly />
                                    </td>
                                </tr>
                                <tr class=" delete-table__row">
                                    <th class="delete-table__header">メールアドレス</th>
                                    <td class="delete-table__text">
                                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">電話番号</th>
                                    <td class="delete-table__text">
                                        <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">住所</th>
                                    <td class="delete-table__text">
                                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">建物</th>
                                    <td class="delete-table__text">
                                        <input type="text" name="building" value="{{ $contact['building'] }}"
                                            readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">種類</th>
                                    <td class="delete-table__text">
                                        <input type="text" name="categories"
                                            value="@foreach ($categories as $category){{ $contact->category_id === $category->id ? $category->content : '' }}@endforeach"
                                            readonly />
                                    </td>
                                </tr>
                                <tr class="delete-table__row">
                                    <th class="delete-table__header">お問い合わせ内容</th>
                                    <td class="delete-table__text">
                                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <form class="form" action="/delete" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </div>
                </td>

                @endforeach
        </table>
    </div>
</div>
@endsection