<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse navbar-fixed-top">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand" href="/">Machine à café</a>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            @if(Request::is("boissons*"))
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
                        <a class="nav-link" href="/ingredients">Ingrédients</a>
                    </li>
                    @if(Request::is("recettes"))
                        <li class="nav-item active">
                    @else
                        <li class="nav-item">
                            @endif
                            <a class="nav-link" href="/recettes">Recettes</a>
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