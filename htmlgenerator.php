<?php
    // require_once("php/classes/movies/movie.class.php");
    // $movies = new Movie();
    function drawCards($aantal){
        // <a href="./the-assasin.html">
        //     <article class="card">
        //         <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

        //         <h2 class="card__title card__title--hover">
        //             THE ASSASSIN
        //         </h2>

        //         <div class="card__hover-data card__hover-data--left">
        //             <div class="card__hover-data__header">
        //                 Spring 2020
        //             </div>

        //             <div class="card__hover-data__studio">
        //                 Warner Bros
        //             </div>

        //            <div class="card__hover-data__genres">
        //                <div class="card__hover-data__genres--genre">Action</div>
        //                <div class="card__hover-data__genres--genre">Drama</div>
        //                <div class="card__hover-data__genres--genre">Adventure</div>
        //            </div>
        //         </div>
        //     </article>
        // </a>
        for ($i=0; $i < $aantal; $i++) {
            echo drawCard();
        }
    }

    function drawCard(){
        return <<<HTML
            <a href="./the-assasin.html">
                <article class="card">
                    <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

                    <h2 class="card__title card__title--hover">
                        THE ASSASSIN
                    </h2>

                    <div class="card__hover-data card__hover-data--right">
                        <div class="card__hover-data__header">
                            Spring 2020
                        </div>

                        <div class="card__hover-data__studio">
                            Warner Bros
                        </div>

                        <div class="card__hover-data__genres">
                            <div class="card__hover-data__genres--genre">Action</div>
                            <div class="card__hover-data__genres--genre">Drama</div>
                            <div class="card__hover-data__genres--genre">Adventure</div>
                        </div>
                    </div>
                </article>
            </a>
        HTML;
    }

    function drawThumbnails(){
        $thumbnail = drawThumbnail("head-image");
        $thumbnail .= drawThumbnail("sub-image", "margin-bottom-auto");
        $thumbnail .= drawThumbnail("sub-image", "margin-top-auto");

        return $thumbnail;
    }

    function drawThumbnail($css_class, $margin_auto = NULL){
        return <<<HTML
            <div class="thumbnail thumbnail--{$css_class} thumbnail--{$margin_auto}">
                <img class="content__image content__image--{$css_class}"
                    src="./images/thumbnail.png" alt="movie">

                <div class="thumbnail__information thumbnail__information--hover thumbnail__information--hover-{$css_class}">
                    <h3 class="thumbnail__title thumbnail__title--{$css_class}">FROZEN</h3>
                    <div class="thumbnail__description thumbnail__description--{$css_class}">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos
                            cumque exercitationem dolores pariatur accusantium eius beatae
                            deleniti modi laborum necessitatibus recusandae soluta, ratione quis
                            explicabo aspernatur atque maiores error sint.</p>
                    </div>
                </div>
            </div>
        HTML;
    }
?>
