<?php require_once('partials/nav.php'); ?>
<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-white" style="padding:48px">
        <div class="container">
            <h1>
                <span class="w3-jumbo w3-hide-small w3-hide-medium">
                    Biblioteca El buen lector
                </span>
            </h1>
        </div>
        <h1>
            <span class="w3-xxlarge w3-hide-large">
                Biblioteca El buen lector
            </span>
        </h1>
        <em>
            <span class="w3-large text">Una opción, una alternativa para Usted y su
                familia.</span>
        </em>
        <p>
            <a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Conoce
                más de nosotros</a>
        </p>

    </div>
</header>

<!-- About Section -->
<div class="bgimg-2 w3-container text-light" style="padding:128px 16px" id="about">
    <h1 class="display-5 w3-center p-3">ACERCA DE NOSOTROS</h1>
    <div class="container jumbotron-fluid">
        <div class="w3-row-padding w3-justify" style="margin-top:64px">
            <div class="w3-col-5">
                <p class="h1 ls-5 text-center"><b>Misión</b></p>
                <p class="h3 ls-5"><b>
                        La misión de la Biblioteca es dar apoyo al aprendizaje, la docencia, la investigación y la gestión de la Universidad en su conjunto, facilitando el acceso y difusión de recursos de información y colaborando en los procesos de creación del conocimiento.
                    </b>
                </p>
            </div>
        </div>
        <div class="w3-row-padding w3-justify" style="margin-top:64px">
            <div class="w3-col-5">
                <p class="h1 ls-5 text-center"><b>Visión</b></p>
                <p class="h3 ls-5"><b>
                        La Biblioteca tiene como visión ser un espacio moderno, agradable y accesible, orientada al usuario/a, referente informativo para la gestión y transmisión del conocimiento, donde las nuevas tecnologías estén al alcance de todos. Vinculada con el exterior e integrada en las metas de calidad y objetivos de la Universidad de Jaén; con una gestión eficaz, dinámica y eficiente, capaz de provocar con su actividad unos/as usuarios/as mejor formados/as e informados/as; que contribuya al aprendizaje permanente y adaptada a la innovación educativa que supone el Espacio Europeo de Enseñanza Superior.
                    </b>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
    <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">&times;</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>
</div>
<?php require_once('partials/footer.php'); ?>