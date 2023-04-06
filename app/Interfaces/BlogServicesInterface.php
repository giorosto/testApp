<?php

namespace App\Interfaces;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\BlogUpdateRequest;

interface BlogServicesInterface
{
    public function getAll();
    public function paginated($quantity);
    public function getById($id);
    public function create(BlogRequest $request);
    public function byCategoryId($category_id);
    public function update($id, BlogUpdateRequest $data);
    public function delete($id);
    public function getCategories();
}
