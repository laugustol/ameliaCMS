<style>
    .subheading{
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 170px;
    }
</style>
<header class="intro-header" style="background-image: url('<?=url_base.$d["src"]?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-heading">
                    <h1 style="color:#<?=$d["color"]?>;"><?=$d["name"]?></h1>
                    <h2 class="subheading"><?=$d["content"]?></h2>
                    <span class="meta" style="color:#<?=$d["color"]?>;"><?=template_posted_by?> <?=$d["person"]?> <?=template_on?> <?=$d["date_created"]?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?=$d["content"]?>
            </div>
        </div>
    </div>
</article>
<hr>