@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'Profileページ'を埋め込む --}}
@section('title', 'Profileページの編集')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
            <h2>MY プロフィールの編集</h2>
                 <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                     @if (count($errors) > 0)
                        <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                        </ul>
                     @endif
                    <div class="form-group row">
                    <label class="col-md-2">氏名</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="{{ old('$profiles_form->name') }}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-md-2">性別</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" name="gender" value="{{ old('$profiles_form->gender') }}">
                    </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-md-2">趣味</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" name="hobby" value="{{ old('$profiles_form->hobby') }}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label class="col-md-2">自己紹介</label>
                    <div class="col-md-10">
                    <textarea class="form-control" name="introduction" rows="20" value="{{ old('$profiles_form->introduction') }}"></textarea>
                    </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
             </form>
              <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profiles_form->histories != NULL)
                                @foreach ($profiles_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection