<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;

class ProfileController extends Controller
{
        //ACtion追加
        public function add(){
             return view('admin.profile.create');
        }
        public function create(Request $request){
            
            $this->validate($request, Profiles::$rules);
            
            $profile = new Profiles;
            $form = $request->all();
            
            unset($form['_token']);
            
            $profile->fill($form);
            $profile->save();
            return redirect('/admin/profile/create');
        }
         public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profiles::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profiles::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
        
        public function edit(Request $request){
            $profiles = Profiles::find($request->id);
            if (empty($profiles)) {
                abort(404);
            }
            return view('/admin.profile.edit');
        }
        public function update(Request $request){
            $this->validate($request, Profiles::$rules);
            $profiles = Profiles::find($request->id);
            $profile_form = $request->all();
            unset($profiles_form['_token']);
            $profiles->fill($profiles_form)->save();
            return redirect('admin/profile');
        }
    public function delete(Request $request){
    $profiles = Profiles::find($request->id);
    $profiles->delete();
    return redirect('admin/profile/');
  }
}
?>