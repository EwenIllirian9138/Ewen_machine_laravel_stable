<nav class="links navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Machine à café</a>
        </div>
        <ul class="nav navbar-nav">

            @if(Request::is("boissons"))
                <li class="active">
            @else*
                <li>
                    @endif
                    <a href="boissons">Boissons</a>
                </li>

                @if(Request::is("recettes"))
                    <li class="active">
                @else
                    <li>
                        @endif
                        <a href="recettes">Recettes</a>
                    </li>
                    @if(Request::is("commandes"))
                        <li class="active">
                    @else
                        <li>
                            @endif
                            <a href="commandes">Commandes</a>
                        </li>
                        @if(Request::is("pieces"))
                            <li class="active">
                        @else
                            <li>
                                @endif
                                <a href="pieces">Pièces</a>
                            </li>
                            @if(Request::is("stocks"))
                                <li class="active">
                            @else
                                <li>
                                    @endif
                                    <a href="stocks">Stocks</a>
                                </li>
    </div>
</nav>