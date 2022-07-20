@if($allCount && $allCount > $perPage)
<div class="div-box2 mt-3">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item @if($pagen == 1) disabled @endif"><a class="page-link" href="{{route('front-index', ['page' => $pagen - 1] +  $prevQuery)}}">Previous</a></li>
                                
                                @foreach(range(1, ceil($allCount / $perPage)) as $page)
                                       <li class="page-item @if($pagen == $page) active @endif"><a class="page-link" @if($pagen != $page) href="{{route('front-index', ['page' => $page] +  $prevQuery)}}@endif">{{$page}}</a></li>
                                @endforeach
                                <li class="page-item @if($pagen == ceil($allCount / $perPage)) disabled @endif"><a class="page-link" href="{{route('front-index', ['page' => $pagen + 1] +  $prevQuery)}}">Next</a></li>
                            </ul>
                        </nav>
                    </div>
@endif
