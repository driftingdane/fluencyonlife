<div class="col-sm-8 profileCard mb-5 table-responsive">
    <div class="profileCard-heading text-center">Question list</div>
    <table class="table table-sm reports">
        <thead class="thead-dark mb-2">
        <tr>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Category</th>
            <th class="text-center" scope="col">Question</th>
            <th class="text-center" scope="col">Answer</th>
            <th class="text-center" scope="col">Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <thead class="thead-light">
        <tbody>
        <?php
        if(is_array($data['questions'])) :
            foreach($data['questions'] as $question) :
                if(empty($data['questions'])) :
                    $content = "No questions";
                else:
                    $content = $question->qs_question;
                endif; ?>
                <tr>
                    <th class="text-center" scope="col"><?php echo $question->qs_id; ?></th>
                    <th class="text-center" scope="col"><?php echo $question->cat_title; ?></th>
                    <th class="text-center" scope="col"><?php echo utf8_encode($content); ?></th>
                    <th class="text-center" scope="col"><a class="btn-link small" style="color:white;" target="_blank" href="<?php echo urldecode($question->qs_answer); ?>"><?php echo urldecode($question->qs_answer); ?></a></th>
                    <th class="text-center" scope="col"><?php echo infoDate($question->qs_created); ?></th>
                    <th class="text-center p-1" scope="col">
                        <form action="<?php echo URLROOT . '/admins/deleteQuestion/' . $question->qs_id; ?>" method="post">
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
