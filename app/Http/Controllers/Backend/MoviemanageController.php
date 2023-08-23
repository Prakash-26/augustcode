<?php

namespace App\Http\Controllers\Backend;
use App\Services\MovieService;
use App\Models\MovieListing;
use App\Domains\Auth\Http\Requests\Backend\Movie\StoreMovieRequest;
use Illuminate\Http\Request;



/**
 * Class DashboardController.
 */
class MoviemanageController
{

    /**
     * @var RoleService
     */
    protected $movie_service;

    

    /**
     * RoleController constructor.
     *
     * @param  RoleService  $roleService
     
     */
    public function __construct(MovieService $movieService)
    {
        $this->movie_service = $movieService;
    }

    
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.movie.list_movie');
    }

    public function create()
    {
        return view('backend.movie.create');
    }

    public function store(StoreMovieRequest $request)
    {
        $this->movie_service->store($request->validated());

        return redirect()->route('admin.auth.movie.index')->withFlashSuccess(__('The Movie was successfully created.'));
    }

    /**
     * @param  MovieListing  $movie
     * @return mixed
     */
    public function show(MovieListing $movie)
    {
       // dd($movie);
        return view('backend.movie.show')
            ->withUser($movie);
    }

    /**
     * @param  EditUserRequest  $request
     * @param  MovieListing  $movie
     * @return mixed
     */
    public function edit(Request $request, MovieListing $movie)
    {
        //dd($movie);
        return view('backend.movie.edit')
            ->withUser($movie);
           // ->withRoles($this->roleService->get())
           // ->withCategories($this->permissionService->getCategorizedPermissions())
          //  ->withGeneral($this->permissionService->getUncategorizedPermissions())
           // ->withUsedPermissions($user->permissions->modelKeys());
    }

    /**
     * @param  StoreMovieRequest  $request
     * @param  MovieListing  $movie
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(StoreMovieRequest $request, MovieListing  $movie)
    {
        $this->movie_service->update($movie, $request->validated());

        return redirect()->route('admin.auth.movie.show', $movie)->withFlashSuccess(__('The movie was successfully updated.'));
    }

    /**
     * @param  DeleteUserRequest  $request
     * @param  MovieListing  $user
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Request $request, MovieListing $user)
    {
        
        $this->movie_service->delete($user);

        return redirect()->route('admin.auth.movie.index')->withFlashSuccess(__('The Movie was successfully deleted.'));
    }
}
