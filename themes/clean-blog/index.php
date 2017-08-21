<style>
    .post-subtitle{
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 170px;
    }
</style>
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    <?php
        if(!isset($posts)){
            $post = new \models\postModel;
            $posts = $post->query_all(0);
        }else{
            $posts = $data["posts"];
        }
        foreach ($posts as $k => $p) {
                echo "<div class='post-preview'>
                        <a href='".url_base."post/show/".$p["url"]."'>
                            <h2 class='post-title'>
                                ".$p["name"]."
                            </h2>
                            <h3 class='post-subtitle'>
                                ".$p["content"]."
                            </h3>
                        </a>
                        <p class='post-meta'>".template_posted_by." <a href='#''>".$p["person"]."</a> ".template_on." ".$p["date_created"]."</p>
                    </div>
                    <hr>";
            
        }
        echo "<ul class='pager'>";
            if($posts[0]["prev"] != "0"){
                echo "<li class='previous'>
                        <a href='".url_base."post/page/".$posts[0]["prev"]."'>&larr; ".template_previously_post.$posts[0]["prev"]."</a>
                    </li>";
            }else if($posts[0]["prev"]>=0 && ($posts[0]["next"]-1)>=1){
                echo "<li class='previous'>
                        <a href='".url_base."'>&larr; ".template_previously_post."</a>
                    </li>";
            }
            if(isset($posts[0]["next"])){
                echo "<li class='next'>
                    <a href='".url_base."post/page/".$posts[0]["next"]."'>".template_others_post." &rarr;</a>
                </li>";
            }
        echo "</ul>";
    ?>
</div>

