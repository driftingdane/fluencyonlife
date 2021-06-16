<div class="col-sm-8 profileCard mb-5 table-responsive">
    <div class="profileCard-heading text-center">Topic list</div>
    <table class="table table-sm">
        <thead class="thead-dark mb-2">
        <tr>
            <th class="text-center" scope="col">Topic</th>
            <th class="text-center" scope="col">Description</th>
            <th class="text-center" scope="col">Icon</th>
            <th class="text-center" scope="col">Icon styles</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <thead class="thead-light">
        <tbody>
        <?php
        if(is_array($data['topics'])) :
            foreach($data['topics'] as $top) :
                if(empty($data['topics'])) :
                    $content = "No topics";
                else:
                    $content = $top->cat_title;
                endif; ?>
                <tr>
                    <th class="text-center" scope="col"><?php echo $content; ?></th>
                    <th class="text-center" scope="col"><?php echo $top->cat_desc; ?></th>
                    <th class="text-center" scope="col"><?php echo $top->cat_icon; ?></th>
                    <th class="text-center" scope="col"><?php echo $top->cat_color; ?></th>
                    <th class="text-center p-1" scope="col"><a href="<?php echo URLROOT . '/admins/editTopic/' . $top->cat_id; ?>" class="btn btn-block btn-light btn-sm btn-block-xs"><i class="far fa-edit"></i></a></th>
                    <th class="text-center p-1" scope="col">
                        <form action="<?php echo URLROOT . '/admins/deleteTopic/' . $top->cat_id; ?>" method="post">
                            <input type="hidden" name="returnUrl" value="<?php echo $_GET['url']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger delete_with_icon btn-block btn-block-xs"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </th>
                </tr>
            <?php
            endforeach;
        endif;
        ?>
        </tbody>
        </thead>
    </table>
</div>