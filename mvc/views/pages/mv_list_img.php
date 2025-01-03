<?php 
$mvs = json_decode($data['mvs']);
$mvActresss = json_decode($data['mvActresss']);
$mvTags = json_decode($data['mvTags']);
$actresses = json_decode($data['actresses']);
$tags = json_decode($data['tags']);
?>
<div class="content-body">
    <div class="container">
        <?php foreach ($mvs as $i=>$row) { ?>
        <div class="row">
            <div class="col-sm">
            <img width="1000px" src="<?php echo $appRootURL . $row->{'thumbnail'} ?>" alt="">
            </div>
        </div>
        <?php } ?>
    </div>
</div>