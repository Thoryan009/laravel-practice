<?php 
namespace App\Interfaces;

interface BlogRepositoryInterface 
{
    public function all();
    public function create($request,  $id);
    public function show($id);
    public function update($request, $id);
    public function delete($id);
    public function userBlogs();


}