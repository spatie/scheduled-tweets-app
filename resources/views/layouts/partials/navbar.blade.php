@auth
    <div class="section border-b-2">
        <div class="row">
            <div class="col">
                <h1>Scheduled tweets</h1>
            </div>

            <div class="col text-right">
                <ul class="list-reset flex justify-end">
                    <li>
                        <div class="pl-4">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endauth