<div class="row">
    <div class="col">
        <nav>
            <!-- Filter -->
            <ul id="filter" class="filter nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#" role="button" data-filter="*" data-text="All">All</a>
                </li>
                @if(isset($categories))
                    @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-filter=".{{$category->slug}}" data-text="Design">{{$category->name}}</a>
                </li>
                    @endforeach
                <!-- END Single News -->
                @endif
            </ul>
        </nav>
    </div>
</div>

