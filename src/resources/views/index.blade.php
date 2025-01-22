@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text--name" name="name">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
                    <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="man" {{ old('gender','') == 'man' ? 'checked' : '' }}>男性
                    <input type="radio" name="gender" value="woman"
                        {{ old('gender','') == 'woman' ? 'checked' : '' }}>女性
                    <input type="radio" name="gender" value="others"
                        {{ old('gender','') == 'others' ? 'checked' : '' }}>その他
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text--tel" name="tel">
                    <input type="tel" name="first_tel" placeholder="080" value="{{ old('first_tel') }}">
                    <span>-</span>

                    <input type="tel" name="second_tel" placeholder="1234" value="{{ old('second_tel') }}">
                    <span>-</span>

                    <input type="tel" name="three_tel" placeholder="5678" value="{{ old('three_tel') }}">
                </div>
                <div class="form__error">

                    @if ($errors->has('*tel'))
                    {{$errors->first('*tel')}}
                    @endif

                </div>
            </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('building') }}" />
                </div>
                <div class="form__error">
                    @error('building')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span> <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select class="form__select" name="categories">
                        @foreach ($categories as $category)
                        <option value="{{$category->content}}"
                            {{ old('categories','') === $category->content ? 'selected' : '' }}>
                            {{$category->content}}
                        </option>
                        @endforeach

                    </select>
                </div>
                <div class="form__error">
                    @error('categories')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>



        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail"
                        placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}@if (!empty($contact['detail'])){{ $contact['detail'] }}@endif</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection