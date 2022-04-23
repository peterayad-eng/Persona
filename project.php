<?php
    if(isset($_GET['type'])){
?>
<section id="projects" class=''>
    <div class='center'>
        <div class='pser'>
            <a class='center textColor bold flexContainer fullheight fullwidth pserv'>
                <span class='verticalcenter justifycenter automargin'>
                    <?php
                        if(isset($_GET['type']) && $_GET['type'] == 0){
                            echo 'Web-site';
                        }elseif(isset($_GET['type']) && $_GET['type'] == 1){
                            echo 'Web-App';
                        }
                        
                        require_once "connect.php";	
                        $connec = new con();

                        $projects = $connec->query('SELECT * FROM projects where type = ? ORDER BY orderN', $_GET['type'])->fetchAll();
                    ?>
                </span>
            </a>
        </div>
    </div>
	<div class='row nomargin verticalcenter fullheight pdata'>
        <div class='col-10 col-md-5 nopadd'>
            <div id='nameC' class='textColor headText3'><?=$projects[0]['name']?></div>
            <div class='white headText4 desc'>Description</div>
            <div class="headButtonC relative">
                <img class='absolute readArr hidden' src='Images/buttonArr.svg' alt='Arrow'/>
                <a id='linkC' class='headButton center white' href='<?=$projects[0]['link']?>' target="_blank">Show site</a>
            </div>
            <div id='desC' class='white ptext'><?=$projects[0]['description']?></div>
        </div>
        <div id='projCarousel' class='col-12 col-md-7 projCarousel'>
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <div id='projInner' class="carousel-inner">
                    <div class='carousel-item active'><img src="Images/<?=$projects[0]['p_photo']?>" class="d-block w-100" alt="<?=$projects[0]['name']?>"></div>
                    <?php
                        $fphoto = explode(',', $projects[0]['s_photo']);
                        foreach($fphoto as $sphoto){
                    ?>
                        <div class='carousel-item'><img src="Images/<?=$sphoto?>" class="d-block w-100" alt="<?=$projects[0]['name']?>"></div>
                    <?php
                        }
                    ?>
                </div>
                <div id='carouselInd' class="carousel-indicators">
                    <?php
                        for($i=0;$i<=count($fphoto);$i++){
                    ?>
                        <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='<?=$i?>' aria-label='Slide <?=$i+1?>' <?php if($i==0) echo "class='active' aria-current=true" ?> ></button>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
	</div>
    <div class='allP'>
        <div class='white headText4 prText'>Projects</div>
        <div id='allProjects' class='menu'>
            <div class='menu--wrapper'>
                <?php
                    $counter=0;
                    do{
                        foreach($projects as $project){
                ?>
                    <div id='<?=$counter?>' class='singleP menu--item'><figure><img class='projectPhoto fullwidth <?php if($project["orderN"]==0) echo "activeP"?>' src='Images/<?=$project['p_photo']?>' alt='<?="p".$project["orderN"]?>'/></figure></div>
                <?php
                            $counter++;
                        }
                    }while($counter<4);
                ?>
            </div>
        </div>
    </div>
</section>
<script>
    var projects = [];
    <?php
        foreach($projects as $project){
    ?>
            var project={};
            project['id']='<?=$project['id']?>';
            project['name']='<?=$project['name']?>';
            project['desc']='<?=$project['description']?>';
            project['link']='<?=$project['link']?>';
            project['p_photo']='<?=$project['p_photo']?>';
            project['s_photo']='<?=$project['s_photo']?>';
            project['order']='<?=$project['orderN']?>';
            projects.push(project);
    <?php
        }
    ?>
</script>
<?php
    }
?>