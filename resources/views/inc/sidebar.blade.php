<ul class="list-group">
    @foreach(App\Models\Category::get() as $category)
        <li class="list-group-item">
            <a class="nav-link text-dark" href="{{ route('byCategory',[
                'slug'=>generateSlug($category->name),
                'category_id'=>$category->id
            ]) }}">
                <i class="fa fa-folder"></i>
                <span>{{ $category->name }}</span>
            </a>
        </li>
    @endforeach
</ul>
