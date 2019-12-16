
<div class="blog-search-holder" style="background: #d0cfd0;" >
    <div class="row">
        <div class="columns-12">
            <form class="blog-search-form row" method="get" action="<?php echo get_permalink(12); ?>" >
                <div class="columns-3 right-1 keyword-column">
                    <label for="keyword" style="color: #303232;"><?php _e('Search', 'anvil'); ?></label>
                    <input type="text" name="keywords" id="keyword" value="<?php echo isset($_GET['keywords'])? $_GET['keywords'] : ''; ?>" style="background: #fff;" />
                </div>
                <div class="columns-3 right-1 postdate-column">
                    <label for="postdate" style="color: #303232;"><?php _e('Date', 'anvil'); ?></label>
                    <select name="postdate" id="postdate" style="background: #fff;">
                        <option value=""><?php _e('Show All', 'anvil'); ?></option>
                        <?php // wp_get_archives( array( 'type' => 'monthly', 'format' => 'option' ) ); ?>

                        <?php global $wp_locale; ?>
                        <?php foreach( (array)forge_get_year_archive_array() as $arc ): ?>
                            <?php $selected = (isset($_GET['postdate']) && $_GET['postdate'] == "{$arc->year}-{$arc->month}")? 'selected' : ''; ?>
                            <?php $text = sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $arc->month ), $arc->year ); ?>
                            <option value="<?php echo "{$arc->year}-{$arc->month}"; ?>" <?php echo $selected; ?>><?php echo $text; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="columns-3 right-1 tags-column">
                    <label for="post-tag" style="color: #303232;"><?php _e('Tags', 'anvil'); ?></label>
                    <select name="post-tag" id="post-tag" style="background: #fff;">
                        <option value=""><?php _e('Show All', 'anvil'); ?></option>

                        <?php foreach( forge_get_tags() as $t ): ?>
                            <?php $selected = (isset($_GET['post-tag']) && $_GET['post-tag'] == $t->slug)? 'selected' : ''; ?>
                            <option value="<?php echo $t->slug; ?>" <?php echo $selected; ?>><?php echo $t->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="columns-2 right-1 submit-column">
                    <label>&nbsp;</label>
                    <button type="submit" class="button"><?php _e('Search', 'anvil'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
