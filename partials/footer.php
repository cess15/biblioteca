<!-- Footer -->
<footer class="w3-black w3-padding-64">
    <div class="row">
        <div class="col-6 ml-5">
            <!-- Contact Section -->
            <div class="w3-container" style="padding:26px 0px 16px 40px" id="contact">
                <h3>¿Dónde nos encontramos?</h3>
                <p class="w3-large">Puede contactarnos por estos medios:</p>
                <div style="margin-top:48px">
                    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Av Malecón "9 de Octubre" y Sucre,
                        Babahoyo,
                        Ecuador
                    </p>
                    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Télefono: (05) 257-2066</p>
                    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Correo electrónico:
                        bibliotecavirtual@gmail.com</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-4 ml-5">
            <div class="w3-container" style="padding:26px 0px 16px 40px">
                <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Ir al
                    Inicio</a>
            </div>
        </div>
    </div>
    <p class="w3-center">Copyright ©<?php echo date('Y') ?>- <?php echo date('Y') + 1 ?> All right Reserved | Sitio desarrollado por
        estudiantes de la UTB</p>
</footer>
<script>
    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }


    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
        } else {
            mySidebar.style.display = 'block';
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
    }
</script>
<script src="https://kit.fontawesome.com/0db7df2fff.js" crossorigin="anonymous"></script>
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="./assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>