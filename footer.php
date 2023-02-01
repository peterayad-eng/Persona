        <footer>
            <div> 
                <div class="row nomargin">
                    <div class="col-3 col-sm-1"></div>
                    <div class="col-6 col-sm-4 col-md-3 foobrandiv"><img class='foobrand' src="Images/logo.png" alt='Persona'/></div>
                    <div class="col-3 col-sm-1 col-md-2"></div>
                    <div class="col-3 col-sm-1 col-md-2"></div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class='icons'>
                            <a href="https://facebook.com/YourPersona" target="_blank"><i class="fab fa-facebook-f icon headText2"></i></a>
                            <a href="https://www.instagram.com/persona_03" target="_blank"><i class="fa-brands fa-instagram icon headText2"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=+201555654750" target="_blank"><i class="fab fa-whatsapp icon headText2"></i></a>
                            <a href="https://www.linkedin.com/company/persona-web-developer" target="_blank"><i class="fa-brands fa-linkedin icon headText2"></i></a>
                            <a href="https://www.youtube.com/channel/UCfvQsJSstPJfG9YDeUnQ0nQ" target="_blank"><i class="fab fa-youtube icon headText2"></i></a>
                        </div>
                        <div class='subscribe'>
                            <p class='white nomargin ptext'>Subscribe</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="center copy white nomargin ptext">Copyright © 2021 Persona. All rights reserved.</p>
        </footer>
<?php
    if(basename($_SERVER['PHP_SELF'])=="" or basename($_SERVER['PHP_SELF'])=="index.php"){
        echo "</div>";  
    }
?>
		
		<script src="Bootstrap5.1.3/jquery-3.6.3.min.js"></script>
        <script src="Bootstrap5.1.3/popper.min.js"></script>
        <script src="Bootstrap5.1.3/js/bootstrap.min.js"></script>
        <script src='Js/gsap.min.js'></script>
        <script src='Js/JS.js'></script>
	</body>
</html>