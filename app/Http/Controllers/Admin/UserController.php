<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateUserRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {   

        $this->authorize('viewAny', User::class);


        $full_name = array();

        $users = User::query();
        $users = User::get()->map(function($item){

                return $item->only('name','email');    // return a new collection contain name and email
        });
        dd($data);

        $users = User::query()
        ->withCount([
            'roles as no_of_roles_for_user'
        ])
        ->orderByDesc('no_of_roles_for_user')
        /*->whereHas('roles',function($q){
            $q->where('role_id',1);
        })*/
        ->has('roles')
/*        ->doesntHave('roles')*/
        ->get();
        
        //relation
        dump($users->pluck('roles'));
        dump($users->pluck('roles')->flatten()->sum('id'));

        /*User::query()->select(DB::raw('name,id,Min(id) as minId,Count(created_at)'))
        
        ->get()->groupBy('created_at')->dd();*/

        dd($users = User::orderBy('created_at')->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        }));
        //cookies 
        //$cookie = \Cookie::queue('contest', 5, 10);
        //$cookie = \Cookie::get('contest');
        /*if ($cookie == 5) {
            dd('true');
        }
        dd('false');*/

       /* $users = DB::table('users')->join('role_user','users.id','=','role_user.user_id')
                                   ->join('roles','roles.id','=','role_user.role_id')
                                   ->get();*/
        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        $roles = Role::all();
        $user = User::with('roles')->find($id);
        return view('admin.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $request->validated();
        $user->roles()->sync($request->roles);

        $request->session()->flash('success','updated successfully');

        return redirect(route('admin.user.index')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {

        
        $this->authorize('delete', $user);
        $user->delete();

        $request->session()->flash('success','deleted successfully');
        return redirect(route('admin.user.index'));
    }

    public function prec(){



        $user = User::withCount('roles as userRole')->first();

       

        //this query helps you to get all user who have register in each day

        $users = User::get();

        $rec = $users->groupBy(function($item){

            return $item->created_at->format('Y-m-d');

        });

        /*querysocpe*/
        $posts = Post::where('status',1)->where('user_id',auth()->user()->id)->get();
        //dd($posts);

        $post = Post::Check()->get();
        /*end*/

        /*limmit offset*/
        $posts = Post::offset('2')->limit(3)->get();
        dd($posts);
        /*end*/

    }





    
}
