<section id="application" class=''>
    <div class='fullwidth center automargin'>
        <div class='flexContainer sHead justifycenter'>
            <img class='arrow' src="Images/arrow.svg" alt='arrow'/>
            <h2 class="center white headText3 bold">Contacts</h2>
            <img class='arrowR arrow' src="Images/arrow.svg" alt='arrow'/>
        </div>
    </div>
    <div class='row nomargin bottomMargin'>
        <div class="col-11 col-md-8 automargin">
             <?php
                if(isset($_GET['serror']) && $_GET['serror'] == 1){
                    echo "<div style='color:green' class='leftpadd ptext'>Your request is submitted successfully. We will contact you.</div>";
                }elseif(isset($_GET['serror']) && $_GET['serror'] == 2){
                    echo "<div style='color:red' class='leftpadd ptext'>We couldn't submit your request. Please, Try again later </div>";
                }elseif(isset($_GET['serror']) && $_GET['serror ptext'] == 3){
                    echo "<div style='color:red' class='leftpadd'>Please, enter a valid mail </div>";
                }
            ?>
            <form id="requestform" class="row nomargin fullwidth" action="requestAfterSubmit" method="POST" enctype="multipart/form-data">
                <div class="row reqf fullwidth">
                    <div class="col-12 col-md-8 nomargin">
                        <input id='lang' name='lang' value='en' type='hidden'/>
                        <input id="name" name="name" type="text" class="forminput ptext white" placeholder="Name" required/>
                        <input id="orgname" name="orgname" type="text" class="forminput ptext white" placeholder="Organization Name" required/>
                        <input id="ser" name="ser" type="text" class="forminput ptext white" placeholder="Requsted  Service" required/>
                        <input id="mail" name="mail" type="mail" class="forminput ptext white" placeholder="Email" required/>
                        <input id="mobile" name="mobile" type="text" class="forminput ptext white" placeholder="Mobile No." required/>
                        <input id="verifyingcode" name="verifyingcode" type="text" placeholder='Verifying code' class="verifyingcode"/>
                    </div>
                    <div class="col-12 col-md-3 applycontainer nomargin nopadd">
                        <div class="custom-control formradio formradio1">
                            <div class='flexContainer'>
                                <label for='customRadio1' class='white ptext radioText'>Website</label>
                                <label class="formlabel justifycenter radiolabel ptext">
                                    <input type="radio" id="customRadio1" class="custom-control-input formradio" name="type" value="Website" required>
                                    <span class="formradios"></span>
                                </label>
                            </div>
                        </div>
                        <div class="custom-control formradio formradio2">
                            <div class='flexContainer'>
                                <label for='customRadio1' class='white ptext radioText'>Webapp</label>
                                <label class="formlabel radiolabel justifycenter ptext">
                                    <input type="radio" id="customRadio2" class="custom-control-input formradio" name="type" value="Webapp" requireds>
                                    <span class="formradios"></span>
                                </label>
                            </div>
                        </div>
                        <div class='formSubmit'>
                            <button type="submit" class="btn btn-lg applybutton reqbtn ptext white">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-4 nopadd automargin center">
            <img class="rimg" src="Images/phone.png" alt="Contact form"/>
        </div>
    </div>
    <div class='row nomargin details'>
        <div class='col-12 col-md-6 automargin'>
            <h3 class='headText2 white bold'>Phone No.</h3>
            <p class='ptext white raleway'>01555654750</p>
            <h3 class='headText2 white bold'>Email</h3>
            <p class='ptext white raleway'>info@persona-eg.com</p>
        </div>
        <div class='col-12 col-md-6 arrborder relative'>
            <iframe title="location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6905.708902928!2d31.27216502569623!3d30.069706258666976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f8045ca64c5%3A0x9794f3e160bb2589!2z2LrZhdix2Kk!5e0!3m2!1sar!2seg!4v1649198914866!5m2!1sar!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class='fullwidth fullheight'></iframe>
        </div>
    </div>
    <div class='right'>
        <img class='homearr' src='Images/homarr.svg' alt="arrow"/>
        <div class='homeC'><a class='ptext white home' href='#carousel'>Home</a></div>
    </div>
</section>