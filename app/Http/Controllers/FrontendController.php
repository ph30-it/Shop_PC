<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Hash;
use Auth;
use Session;
class FrontendController extends Controller
{
    public function getHome(){
    	$data['featured'] = Product::where('featured',1)->orderBy('prod_id','desc')->paginate(4);
    	$data['new'] = Product::orderBy('prod_id','desc')->paginate(8);    	
    	return view('frontend.home',$data);
    }
    public function getDetail($id){
    	$data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get(); 
    	return view('frontend.details', $data);
    }
    public function getCategory($id){
    	$data['cateName'] = Category::find($id);
    	$data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
    	return view('frontend.category',$data);
    }
    public function postComment(Request $request,$id){
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }
    public function getSearch(Request $request){
       $result = $request->result;
       $data['keyword'] = $result;
       $result = str_replace(' ','%', $result);
       $data['items'] = Product::where('name','like','%'.$result.'%')
                                    ->orWhere('price',$result)
                                    ->get();
       return view('frontend.search',$data);
    }
    public function getLogin(){
        return view('frontend.dangnhap');
    }
    public function getSignin(){
        return view('frontend.dangki');
    }

    public function postSignin(Request $req){
        /*$this->validate($req,
            [
                'mail'=>'required|email|unique:pq_users,mail',
                'pass'=>'required|min:6|max:20',
                'full'=>'required',
            ],
            [
                'mail.required'=>'Vui lòng nhập email',
                'mail.email'=>'Không đúng định dạng email',
                'mail.unique'=>'Email đã có người sử dụng',
                'pass.required'=>'Vui lòng nhập mật khẩu',
                'pass.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);*/
            $user = new User();
            $user->fullname = $req->fullname;
            $user->username = $req->username;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->save();
            return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

        public function postLogin(Request $request){
       /* $this->validate($req,
            [
                'mail'=>'required|email',
                'pass'=>'required|min:6|max:20'
            ],
            [
                'mail.required'=>'Vui lòng nhập email',
                'mail.email'=>'Email không đúng định dạng',
                'pass.required'=>'Vui lòng nhập mật khẩu',
                'pass.min'=>'Mật khẩu ít nhất 6 kí tự',
                'pass.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );*/
       $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember Me') {
            $remember = true;
        }else{
            $remember = false;
        }
        if(Auth::attempt($arr)){
            return redirect()->intended('/');
        }
        else {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');

        }
    
    }
    public function postLogout(){
        Auth::logout();
        return back();
    }
}
