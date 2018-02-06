<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark ">

    <a class="navbar-brand" href="/">Machine à café</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

            @if(Request::is("boissons*") || Request::is("recipes*"))
                <li class="nav-item active">
            @else
                <li class="nav-item">
                    @endif
                    <a class="nav-link" href="/boissons">Boissons</a>
                </li>
                @if(Request::is("ingredients*"))
                    <li class="nav-item active">
                @else
                    <li class="nav-item">
                        @endif
                        <a class="nav-link" href="/ingredients">Ingredients</a>
                    </li>
                    @if(Request::is("commandes"))
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                            @endif
                            <a class="nav-link" href="/commandes">Commandes</a>
                        </li>

                        @if(Request::is("pieces"))
                            <li class="nav-item active">
                        @else
                            <li class="nav-item">
                                @endif
                                <a class="nav-link" href="/pieces">Pièces</a>
                            </li>
        </ul>
    </div>
</nav>